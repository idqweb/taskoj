<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperarpass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Recuperarpass_model');
        
    }
    public function index() {

        $this->load->language('textosIdioma');
        $this->load->view('plantilla/cabeceraSinMapa');
        $this->load->view('plantilla/barra_navegacion');
        $this->load->view('plantilla/recuperarpass/cuerpo-recuperapass');
        $this->load->view('plantilla/pie');
    }
    public function recupera() {
        $datosRecuperarEmail = $this->input->post('email');
        $recuperacion = $this->Recuperarpass_model->inicioRecuperacion($datosRecuperarEmail);
        var_dump($recuperacion);
        if($recuperacion == "OK"){
            
            $this->load->view('plantilla/cabeceraSinMapa');
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/recuperarpass/recuperacionOk');
            $this->load->view('plantilla/pie');
        }else{
            
            $this->load->view('plantilla/cabeceraSinMapa');
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/recuperarpass/recuperacionFail');
            $this->load->view('plantilla/pie');
        }
        
    }
    public function cambiarpass() {
        $pass = $this->input->post('pass');
        $repass = $this->input->post('repass');
        $email = $this->input->post('email');
        
        if($pass === $repass){
            // le tengo que pasar el pass y el email para actualizar el password
            $datos['email']= $email;
            $datos['password'] = $pass;
            $this->Recuperarpass_model->cambiarpass($datos);
            
            $this->load->view('plantilla/cabeceraSinMapa');
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/recuperarpass/cambioPassOk');
            $this->load->view('plantilla/pie');
            
        }else{
            
        }
    }
    
    
}

/* 
 * The MIT License
 *
 * Copyright 2016 Isaac.
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

