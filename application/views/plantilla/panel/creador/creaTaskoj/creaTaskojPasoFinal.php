<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1>Crea un taskoj- Finaliza
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                                <?=lang('oculta_menu')?></a>
                
                </h1>
                <?php
                echo form_fieldset(lang('caracteristicas_taskoj'));
               echo form_open('panelcreador/creaTaskojFinal');
               ?>
                
                <div class="form-group text-left">
                <?php
                echo form_label(lang('nombre_taskoj'), 'nombreTaskoj');
                $data_nombre_taskoj = array(
                        'type' => 'text',
                        'name' => 'nombreTaskoj',
                        'id' => 'nombreTaskoj',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_nombre_taskoj')
                    );
                echo form_input($data_nombre_taskoj);
                echo form_error('nombreTaskoj');
                ?>
                </div>
                <div class="form-group text-left">
                    <?php
                
                echo form_label(lang('descripcion_taskoj'), 'descripcionTaskoj');
                $textarea = Array ("name" => "descripcionTaskoj", "rows" => "3",
                    'class' => 'form-control');
                echo form_textarea($textarea);
                echo form_error('descripcionTaskoj');
                ?>
                </div>
                <div class="form-group text-left">
                <?php
                
                $opciones = array(
                  'puntual'  => 'Puntual',
                  'diaria'    => 'Diaria',
                  'semanal'   => 'Semanal',
                  'mensual' => 'Mensual'
                );
                echo form_label(lang('frecuencia_taskoj'), 'frecuenciataskoj');
                echo form_dropdown('frecuencia', $opciones, 'puntual');
                ?>
                </div>   
                 <div class="form-group text-left">   
               <?php
                /* aqui igual es mejor con Ajax sacar las opciones de la DB */
                $categorias = array(
                  'compras'  => 'Compras',
                  'envio'    => 'Envio',
                  'clases'   => 'Clases',
                );
                echo form_label(lang('categoria_taskoj'), 'categoriataskoj');
                echo form_dropdown('categoria', $categorias, 'compras');
                ?>
                 </div>
                <div class="form-group text-left">
                <?php                
                echo form_label(lang('precio_maximo_taskoj'), 'precioTaskoj');
                echo form_input('precioTaskoj');echo form_error('precioTaskoj');
                ?>
                </div>   
                  <div class="form-group text-left">   
                <?php
                 echo form_checkbox('aceptas', 'aceptascrear', FALSE);echo form_error('aceptas');
                 echo lang('estoy_deacuerdo_crear_taskoj');
                ?>
                  </div>
                <?php
                echo form_submit('botonSubmit', lang('crea_taskoj'));
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
