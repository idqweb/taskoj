<!-- Taskojs Section -->
<section id="buscataskoj" class="taskoj-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= lang('buscador_taskojs') ?></h1>
                <div class="row">
                <div class="separaBuscadores">
                    <?php
                    echo form_open('home/listaTaskojs/buscarPorciudad');
                    echo form_label(lang('busca_por_ciudades'), 'passRealizador');
                    echo '<select name="ciudadesTaskoj">';                
                    foreach ($buscarCiudadesConTareas as $fila) {
                        ?>
                       <option value="<?=$fila->nombre_ciudad?>"><?=$fila->nombre_ciudad?></option>
                    <?php
                       }
                    echo "</select>";   
                    echo form_submit('botonSubmit', lang('buscar_taskojs'));
                    echo form_close();
                    ?>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>