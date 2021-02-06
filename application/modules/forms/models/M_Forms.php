<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Forms extends CI_Model
{

    function getQuestH()
    {
        $this->db->order_by('quest_type', 'desc');
        return $this->db->get('v_form_health')->result_array();
    }
    function getQuestE()
    {
        $this->db->order_by('quest_type', 'desc');
        return $this->db->get('v_form_eco')->result_array();
    }
    function getQuestS()
    {
        $this->db->order_by('quest_type', 'desc');
        return $this->db->get('v_form_soc')->result_array();
    }
    function getQuestEnt()
    {
        $this->db->order_by('quest_type', 'desc');
        return $this->db->get('v_form_ent')->result_array();
    }
    function getTotalHQuest()
    {
        $qry = $this->db->query("SELECT COUNT('quest_id') AS tot FROM `quest` WHERE quest_cat = 'c0001';");
        $row = $qry->row();
        $output = $row->tot;
        return $output;
    }
    function getTotalEQuest()
    {
        $qry = $this->db->query("SELECT COUNT('quest_id') AS tot FROM `quest` WHERE quest_cat = 'c0002';");
        $row = $qry->row();
        $output = $row->tot;
        return $output;
    }
    function getTotalSQuest()
    {
        $qry = $this->db->query("SELECT COUNT('quest_id') AS tot FROM `quest` WHERE quest_cat = 'c0003';");
        $row = $qry->row();
        $output = $row->tot;
        return $output;
    }
    function getTotalEntQuest()
    {
        $qry = $this->db->query("SELECT COUNT('quest_id') AS tot FROM `quest` WHERE quest_cat = 'c0004';");
        $row = $qry->row();
        $output = $row->tot;
        return $output;
    }
    function saveHealth()
    {
        $totalQ  = $this->getTotalHQuest();
        $user = $this->session->userdata('region');
        $no = 1;
        for ($i = 0; $i < ($totalQ); $i++) {
            $res = $this->input->post('qid' . $no);
            $ans = $this->input->post('ans' . $no);
            $arr = array(
                'quest_id' => $res,
                'quest_cat' => 'c0001',
                'rw_id' => $user,
                'rw_answer' => $ans,
                'stat' => FALSE,
                'last_mod' => date('Y-m-d H:i:s')
            );
            $sortArr = array_filter($arr);
            $this->db->where('quest_id', $res);
            if ($ans == null) {
            } else {
                $this->db->insert('rw_res', $sortArr);
            }
            $no++;
        }
        $this->session->set_flashdata('flash', 'Jawaban tersimpan');
        redirect(base_url('forms'));
    }
    function saveEco()
    {
        $totalQ  = $this->getTotalEQuest();
        $user = $this->session->userdata('region');
        $no = 1;
        for ($i = 0; $i < ($totalQ); $i++) {
            $res = $this->input->post('qid' . $no);
            $ans = $this->input->post('ans' . $no);
            $arr = array(
                'quest_id' => $res,
                'quest_cat' => 'c0002',
                'rw_id' => $user,
                'rw_answer' => $ans,
                'stat' => FALSE,
                'last_mod' => date('Y-m-d H:i:s')
            );
            $sortArr = array_filter($arr);
            $this->db->where('quest_id', $res);
            if ($ans == null) {
            } else {
                $this->db->insert('rw_res', $sortArr);
            }
            $no++;
        }
        $this->session->set_flashdata('flash', 'Jawaban tersimpan');
        redirect(base_url('forms'));
    }
    function saveSoc()
    {
        $totalQ  = $this->getTotalSQuest();
        $user = $this->session->userdata('region');
        $no = 1;
        for ($i = 0; $i < ($totalQ); $i++) {
            $res = $this->input->post('qid' . $no);
            $ans = $this->input->post('ans' . $no);
            $arr = array(
                'quest_id' => $res,
                'quest_cat' => 'c0003',
                'rw_id' => $user,
                'rw_answer' => $ans,
                'stat' => FALSE,
                'last_mod' => date('Y-m-d H:i:s')
            );
            $sortArr = array_filter($arr);
            $this->db->where('quest_id', $res);
            if ($ans == null) {
            } else {
                $this->db->insert('rw_res', $sortArr);
            }
            $no++;
        }
        $this->session->set_flashdata('flash', 'Jawaban tersimpan');
        redirect(base_url('forms'));
    }
    function saveEnt()
    {
        $totalQ  = $this->getTotalEntQuest();
        $user = $this->session->userdata('region');
        $no = 1;
        for ($i = 0; $i < ($totalQ); $i++) {
            $res = $this->input->post('qid' . $no);
            $ans = $this->input->post('ans' . $no);
            $arr = array(
                'quest_id' => $res,
                'quest_cat' => 'c0004',
                'rw_id' => $user,
                'rw_answer' => $ans,
                'stat' => FALSE,
                'last_mod' => date('Y-m-d H:i:s')
            );
            $sortArr = array_filter($arr);
            $this->db->where('quest_id', $res);
            if ($ans == null) {
            } else {
                $this->db->insert('rw_res', $sortArr);
            }
            $no++;
        }
        $this->session->set_flashdata('flash', 'Jawaban tersimpan');
        redirect(base_url('forms'));
    }
}

/* End of file M_Forms.php */
