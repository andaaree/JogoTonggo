<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->splogin->check();
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{	
		$data['title'] = "Dashboard | JOGO TONGGO";
		$data['flash'] = $this->session->userdata('flash');
		$data['catch'] = $this->session->userdata('catch');
		
        $data['username'] = $this->session->userdata('username');
		$this->load->view('../template/header', $data);
        $this->load->view('../template/topbar', $data);
        $this->load->view('../template/sidebar', $data);
        $this->load->view('index',$data);
        $this->load->view('../template/footer');
	}
}
?>