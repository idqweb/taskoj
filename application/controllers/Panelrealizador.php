<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panelrealizador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Panelrealizador_model');
        $this->load->library('form_validation');
        $this->load->helper('security');

    }

    public function index() {

        if ($this->session->has_userdata('logeado')) {

           
            $this->load->view('plantilla/panel/cabeceraPanel');
            $this->load->view('plantilla/panel/realizador/menuRealizador');
            $this->load->view('plantilla/panel/realizador/contenidoRealizador');
            $this->load->view('plantilla/panel/piePanel');
        } else {
         
            $this->load->view('plantilla/cabecera');
            $this->load->view('plantilla/cuerpo');
            $this->load->view('plantilla/pie');
        }
    }

    // editar perfil usuario
    public function perfilUsuario() {

       
        $this->load->view('plantilla/panel/cabeceraPanel');
        $this->load->view('plantilla/panel/realizador/menuRealizador');
        $this->load->view('plantilla/panel/realizador/contenidoPerfilRealizador');
        $this->load->view('plantilla/panel/piePanel');
    }
    
      //modifica perfilusuario
    public function modificaPerfil() {

        if ($this->form_validation->run() === FALSE) {
            // cargamos las vistas para mostrar los errores
            $this->load->view('plantilla/panel/cabeceraPanel');
            $this->load->view('plantilla/panel/realizador/menuRealizador');
            $this->load->view('plantilla/panel/realizador/contenidoPerfilRealizador');
            $this->load->view('plantilla/panel/piePanel');
        } else {
            $nombre = $this->security->xss_clean($this->input->post('nombre'));
            $apellidos = $this->security->xss_clean($this->input->post('apellidos'));
            $email = $this->input->post('email');

            $data = array(
                'nombre_usuario' => $nombre,
                'apellidos_usuario' => $apellidos,
                'email_usuario' => $email
            );

            $emailActual = $this->session->userdata('email');

            $modifica = $this->Panelrealizador_model->modificaPerfil($data, $emailActual);

            // Si la modificacion CORRECTA actualiza variables de session y refresca
            if ($modifica === "OK") {
                $this->session->nombre = $nombre;
                $this->session->apellidos = $apellidos;
                $this->session->email = $email;
                redirect('panelrealizador/perfilUsuario');
            }
        }
    }

    

    public function cambiaFoto() {
         $archivoSubir = 'fotoUsuarioPerfil';
        $config['upload_path'] = './assets/img/fotos_perfil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 400; // tamaño en kb
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        
        
        
        if(!$this->upload->do_upload($archivoSubir))
 
       {
 
           echo $this->upload->display_errors();
 
       }else{
           $ficheroSubido=$this->upload->data();
           //crearla ruta 
           $rutaFichero = "assets/img/fotos_perfil/".$ficheroSubido['file_name'];
           $email = $this->session->userdata('email');
           //actualizar en la session
           $this->session->foto = $rutaFichero;
           //actualizar en la db
           $this->Panelrealizador_model->actualizarRutaImagenUser($rutaFichero,$email);
           //recarga la pagina
           redirect('panelrealizador');
                    
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