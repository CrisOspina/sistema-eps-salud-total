<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {

    function __construct() {
        parent:: __construct(); 

        $this->load->model("usuarios_model");

        if (!$this->session->userdata('pacienteid')) 
        {
            redirect('login');
        }
    }   

    public function index() {
        $data["nombre"]   = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');  
        $listar = $this->usuarios_model->listar();

        $data['listado']  = $listar;
        $data['titulo']   = "Listado de pacientes";

        $this->load->view('pacientes', $data);
    }

	public function listado() {
        $data = $this->usuarios_model->listar();
        $vector["listado"] = $data;
        $vector["titulo"]  = "Listado de pacientes";

		$this->load->view('pacientes', $vector);
    }
}
