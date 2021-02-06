<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        if (($this->session->userdata('role') > 1) and ($this->session->userdata('role') < 5)) {
            $this->session->set_flashdata('catch', 'Anda tidak memiliki Hak Akses');
            redirect(base_url());
        }
        $this->load->model('M_Forms');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        $data['title'] = "Survey | JOGO TONGGO";
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('../template/footer');
    }
    public function health()
    {
        $data['title'] = "Survey Kesehatan | JOGO TONGGO";
        $data['ans'] = $this->M_Forms->getQuestH();
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('health', $data);
        $this->load->view('../template/footer');
    }

    public function economy()
    {
        $data['title'] = "Survey Ekonomi | JOGO TONGGO";
        $data['ans'] = $this->M_Forms->getQuestE();
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('eco', $data);
        $this->load->view('../template/footer');
    }

    public function socials()
    {
        $data['title'] = "Survey SosKam | JOGO TONGGO";
        $data['ans'] = $this->M_Forms->getQuestS();
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('soc', $data);
        $this->load->view('../template/footer');
    }
    public function entertain()
    {
        $data['title'] = "Survey Hiburan | JOGO TONGGO";
        $data['ans'] = $this->M_Forms->getQuestEnt();
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('ent', $data);
        $this->load->view('../template/footer');
    }
    function saveH()
    {
        $this->form_validation->set_rules('qid1', 'Quest ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['catch'] = $this->session->set_flashdata('catch', 'Jawaban gagal ditambahkan');
            redirect(base_url('forms'));
        } else {
            $this->M_Forms->saveHealth();
        }
    }
    function saveE()
    {
        $this->form_validation->set_rules('qid1', 'Quest ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['catch'] = $this->session->set_flashdata('catch', 'Jawaban gagal ditambahkan');
            redirect(base_url('forms'));
        } else {
            $this->M_Forms->saveEco();
        }
    }
    function saveEnt()
    {
        $this->form_validation->set_rules('qid1', 'Quest ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['catch'] = $this->session->set_flashdata('catch', 'Jawaban gagal ditambahkan');
            redirect(base_url('forms'));
        } else {
            $this->M_Forms->saveEnt();
        }
    }
    function saveSoc()
    {
        $this->form_validation->set_rules('qid1', 'Quest ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['catch'] = $this->session->set_flashdata('catch', 'Jawaban gagal ditambahkan');
            redirect(base_url('forms'));
        } else {
            $this->M_Forms->saveSoc();
        }
    }
}

/* End of file Forms.php */
