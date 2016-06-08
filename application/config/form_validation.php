<?php
// reglas de validacion en archivo externo de configuracion
$config = array(
    //especifico que esta regla de validacion es para el controlador Home y el 
    //  método que utilice.
    // trim -> elimina espacios en blanco al comienzo y al final es nativo de php
    // strip_tags de php para eliminar las etiquetas html
    'login/logearse' => array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]|strip_tags'
            )
    ),
    'registro/registra/creador' => array(
            array(
                'field' => 'nombreCreador',
                'label' => 'Nombre',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'apellidosCreador',
                'label' => 'Apellidos',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'emailCreador',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'passCreador',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]'
            )
        ),
     'registro/registra/realizador' => array(
            array(
                'field' => 'nombreRealizador',
                'label' => 'Nombre',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'apellidosRealizador',
                'label' => 'Apellidos',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'emailRealizador',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'passRealizador',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]|strip_tags'
            )
        ),
    
    'panelcreador/creaTaskojFinal' => array(
            array(
                'field' => 'nombreTaskoj',
                'label' => 'Nombre Taskoj',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'descripcionTaskoj',
                'label' => 'Descripcion Taskoj',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'precioTaskoj',
                'label' => 'Precio maximo a pagar',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'aceptas',
                'label' => 'aceptascrear',
                'rules' => 'required'
            )
        ),
    'panelcreador/modificaPerfil' => array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ) 
    ),
    'panelcreador/cambiaPass' => array(
            array(
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]'
            )
    ),
    'panelrealizador/modificaPerfil' => array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'trim|required|strip_tags'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ) 
    ),
    'panelrealizador/cambiaPass' => array(
            array(
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]'
            )
    ),
    'home/envioEmailContacto' => array(
            array(
                'field' => 'nombreContacto',
                'label' => 'Nombre',
                'rules' => 'trim|required|strip_tags'
            ),            
            array(
                'field' => 'emailContacto',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'comentarioContacto',
                'label' => 'Comentario',
                'rules' => 'trim|required'
            ) 
    )
    
    
    
);
