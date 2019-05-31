<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller 
{
    function __construct() {

        parent:: __construct();

        $this->load->model("usuarios_model");

        if (!$this->session->userdata('pacienteid')) {
            redirect('login');
        }
    }

    public function index() {
        $data["nombre"]   = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');
        $data["titulo"]   = "Principal";

        $respPacientes = $this->usuarios_model->totalPacientes();
        $data["total_pacientes"] = $respPacientes;

        $respMedicos = $this->usuarios_model->totalMedicos();
        $data["total_medicos"] = $respMedicos;
        
        $this->load->view('index', $data);
    }
}
