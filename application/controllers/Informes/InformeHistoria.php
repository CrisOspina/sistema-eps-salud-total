<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeHistoria extends CI_Controller 
{
    function __construct() {

        parent:: __construct();

        //Cargar libreria de grocery_crud
        $this->load->library('grocery_CRUD');

        //instanciar la libreria
        $this->crud = new grocery_CRUD();

        if (!$this->session->userdata('pacienteid')) {
            redirect('login');
        }
    }

    public function index() {

        $data["nombre"] = $this->session->userdata('nombre'); 
        $data["apellido"] = $this->session->userdata('apellido');  

        $data["titulo"] = "Historial";
        $data["descripcion"] = "Historial del paciente";

        //Tema del crud.
        $this->crud->set_theme('flexigrid');

        //Cargar la tabla
        $this->crud->set_table('historiapacientes');

        //Si queremes relacionar dos tablas y que podemos por medio de un select asociar un dato de una
        //de ellas usamos set_relation (campo de la tabla set table, la tabla asociar, que campo mostrar de la tabla asociar)
        $this->crud->set_relation("pacienteid","pacientes","nombre");
        $this->crud->set_relation("medicoid","medicos","nombre");
        $this->crud->set_relation("ciudad","pacientes","ciudad");

        //Definicion de campos.
        $this->crud->fields("pacienteid","medicoid","ciudad","estatura","peso","profesion","motivoconsulta","antecedentes","diagnostico","tratamiento","fechaingreso");

        //Campos requeridos
        $this->crud->required_fields("pacienteid","medicoid","fechacita");

        //Redefinir un titulo a la tabla
        $this->crud->set_subject("Historia");

        $this->crud->display_as("pacienteid","Paciente");
        $this->crud->display_as("medicoid","Médico");
        $this->crud->display_as("ciudad","Lugar de nacimiento");
        $this->crud->display_as("estatura","Estatura");
        $this->crud->display_as("peso","Peso");
        $this->crud->display_as("profesion","Profesión");
        $this->crud->display_as("motivoconsulta","Motivo consulta");
        $this->crud->display_as("antecedentes","Antecedentes");
        $this->crud->display_as("diagnostico","Diagnostico");
        $this->crud->display_as("tratamiento","Tratamiento");
        $this->crud->display_as("fechaingreso","fechaingreso");
        $this->crud->display_as("fechamodificacion","Modificación");
        $this->crud->display_as("fecharegistro","Registro");

        $this->crud->unset_add();
        $this->crud->unset_edit();
        $this->crud->unset_read();
        $this->crud->unset_clone();
        $this->crud->unset_delete();

        $this->crud->columns("pacienteid","medicoid","ciudad","estatura","peso","profesion","motivoconsulta","antecedentes","diagnostico","tratamiento","fechaingreso");
        
        //Aplicar el render, que es ejecutar estas variables y esperar los tres componentes para cargar en la vista.
        $tabla = $this->crud->render();
        
        //Los tres componentes se llaman output, js_files y css_files
        $data["contenido"] = $tabla->output;
        $data["js_files"]  = $tabla->js_files;
        $data["css_files"] = $tabla->css_files;

        $this->load->view('crud', $data);
    }
}

