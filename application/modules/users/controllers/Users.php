<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users');
        $this->splogin->check();
        date_default_timezone_set('Asia/Jakarta');
        if (($this->session->userdata('role') > 1) and ($this->session->userdata('role') < 4) and ($this->session->userdata('role') !== 5)) {
            $this->session->set_flashdata('catch', 'Anda tidak memiliki Hak akses');
            redirect(base_url());
        };
    }
    public function index()
    {
        $data['title'] = "Users | JOGO TONGGO";
        if ($this->session->userdata('role') == 4) {
            $data['userlist'] = $this->M_Users->getUsersKel($this->session->userdata('username'));
        } else {
            $data['userlist'] = $this->M_Users->getUsers();
        }
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');
        $data['kab'] = $this->M_Users->getKab();
        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('users', $data);
        $this->load->view('../template/footer');
    }
    function fetch_kec($kabId)
    {
        if ($kabId) {
            echo $this->M_Users->getKec($kabId);
        }
    }
    function fetch_kel($kecId)
    {
        if ($kecId) {
            echo $this->M_Users->getKel($kecId);
        }
    }
    function fetch_rw()
    {
        $id = $this->input->get('kel');
        if ($this->session->userdata('role') < 2) {
            echo $this->M_Users->getRw($id);
        } else {
            echo $this->session->userdata('region');
        }
    }
    public function regis()
    {
        // Add Quest
        $valid = $this->form_validation;
        $valid->set_rules('user_nama', 'Nama User', 'required');
        $valid->set_rules('users_name', 'Username', 'required');
        $valid->set_rules('pass', 'Password', 'required');
        $valid->set_rules('frole', 'Role', 'required');
        $valid->set_rules('phone', 'Phone', 'required');

        if ($valid->run() == false) {
            $data['catch'] = $this->session->set_flashdata('catch', 'Data gagal ditambahkan');
            redirect(base_url('users'));
        } else {
            $this->M_Users->regis();
        }
    }
    function edit()
    {
        $euid = $this->input->post('eu_id');
        $eu_uname = $this->input->post('eu_uname', true);
        $eu_name = $this->input->post('eu_name', true);
        $eu_pass = $this->input->post('eu_pass');
        $eurole = $this->input->post('eu_role', true);
        if ($eurole < 3) {
            $regid = $this->input->post('eukab', true);
        } elseif ($eurole == 3) {
            $regid = $this->input->post('eukec', true);
        } elseif ($eurole == 4) {
            $regid = $this->input->post('eukel', true);
        } else {
            $regid = $this->input->post('eurw', true);
        }
        $eu_phone = $this->input->post('eu_phone', true);

        $getpass = $this->M_Users->getPass($this->session->userdata('regid'));

        if ($this->M_Users->verifPass($eu_pass, $getpass)) {
            $hashpass = $eu_pass;
        } else {
            $hashpass = $this->M_Users->hashPw($eu_pass);
        }
        $dataa = array(
            'user_nama' => $eu_uname,
            'username' => $eu_name,
            'password' => $hashpass,
            'region_id' => $regid,
            'role' => $eurole,
            'phone' => $eu_phone
        );
        $this->M_Users->editU($euid, $dataa);
    }
    function delU($id)
    {
        if ($this->session->userdata('id') == $id) {
            $this->session->set_flashdata('catch', 'User sedang aktif');
            redirect(base_url('users'));
        } else {
            $this->M_Users->delU($id);
            $this->session->set_flashdata('flash', 'Data berhasil dihapus');
            redirect(base_url('users'));
        }
    }
    function non($id)
    {
        $this->M_Users->dump($id);
        $this->session->set_flashdata('flash', 'Data berhasil dinon-aktifkan');
        redirect(base_url('users'));
    }
    function aktif($id)
    {
        $this->M_Users->kembali($id);
        $this->session->set_flashdata('flash', 'Data berhasil diaktifkan');
        redirect(base_url('users'));
    }
    function profile($id)
    {
        $data['title'] = "Profile | JOGO TONGGO";
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');
        $data['bio'] = $this->M_Users->getUser($id);


        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('user', $data);
        $this->load->view('../template/footer');
    }

    function saveprofile()
    {
        $uname = $this->session->userdata('username');

        $euid = $this->input->post('eu_id');
        $name = $this->input->post('eu_uname');
        $phone = $this->input->post('eu_phone');
        $passw = $this->input->post('eu_pass');

        $qry = $this->db->get_where('user', ['users_id' => $euid]);
        $res = $qry->row();

        if (password_verify($passw, $res->password)) {
            $cfg = [
                'user_nama' => $name,
                'phone' => $phone,
            ];
            $this->M_Users->edit_user($cfg, $euid);
            $this->session->set_flashdata('flash', 'Profil berhasil di Perbarui');
            redirect(base_url('users/profile/') . $uname);
        } else {
            $this->session->set_flashdata('catch', 'Password Salah');
            redirect(base_url('users/profile/') . $uname);
        }
    }
    function changePass()
    {
        $uname = $this->session->userdata('username');

        $euold = $this->input->post('eu_passw');
        $euid = $this->input->post('eu_id');
        $passw = $this->input->post('eu_pass');

        $qry = $this->db->get_where('user', ['users_id' => $euid]);
        $res = $qry->row();

        if (password_verify($euold, $res->password)) {

            $hashpass = $this->M_Users->hashPw($passw);
            $cfg = [
                'password' => $hashpass
            ];
            $this->M_Users->edit_user($cfg, $euid);
            $this->session->set_flashdata('flash', 'Password berhasil di Perbarui');
            redirect(base_url('users/profile/') . $uname);
        } else {
            $this->session->set_flashdata('catch', 'Password Salah');
            redirect(base_url('users/profile/') . $uname);
        }
    }
    // function lama()
    // {
    //     $data['title'] = "Users | JOGO TONGGO";
    //     $data['userlist'] = $this->M_Users->getOld();
    //     $data['flash'] = $this->session->flashdata('flash');
    //     $data['catch'] = $this->session->flashdata('catch');
    //     $data['kab'] = $this->M_Users->getKab();

    //     $this->load->view('../template/header', $data);
    //     $this->load->view('../template/topbar', $data);
    //     $this->load->view('../template/sidebar', $data);
    //     $this->load->view('usersold', $data);
    //     $this->load->view('../template/footer');
    // }
    // function saveWil()
    // {
    //     $nama = $this->input->get('uname');
    //     $parent = $this->input->get('parent');
    //     $regid = $this->input->get('reg');
    //     $role = $this->input->get('rol');
    //     $tempPass = $this->M_Users->hashPw("123qwe");
    //     if (($role > 0) && ($role < 3)) {
    //         $data = array(
    //             'kab_id' => $regid,
    //             'parent_id' => $parent,
    //             'kab_name' => $nama
    //         );
    //         $data2 = array(
    //             'user_nama' => $nama,
    //             'username' => $regid,
    //             'password' => $tempPass,
    //             'region_id' => $regid,
    //             'role' => $role,
    //             'last_mod' => date('Y-m-d H:i:s')
    //         );
    //         $this->db->insert('kab', $data);
    //         $this->db->insert('user', $data2);
    //         $this->session->set_flashdata('flash', 'Kabupaten terisi');
    //     } elseif ($role == 3) {
    //         $data = array(
    //             'kec_id' => $regid,
    //             'parent_id' => $parent,
    //             'kec_name' => $nama
    //         );
    //         $data2 = array(
    //             'user_nama' => $nama,
    //             'username' => $regid,
    //             'password' => $tempPass,
    //             'region_id' => $regid,
    //             'role' => $role,
    //             'last_mod' => date('Y-m-d H:i:s')
    //         );
    //         $this->db->insert('kec', $data);
    //         $this->db->insert('user', $data2);
    //         $this->session->set_flashdata('flash', 'Kecamatan terisi');
    //     } elseif ($role == 4) {
    //         $data = array(
    //             'kel_id' => $regid,
    //             'parent_id' => $parent,
    //             'kel_name' => $nama
    //         );
    //         $data2 = array(
    //             'user_nama' => $nama,
    //             'username' => $regid,
    //             'password' => $tempPass,
    //             'region_id' => $regid,
    //             'role' => $role,
    //             'last_mod' => date('Y-m-d H:i:s')
    //         );
    //         $this->db->insert('kel', $data);
    //         $this->db->insert('user', $data2);
    //         $this->session->set_flashdata('flash', 'Kelurahan terisi');
    //     } else {
    //         $data = array(
    //             'rw_id' => $regid,
    //             'parent_id' => $parent,
    //             'rw_name' => $nama
    //         );
    //         $data2 = array(
    //             'user_nama' => $nama,
    //             'username' => $regid,
    //             'password' => $tempPass,
    //             'region_id' => $regid,
    //             'role' => $role,
    //             'last_mod' => date('Y-m-d H:i:s')
    //         );
    //         $this->db->insert('rw', $data);
    //         $this->db->insert('user', $data2);
    //         $this->session->set_flashdata('flash', 'RW terisi');
    //     }
    // }
}
