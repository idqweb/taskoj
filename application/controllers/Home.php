<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
        $this->load->helper('security');
    }

    // Los textos de idioma estan autocargados

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
        
        $data['buscarCiudadesConTareas']=  $this->Home_model->getCiudadesConTareas();
        

        $this->load->view('plantilla/cabecera', $data);
        $this->load->view('plantilla/barra_navegacion');
        $this->load->view('plantilla/secciones/seccionIntroduccion');
        $this->load->view('plantilla/secciones/seccionTaskojs',$data);
        $this->load->view('plantilla/secciones/seccionRegistro');
        $this->load->view('plantilla/secciones/seccionContacto', $data);
        $this->load->view('plantilla/pie');
    }

    public function envioEmailContacto() {

        //creamos el mapa de contacto que cargara en la seccion
        $config['center'] = '42.561025, -6.600384';
        $config['zoom'] = 16;
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '42.561025, -6.600384';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();



        if ($this->form_validation->run() === FALSE) {
            $data['emailEnviadoOK'] = FALSE;
            $this->load->view('plantilla/cabecera', $data);
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/secciones/seccionContacto', $data);
            $this->load->view('plantilla/secciones/seccionIntroduccion');
            $this->load->view('plantilla/secciones/seccionTaskojs');
            $this->load->view('plantilla/secciones/seccionRegistro');
            $this->load->view('plantilla/pie');
        } else {

            $datosEnvioContacto = array(
                'nombre' => $this->security->xss_clean($this->input->post('nombreContacto')),
                'email' => $this->input->post('emailContacto'),
                'comentarios' => $this->security->xss_clean($this->input->post('comentarioContacto'))
            );

            $respuestaEmailEnviado = $this->Home_model->recibirEmail($datosEnvioContacto);

            if ($respuestaEmailEnviado) {
                $data['emailEnviadoOK'] = TRUE;
                $this->load->view('plantilla/cabecera', $data);
                $this->load->view('plantilla/barra_navegacion');
                $this->load->view('plantilla/secciones/seccionContacto', $data);
                $this->load->view('plantilla/secciones/seccionIntroduccion');
                $this->load->view('plantilla/secciones/seccionTaskojs');
                $this->load->view('plantilla/secciones/seccionRegistro');
                $this->load->view('plantilla/pie');
            }
        }
    }
    
    
    public function listaTaskojs($segunBusqueda) {
            
        if($segunBusqueda == "buscarPorciudad"){
            $nombre_ciudad= $this->input->post('ciudadesTaskoj');
            $data['ciudadSolicitada'] = $nombre_ciudad;
            $data['tareas']= $this->Home_model->getTareasSegunNombreCiudad($nombre_ciudad);
        }
        
        
        
        
            //creamos el mapa de contacto que cargara en la seccion
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
                $this->load->view('plantilla/secciones/seccionTaskojListado',$data);
                $this->load->view('plantilla/secciones/seccionContacto', $data);
                $this->load->view('plantilla/secciones/seccionIntroduccion');
                $this->load->view('plantilla/secciones/seccionRegistro');
                $this->load->view('plantilla/pie');
        
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