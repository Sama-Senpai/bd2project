e<?php require_once('./modulos/header.php'); ?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <?php require_once('../modulos/scriptjs.php'); ?> 
<?php require_once('./modulos/navbar.php'); ?> 
        
        

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        
        
   <div class="container">
        <h1>Gestion de Hoteles</h1>
        <p>Esta area solo puede ser visualizada por personal Autorizado</p>
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
              <h4>Agregar Habitacion</h4>
              <img src=" ../img/agregarHab.jpg">
              <p><br><?php  echo "<a class='btn btn-default' href='agregarHabitacionxHotel.php'> Ir &raquo; </a>"; ?></p>
            </div>
            <div class="col-lg-3">
              <h4>Agregar Paquete</h4>
              <img src=" ../img/agregarPa.png">
              <p><br><?php echo "<a class='btn btn-default' href='paquetexhotel.php'> Ir &raquo; </a>"; ?></p>
            </div>
                   
        </div>
          
          
          <div class="col-lg-3">
          <h2>Ayuda</h2>
          <p>En la seccion "Editar Habitacion" Podra Editar Habitaciones asi como eliminar estas.</p>
          <img src=" ../img/guia4.jpg">
        </div>
          <h2>Herramientas de Editado</h2>
          
            <div class="col-lg-9"> 
               <div class="col-lg-3">
              <h4>Editar Habitacion</h4>
              <img src=" ../img/ediHabin.jpg">
              <p><br><?php echo "<a class='btn btn-default' href=''> Ir &raquo; </a>"; ?></p>
            </div>
                
             <div class="col-lg-3">
              <h4>Eliminar Paquete</h4>
              <img src=" ../img/edipa.jpg">
              <p><br><?php echo "<a class='btn btn-default' href=''> Ir &raquo; </a>"; ?></p>
            </div>
                
              <div class="col-lg-3">
              <h4>Editar Hotel</h4>
              <img src=" ../img/ediho.jpg">
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
