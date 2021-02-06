<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_coba');
    }


    public function index()
    {
        $data['title'] = "Dashboard | JOGO TONGGO";
        $data['flash'] = $this->session->userdata('flash');
        $data['catch'] = $this->session->userdata('catch');
        $data['ans'] = $this->m_coba->getOptRes();

        $data['username'] = $this->session->userdata('username');
        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('../template/footer');
    }
    function fetchOpt($id)
    {
        if ($id) {
            $idA = $this->encrypt->decode($id);
            $wow = $this->m_coba->fetch_opt($idA);
            $data['rsl'] = json_encode($wow);
            echo $data['rsl'];
        }
    }
}

/* End of file Coba.php */
