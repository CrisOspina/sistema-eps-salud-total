<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeFormulas extends CI_Controller 
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

        $data["titulo"] = "Formula";
        $data["descripcion"] = "Formula de medicamentos";

        //Tema del crud.
        $this->crud->set_theme('flexigrid');

        //Cargar la tabla
        $this->crud->set_table('medicamentos');

        //Si queremes relacionar dos tablas y que podemos por medio de un select asociar un dato de una
        //de ellas usamos set_relation (campo de la tabla set table, la tabla asociar, que campo mostrar de la tabla asociar)
        $this->crud->set_relation("pacienteid","citaspacientes","pacienteid");
        $this->crud->set_relation("medicoid","citaspacientes","medicoid");
        $this->crud->set_relation("fechacita","citaspacientes","fechacita");

        //Definicion de campos.
        $this->crud->fields("pacienteid","medicoid","fechacita","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3","observaciones");

        //Campos requeridos
        $this->crud->required_fields("pacienteid","medicoid","fechacita");

        //Redefinir un titulo a la tabla
        $this->crud->set_subject("Medicamentos");

        $this->crud->display_as("pacienteid","Paciente");
        $this->crud->display_as("medicoid","Médico");
        $this->crud->display_as("fechacita","Fecha de la formula");
        $this->crud->display_as("referencia1","Referencia uno");
        $this->crud->display_as("cantidad1","Cantidad");
        $this->crud->display_as("referencia2","Referencia dos");
        $this->crud->display_as("cantidad2","Cantidad");
        $this->crud->display_as("referencia3","Referencia tres");
        $this->crud->display_as("cantidad3","Cantidad");
        $this->crud->display_as("observaciones","Observaciones");

        
        $this->crud->unset_add();
        $this->crud->unset_edit();
        $this->crud->unset_read();
        $this->crud->unset_clone();
        $this->crud->unset_delete();

        $this->crud->columns("pacienteid","medicoid","fechacita","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3","observaciones");
        
        //Aplicar el render, que es ejecutar estas variables y esperar los tres componentes para cargar en la vista.
        $tabla = $this->crud->render();
        
        //Los tres componentes se llaman output, js_files y css_files
        $data["contenido"] = $tabla->output;
        $data["js_files"]  = $tabla->js_files;
        $data["css_files"] = $tabla->css_files;

        $this->load->view('crud', $data);
    }
}

