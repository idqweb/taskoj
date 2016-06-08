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
                <?php echo anchor('panelrealizador/perfilUsuario', lang('tu_perfil'), array('title' => 'Perfil Usuario')); ?>
            </li>
            
            <li>
                <?php echo anchor('logout', 'LogOut', array('title' => 'LogOut')); ?>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
