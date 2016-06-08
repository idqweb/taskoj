<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    // Recibo el email desde el contacto
    public function recibirEmail ($datosEnvioContacto){
        $para = 'isaac@idqweb.com';
        $correoDelUsuario = $datosEnvioContacto['email'];
        $nombreDelUsuario = $datosEnvioContacto['nombre'];
        $consulta = $datosEnvioContacto['comentarios'];
        $mensaje = '<html>
                            <head>
                              <title>Restablece tu contraseña</title>
                            </head>
                            <body>
                              <p>Usuario:'.$nombreDelUsuario.'</p>
                              <p>Su email:'.$correoDelUsuario.'</p>
                              <p>
                                '.$consulta.'
                              </p>
                            </body>
                           </html>';

            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $cabeceras .= 'From: Correo Automatico Taskoj <info@taskoj.com>' . "\r\n";
            // Se envia el correo al usuario
            mail($para, "Contacto desde Web Taskoj", $mensaje, $cabeceras);
        return TRUE;
    }
    
    
    // devuelve los taskoj en funcion a una de sus caracteristicas y su valor
    // ejemplo segun 'estado_tarea' y su valor 'En Cola'
    
    function listadoTaskojs($columna,$valor){
        $this->db->select();
        $this->db->where($columna, $valor);
        $consulta = $this->db->get('tarea');
        // si la consulta devuelve algun resultado
         if($consulta->num_rows() > 0 )
        {
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    //saber nombre de las ciudades que actualmente hay tareas
    function getCiudadesConTareas() {
        $this->db->distinct();
        $this->db->select('ciudad_id_ciudad');
        $this->db->from('direccion');
        $this->db->join('tarea', 'tarea.direccion_id_direccion = direccion.id_direccion');
        $subconsulta = $this->db->get_compiled_select();
        
//        $this->db->reset_query();//resetea el compiled-selected
        $this->db->select('nombre_ciudad');
        $this->db->from('ciudad');
        $this->db->where ("id_ciudad IN ($subconsulta)", NULL, FALSE);
        $this->db->order_by('nombre_ciudad', 'ASC'); 
        $consulta = $this->db->get();
         if($consulta->num_rows() > 0 )
        {
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    // dado el nombre de una ciudad devuelve las tareas 
        function getTareasSegunNombreCiudad($nombre_ciudad) {
        
        $this->db->select('id_ciudad');
        $this->db->from('ciudad');
        $this->db->where('nombre_ciudad',$nombre_ciudad);
        $subconsulta1 = $this->db->get_compiled_select();
        
       
        $this->db->select('id_direccion');
        $this->db->from('direccion');
        $this->db->where ("ciudad_id_ciudad IN ($subconsulta1)", NULL, FALSE);
        $subconsulta2=$this->db->get_compiled_select();
        
        
        $this->db->select();
        $this->db->from('tarea');
        $this->db->where ("direccion_id_direccion IN ($subconsulta2)", NULL, FALSE);
        $consulta = $this->db->get();
         if($consulta->num_rows() > 0 )
        {
            return $consulta->result();
        }else{
            return FALSE;
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

