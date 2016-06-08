<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= lang('datos_contacto') ?></h1>
                <div class="row-fluid">    
                    <div class="col-lg-6 text-left">     
                        <?php if ($emailEnviadoOK == TRUE) { ?>
                            <h1>Email enviado correctamente</h1>
                        <?php } else { ?>    

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
                                    <input type="email" class="form-control" name="emailContacto"  id="email" placeholder="<?= lang('email') ?>"/>
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

                        <?php } ?>




                    </div> 
                    <div class="col-lg-6 text-left">
                        <?php echo $map['html']; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
