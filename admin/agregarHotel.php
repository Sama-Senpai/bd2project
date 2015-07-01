<?php require_once('./modulos/header.php'); ?> 
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
<?php require_once('./modulos/navbar.php'); ?> 
<?php require_once('../modulos/scriptjs.php'); ?> 
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Agregar Hotel de Hoteles</h1>
        <p>Creación: Para crear un hotel solo debe llenar los siguientes campos</p>
      </div>
    </div>
    <?php require_once('../scripts/alertas.php'); ?>

<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Campos:</h3>
            </div>
            
            <div class="panel-body" >
          
        <div class="col-lg-12">
          
            <form role="form" method="POST" action="../BD/admin/nuevoHotel.php">
                <div class="form-group">
                  <label for="nombreH" class="col-md-2">
                    Nombre:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el nombre del Hotel" type="text" class="form-control" name="nombreH" id="nombreH" placeholder="Hotel los Conquistadores" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="riff" class="col-md-2">
                    Riff:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el riff del Hotel" type="text" class="form-control" name="riff" id="riff" placeholder="RIF-23455321" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="direccion" class="col-md-2">
                    Direccion del hotel:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca la direccion del Hotel" type="text" class="form-control" name="direccion" id="direccion" placeholder="AV-Nuevo Mexico, Calle de Ejemplo." required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="direE" class="col-md-2">
                    Correo:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el correo del Hotel" type="text" class="form-control" name="direE" id="direE" placeholder="ejemplo@yo.com" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="tlf" class="col-md-2">
                    Telefono:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de telefono del Hotel" type="text" class="form-control" name="tlf" id="tlf" placeholder="0286-123345" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="cam" class="col-md-2">
                    Numero de camas adicionales:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de camas adicionales que posee el hotel" type="text" class="form-control" name="cam" id="cam" placeholder="#" required>
                  </div><br/><br/>
                </div> 
           
                
                <br/><br/>
                

                <div class="row">
                  <div class="col-md-3">
                  </div>                  
                  <div class="col-md-2">
                      <button style=" position:absolute;
    left: 210px;
    " type="submit" name="Crear" class="btn btn-info" >
                        Crear
                      </button>
                  </div>
                    <br>
                  <br>
                </div>
              </form> 
        </div>
       
          
      </div>
      
    </div> <!-- /container -->
    
     <hr>


<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>   
    
    </body>
</html>
