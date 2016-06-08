<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restablecer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Restablecer_model');
        
    }
    
    public function renueva() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $renovacion = $this->Restablecer_model->cambiarPass($token);
        
        if($renovacion == FALSE){
            
            $this->load->view('plantilla/cabeceraSinMapa');
            $this->load->view('plantilla/barra_navegacion');
            $this->load->view('plantilla/recuperarpass/tokenErroneo');
            $this->load->view('plantilla/pie');
        }else{
            foreach ($renovacion as $valor) {
                $elEmail = $valor->email_usuario;  
            }
            
            $this->load->language('textosIdioma');
            $this->load->view('plantilla/cabeceraSinMapa');
            $this->load->view('plantilla/barra_navegacion');
            if (password_verify($elEmail,$email)){
                //pasarle el email a la vista a de ser por array asociativo
                $dato['email']= $elEmail; 
                $this->load->view('plantilla/recuperarpass/formularioRecuperacion',$dato);
            }else{
                $this->load->view('plantilla/recuperarpass/emailErroneo');
            }
            
            $this->load->view('plantilla/pie');
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

