<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Socials extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        if ($this->session->userdata('role') > 3) {
            redirect(base_url(''));
        }
        $this->load->model('M_Soc');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = "SosKam | JOGO TONGGO";
        $data['username'] = $this->session->userdata('uname');

        $data['totKab'] = $this->M_Soc->getTotKab();
        $data['totKec'] = $this->M_Soc->getTotKec();
        $data['totKel'] = $this->M_Soc->getTotKel();
        $data['totRw'] = $this->M_Soc->getTotRw();
        $data['out'] = $this->M_Soc->getOptRes();

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('../template/footer');
    }
    function fetchTot($id)
    {
        if ($id) {
            $idA = $this->encrypt->decode($id);
            echo $this->M_Soc->fetch_total($idA);
        }
    }
    function AllLabel($id)
    {
        if ($id) {
            $idA = $this->encrypt->decode($id);
            $lbl = $this->M_Soc->fetchAllLabels($idA);
            $data['hokya'] = json_encode($lbl);
            echo $data['hokya'];
        }
    }
    function AllData()
    {
        $val = $this->input->get('label');
        $id = $this->input->get('id');
        $idA = $this->encrypt->decode($id);
        $opp = $this->M_Soc->fetchAllData($val, $idA);
        $data['opp'] = json_encode($opp);
        echo $data['opp'];
    }
}

/* End of file Socials.php */
