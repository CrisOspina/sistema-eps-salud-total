<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent:: __construct();

        // invocar el modelo para el login.
        $this->load->model("usuarios_model");
    }

    public function index() {
        //Cargar vista.
        $data["tituloLogin"] = "Salud total";
        $this->load->view('login', $data);
    }

    //Permite validar con el modelo si el usuario existe.
    function acceso() {

        $data = $this->usuarios_model->validar_acceso();
        
        if (sizeof($data) > 0) {
            //Cargar datos
            $data_session = array(
                                 "pacienteid"    => $data[0]["pacienteid"],
                                 "nombre"        => $data[0]["nombre"],
                                 "apellido"      => $data[0]["apellido"],
                                 "telefono"      => $data[0]["telefono"],
                                 "email"         => $data[0]["email"],
                                 "direccion"     => $data[0]["direccion"],
                                 "ciudad"        => $data[0]["ciudad"]
            );

            $this->session->set_userdata($data_session);

            redirect('principal');
        } else {
            $data["validacion"] = "No existe tu registro, verifica nuevamente";
            $this->load->view('login', $data);
        }
    }
}
