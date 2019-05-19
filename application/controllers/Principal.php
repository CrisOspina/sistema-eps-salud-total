<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller 
{
    function __construct() {

        parent:: __construct();

        if (!$this->session->userdata('pacienteid')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data["nombreusuario"] = $this->session->userdata('nombre'); 
        $data["titulo"]        = "Principal";
        $this->load->view('principal', $data);
    }
}
