<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Coba extends CI_Model {

    public function getOptRes()
    {
        $uri = substr($this->uri->uri_string(), 0, 6);
        $qry = $this->db->query("SELECT DISTINCT cat_name,rw_res.quest_id,quest_type,quest_full FROM rw_res,v_form_health WHERE rw_res.quest_id=v_form_health.quest_id ORDER BY quest_type DESC;");
        return $qry->result_array();
    }
    function fetch_opt($id)
    {
        $qry = $this->db->query("SELECT COUNT(rw_answer) AS ada FROM rw_res WHERE quest_id = '$id' AND rw_answer = 'Ada' AND stat=TRUE;");
        $row = $qry->row();
        $yes = $row->ada;
        $que = $this->db->query("SELECT COUNT(rw_answer) AS tdk FROM rw_res WHERE quest_id = '$id' AND rw_answer = 'Tidak Ada' AND stat=TRUE;");
        $brs = $que->row();
        $no = $brs->tdk;
        $arrData = array(
            'Ada' => $yes,
            'Tidak' => $no
        );
        return $arrData;
    }
}

/* End of file M_Coba.php */

?>