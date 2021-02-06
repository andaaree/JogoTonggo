<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Entertain extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        if ($this->session->userdata('role') > 3) {
            redirect(base_url(''));
        }
        $this->load->model('M_Ent');
        date_default_timezone_set('Asia/Jakarta');
        $data['username'] = $this->session->userdata('uname');
    }


    public function index()
    {
        $data['title'] = "Hiburan | JOGO TONGGO";
        $data['totKab'] = $this->M_Ent->getTotKab();
        $data['totKec'] = $this->M_Ent->getTotKec();
        $data['totKel'] = $this->M_Ent->getTotKel();
        $data['totRw'] = $this->M_Ent->getTotRw();
        $data['out'] = $this->M_Ent->getOptRes();

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('ent', $data);
        $this->load->view('../template/footer');
    }
    function fetchTot($id)
    {
        if ($id) {
            $idA = $this->encrypt->decode($id);
            echo $this->M_Ent->fetch_total($idA);
        }
    }
    function AllLabel($id)
    {
        if ($id) {
            $idA = $this->encrypt->decode($id);
            $lbl = $this->M_Eco->fetchAllLabels($idA);
            $data['hokya'] = json_encode($lbl);
            echo $data['hokya'];
        }
    }
    function AllData()
    {
        $val = $this->input->get('label');
        $id = $this->input->get('id');
        $idA = $this->encrypt->decode($id);
        $opp = $this->M_Eco->fetchAllData($val, $idA);
        $data['opp'] = json_encode($opp);
        echo $data['opp'];
    }
}

/* End of file Entertain.php */
