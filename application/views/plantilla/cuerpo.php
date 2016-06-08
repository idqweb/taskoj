<!-- Seccion que es Taskoj -->
<section id="intro" class="intro-section">
    <div class="container">
        <div class="row">
            <h1><?= lang('que_es_un_taskoj') ?></h1>
            <div class="col-lg-6">


                <img src="<?php echo base_url() . "assets/img/grupo-taskoj-300.png"; ?>"  class="img-responsive"  width="600" height="580" alt="que es taskoj"/>

            </div>
            <div class="col-lg-6">
                <div id="colocartextoIntro">

                    <span class="textoIntro"><?= lang('texto_intro_part1') ?>
                        <?= lang('texto_intro_part2') ?>
                        <?php
                        echo anchor('home', 'Taskoj.com', array(
                            'title' => 'Taskoj.com', 'target' => '_blank'));
                        ?>
<?= lang('texto_intro_part3') ?></span>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="queEsTaskoj" class="about-section">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
</section>

<!-- Seccion Registro -->
<section id="services" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                    <h3><?=lang('registro_para_realizadores')?></h3>
                
                <img src='<?php echo base_url()."assets/img/foto_realizador.png";?>'
                     title="foto_creador" alt="foto_realizador" />
                
                <?php
                echo form_open('registro/registra/realizador');
                ?>
                <div class="form-group text-left">

                    <?php
                    echo form_label(lang('nombre'), 'nombreRealizador');
                    $data_nombre_realizador = array(
                        'type' => 'text',
                        'name' => 'nombreRealizador',
                        'id' => 'nombreRealizador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_nombre')
                    );
                    echo form_input($data_nombre_realizador);
                    echo form_error('nombreCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('apellidos'), 'apellidosRealizador');
                    $data_apellidos_realizador = array(
                        'type' => 'text',
                        'name' => 'apellidosRealizador',
                        'id' => 'apellidosRealizador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_apellidos')
                    );
                    echo form_input($data_apellidos_realizador);
                    echo form_error('apellidosCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('email'), 'emailRealizador');
                    $data_email_realizador = array(
                        'type' => 'email',
                        'name' => 'emailRealizador',
                        'id' => 'emailRealizador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_email')
                    );
                    echo form_input($data_email_realizador);
                    echo form_error('emailCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('contraseña'), 'passRealizador');
                    $data_password_realizador = array(
                        'type' => 'password',
                        'name' => 'passRealizador',
                        'id' => 'passRealizador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_password')
                    );
                    echo form_password($data_password_realizador);
                    echo form_error('passRealizador');
                    echo '<br/>';
                    ?>
                </div>
                <?php
                echo form_submit('botonSubmit', lang('registrate'));
                echo form_close();
                ?>
            </div>
            <div class="col-lg-6">
                <h3><?=lang('registro_para_creadores')?></h3>
                
                <img src='<?php echo base_url()."assets/img/foto_creador.png";?>'
                     title="foto_creador" alt="foto_creador" />
                
                <?php
                echo form_open('registro/registra/creador');
                ?>
                <div class="form-group text-left">

                    <?php
                    echo form_label(lang('nombre'), 'nombreCreador');
                    $data_nombre_creador = array(
                        'type' => 'text',
                        'name' => 'nombreCreador',
                        'id' => 'nombreCreador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_nombre')
                    );
                    echo form_input($data_nombre_creador);
                    echo form_error('nombreCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('apellidos'), 'apellidosCreador');
                    $data_apellidos_creador = array(
                        'type' => 'text',
                        'name' => 'apellidosCreador',
                        'id' => 'apellidosCreador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_apellidos')
                    );
                    echo form_input($data_apellidos_creador);
                    echo form_error('apellidosCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('email'), 'emailCreador');
                    $data_email_creador = array(
                        'type' => 'email',
                        'name' => 'emailCreador',
                        'id' => 'emailCreador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_email')
                    );
                    echo form_input($data_email_creador);
                    echo form_error('emailCreador');
                    ?>
                </div>
                <div class="form-group text-left">
                    <?php
                    echo form_label(lang('contraseña'), 'password');
                    $data_password_creador = array(
                        'type' => 'password',
                        'name' => 'passCreador',
                        'id' => 'passCreador',
                        'class' => 'form-control',
                        'placeholder' => lang('placeholder_password')
                    );
                    echo form_password($data_password_creador);
                    echo form_error('passCreador');
                    echo '<br/>';
                    ?>
                </div>
                <?php
                echo form_submit('botonSubmit', lang('registrate'));
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= lang('datos_contacto') ?></h1>
                <div class="row">


                    <div class="col-lg-6 text-left">

                        <form action="home/envioEmailContacto" method="post">

                            <div class="form-group">
                                <label for="nombre"><?= lang('nombre') ?></label>
                                <input type="text" class="form-control" name="nombreContacto" id="nombre" placeholder="<?= lang('nombre') ?>"/>
                            </div>
                            <?php
                            echo '<div style="color:#A1120B">';
                            echo form_error('nombreContacto');
                            echo '</div>'
                            ?>

                            <div class="form-group">
                                <label for="email"><?= lang('email') ?></label>
                                <input type="email" name="emailContacto" class="form-control" id="email" placeholder="<?= lang('email') ?>"/>
                            </div>
                            <?php
                            echo '<div style="color:#A1120B">';
                            echo form_error('emailContacto');
                            echo '</div>'
                            ?>
                            <div class="form-group"> 
                                <label for="comentario"><?= lang('comentarios') ?></label>                        
                                <textarea class="form-control" class="col-lg-6" name="comentarioContacto" rows="3"></textarea>
                            </div>
                            <?php
                            echo '<div style="color:#A1120B">';
                            echo form_error('comentarioContacto');
                            echo '</div>'
                            ?>
                            <button type="enviar" class="btn btn-default"><?= lang('enviar_email') ?></button>
                        </form>


                    </div>  
                    <div class="col-lg-6 text-left">
                        <?php echo $map['html']; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
