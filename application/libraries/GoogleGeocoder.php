<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GoogleGeocoder
{
    public function __construct()
    {
       
        $this->baseURL = "https://maps.google.com/maps/api/geocode/json?";
    }

    
    //Dada una direccion escrita que nos devuelvan unas coordenadas
    public function geocode($address){
        $direccionJSON = $this->baseURL."&address=".urlencode($address);
        $geocode=  file_get_contents($direccionJSON);
        $respuestaJSON = json_decode($geocode);
        
        return $respuestaJSON->results[0]->geometry->location;
    }
    
    //Dada una direccion escrita por el usuario devuelva array con todos los datos
    
    public function geocodeCompleto($address){
        $geodatos = array ();
        
        $direccionJSON = $this->baseURL."&address=".urlencode($address);
        $geocode=  file_get_contents($direccionJSON);
        $respuestaJSON = json_decode($geocode);
        
        $datosGeometricos = $respuestaJSON->results[0]->geometry;
        foreach ($datosGeometricos as $tipodato) {
            if($tipodato == "location"){
                $geodatos['latitud'] = $tipodato -> lat;
                $geodatos['longitud'] = $tipodato -> lng;
            }
        }
        
        
        // sacamos datos,ciudad,pais,CP
        $datosDireccionPoliticos = $respuestaJSON->results[0]->address_components;
        
        foreach ($datosDireccionPoliticos as $puntero => $tipodato) {
                        
            if($tipodato->types == [ "locality", "political" ]){
                $geodatos['nombre_ciudad'] = $tipodato -> short_name;
            }
            if($tipodato->types == [ "country", "political" ]){
                $geodatos['codigo_pais'] = $tipodato -> short_name;
            }
            if($tipodato->types == [ "street_number" ]){
                $geodatos['numero_calle'] = $tipodato -> short_name;
            }
            if($tipodato->types == [ "route" ]){
                $geodatos['nombre_calle'] = $tipodato -> short_name;
            }
            if($tipodato->types == [ "postal_code" ]){
                $geodatos['codigo_postal'] = $tipodato -> short_name;
            }
        }
        
        return $geodatos;
    }
    // Dadas unas coordenadas devuelvo la direccion completa
    public function reverseGeocode($location){
        $url = $this->baseURL."&latlng=".$location;
        $geocode=  file_get_contents($url);
        $output = json_decode($geocode);
        $direccionCompleta= $output->results[0]->formatted_address;
        return $direccionCompleta;
    }
    
    
    
    
    
    
}

