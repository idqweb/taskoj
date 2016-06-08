<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1><?= lang('crea_taskoj') ?> - <?= lang('paso1') ?>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                        <?= lang('oculta_menu') ?></a></h1>
                <?php
                echo form_fieldset(lang('posiciona_tu_taskoj'));

                echo form_open('panelcreador/creaTaskoj');
                echo lang('texto_paso1');
                echo '<br/>';
                echo form_label('Direccion', 'direccion');
                ?>
                <input type="text" id="myPlaceTextBox" name="direccion" size='50' />


                <?php
                echo form_submit('botonSubmit', lang('ir'));
                echo form_close();
                echo form_fieldset_close();
                ?>

                <h6>Ejemplo: Av de Concha Espina, 1,28036 Madrid</h6>
                <?php echo $map['html']; ?>
                <?php
                echo form_open('panelcreador/creaTaskojFinal/inicioformulario');
                ?>

                <h4><?= lang('texto_paso2') ?></h4>

                <label>Latitud</label>
                <input type="text" id="latitud" name="latitud" value="<?= $this->session->latitud ?>"/>
                <label>Longitud</label>
                <input type="text" id="longitud" name="longitud" value="<?= $this->session->longitud ?>"/>
<?php
echo form_submit('botonSubmit', lang('fija_continua'));
echo form_close();
?>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->