<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panelcreador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Panelcreador_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
        
    }

    // Los textos de idiomas son autocargados

    public function index() {

        if ($this->session->has_userdata('logeado')) {


            $this->load->view('plantilla/panel/cabeceraPanel');
            $this->load->view('plantilla/panel/creador/menuCreador');
            $this->load->view('plantilla/panel/creador/contenidoCreador');
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
        $this->load->view('plantilla/panel/creador/menuCreador');
        $this->load->view('plantilla/panel/creador/contenidoPerfilCreador');
        $this->load->view('plantilla/panel/piePanel');
    }

    //modifica perfilusuario
    public function modificaPerfil() {

        if ($this->form_validation->run() === FALSE) {
            // cargamos las vistas para mostrar los errores
            $this->load->view('plantilla/panel/cabeceraPanel');
            $this->load->view('plantilla/panel/creador/menuCreador');
            $this->load->view('plantilla/panel/creador/contenidoPerfilCreador');
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

            $modifica = $this->Panelcreador_model->modificaPerfil($data, $emailActual);

            // Si la modificacion CORRECTA actualiza variables de session y refresca
            if ($modifica === "OK") {
                $this->session->nombre = $nombre;
                $this->session->apellidos = $apellidos;
                $this->session->email = $email;
                redirect('panelcreador/perfilUsuario');
            }
        }
    }

    public function cambiaPass() {
        $pass = $this->input->post('pass');
        $repass = $this->input->post('repass');

        if ($pass === $repass) {
            //cargo la libreria de funciones para poder encriptar
            $this->load->helper('misfunciones');
            $password = encriptar($pass, '7');
            $email = $this->session->userdata('email');
            $cambia = $this->Panelcreador_model->cambiaPassword($password, $email);
        }

        if ($cambia === "OK") {

            // hay que pasarle aqui a la vista el aviso de que el pass se cambio
            redirect('panelcreador/perfilUsuario');
        }
    }

    public function cambiaFoto() {
        $archivoSubir = 'fotoUsuarioPerfil';
        $config['upload_path'] = './assets/img/fotos_perfil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 350; // tamaño en kb
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);



        if (!$this->upload->do_upload($archivoSubir)) {

            echo $this->upload->display_errors();
        } else {
            $ficheroSubido = $this->upload->data();
            //crearla ruta 
            $rutaFichero = "assets/img/fotos_perfil/" . $ficheroSubido['file_name'];
            $email = $this->session->userdata('email');
            //actualizar en la session
            $this->session->foto = $rutaFichero;
            //actualizar en la db
            $this->Panelcreador_model->actualizarRutaImagenUser($rutaFichero, $email);
            //recarga la pagina
            redirect('panelcreador');
        }
    }

    public function creaTaskoj() {
        // cargo las librerias necesarias
        $this->load->library('googlemaps');
        $this->load->library('GoogleGeocoder');

        $direccion = $this->input->post('direccion');
        $config = array();


        if ($direccion === NULL || $direccion === '') {
            $config['center'] = 'auto';
        } else {
            $coordenadasCompleta = $this->googlegeocoder->geocode($direccion);
            //guardar en sessiones las coordenadas cuando se introduce la 
            //direccion como texto paso1
            $this->session->latitud = $coordenadasCompleta->lat;
            $this->session->longitud = $coordenadasCompleta->lng;

            $direccion = $coordenadasCompleta->lat . "," . $coordenadasCompleta->lng;

            // las coordenadas de la direccion insertada
            $config['center'] = $direccion;
        }

        //regulas el nivel del zoom 12 es doble zoom que 6
        $config['zoom'] = '14';
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        // pasamos datos de configuracion al mapa
        $this->googlemaps->initialize($config);
        // creo una marca con la que se puede ajustar la posicion longitud y 
        // latitud que pasare por hidden
        $marker = array();
        $marker['position'] = $direccion;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'actualizaInput(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);


        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('plantilla/panel/cabeceraPanelMapa', $data);
        $this->load->view('plantilla/panel/creador/menuCreador');
        $this->load->view('plantilla/panel/creador/creaTaskoj/creaTaskojPasoPrimero', $data);
        $this->load->view('plantilla/panel/piePanel');
    }

    
    // Para insertar los datos que caracterizan al taskoj
    public function creaTaskojFinal($rellenar = NULL) {
        $this->load->library('GoogleGeocoder');
        
        if ($rellenar == "inicioformulario") {
            $this->load->view('plantilla/panel/cabeceraPanel');
            $this->load->view('plantilla/panel/creador/menuCreador');
            $this->load->view('plantilla/panel/creador/creaTaskoj/creaTaskojPasoFinal');
            $this->load->view('plantilla/panel/piePanel');
        } else {

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('plantilla/panel/cabeceraPanel');
                $this->load->view('plantilla/panel/creador/menuCreador');
                $this->load->view('plantilla/panel/creador/creaTaskoj/creaTaskojPasoFinal');
                $this->load->view('plantilla/panel/piePanel');
            } else {
                //Si pasa la validacion
                //Compruebo que el usuario acepto los terminos
                // paso a insertar todos los datos en la DB
                if ($this->input->post('aceptas') == "aceptascrear") {
                    // Datos del formulario
                    $latitud = $this->session->latitud;
                    $longitud = $this->session->longitud;
                    $nombreDelTaskoj = $this->input->post('nombreTaskoj');
                    $descripcionTaskoj = $this->input->post('descripcionTaskoj');
                    $frecuenciaTaskoj = $this->input->post('frecuencia');
                    $categoriaTaskoj = $this->input->post('categoria');
                    $precioTaskoj = $this->input->post('precioTaskoj');
                    // --- Fin Datos Formulario

                    $location = $latitud . "," . $longitud;

                    $direccionCompleta = $this->googlegeocoder->reverseGeocode($location);

                    // Recuperar datos de las coordenadas en funcion al JSON de Maps
                    $todosLosDatosDeMaps = $this->googlegeocoder->geocodeCompleto($direccionCompleta);

                    $nombre_ciudad = $todosLosDatosDeMaps['nombre_ciudad'];
                    $codigo_pais = $todosLosDatosDeMaps['codigo_pais'];
                    $codigo_postal = $todosLosDatosDeMaps['codigo_postal'];
                    $nombre_direccion = $todosLosDatosDeMaps['nombre_calle'] . "," . $todosLosDatosDeMaps['numero_calle'];

                    // Insertamos todos los datos de direccion y nis devuelve el id insertado
                    $idDireccionTaskoj = $this->Panelcreador_model->insertaDireccionGoogle($nombre_ciudad, $codigo_pais, $codigo_postal, $nombre_direccion, $latitud, $longitud);

                    $idUsuarioCreador = $this->Panelcreador_model->getIdUsuario($this->session->userdata('email'));
                    $idCategoria = $this->Panelcreador_model->getIdCategoria($categoriaTaskoj);
                    //Fecha de creacion del Taskoj
                    $fechaTaskoj = date('Y-m-d H:i:s');
                    $estadoTaskoj = "En Cola";
                    // Registra la tarea en la DB y nos devuelve el numero de filas modificadas
                    $resgistraElTaskoj = $this->Panelcreador_model->setTaskoj($idUsuarioCreador, $idDireccionTaskoj, $idCategoria, $nombreDelTaskoj, $descripcionTaskoj, $fechaTaskoj, $frecuenciaTaskoj, $estadoTaskoj, $precioTaskoj);
                    // si se realiza la insercion se verá afectada alguna fila
                    if ($resgistraElTaskoj) {
                        redirect('panelcreador/listaTaskojs');
                        
                       
                    }else{
                        redirect('panelcreador/taskojCreadoMal');
                    }
                }
            }
        }
    }
    // para sacar que fur creado correctamente el taskoj
    public function taskojCreado() {
        $this->load->view('plantilla/panel/cabeceraPanel');
        $this->load->view('plantilla/panel/creador/menuCreador');
        $this->load->view('plantilla/panel/creador/creaTaskoj/creaTaskojCreado');
        $this->load->view('plantilla/panel/piePanel');
    }
    
    // funcion que lista los taskojs
    public function listaTaskojs() {
        
        $columna = 'usuario_id_usuario_creador';
        // necesitamos el id del usuario
        $valor = $this->Panelcreador_model->getIdUsuario($this->session->userdata('email'));
        $data['listadoTaskojs'] = $this->Panelcreador_model->listadoTaskojs($columna,$valor);
        
        
        
        $this->load->view('plantilla/panel/cabeceraPanel');
        $this->load->view('plantilla/panel/creador/menuCreador');
        $this->load->view('plantilla/panel/creador/listaTaskoj/listadoDeMisTaskojs',$data);
        $this->load->view('plantilla/panel/piePanel');
    }
    // eliminar Taskoj segun su id
    function eliminarTaskoj($id_tarea,$id_direccion){
        $this->Panelcreador_model->eliminarTaskoj($id_tarea,$id_direccion);
        redirect('panelcreador/listaTaskojs');
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