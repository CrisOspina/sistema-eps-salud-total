<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller 
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

        $data["titulo"] = "Citas";
        $data["descripcion"] = "Citas médicas";

        //Tema del crud.
        $this->crud->set_theme('flexigrid');

        //Cargar la tabla
        $this->crud->set_table('citaspacientes');

        //Si queremes relacionar dos tablas y que podemos por medio de un select asociar un dato de una
        //de ellas usamos set_relation (campo de la tabla set table, la tabla asociar, que campo mostrar de la tabla asociar)
        $this->crud->set_relation("pacienteid","pacientes",'{nombre} {apellido}');
        $this->crud->set_relation("medicoid","medicos",'{nombre}');

        //Definicion de campos.
        $this->crud->fields("pacienteid","medicoid","fechacita","observaciones");

        //Campos requeridos
        $this->crud->required_fields("pacienteid","medicoid","fechacita");

        //Redefinir un titulo a la tabla
        $this->crud->set_subject("Citas");

        $this->crud->display_as("pacienteid","Paciente");
        $this->crud->display_as("medicoid","Médico");
        $this->crud->display_as("fechacita","Fecha de la cita");
        $this->crud->display_as("observaciones","Observaciones");
        $this->crud->display_as("fechamodificacion","Modificación");
        $this->crud->display_as("fecharegistro","Registro");

        $this->crud->columns("pacienteid","medicoid","fechacita","observaciones");

        //Validacion de fechas al ingresar citas.
        $this->crud->set_rules('fechacita','Fecha cita','callback_check_dates');
        
        //Aplicar el render, que es ejecutar estas variables y esperar los tres componentes para cargar en la vista.
        $tabla = $this->crud->render();
        
        //Los tres componentes se llaman output, js_files y css_files
        $data["contenido"] = $tabla->output;
        $data["js_files"]  = $tabla->js_files;
        $data["css_files"] = $tabla->css_files;

        $this->load->view('crud', $data);
    }
    
    function check_dates($fechacita) {

        $data = $this->usuarios_model->validar_citas();
            // if (sizeof($data) > 0) {
            //     $this->form_validation->set_message('acceso','No se puede asignar');
            // }

        if ($fechacita == $data)
        {
            $this->crud->set_message('check_dates', "No se puede asignar");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
        

        // if ($fechacita == $data) {
		// 	$this->form_validation->set_message('acceso','No se puede asignar');
		// 	return false;
        // }
		// else
		// {
		// 	return true;
		// }
    }
}

