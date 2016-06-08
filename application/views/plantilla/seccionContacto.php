<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= lang('datos_contacto') ?></h1>
                <div class="row">    
                    <div class="col-lg-6 text-left">     
                        <?php if ($emailEnviadoOK == TRUE) { ?>
                            <h1>Email enviado correctamente</h1>
                        <?php } else { ?>    

                            <form action="" method="post">

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
                    <div class="col-lg-6 text-left"><?php echo $map['html']; ?></div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Intro Section -->
<section id="intro" class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Scrolling Nav</h1>
                <p><strong>Usage Instructions:</strong> <?php echo lang('registrate'); ?> <code>scrolling-nav.js</code>, <code>jquery.easing.min.js</code>, and <code>scrolling-nav.css</code> files. To make a link smooth scroll to another section on the page, give the link the <code>.page-scroll</code> class and set the link target to a corresponding ID on the page.</p>
                <a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="queEsTaskoj" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>About Section</h1>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Services Section</h1>
            </div>
        </div>
    </div>
</section>