<!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                        <div class="row" id="tituloMenu">
                                
                                <h1><?=lang('panel_de_control')?></h1>
                                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                                <?=lang('oculta_menu')?></a>
                                </div>
                            </div>
                            
                            <?php if ($this->session->has_userdata('foto')): ?>
                        <img src="<?php echo base_url().$this->session->foto;?>" width="240" height="220" class="img-responsive img-circle" alt="foto perfil usuario" title="foto perfil usuario"/>
                            <?php else: ?>
                                <img src="<?php echo site_url('assets/img/usuario-32.png');?>" class="img-responsive img-circle" title="foto perfil usuario"/>
                            <?php endif;?>


                                <?php
                            echo "<h3>";
                            echo $this->session->nombre." ".$this->session->apellidos;
                            echo "</h3>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
