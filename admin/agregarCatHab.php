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
        <h1>Agregar Catalgo de Habitacion</h1>
        <p>Creación: Para crear una nueva habitacion en el catalogo debe llenar los siguientes campos</p>
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
            
    
          
            <form role="form" method="POST" action="../BD/admin/nuevoCatHab.php">
                <div class="form-group">
                  <label for="desp" class="col-md-2">
                    Descripcion:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca un nombre para describr la habitacion" type="text" class="form-control" name="desp" id="desp" placeholder="Habitacion Multiple" required>
                  </div><br/><br/>
                </div>
                <div class="form-group">
                  <label for="cod_ch" class="col-md-2">
                    Codigo:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el codigo del tipo de habitacion" type="text" class="form-control" name="cod_ch" id="cod_ch" placeholder="2332" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="king" class="col-md-2">
                    King:
                  </label>
                  <div class="col-md-10">
                      <input title="Numero de Camas king" type="text" class="form-control" name="king" id="king" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="queen" class="col-md-2">
                    Queen:
                  </label>
                  <div class="col-md-10">
                      <input title="Numero de Camas Queen" type="text" class="form-control" name="queen" id="queen" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="matrimonial" class="col-md-2">
                    Matrimonial:
                  </label>
                  <div class="col-md-10">
                      <input title="Numero de Camas matrimonial" type="text" class="form-control" name="matrimonial" id="matrimonial" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="individual" class="col-md-2">
                    Individual:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de camas individuales" type="text" class="form-control" name="individual" id="individual" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="b_clase_a" class="col-md-2">
                    Baño clase A:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de Baños clase A" type="text" class="form-control" name="b_clase_a" id="b_clase_a" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                <div class="form-group">
                  <label for="b_clase_b" class="col-md-2">
                    Baño clase B:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de Baños Clase B" type="text" class="form-control" name="b_clase_b" id="b_clase_b" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                <div class="form-group">
                  <label for="b_clase_s" class="col-md-2">
                    Baños Clase S:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de baños Clase S" type="text" class="form-control" name="b_clase_s" id="b_clase_s" placeholder="#" required>
                  </div><br/><br/>
                </div> 
                
                <div class="form-group">
                  <label for="Maxper" class="col-md-2">
                    Maximo de personas:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero Maximo de personas" type="text" class="form-control" name="Maxper" id="Maxper" placeholder="#" required>
                  </div><br/><br/>
                </div> 
           
                
                <br/><br/>
                
               <!-- <div class="form-group">
                  <label for="capacidad" class="col-md-2">
                    Capacidad:
                  </label>
                  <div class="col-md-10">
                      <input title="Capacidad" type="capacidad" class="form-control" name="capacidad" id="capacidad" placeholder="Ingrese aqui la capacidad de personas para esta mesa" required>
                  </div><br/><br/>
                </div>-->

                


                

                <div class="row">
                  <div class="col-md-2">
                  </div>                  
                  <div class="col-md-3">
                      <button type="submit" style=" position:absolute;
    left: 250px;
    " name="Crear" class="btn btn-info" >
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
