<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <?php
                echo anchor('home', lang('volver a'), array(
                    'title' => lang('inicio'),
                    'class' => 'navbar-brand page-scroll'));
                ?>
                <?php
                echo anchor('home', img(array('src' => 'assets/img/logo_Taskoj80.png',
                    'alt' => 'Taskoj Home', 'class' => 'logopie')));
                ?> 

            </li>
            <li>
                <?php echo anchor('panelcreador/index', 'Panel', array('title' => 'Panel')); ?>
            </li>
            <li>
                <?php echo anchor('panelcreador/perfilUsuario', lang('tu_perfil'), array('title' => 'Perfil Usuario')); ?>
            </li>
            <li>
                <?php echo anchor('panelcreador/creaTaskoj', lang('crea_un_taskoj'), array('title' => 'Crea Taskoj')); ?>
            </li>

            <li>
                <?php echo anchor('panelcreador/listaTaskojs', lang('mis_taskoj'), array('title' => 'Lista de mis Taskojs')); ?>
            </li>
            
            <li>
                <?php echo anchor('logout', 'LogOut', array('title' => 'LogOut')); ?>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

