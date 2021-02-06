<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
    }
    // function mk_capt()
    // {
    //     $vals = array(
    //         'img_path' => 'captcha/',
    //         'img_url' => base_url().'captcha/',
    //         'font_path' => FCPATH . 'captcha/font/1.ttf',
    //         'font_size' => 40,
    //         'word_length' => 4,
    //         'img_width' => 160,
    //         'img_height' => 46,
    //         'expiration' => 7200
    //     );
    //     $cap = create_captcha($vals);
    //     return $cap;
    // }
    function index()
    {

        $valid = $this->form_validation;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('password', 'Password', 'required');
        $data['title'] = "Login | JOGO TONGGO";
        $data['username'] = $this->session->userdata('username');
        $data['flash'] = $this->session->flashdata('flash');
        $data['catch'] = $this->session->flashdata('catch');

        // $valid->set_rules('kode_captcha', 'Kode Captcha', 'required|callback_check_captcha');
        // $this->session->unset_userdata('kode_captcha');
        if ($valid->run() == FALSE) {
            // $data['erruser'] = $this->session->set_flashdata('<p> Anda belum mendaftar', '</p>');
            // $data['errcap'] = $this->session->set_flashdata('<p>Captcha tidak sesuai</p>');
            // $data['cap_img'] = $cap['image'];
            // $this->session->set_userdata('kode_captcha', $cap['word']);

        } else {
            $data['role'] = $this->session->userdata('role');
            // $this->session->unset_userdata('kode_captcha');
            $this->splogin->login($username, $password);
        }
        $this->load->view('login', $data);
    }

    function logout()
    {
        $this->splogin->logout();
    }
}

/* End of file Login.php */
