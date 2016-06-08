<section id="recuperaPass" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="col-lg-6 col-md-offset-3">
                            <div class="row">
                            <h1>Formulario de Recuperacion</h1>
                              <?php
                                echo form_open('recuperarpass/cambiarpass');
                               ?>
                            <div class="form-group text-left">
                                
                                <?php
                                echo form_label('Nuevo Password', 'pass');
                                echo form_password('pass');
                                echo form_label('Repite Password', 'repass');
                                echo form_password('repass');
                                echo form_submit('botonSubmit', 'Enviar');
                                echo form_hidden('email', $email);
                                echo form_close();
                               
                                ?>
                            </div>
                            </div>
                         </div>
                </div>
            </div>
</section>

