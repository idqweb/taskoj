<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1><?=lang('listado_tus_taskojs')?>
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                        <?= lang('oculta_menu') ?></a>                
                </h1>
                
                <?php if($listadoTaskojs){ ?>
                
                
                <p><?=lang('listar_taskojs_borrar')?></p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?=lang('fecha')?></th>
                            <th><?=lang('nombre_taskoj')?></th>
                            <th><?=lang('estado_taskoj')?></th>
                            <th><?=lang('precio_ofertado')?></th>
                            <th><?=lang('eliminar_taskoj')?></th>
                        </tr>
                    </thead>
                     <tbody>
                    <?php foreach ($listadoTaskojs as $fila) { ?>

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
                                <?= $fila->precio_inicial_tarea ?>
                            </td>
                            <td>
                                <?php
                                
                                $tareaEliminar = "panelcreador/eliminarTaskoj/".$fila->id_tarea."/".$fila->direccion_id_direccion;
                                echo anchor($tareaEliminar, img(array('src' => 'assets/img/iconos/delete_24px.png', 'title' => 'Eliminar Taskoj'))); ?>
                            </td>
                       </tr>

                    <?php
                }
                ?>
                                 </tbody>
                    </table>

                <?php }else{ ?>
                
                <h1>En estos momentos no tienes ningun taskoj creado.</h1>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


