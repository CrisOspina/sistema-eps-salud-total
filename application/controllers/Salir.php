<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Constrollador salir
class Salir extends CI_Controller {
    function __construct() {
        parent:: __construct();

        $this->load->model("usuarios_model");
    }

    public function index() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
