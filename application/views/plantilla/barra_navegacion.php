<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <?php
            echo anchor('home', img(array('src' => 'assets/img/logo_Taskoj106.png',
                 'alt' => 'Taskoj Home', 'class' => 'img-responsive')));
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->

                <li>
                    <a class="page-scroll" href="#intro"><?= lang('que_es_un_taskoj') ?></a>
                </li>
                <li>
                    <a class="page-scroll" href="#buscataskoj"><?=lang('buscar_taskojs')?></a>
                </li>
                    <?php if (!$this->session->has_userdata('logeado')) { ?>
                    <li>
                    <a class="page-scroll" href="#registroUsuarios" title="<?=lang('registrate')?>"><?php echo lang('registrate'); ?></a>
                    </li>
                <?php } ?>

                <li>
                    <a class="page-scroll" href="#contact"><?php echo lang('contacto'); ?></a>
                </li>



                <li>
                    <?php
                    if ($this->session->has_userdata('logeado')) {
                        $rutaFotoPerfil = base_url() . $this->session->userdata('foto');

                        $imagenFoto = array(
                            'src' => $rutaFotoPerfil,
                            'class' => 'img-responsive img-circle',
                            'title' => 'foto perfil usuario',
                            'width' => 50,
                            'height' => 50
                        );
                        echo img($imagenFoto);
                        echo "</li>";
                        echo "<li>";
                        echo $this->session->userdata('nombre');
                        echo "</li>";
                        echo "<li>";
                        if ($this->session->userdata('tipoUsuario') === "realizador") {
                            echo anchor('panelrealizador', lang('ir_al_panel'), array('title' => 'Panel del Realizador'));
                        }
                        if ($this->session->userdata('tipoUsuario') === "creador") {
                            echo anchor('panelcreador', lang('ir_al_panel'), array('title' => 'Panel del Creador'));
                        }
                        echo "</li>";
                        echo "<li>";
                        echo anchor('logout', lang('salir'), array('title' => 'LogOut'));
                        echo "</li>";
                    } else {
                        echo "<li>";
                        ?>
                    <form class="form-inline" action="login/logearse" method="post">
                               <div class="form-group">
                        <?php
                        echo form_open('login/logearse');
//                        echo form_label('Email', 'email');
                        $data_email = array(
                            'type' => 'email',
                            'name' => 'email',
                            'id' => 'email',
                            'placeholder' => lang('placeholder_email')
                        );
                        
                        echo form_input($data_email);
                        echo form_error('email');
                        ?>
                               </div>
                             <div class="form-group">      
                        <?php
                        
                          
                                 $data_pass = array(
                            'name' => 'pass',
                            'id' => 'pass',
                            'placeholder' => lang('placeholder_password')
                        );
                        echo form_password($data_pass);
                        echo form_error('pass');
                        
                        ?>
                          
                             </div>     
                            <button type="submit" class="btn btn-default">Login</button>
                            <div id="recuperaPass">
                            <?php echo anchor('recuperarpass', lang('olvidaste_pass'), array('title' => 'Recuperar Contraseña', 'target' => '_blank'));?>
                            </div>
                    </form>
                        <?php         
                       
                        
                        echo "</li>";
                    }
                    ?>
                </li>

            </ul>
            <div class="inline">
<?php echo anchor($this->lang->switch_uri('es'), img(array('src' => 'assets/img/bandera_32_spain.png', 'title' => 'Cambio Idioma a Español'))); ?>

<?php echo anchor($this->lang->switch_uri('en'), img(array('src' => 'assets/img/bandera_32_UK.png', 'title' => 'Cambio Idioma a Inglés'))); ?>
            </div>



        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

