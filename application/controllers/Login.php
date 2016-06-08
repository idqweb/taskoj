<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
    }

    public function index() {

        $this->load->view('plantilla/cabecera');
        $this->load->view('plantilla/barra_navegacion');
        $this->load->view('plantilla/pie');
    }

    public function logearse() {
        //creamos el mapa de contacto que cargara en la seccion
        $config['center'] = '42.561025, -6.600384';
        $config['zoom'] = 16;
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '42.561025, -6.600384';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();




        // si la validacion retorna algun error nos cargara la vista del 
        // formulario de nuevo
        if ($this->form_validation->run() === FALSE) {
            $data['emailEnviadoOK'] = FALSE;
            $this->load->view('plantilla/cabecera', $data);
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/secciones/seccionIntroduccion');
            $this->load->view('plantilla/secciones/seccionRegistro');
            $this->load->view('plantilla/secciones/seccionContacto', $data);
            $this->load->view('plantilla/pie');
        } else {
            $datosFormularioEmail = $this->input->post('email');
            $datosFormularioPassword = $this->input->post('pass');
            $dataDelFormulario = array(
                'email' => $datosFormularioEmail,
                'password' => $datosFormularioPassword,
            );
            $miLogin = $this->Login_model->logear($dataDelFormulario);




            if ($miLogin == FALSE) {

                $this->load->view('plantilla/cabecera', $data);
                $this->load->view('plantilla/barra_navegacion');
                $this->load->view('plantilla/secciones/seccionIntroduccion');
                $this->load->view('plantilla/secciones/seccionRegistro');
                $this->load->view('plantilla/secciones/seccionContacto', $data);
                $this->load->view('plantilla/pie');
            } else {
                foreach ($miLogin as $valor) {
                    $elpassword = $valor->password_usuario;
                    $nombre = $valor->nombre_usuario;
                    $apellidos = $valor->apellidos_usuario;
                    $tipoUsuario = $valor->tipo_usuario;
                    $email = $valor->email_usuario;
                    $foto = $valor->foto;
                }


                if (password_verify($datosFormularioPassword, $elpassword)) {

                    //Creo una session con los datos del usuario
                    $datos = array(
                        'logeado' => TRUE,
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'foto' => $foto,
                        'email' => $email,
                        'tipoUsuario' => $tipoUsuario
                    );
                    
                    $this->session->set_userdata($datos);
                    
                    redirect('Home');
                } else {
                    $data['emailEnviadoOK'] = FALSE;
                    $this->load->view('plantilla/cabecera', $data);
                    $this->load->view('plantilla/barra_navegacionErrorPass');
                    $this->load->view('plantilla/secciones/seccionIntroduccion');
                    $this->load->view('plantilla/secciones/seccionRegistro');
                    $this->load->view('plantilla/secciones/seccionContacto', $data);
                    $this->load->view('plantilla/pie');
                }
            }
        }
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

