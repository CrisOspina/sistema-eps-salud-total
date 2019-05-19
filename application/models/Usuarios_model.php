<?php
    class Usuarios_model extends CI_model {

        function __construct() {
            //Invocar el helper security
            $this->load->helper('security');
        }

    /*****/

        //Valida los campos con los resultados de la bd.
        function validar_acceso() {

            $pacienteid = $this->input->post('pacienteid');
            $clave      = $this->input->post('clave');
            
            //Aplicar politicas de control y limpieza de código malicioso que nos envian en un formulario.
            $pacienteid = $this->security->xss_clean($pacienteid);
            $clave      = $this->security->xss_clean($clave);

            //Los nombres de las variables deben coincidir con los nombres de los campos.
            $vector = array("pacienteid" => $pacienteid, "clave" => md5($clave));
            
            //Buscar el la tabla pacientes, lo que devuelve del array.
            $query = $this->db->get_where("pacientes", $vector);

            return $query->result_array();
        }

    /*****/

        //Ingresa los datos a la bd de las personas registradas.
        function ingresar() {
            $pacienteid = $this->input->post('pacienteid');
            $clave      = $this->input->post('clave');
            $nombre     = $this->input->post('nombre');
            $apellido   = $this->input->post('apellido');
            $telefono   = $this->input->post('telefono');
            $email      = $this->input->post('email');
            $direccion  = $this->input->post('direccion');
            $ciudad     = $this->input->post('ciudad');

            $pacienteid = $this->security->xss_clean($pacienteid);
            $clave      = $this->security->xss_clean($clave);
            $nombre     = $this->security->xss_clean($nombre);
            $apellido   = $this->security->xss_clean($apellido);
            $telefono   = $this->security->xss_clean($telefono);
            $email      = $this->security->xss_clean($email);
            $direccion  = $this->security->xss_clean($direccion);
            $ciudad     = $this->security->xss_clean($ciudad);

            //Validar si un usuario ya existe en la bd.
            $query     = $this->db->get_where('pacientes', array('pacienteid' => $pacienteid));
            $resultado = $query->result_array();

            //Validar si trae datos.
            if (count($resultado) > 0) {
                $resp = "Este registro ya se encuentra. Por favor verifica nuevamente";
            } else {
                //Pasar los datos en un array para poder insertar.
                $vector = Array(
                    "pacienteid" => $pacienteid,
                    "clave"      => md5($clave),
                    "nombre"     => $nombre,
                    "apellido"   => $apellido,
                    "telefono"   => $telefono,
                    "email"      => $email,
                    "direccion"  => $direccion,
                    "ciudad"     => $ciudad
                );

                $this->db->insert("pacientes", $vector);
                $resp = "Registro insertado con exito";
            }
            return $resp;
        }
    }
?>