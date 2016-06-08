
<section id="recuperaPass" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="col-lg-6 col-md-offset-3">
                            
                            <h1>Recupera tu contraseña</h1>
                            <div class="form-group">
                            <?php
                                echo form_open('recuperarpass/recupera');
                                echo form_label('Email', 'email');
                                echo form_input('email');
                                echo form_submit('botonSubmit', 'Enviar');
                                echo form_close();
                            
                            ?>
                            </div>
                            <h5>Escribe aqui tu e-mail y recibiras un enlace desde el 
                                cual asignarte una nueva contraseña.</h5>
                        </div>
                         </div>
                </div>
            </div>
        </section>


