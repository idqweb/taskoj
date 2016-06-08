 <!-- jQuery -->
        <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

        
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <!-- Asignar valor a latitud -->
         <script>
             function actualizaInput(newLat, newLng){
                 $("#latitud").val(newLat);
                 $("#longitud").val(newLng);
            }
             
        </script>
        

    </body>

</html>

