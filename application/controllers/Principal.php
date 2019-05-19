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

    public function index() {
        $data["nombre"]   = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');
        $data["titulo"]   = "Principal";
        $this->load->view('index', $data);
    }
}
