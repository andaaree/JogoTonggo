<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sum extends CI_Model {

    function getTotH()
    {
        $uri = "health";
        $qry = $this->db->query("SELECT COUNT(DISTINCT rw_res.rw_id) AS totRw FROM rw_res,rw,category WHERE rw.rw_id=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $rw = $row->totRw;
        return $rw;
    }
    function getTotEco()
    {
        $uri = "economy";
        $qry = $this->db->query("SELECT COUNT(DISTINCT rw_res.rw_id) AS totRw FROM rw_res,rw,category WHERE rw.rw_id=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $rw = $row->totRw;
        return $rw;
    }
    function getTotSoc()
    {
        $uri = "socials";
        $qry = $this->db->query("SELECT COUNT(DISTINCT rw_res.rw_id) AS totRw FROM rw_res,rw,category WHERE rw.rw_id=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $rw = $row->totRw;
        return $rw;
    }
    function getTotEnt()
    {
        $uri = "entertain";
        $qry = $this->db->query("SELECT COUNT(DISTINCT rw_res.rw_id) AS totRw FROM rw_res,rw,category WHERE rw.rw_id=rw_res.rw_id AND category.cat_id=rw_res.quest_cat AND cat_name='$uri' AND stat=TRUE;");
        $row  = $qry->row();
        $rw = $row->totRw;
        return $rw;
    }
    function getUsers()
    {
        return $this->db->count_all('user');
    }
    function getActU()
    {
        $res = "last_mod IS NOT NULL";
        $this->db->select('COUNT(*) as count');
        $this->db->where($res);
        $qry = $this->db->get('user');
        $row = $qry->row();
        $res = $row->count;
        return $res;
    }
    function getNotAct()
    {
        $res = "last_mod IS NULL";
        $this->db->select('COUNT(*) as count');
        $this->db->where($res);
        $qry = $this->db->get('user');
        $row = $qry->row();
        $res = $row->count;
        return $res;
    }
    function getQuest()
    {
        return $this->db->count_all('quest');
    }
    function getActQ()
    {
        $res = "last_mod IS NOT NULL";
        $this->db->select('COUNT(*) as count');
        $this->db->where($res);
        $qry = $this->db->get('quest');
        $row = $qry->row();
        $res = $row->count;
        return $res;
    }
    function getNotQ()
    {
        $res = "last_mod IS NULL";
        $this->db->select('COUNT(*) as count');
        $this->db->where($res);
        $qry = $this->db->get('quest');
        $row = $qry->row();
        $res = $row->count;
        return $res;
    }
    function getRw()
    {
        $this->db->select('COUNT(DISTINCT rw_id) as count');
        $row = $this->db->get('rw_res')->row();
        return $row->count;
    }
    function getRwNR()
    {
        $val = "rw.rw_id NOT IN (select distinct(rw_id) from rw_res)";
        $this->db->select('COUNT(DISTINCT rw_id) as count');
        $this->db->where($val);
        $qry=$this->db->get('rw')->row();
        return $qry->count;
    }
    function getRwVer()
    {
        $this->db->select('count(distinct rw_id) as count');
        $this->db->where('stat', TRUE);
        $qry=$this->db->get('rw_res')->row();
        return $qry->count;
    }
    function getRwNV()
    {
        $this->db->select('count(distinct rw_id) as count');
        $this->db->where('stat', FALSE);
        $qry=$this->db->get('rw_res')->row();
        return $qry->count;
    }
}

/* End of file M_Sum.php */
