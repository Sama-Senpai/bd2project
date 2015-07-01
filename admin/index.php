<?php require_once('./modulos/header.php'); ?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <?php require_once('../modulos/scriptjs.php'); ?> 
<?php require_once('./modulos/navbar.php'); ?> 
        
        

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        
        
   <div class="container">
        <h1>Area administrativa</h1>
        <p>Bienvenido al área administrativa, este sitio solo puede ser visualizado por el personal autorizado por el administrador.  </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-3">
          <h2>Inicio del sitio</h2>
          <p>En este momento está ubicado en el área administrativa, si desea volver a la parte visible por los usuarios, presione "Salir" en el menú superior.</p>
          <img src=" ../img/guia2.png">
        </div>  
          <h2>Herramientas de Agregacion</h2>
        <div class="col-lg-9">     
            
            <div class="col-lg-3">
              <h4>Hotel</h4>
              <img src=" ../img/mesa.png">
              <p><br><?php  echo "<a class='btn btn-default' href='agregarHotel.php'> Ir &raquo; </a>"; ?></p>
            </div>
            <div class="col-lg-3">
              <h4>Catalogo Habitacion</h4>
              <img src=" ../img/agregarHab.jpg">
              <p><br><?php echo "<a class='btn btn-default' href='agregarCatHab.php'> Ir &raquo; </a>"; ?></p>
            </div>
             <div class="col-lg-3">
              <h4>Catalogo Paquetes</h4>
              <img src=" ../img/agregarPa.png">
              <p><br><?php echo "<a class='btn btn-default' href='agregarCatPaq.php'> Ir &raquo; </a>"; ?></p>
            </div>
          
         
        </div>
          
          
          <div class="col-lg-3">
          <h2>Ayuda</h2>
          <p>En la seccion "Gestion de hotel" Podra agregar habitaciones y paquetes a los hoteles, asi como editarlos.</p>
          <img src=" ../img/guia3.png">
        </div>
          <h2>Herramientas de Editado</h2>
          
            <div class="col-lg-9"> 
               <div class="col-lg-3">
              <h4>Gestion de hotel</h4>
              <img src=" ../img/gestionHotel.jpg">
              <p><br><?php echo "<a class='btn btn-default' href='gestionHotel.php'> Ir &raquo; </a>"; ?></p>
            </div>
                
             <div class="col-lg-3">
              <h4>Editar Cat Habitacione</h4>
              <img src=" ../img/ediHab.jpg">
              <p><br><?php echo "<a class='btn btn-default' href=''> Ir &raquo; </a>"; ?></p>
            </div>
                
              <div class="col-lg-3">
              <h4>Editar Cat Paquetes</h4>
              <img src=" ../img/editPa.jpg">
              <p><br><?php echo "<a class='btn btn-default' href=''> Ir &raquo; </a>"; ?></p>
            </div>
                
          </div>
          
          
      </div><!--

      --><hr>

<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>
      
      
    </div> <!-- /container -->

    
    
    </body>
</html>
