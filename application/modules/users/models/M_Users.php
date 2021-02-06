<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Users extends CI_Model
{

    function getUsers()
    {
        return $this->db->get('user')->result_array();
    }
    function getUsersKel($id)
    {
        $this->db->like('username', $id);
        return $this->db->get('user')->result_array();
    }
    function getUser($id)
    {
        return $this->db->get_where('user', ['username' => $id])->result_array();
    }
    function getUserKab($id)
    {
        $this->db->where($id);
        return $this->db->get('user')->result_array();
    }
    function getUserKec($id)
    {
        $this->db->where($id);
        return $this->db->get('user')->result_array();
    }
    function getUserKel($id)
    {
        $this->db->where($id);
        return $this->db->get('user')->result_array();
    }
    function getUserRw($id)
    {
        $this->db->where($id);
        return $this->db->get('user')->result_array();
    }
    function regis()
    {
        $uname = $this->input->post('user_nama', true);
        $user = $this->input->post('users_name', true);
        $pass = $this->input->post('pass', true);
        $hashpass = $this->hashPw($pass);
        $frole = $this->input->post('frole', true);
        $phone = $this->input->post('phone');
        if ($frole < 3) {
            $regid = $this->input->post('kab', true);
            $parid = substr($user, 0, 2);
        } elseif ($frole == 3) {
            $regid = $this->input->post('kec', true);
            $parid = substr($user, 0, 4);
        } elseif ($frole == 4) {
            $parid = substr($user, 0, 6);
            $regid = $this->input->post('kel', true);
        } else {
            $regid = $user;
            $parid = substr($user, 0, 10);
        }
        $dataa = array(
            'user_nama' => $uname,
            'username' => $user,
            'password' => $hashpass,
            'region_id' => $regid,
            'role' => $frole,
            'phone' => $phone,
            'last_mod' => date('Y-m-d H:i:s')
        );
        $data2 = array(
            'rw_id' => $regid,
            'parent_id' => $parid,
            'rw_name' => $uname
        );

        $qry = $this->db
            ->where('region_id', $regid)
            ->get('user');

        $quu = $this->db
            ->where('rw_id', $regid)
            ->get('rw');


        if (($qry->num_rows() == 1) && ($frole == 5)) {
            $data['catch'] = $this->session->set_flashdata('catch', 'User daerah itu sudah ada');
            redirect(base_url('users'));
        } else {

            $this->db->insert('user', $dataa);
            if ($quu->num_rows() != 1) {
                $this->db->insert('rw', $data2);
            }
            // Log System
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $username = $this->session->userdata('username');
            $keterangan = "Menambah Users $user";
            $logdata = array(
                'username' => $username,
                'ip' => $ip_address,
                'keterangan' => $keterangan,
                'jenis' => $frole,
                'tanggal' => date('Y-m-d H:i:s')
            );
            $this->db->insert('log', $logdata);
            $this->session->set_flashdata('flash', 'User berhasil ditambahkan');

            redirect(base_url('users'));
        }
    }
    function hashPw($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }
    function verifPass($passput, $pass)
    {
        return password_verify($passput, $pass);
    }
    function getPass($reg)
    {
        $rw = $this->db->get_where('user', array('region_id' => $reg))->row();
        return $rw->password;
    }
    function editU($euid, $dataa)
    {
        $this->db->where('users_id', $euid);
        $this->db->update('user', $dataa);

        $this->session->set_flashdata('flash', 'Data berhasil diedit');

        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = '33a';
        $keterangan = "Mengubah User $euid";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $euid,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
        redirect(base_url('users'));
    }
    function delU($id)
    {

        $this->db->where('users_id', $id);
        $this->db->insert('user_old');
        $this->db->delete('user');
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menghapus User $id";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $id,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
    }
    function edit_user($cfg, $id)
    {
        $this->db->where('users_id', $id);
        $this->db->update('user', $cfg);
    }
    function getKab()
    {
        $this->db->select('*');
        return $this->db->get('kab')->result_array();
    }
    function getKec($id)
    {
        $qry = $this->db->query("SELECT DISTINCT kec.kec_id,kec_name FROM v_reg_kel JOIN kec WHERE v_reg_kel.kab = '" . $id . "' AND kec.kec_id=v_reg_kel.kec;");
        $output = '<option value="">--- Pilih Kecamatan ---</option>';
        foreach ($qry->result() as $row) {
            $output .= '<option value="' . $row->kec_id . '">' . $row->kec_name . '</option>';
        }
        return $output;
    }

    function getKel($id)
    {
        $qry = $this->db->query("SELECT DISTINCT kel.kel_id,kel_name FROM v_reg_kel JOIN kel WHERE v_reg_kel.kec = '" . $id . "' AND kel.kel_id=v_reg_kel.kel;");
        $output = '<option value="">--- Pilih Kelurahan ---</option>';
        foreach ($qry->result() as $row) {
            $output .= '<option value="' . $row->kel_id . '">' . $row->kel_name . '</option>';
        }
        return $output;
    }
    function getRw($id)
    {
        $this->db->select('kel');
        $this->db->where('kel', $id);
        $qry = $this->db->get('v_reg_kel');
        $row = $qry->row();
        $kel = $row->kel;
        return $kel;
    }
    // function getOld()
    // {
    //     $this->db->limit(1000);
    //     $this->db->offset(9000);
    //     return $this->db->get('user_old')->result_array();
    // }
    function dump($dataa)
    {
        $data2 = array('last_mod' => NULL);
        $this->db->where('users_id', $dataa);
        $this->db->update('user', $data2);
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "User $dataa dinon-aktifkan";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => 'aktivasi',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
    }
    function kembali($id)
    {
        $data2 = array(
            'last_mod' => date('Y-m-d H:i:s')
        );
        $this->db->where('users_id', $id);
        $this->db->update('user', $data2);
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "User $id diaktifkan";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => 'aktivasi',
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
    }
}

/* End of file M_Users.php */
