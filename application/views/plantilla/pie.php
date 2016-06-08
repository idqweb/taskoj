<!-- jQuery -->
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>


<!-- Scrolling Nav JavaScript -->
<script src="<?php echo base_url("assets/js/jquery.easing.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/scrolling-nav.js"); ?>"></script>

<!-- BLOQUE COOKIES -->        
<div id="barraTerminos">
    <div class="logoyterminos">
        <?php
        echo anchor('home', img(array('src' => 'assets/img/logo_Taskoj80.png',
            'alt' => 'Taskoj Home', 'class' => 'logopie')));
        ?>  
        <div class="creadoPor">
            Realizado por
            <a href="http://www.idqweb.com" target="_blank">IDQWeb</a> con 
            licencia MIT.
        </div>
    </div>
</div>
<!-- FIN BLOQUE COOKIES -->       


<!-- BLOQUE COOKIES -->
<div id="barraaceptacion" style="display: block;">
    <div class="center">
        Ten en cuenta que las cookies se utilizan para que obtengas la mejor experiencia posible 
        en nuestro sitio web. Al seguir utilizando este sitio, autorizas la 
        utilización de cookies para dicho fin.
        <a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a> | 
        <a href="<?php echo base_url() . "cookies"; ?>" target="_blank" class="info">Más información</a>
    </div>
</div>
<!-- FIN BLOQUE COOKIES -->
<!--Script Cookies -->
<script src="<?php echo base_url("assets/js/cookies.js"); ?>"></script>
</body>

</html>