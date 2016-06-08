<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Registro_model');
        $this->load->helper('misfunciones');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
        $this->load->helper('security');

    }

    public function index() {

        //creamos el mapa de contacto que cargara en la seccion Contacto
        $config['center'] = '42.561025, -6.600384';
        $config['zoom'] = 16;
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '42.561025, -6.600384';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $data['emailEnviadoOK'] = FALSE;



        $this->load->view('plantilla/cabecera', $data);
        $this->load->view('plantilla/barra_navegacion');
        $this->load->view('plantilla/secciones/seccionRegistro');
        $this->load->view('plantilla/secciones/seccionIntroduccion');
        $this->load->view('plantilla/secciones/seccionContacto', $data);
        $this->load->view('plantilla/pie');
    }

    public function registra($tipoUsuario) {

        if ($this->form_validation->run() === FALSE) {
            //creamos el mapa de contacto que cargara en la seccion Contacto
            $config['center'] = '42.561025, -6.600384';
            $config['zoom'] = 16;
            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = '42.561025, -6.600384';
            $this->googlemaps->add_marker($marker);
            $data['map'] = $this->googlemaps->create_map();
            $data['emailEnviadoOK'] = FALSE;

            $this->load->view('plantilla/cabecera', $data);
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/secciones/seccionRegistro');
            $this->load->view('plantilla/secciones/seccionIntroduccion');
            $this->load->view('plantilla/secciones/seccionContacto', $data);
            $this->load->view('plantilla/pie');
            
        } else {

            // si el que se registra es un creador
            if ($tipoUsuario == "creador") {
                $datosUsuarioNombre = $this->security->xss_clean($this->input->post('nombreCreador'));
                $datosusuarioApellidos = $this->security->xss_clean($this->input->post('apellidosCreador'));
                $datosUsuarioEmail = $this->input->post('emailCreador');
                $datosUsuarioPassword = encriptar($this->input->post('passCreador'), '7');
            }
            // si el que se registra es un realizador
            if ($tipoUsuario == "realizador") {
                $datosUsuarioNombre = $this->security->xss_clean($this->input->post('nombreRealizador'));
                $datosusuarioApellidos = $this->security->xss_clean($this->input->post('apellidosRealizador'));
                $datosUsuarioEmail = $this->input->post('emailRealizador');
                $datosUsuarioPassword = encriptar($this->input->post('passRealizador'), '7');
            }

            $data = array(
                'nombre_usuario' => $datosUsuarioNombre,
                'apellidos_usuario' => $datosusuarioApellidos,
                'email_usuario' => $datosUsuarioEmail,
                'password_usuario' => $datosUsuarioPassword,
                'tipo_usuario' => $tipoUsuario
            );

            $registro = $this->Registro_model->darAltaUsuario($data);
            if ($registro === FALSE) {
                //creo una variable de session que dura solo una carga de url
                $this->session->set_flashdata('emailExiste', $datosUsuarioEmail);
                redirect('registro/error');
            } else {
                //Creo una session con los datos del usuario
                $datos = array(
                    'logeado' => TRUE,
                    'nombre' => $datosUsuarioNombre,
                    'apellidos' => $datosusuarioApellidos,
                    'email' => $datosUsuarioEmail,
                    'foto' => 'assets/img/usuario-foto-perfil.png',
                    'tipoUsuario' => $tipoUsuario
                );

                $this->session->set_userdata($datos);
                // lo envio al panel que corresponda
                if ($tipoUsuario === "realizador") {
                    redirect('panelrealizador');
                }
                if ($tipoUsuario === "creador") {
                    redirect('panelcreador');
                }
            }
        }
    }

    public function error() {
        echo "hubo un error el usuario " . $this->session->flashdata('emailExiste') . " que intentas registrar ya existe";
    }

}

/* 
 * The MIT License
 *
 * Copyright 2016 isaac.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */