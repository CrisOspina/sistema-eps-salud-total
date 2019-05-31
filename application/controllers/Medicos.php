<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos extends CI_Controller 
{
    function __construct() {
        parent:: __construct();

        //Cargar libreria de grocery_crud
        $this->load->library('grocery_CRUD');

        $this->load->model("usuarios_model");

        //instanciar la libreria
        $this->crud = new grocery_CRUD();

        if (!$this->session->userdata('pacienteid')) {
            redirect('login');
        }
    }

    public function index() {
        $data["nombre"] = $this->session->userdata('nombre'); 
        $data["titulo"] = "Medicos";
        $data["descripcion"] = "Listado de medicos en el sistema";

        //Tema del crud.
        $this->crud->set_theme('flexigrid');

        //Cargar la tabla
        $this->crud->set_table('medicos');

        //Si queremes relacionar dos tablas y que podemos por medio de un select asociar un dato de una
        //de ellas usamos set_relation (campo de la tabla set table, la tabla asociar, que campo mostrar de la tabla asociar)
        //$this->crud->set_relation("pacienteid","citaspacientes","pacienteid");

        //Definicion de campos.
        $this->crud->fields("medicoid","nombre","apellido","telefono","email","direccion","ciudad");

        //Campos requeridos
        //$this->crud->required_fields("pacienteid","clave","nombre","telefono","email");

        //Redefinir un titulo a la tabla
        $this->crud->set_subject("profesionales de la salud");

        $this->crud->display_as("medicoid","Identificación");
        $this->crud->display_as("nombre","Nombre");
        $this->crud->display_as("apellido","Apellido");
        $this->crud->display_as("telefono","Telefono");
        $this->crud->display_as("direccion","Dirección");
        $this->crud->display_as("email","Correo");
        $this->crud->display_as("ciudad","Ciudad");
        $this->crud->display_as("fechamodificacion","Modificación");
        $this->crud->display_as("fecharegistro","Registro");

        //$this->crud->columns("pacienteid","clave","nombre","apellido","telefono","email", "direccion","ciudad");

        $data["nombre"] = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');  

        //Aplicar el render, que es ejecutar estas variables y esperar los tres componentes para cargar en la vista.
        $tabla = $this->crud->render();

        //Los tres componentes se llaman output, js_files y css_files
        $data["contenido"] = $tabla->output;
        $data["js_files"]  = $tabla->js_files;
        $data["css_files"] = $tabla->css_files;

        $resp = $this->usuarios_model->totalMedicos();
        $data["total_medicos"] = $resp;

        $resp = $this->usuarios_model->totalPacientes();
        $data["total_pacientes"] = $resp;

        $this->load->view('crud', $data);
    }
}

