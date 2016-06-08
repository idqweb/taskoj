<!-- Taskojs Section -->
<section id="buscataskoj" class="taskoj-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <?php if($tareas){ 
                         
                        ?>
                
                
                <h4><?=lang('listado_de_taskojs')?><?=$ciudadSolicitada?></h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?=lang('fecha')?></th>
                            <th><?=lang('nombre_taskoj')?></th>
                            <th><?=lang('estado_taskoj')?></th>
                            <th><?=lang('frecuencia_taskoj')?></th>
                            <th><?=lang('descripcion_taskoj')?></th>
                            <th><?=lang('precio_ofertado')?></th>
                            
                        </tr>
                    </thead>
                     <tbody>
                    <?php foreach ($tareas as $fila) { ?>

                         <tr>
                            <td>
                                
                                <?php
                                $date = new DateTime($fila->fecha_creacion_tarea);
                                echo $date->format('d/m/Y');
                                ?>
                            </td>
                            <td>
                                <?= $fila->nombre_tarea ?>
                            </td>
                            <td>
                                <?= $fila->estado_tarea ?>
                            </td>
                            <td>
                                <?= $fila->frecuencia_tarea ?>
                            </td>
                            <td>
                                <?= $fila->descripcion_tarea ?>
                            </td>
                            <td>
                                <?= $fila->precio_inicial_tarea ?>
                            </td>
                            
                       </tr>

                    <?php
                }
                ?>
                                 </tbody>
                    </table>

                <?php }else{ ?>
                
                <h1>En estos momentos no existen taskojs con esos criterios de busqueda</h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

