<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Summary extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        if ($this->session->userdata('role') > 3) {
            redirect(base_url(''));
        }
        $this->load->model('M_Sum');
        date_default_timezone_set('Asia/Jakarta');
        $data['username'] = $this->session->userdata('uname');
    }


    public function index()
    {
        $data['title'] = "Ringkasan | JOGO TONGGO";
        $data['totH'] = $this->M_Sum->getTotH();
        $data['totEco'] = $this->M_Sum->getTotEco();
        $data['totSoc'] = $this->M_Sum->getTotSoc();
        $data['totEnt'] = $this->M_Sum->getTotEnt();
        $data['totUser'] = $this->M_Sum->getUsers();
        $data['totUA'] = $this->M_Sum->getActU();
        $data['totNA'] = $this->M_Sum->getNotAct();
        $data['totQuest'] = $this->M_Sum->getQuest();
        $data['totQA'] = $this->M_Sum->getActQ();
        $data['totQN'] = $this->M_Sum->getNotQ();
        $data['totRw'] = $this->M_Sum->getRw();
        $data['totRwNR'] = $this->M_Sum->getRwNR();
        $data['totRwVer'] = $this->M_Sum->getRwVer();
        $data['totRwNV'] = $this->M_Sum->getRwNV();

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('../template/footer');
    }
}

/* End of file Summary.php */
