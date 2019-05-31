<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function __construct() {
        parent:: __construct(); 

        $this->load->model("usuarios_model");

    }   

    public function nuevo() {
        
        //si post es mayor a 0, hay datos para la inserción.
        if (count($this->input->post())>0) {
            
            $resp = $this->usuarios_model->ingresar();
           
            $data["mensaje"] = $resp;

        }

        $this->load->view('login', $data);
    }
}
