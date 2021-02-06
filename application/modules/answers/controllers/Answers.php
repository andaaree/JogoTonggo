<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Answers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        $this->load->model('m_ans');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        $data['title'] = "Verifikasi | JOGO TONGGO";
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');
        $data['rw'] = $this->m_ans->getAllRw();

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('../template/footer');
    }
    public function rw($id)
    {
        $data['title'] = "Verifikasi | JOGO TONGGO";
        $data['username'] = $this->session->userdata('uname');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');
        $data['quest'] = $this->m_ans->getAllAns($id);

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('answer', $data);
        $this->load->view('../template/footer');
    }
    public function delete($id)
    {
        $this->m_ans->delete($id);
    }
    public function verif($id)
    {
        if ($id) {
            $this->m_ans->verify($id);
        } else {
            $this->session->set_flashdata('catch', 'Verifikasi gagal');
            redirect(base_url('answers'));
        }
    }
}

/* End of file Answers.php */
