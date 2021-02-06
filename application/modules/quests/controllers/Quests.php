<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Quests extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->splogin->check();
        if ($this->session->userdata('role') > 1) {
            $this->session->set_flashdata('catch', 'Anda tidak memiliki Hak akses');
            redirect(base_url());
        }
        $this->load->model('M_Quests');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        // Get Quest ID
        $qid = $this->M_Quests->cekqid();
        $lastid = substr($qid, 2, 6);
        $qidN = $lastid + 1;

        //set Table name
        $tabname = "quest";
        $colname = "quest_type";
        $data['title'] = "List Pertanyaan | JOGO TONGGO";
        $data['username'] = $this->session->userdata('username');
        $data['flash'] = $this->session->flashdata('flash');
        $data['quest'] = $this->M_Quests->getAllQuests();
        $data['qcat'] = $this->M_Quests->getallCat();
        $data['lastqid'] = $qidN;
        // set col name
        $data['qtype'] = $this->M_Quests->questType($tabname, $colname);

        $this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('quest', $data);
        $this->load->view('../template/footer');
    }

    function addQuests()
    {
        // Add Quest
        $valid = $this->form_validation;
        $valid->set_rules('quest_full', 'Quest', 'required');
        $valid->set_rules('quest_type', 'Quest Type', 'required');
        $valid->set_rules('quest_cat', 'Quest Category', 'required');

        if ($valid->run() == false) {
            $data['errors'] = $this->session->set_flashdata('flash', 'Data gagal ditambahkan');
            redirect(base_url('quests'));
        } else {
            $this->M_Quests->addQuest();
        }
    }

    function edit()
    {
        $eqid = $this->input->post('eq_id');
        $eqfull = $this->input->post('eq_full', true);
        $eqtype = $this->input->post('eq_type', true);
        $eqcat = $this->input->post('eq_cat', true);

        $dataa = array(
            'quest_full' => $eqfull,
            'quest_type' => $eqtype,
            'quest_cat' => $eqcat
        );

        $this->M_Quests->editQ($eqid, $dataa);
    }
    function delete($qid)
    {
        $this->M_Quests->delQ($qid);
        $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        redirect(base_url('quests'));
    }
    function non($id)
    {
        $this->M_Quests->dump($id);
        $this->session->set_flashdata('flash', 'Data berhasil dinon-aktifkan');
        redirect(base_url('quests'));
    }
    function aktif($id)
    {
        $this->M_Quests->kembali($id);
        $this->session->set_flashdata('flash', 'Data berhasil diaktifkan');
        redirect(base_url('quests'));
    }
}

/* End of file Quests.php */
