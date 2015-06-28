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
        <h1>AGREGAR PAQUETES A UN HOTEL</h1>
        <p>Creación: para agregar un paquete al Hotel seleccione este y el paquete que desee</p>
      </div>
    </div>

<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Seleccion:</h3>
            </div>
            
            <div class="panel-body" >
          
        <div class="col-lg-12">
          
            <form role="form" method="POST" action="../BD/admin/nuevoPaqueXhotel.php">
           
                
                
     <?php
                
    include '../BD/conexion.php';
    
    $query1 = "SELECT * FROM `hotel`";
    $busqueda1 = mysql_query($query1);
     ?>
                
                   <div class="form-group">
                  <label for="Hotel" class="col-md-2">
                    Hotel:
                  </label>   
                  <div class="col-md-10">
                      <select name="hotel">
                          
    <?php
 
    while ($datos1 = mysql_fetch_assoc($busqueda1)){
                        echo "<option value=".$datos1['cod_hotel'].">".$datos1['nombre']."</option>";                
    }
  
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div>  
                
                
                
                 <?php
   
    $vi=1;
    $query = "SELECT * FROM `catalogo_paquete` WHERE vigencia=$vi";
    $busqueda = mysql_query($query);
     ?>
                
                   <div class="form-group">
                  <label for="paquete" class="col-md-2">
                    Paquete:
                  </label>   
                  <div class="col-md-10">
                      <select name="paquete">
                          
    <?php
 
    while ($datos = mysql_fetch_assoc($busqueda)){
                        echo "<option value=".$datos['cod_cp'].">".$datos['descripcion']."</option>";                
    }
    
    ?>
                      </select>
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
