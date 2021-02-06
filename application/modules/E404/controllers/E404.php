<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class E404 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
    }
    

    public function index()
    {

        $data['title'] = "Error | JOGO TONGGO";

        $this->load->view('E404', $data);
        
    }

}

/* End of file 404.php */

?>