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
        <h1>Agregar Catalogo Paquete</h1>
        <p>Creación: para agregar un paquete al Catalogo solo debe llenar los siguientes Campos</p>
      </div>
    </div>

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
          
            <form role="form" method="POST" action="../BD/admin/nuevoCatPa.php">
                <div class="form-group">
                  <label for="desp" class="col-md-2">
                    Descripcion:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca una descripcion para el paquete" type="text" class="form-control" name="desp" id="desp" placeholder="Paquete para el dia especial de Reyes" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-md-2">
                    (%)Descuento:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el procentaje descuento" type="text" class="form-control" name="desc" id="desc" placeholder="20%" required>
                  </div><br/><br/>
                </div> 
                
              <label for="est"  class="col-md-5">
                        Estado:
                    </label> <br/>              
                        <label class="radio" >
                            <input type="radio" name="estado" id="Estado" value="dis" required>
                            Disponible
                        </label>
                        <label class="radio">
                            <input type="radio" name="estado" id="Estado" value="esp" required>
                            Terminado
                        </label>
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
                      <button type="submit" name="Crear" class="btn btn-info" >
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
