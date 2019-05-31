<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformePacientes extends CI_Controller 
{
    function __construct() {

        parent:: __construct();

        //Cargar libreria de grocery_crud
        $this->load->library('grocery_CRUD');

        $this->load->model('usuarios_model');

        //instanciar la libreria
        $this->crud = new grocery_CRUD();

        if (!$this->session->userdata('pacienteid')) {
            redirect('login');
        }
    }

    public function index() {

        $data["nombre"] = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');  

        $data["titulo"] = "Pacientes";
        $data["descripcion"] = "Pacientes";

        //Tema del crud.
        $this->crud->set_theme('flexigrid');

        //Cargar la tabla
        $this->crud->set_table('pacientes');

        //Definicion de campos.
        $this->crud->fields("pacienteid","medicoid","fechacita","hora","observaciones");

        //Campos requeridos
        $this->crud->required_fields("pacienteid","nombre","apellido","telefono","email","direccion","ciudad");

        //Redefinir un titulo a la tabla
        $this->crud->set_subject("Pacientes");

        $this->crud->display_as("pacienteid","Identificación");
        $this->crud->display_as("nombre","Nombre");
        $this->crud->display_as("apellido","Apellido");
        $this->crud->display_as("telefono","Telefono");
        $this->crud->display_as("email","Email");
        $this->crud->display_as("direccion","Direccion");
        $this->crud->display_as("ciudad","Ciudad");

        $this->crud->unset_add();
        $this->crud->unset_edit();
        $this->crud->unset_read();
        $this->crud->unset_clone();
        $this->crud->unset_delete();
        $this->crud->unset_back_to_list(); //quitar botones adicionales

        $this->crud->columns("pacienteid","nombre","apellido","telefono","email","direccion","ciudad");
        
        //Aplicar el render, que es ejecutar estas variables y esperar los tres componentes para cargar en la vista.
        $tabla = $this->crud->render();
        
        //Los tres componentes se llaman output, js_files y css_files
        $data["contenido"] = $tabla->output;
        $data["js_files"]  = $tabla->js_files;
        $data["css_files"] = $tabla->css_files;

        $respPacientes = $this->usuarios_model->totalPacientes();
        $data["total_pacientes"] = $respPacientes;

        $respMedicos = $this->usuarios_model->totalMedicos();
        $data["total_medicos"] = $respMedicos;

        $this->load->view('crud', $data);
    }
}

