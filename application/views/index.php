<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Esta es mi primera pagina de CI</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Isaac Díez Quiroga">
    </head>
    <body>
        <h1>esta es una vista</h1>



        <?php echo $this->calendar->generate(); ?><br/>
        <p><?php echo lang('hola'); ?></p><br/>
        <?php echo lang('contacto'); ?>

        <?php
        echo anchor($this->lang->switch_uri('es'), 'Cambia el idioma a Español');
        echo "<br/>";
        echo anchor($this->lang->switch_uri('en'), 'Cambia el idioma a Inglés');
        echo "<br/>";
        echo anchor($uri = 'registro', $title = 'Vete al registro', $attributes = 'target=_blank');
        echo "<br/>";
        echo $this->lang->lang();
        ?>


    </body>
</html>

