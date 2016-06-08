<!DOCTYPE html>
<html lang="es">
    <h2>Registro para realizadores</h2>
    <?php
        
        echo form_open('registro/registra/realizador');
        echo form_label('Nombre', 'nombre');
        echo form_input('nombreRealizador');echo form_error('nombreRealizador');echo '<br/>';
        echo form_label('Apellidos', 'apellidos');
        echo form_input('apellidosRealizador');echo form_error('apellidosRealizador');echo '<br/>';
        echo form_label('Email', 'email');
        echo form_input('emailRealizador');echo form_error('emailRealizador');echo '<br/>';
        echo form_label('Contraseña', 'password');
        echo form_password('passRealizador');echo form_error('passRealizador');echo '<br/>';   
        echo form_submit('botonSubmit', 'Enviar');
        echo form_close();
    ?>
    <h2>Registro para creadores</h2>
    <?php
        
        echo form_open('registro/registra/creador');
        echo form_label('Nombre', 'nombre');
        echo form_input('nombre');echo form_error('nombre');echo '<br/>';
        echo form_label('Apellidos', 'apellidos');
        echo form_input('apellidos');echo form_error('apellidos');echo '<br/>';
        echo form_label('Email', 'email');
        echo form_input('email');echo form_error('email');echo '<br/>';
        echo form_label('Contraseña', 'password');
        echo form_password('pass');echo form_error('pass');echo '<br/>'; 
        echo form_submit('botonSubmit', 'Enviar');
        echo form_close();
    ?>
 
</html>

