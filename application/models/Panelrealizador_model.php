<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panelrealizador_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
    }
    
    // Registra a un usuario en la Base de datos
    public function darAltaUsuario ($data){
        //primero comprobar si el e-mail ya existe en la db
        $this->db->select('email_usuario');
        $this->db->where ('email_usuario',$data['email_usuario']);
        $this->db->limit(1);
        $consulta = $this->db->get('usuario');
        if ($consulta->num_rows()>0){
            return FALSE;
        }else{
            $this->db->insert('usuario', $data);
            $data['logeado']=TRUE;
            $this->session->set_userdata($data);
        }
         
    }
     // Modifica datos del usuario
    public function modificaPerfil($data, $email) {

        $this->db->where('email_usuario', $email);
        $this->db->update('usuario', $data);

        return "OK";
    }
    
     // Modifica clave de usuario
    public function cambiaPassword($password, $email) {
        $data = array('password_usuario' => $password);
        $this->db->where('email_usuario', $email);
        $this->db->update('usuario', $data);

        return "OK";
    }

    
    
    // Actualiza la imagen de perfil
    public function actualizarRutaImagenUser($rutaFichero,$email) {
        $dato = array('foto' => $rutaFichero);
        // actualiza en la DB la ruta de la foto
            $this->db->where('email_usuario', $email);
            $this->db->update('usuario', $dato);
    }
    
    // obtener el ID del usuario en funcion a su email
    function getIdUsuario($email) {
        $this->db->select('id_usuario');
        $this->db->where('email_usuario', $email);
        $this->db->limit(1);
        $consulta = $this->db->get('usuario');
        if ($consulta->num_rows() > 0) {
            $resultadoConsulta = $consulta->result();
            foreach ($resultadoConsulta as $campoDeLaTabla) {
                $salida = $campoDeLaTabla->id_usuario;
            }
        } else {
            $salida = FALSE;
        }
        return $salida;       
        
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

