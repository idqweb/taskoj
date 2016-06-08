<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panelcreador_model extends CI_Model {

    public function __construct() {
        parent::__construct();
             
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

    //Actualiza la foto de Perfil
    public function actualizarRutaImagenUser($rutaFichero, $email) {
        $dato = array('foto' => $rutaFichero);
        // actualiza en la DB la ruta de la foto
        $this->db->where('email_usuario', $email);
        $this->db->update('usuario', $dato);
    }

    /* Funciones para necesarias para insertar un Taskoj */

    // inserta una direccion devuelta en formato google
    public function insertaDireccionGoogle($nombre_ciudad,
                    $codigo_pais,$codigo_postal,$nombre_direccion,$latitud,$longitud) {
       
        $existeCiudadEnDB = $this->Panelcreador_model->existeCiudadEnDB($nombre_ciudad, $codigo_pais);

        if ( $existeCiudadEnDB === FALSE) {
           // insertamos la ciudad en su tabla y recojemos su ID
            $id_ciudad = $this->Panelcreador_model->nuevaCiudad($nombre_ciudad, $codigo_pais);
        } else {
            // NO tengo que insertarla pero guardo el ID de la ciudad
            $id_ciudad = $existeCiudadEnDB;
        }
        
           
        $direccionDelTaskojInsertada = $this->Panelcreador_model->insertarDireccionDeTaskoj($id_ciudad,
                $nombre_direccion,$latitud,$longitud,$codigo_postal);
        
        
        if ($direccionDelTaskojInsertada === FALSE){
            //hubo algun error en los datos proporcionados y no se pudo hacer la insercion
            $salida = FALSE;
            
        }else{
            // todo Ok devolvemos el ID direccion
            $salida = $direccionDelTaskojInsertada;
        }
        
        
        return $salida;
        
        
    }

    // devuelve codigo internacional dado Spain devuelve ES
    public function getClavePrimariaTablaPais($nombre_pais) {
        $this->db->select('codigo_pais');
        $this->db->where('nombre_pais', $nombre_pais);
        $this->db->limit(1);
        $consulta = $this->db->get('pais');
        if ($consulta->num_rows() > 0) {
            $resultadoConsulta = $consulta->result();
            foreach ($resultadoConsulta as $campoDeLaTabla) {
                $salida = $campoDeLaTabla->codigo_pais;
            }
        } else {
            $salida = FALSE;
        }
        return $salida;
    }

    // comprueba si YA existe en la DB la ciudad devuelve su ID
    public function existeCiudadEnDB($nombre_ciudad, $codigo_pais) {

        $this->db->select('id_ciudad');
        $this->db->where('pais_codigo_pais', $codigo_pais);
        $this->db->where('nombre_ciudad', $nombre_ciudad);
        $this->db->limit(1);
        $consulta = $this->db->get('ciudad');
        if ($consulta->num_rows() > 0) {
            $resultadoConsulta = $consulta->result();
            foreach ($resultadoConsulta as $campoDeLaTabla) {
                $salida = $campoDeLaTabla->id_ciudad;
            }
        } else {
            $salida = FALSE;
        }
        return $salida;
    }
    
    // inserto una nueva ciudad y devuelvo su ID
    public function nuevaCiudad($nombre_ciudad, $codigo_pais) {
        $datos = array(
            'pais_codigo_pais' => $codigo_pais,
            'nombre_ciudad' => $nombre_ciudad
        );
        $this->db->insert('ciudad', $datos);
       
            $salida = $this->db->insert_id();
           
        
      return $salida;  
    }
    
    // inserto una direccion completa del Taskoj y devuelvo el ID
    public function insertarDireccionDeTaskoj($idCiudad,$nombre_direccion,$latitud,$longitud,$postal_codigo_direccion){
        $datos = array(
            'ciudad_id_ciudad' => $idCiudad,
            'nombre_direccion1' => $nombre_direccion,
            'longitud_direccion' => $longitud,
            'latitud_direccion' => $latitud,
            'postal_codigo_direccion' => $postal_codigo_direccion
        );
        $this->db->insert('direccion', $datos);
        
            $salida = $this->db->insert_id();
           
       
      return $salida;  
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
    
    
    // obtener el ID de la categoria por su nombre
    function getIdCategoria($nombreCategoria) {
        $this->db->select('id_categoria');
        $this->db->where('nombre_categoria', $nombreCategoria);
        $this->db->limit(1);
        $consulta = $this->db->get('categoria');
        if ($consulta->num_rows() > 0) {
            $resultadoConsulta = $consulta->result();
            foreach ($resultadoConsulta as $campoDeLaTabla) {
                $salida = $campoDeLaTabla->id_categoria;
            }
        } else {
            $salida = FALSE;
        }
        return $salida;     
    }
    
    // registra un taskoj
    function setTaskoj($idUsuarioCreador,
              $idDireccionTaskoj,$idCategoria,$nombreDelTaskoj,$descripcionTaskoj,
              $fechaTaskoj,$frecuenciaTaskoj,$estadoTaskoj,$precioTaskoj) {
        $datos = array(
            'usuario_id_usuario_creador' => $idUsuarioCreador,
            'direccion_id_direccion' => $idDireccionTaskoj,
            'categoria_id_categoria' => $idCategoria,
            'nombre_tarea' => $nombreDelTaskoj,
            'descripcion_tarea' => $descripcionTaskoj,
            'fecha_creacion_tarea' => $fechaTaskoj,
            'frecuencia_tarea' => $frecuenciaTaskoj,
            'estado_tarea' => $estadoTaskoj,
            'precio_inicial_tarea' => $precioTaskoj
            
        );
          
         $this->db->insert('tarea', $datos);
        
      return $this->db->affected_rows() > 0;
        
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
    
    
    function eliminarTaskoj($id_tarea,$id_direccion){
        $this->db->delete('tarea', array('id_tarea' => $id_tarea));
        $this->db->delete('direccion', array('id_direccion' => $id_direccion));
        
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

