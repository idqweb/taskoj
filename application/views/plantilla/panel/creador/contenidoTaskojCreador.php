<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1>Crea un taskoj</h1>
                <?php
                
                echo form_fieldset('Donde Taskoj');
                echo form_open('panelcreador/creaTaskoj');
                echo "Paso 1";
                 echo '<br/>';
                echo form_label('Direccion', 'direccion');
                ?>
                <input type="text" id="myPlaceTextBox" name="direccion" size='80' />
                
                
                <?php
                    echo form_submit('botonSubmit', 'Ir');
                     echo form_close();
                    echo form_fieldset_close();
                ?>
                
                <h6>Ejemplo: Av de Concha Espina, 1,28036 Madrid</h6>
                                
                <?php echo $map['html']; ?>
                <?php
                
                
                echo form_open('panelcreador/creaTaskojFinal');
                echo "Paso 2";
               
                ?>
                                
                <h5>Mueve la marca sobre el mapa para fijar exactamente el jugar
                    de tu taskoj</h5>
                
                <label>Latitud</label>
                <input type="text" id="latitud" name="latitud" value="<?=$this->session->latitud?>"/>
                <label>Longitud</label>
                <input type="text" id="longitud" name="longitud" value="<?=$this->session->longitud?>"/>
                <?php
//                echo form_submit('botonSubmit', 'Fijar');
//                echo form_close();
//                

                echo form_fieldset('Caracteristicas Taskoj');
//                echo form_open('panelcreador/creaTaskoj');
                echo form_label('Nombre Taskoj', 'nombreTaskoj');
                echo form_input('nombreTaskoj');echo form_error('nombreTaskoj');
                 echo '<br/>';
                echo form_label('Descripcion Taskoj', 'descripcionTaskoj');
                $textarea = Array ("name" => "descripcionTaskoj", "cols" => "10");
                echo form_textarea($textarea);echo form_error('descripcionTaskoj');
                $opciones = array(
                  'puntual'  => 'Puntual',
                  'diaria'    => 'Diaria',
                  'semanal'   => 'Semanal',
                  'mensual' => 'Mensual'
                );
                echo form_label('Frecuencia del Taskoj', 'frecuenciataskoj');
                echo form_dropdown('frecuencia', $opciones, 'puntual');
                echo '<br/>';
                /* aqui igual es mejor con Ajax sacar las opciones de la DB */
                $categorias = array(
                  'compras'  => 'Compras',
                  'envio'    => 'Envio Paquetes',
                  'clases'   => 'Clases Particulares',
                );
                echo form_label('Categoría de tu Taskoj', 'categoriataskoj');
                echo form_dropdown('categoria', $categorias, 'compras');
                echo '<br/>';
                
                
                echo form_label('Precio maximo a pagar', 'precioTaskoj');
                echo form_input('precioTaskoj');echo form_error('precioTaskoj');
                
                 echo '<br/>';
                 echo form_checkbox('aceptas', 'aceptascrear', FALSE);echo form_error('aceptas');
                 echo "Aceptas crear este taskoj.";
                 echo '<br/>';
                echo form_submit('botonSubmit', 'Crear Taskoj');
                echo form_close();
                echo form_fieldset_close();
                
                
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

