<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ans extends CI_Model {

    function getAllAns($id)
    {
        $kel = $this->session->userdata('region');
        $qry = $this->db->query("SELECT * FROM rw_res,v_reg,quest,category,rw,kel WHERE rw_res.rw_id=v_reg.rw AND v_reg.rw = rw.rw_id AND v_reg.kel = kel.kel_id AND v_reg.rw='$id' AND category.cat_id=rw_res.quest_cat AND quest.quest_id=rw_res.quest_id AND (v_reg.kel='$kel' OR v_reg.prov='$kel');");
        return $qry->result_array();
    }
    function getAllRw()
    {
        $kel = $this->session->userdata('region');
        $qry = $this->db->query("SELECT DISTINCT rw_res.rw_id,rw_name,kel_name FROM rw_res,v_reg,kel,rw WHERE rw_res.rw_id=v_reg.rw AND kel.kel_id=v_reg.kel AND rw.rw_id=v_reg.rw AND (v_reg.kel='$kel' OR v_reg.prov='$kel') ORDER BY rw_res.last_mod DESC;");
        return $qry->result_array();
    }
    function verify($id)
    {
        $var = array('stat' => TRUE);
        $this->db->where('rw_id', $id);
        $this->db->update('rw_res', $var);
        $this->session->set_flashdata('flash', 'Jawaban berhasil diverifikasi');
        redirect(base_url('answers'));
    }
}

/* End of file M_Ans.php */
