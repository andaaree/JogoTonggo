<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Soc extends CI_Model
{

    public function getTotKab()
    {
        $uri = substr($this->uri->uri_string(), 0, 7);
        $qry = $this->db->query("SELECT COUNT(DISTINCT kab.kab_id) AS totKab FROM rw_res,v_reg,rw,kab,category WHERE kab.kab_id=v_reg.kab AND v_reg.rw=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $kab = $row->totKab;
        return $kab;
    }
    public function getTotKec()
    {
        $uri = substr($this->uri->uri_string(), 0, 7);
        $reg = $this->session->userdata('region');
        $qry = $this->db->query("SELECT COUNT(DISTINCT kec.kec_id) AS totKec FROM rw_res,v_reg,rw,kec,category WHERE kec.kec_id=v_reg.kec AND v_reg.rw=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $kec = $row->totKec;
        return $kec;
    }
    public function getTotKel()
    {
        $uri = substr($this->uri->uri_string(), 0, 7);
        $qry = $this->db->query("SELECT COUNT(DISTINCT kel.kel_id) AS totKel FROM rw_res,v_reg,rw,kel,category WHERE kel.kel_id=v_reg.kel AND v_reg.rw=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $kel = $row->totKel;
        return $kel;
    }
    public function getTotRw()
    {
        $uri = substr($this->uri->uri_string(), 0, 7);
        $qry = $this->db->query("SELECT COUNT(DISTINCT rw_res.rw_id) AS totRw FROM rw_res,rw,category WHERE rw.rw_id=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $rw = $row->totRw;
        return $rw;
    }
    public function getOptRes()
    {
        $qry = $this->db->query("SELECT DISTINCT cat_name,rw_res.quest_id,quest_type,quest_full FROM rw_res,v_form_soc WHERE rw_res.quest_id=v_form_soc.quest_id ORDER BY quest_type DESC;");
        return $qry->result_array();
    }

    function fetchAllLabels($id)
    {
        $qry = $this->db->query("SELECT DISTINCT rw_answer as res FROM rw_res WHERE quest_id = '$id' AND stat=TRUE ORDER BY res ASC;");

        return $qry->result();
    }
    function fetchAllData($val,$id)
    {
        $qryA = $this->db->query("SELECT COUNT(rw_answer) AS ansA FROM rw_res WHERE quest_id = '$id' AND rw_answer = '$val' AND stat=TRUE;");
        $row = $qryA->row();
        $ansA = $row->ansA;
        return $ansA;
    }

    function fetch_total($id)
    {
        $qry = $this->db->query("SELECT SUM(rw_answer) AS tot FROM rw_res WHERE quest_id = '$id' AND stat=TRUE;");
        $row = $qry->row();
        $yes = $row->tot;
        return $yes;
    }
}

/* End of file M_Soc.php */
