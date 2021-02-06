<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Quests extends CI_Model
{

    function getAllQuests()
    {
        $qry = "SELECT * FROM `quest` JOIN category WHERE category.cat_id=quest.quest_cat;";
        $query = $this->db->query($qry);
        return $query->result_array();
    }
    function getAllCat()
    {
        return $this->db->get('category')->result_array();
    }
    function questType($tabname, $colname)
    {
        $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" . $tabname . "' AND COLUMN_NAME = '" . $colname . "'";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }
    function cekqid()
    {
        $query = $this->db->query("SELECT MAX(quest_id) as qcat from quest");
        $hasil = $query->row();
        return $hasil->qcat;
    }

    function addQuest()
    {
        $questID = $this->input->post('quest_id');
        $questfull = $this->input->post('quest_full', true);
        $quest_type = $this->input->post('quest_type', true);
        $quest_cat = $this->input->post('quest_cat', true);
        $dataa = array(
            'quest_id' => $questID,
            'quest_full' => $questfull,
            'quest_type' => $quest_type,
            'quest_cat' => $quest_cat,
            'last_mod' => date('Y-m-d H:i:s')
        );
        $this->db->insert('quest', $dataa);
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menambah Pertanyaan $quest_type";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $questID,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);

        $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');

        redirect(base_url('quests'));
    }
    function editQ($eqid, $dataa)
    {
        $this->db->where('quest_id', $eqid);
        $this->db->update('quest', $dataa);

        $this->session->set_flashdata('flash', 'Data berhasil diedit');

        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Mengubah Pertanyaan $eqid";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $eqid,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
        redirect(base_url('quests'));
    }

    function delQ($qid)
    {
        $this->db->where('quest_id', $qid);
        $this->db->insert('quest_old');
        $this->db->delete('quest');
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menghapus Pertanyaan $qid";
        $logdata = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan,
            'jenis' => $qid,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->db->insert('log', $logdata);
    }
    function getQ($id)
    {
        $this->db->select('*');
        $this->db->where('quest_id', $id);
        return $this->db->get('quest')->result_array();
    }
    function dump($dataa)
    {
        $data2 = array('last_mod' => NULL);
        $this->db->where('quest_id', $dataa);
        $this->db->update('quest', $data2);
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Pertanyaan $dataa dinon-aktifkan";
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
        $this->db->where('quest_id', $id);
        $this->db->update('quest', $data2);
        // Log System
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Pertanyaan $id diaktifkan";
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

/* End of file M_Quests.php */
