<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperarpass_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('misfunciones');
    }

    // recibe el email y si este existe en nuestra DB genera un token y envia
    // un email con el token generado.
    public function inicioRecuperacion($data) {

        //primero comprobar si el e-mail ya existe en la db
        $this->db->select('email_usuario');
        $this->db->where('email_usuario', $data);
        $this->db->limit(1);
        $consulta = $this->db->get('usuario');
        if ($consulta->num_rows() > 0) {
            //creamos el token
            $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());
            $creadoToken = date('Y-m-d H:i:s');
            $datos = array(
                'token' => $token,
                'fecha_token' => $creadoToken
            );

            $this->db->where('email_usuario', $data);
            $this->db->update('usuario', $datos);

            $email = encriptar($data, 7);
            $idioma = $this->lang->lang();
            $link =  base_url().$idioma.'/restablecer/renueva?email=' . $email . '&token=' . $token;

            
            //email para ser enviado
         $mensaje = '<html>
                            <head>
                               <title>Restablece tu contraseña</title>
                            </head>
                            <body>
                              <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
                              <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
                              <p>
                                <strong>Enlace para restablecer tu contraseña</strong><br>
                                <a href="' . $link . '"> Restablecer contraseña </a>
                              </p>
                            </body>
                           </html>';

            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $cabeceras .= 'From: Webmaster Taskoj <isaac@idqweb.com>' . "\r\n";
            // Se envia el correo al usuario
            mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
            
            
            //a de ser return "OK"; Para pruebas y ver el link en localhost pongo $link

            return "OK";
        } else {
            return FALSE;
        }
    }
    public function cambiarpass($parametros) {
        
        $email = $parametros['email'];
        $password = $parametros['password'];
        $passwordEncriptado = encriptar($password,7);
        
        // tengo que borrar la fecha_token y token
        // y cambiar el password
            
            $datos = array(
                'fecha_token' => NULL,
                'token' => '',
                'password_usuario' => $passwordEncriptado
            );

            $this->db->where('email_usuario', $email);
            $this->db->update('usuario', $datos);
        
        
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

