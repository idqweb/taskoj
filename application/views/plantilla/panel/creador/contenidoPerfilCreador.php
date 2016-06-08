<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tituloPerfil">
                    <h1><?= lang('tu_perfil') ?> - <?php echo $this->session->userdata('nombre'); ?></h1>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                        <?= lang('oculta_menu') ?></a>
                </div>
                <?php
                $nombre = $this->session->userdata('nombre');
                $apellidos = $this->session->userdata('apellidos');
                $email = $this->session->userdata('email');
                ?>
                <div class="form-group text-left">
                    <?php
                    echo form_fieldset(lang('panel_informacion_general'));
                    echo form_open('panelcreador/modificaPerfil');
                    echo form_label(lang('nombre'), 'nombre');
                    $data_cambiar_nombre = array(
                        'type' => 'text',
                        'name' => 'nombre',
                        'id' => 'nombre',
                        'class' => 'form-control'
                    );
                    echo form_input($data_cambiar_nombre, $nombre);
                    echo form_error('nombre');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('apellidos'), 'apellidos');
                    $data_cambiar_apellidos = array(
                        'type' => 'text',
                        'name' => 'apellidos',
                        'id' => 'apellidos',
                        'class' => 'form-control'
                    );
                    echo form_input($data_cambiar_apellidos, $apellidos);
                    echo form_error('apellidos');
                    ?>
                </div>
                <div class="form-group text-left">            
                    <?php
                    echo form_label(lang('email'), 'email');
                    $data_cambiar_email = array(
                        'type' => 'email',
                        'name' => 'email',
                        'id' => 'email',
                        'class' => 'form-control'
                    );
                    echo form_input($data_cambiar_email, $email);
                    echo form_error('email');
                    ?>
                </div>

                <?php
                echo form_submit('botonSubmit', lang('modificar'));
                echo form_close();
                echo form_fieldset_close();
                ?>
                <?php
                echo form_fieldset(lang('modificar_clave_acceso'));
                echo form_open('panelcreador/cambiaPass');
                ?>

                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('contraseña'), 'password');
                    echo form_password('pass');
                    echo form_error('pass');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('re_contraseña'), 'password');
                    echo form_password('repass');
                    ?>
                </div>
                <?php
                echo form_submit('botonSubmit', lang('modificar'));
                echo form_close();
                echo form_fieldset_close();

                echo form_fieldset(lang('modificar_foto_perfil'));
                echo form_open_multipart('panelcreador/cambiaFoto');
                echo form_label(lang('imagen'), 'imagen');
                echo form_upload('fotoUsuarioPerfil');

                echo form_submit('botonSubmit', lang('subir_foto'));
                echo form_close();
                echo form_fieldset_close();
                ?>
                <h5><?=lang('caracteristicas_foto')?></h5>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->