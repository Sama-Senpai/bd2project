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
        <h1>Editar Mesa</h1>
       
      </div>
    </div>

<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
            <?php
            require_once("../BD/conexion.php");
            $m = $_GET['mesa'];
            $sql = "SELECT * FROM Mesas WHERE Id='$m'";
            $datos = \mysql_query($sql); 
            
            $renglon = mysql_fetch_row($datos,MYSQL_ASSOC);
            $id = $renglon['Id'];
            //echo $id;
           //echo $renglon['Id'];
           
            ?>
            
            <form role="form" method="POST" action="../BD/Mesa/mesaActualizar.php?mesa=<?php echo $renglon['Id'] ?>">
                <div class="form-group">
                  <label for="nombreMesa" class="col-md-2">
                    Mesa:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el nombre de la mesa" type="text" class="form-control" name="nombreMesa" id="nombreMesa" placeholder="<?php echo $renglon['Mesa']?>" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="descripcion" class="col-md-2">
                    Descripcion:
                  </label>
                  <div class="col-md-10">
                      <input title="Descripcion" type="text" class="form-control" name="descripcion" id="descripcion" placeholder="<?php echo $renglon['Descripcion']?>" required>
                  </div><br/><br/>
                </div> 
                
                 <div class="form-group">
                  <label for="Deporte" class="col-md-2">
                    Deporte:
                  </label>
                  <div class="col-md-10">
                      <select name="deporte">
                          <option value="Futbol">Futbol</option> 
                          <option value="Tenis">Tenis</option>
                          <option value="Beísbol">Beísbol</option>
                          <option value="NHL">NHL</option>
                          <option value="Baloncesto">Baloncesto</option>
                          <option value="Voleibol">Voleibol</option>
                      </select>
                  </div>
                </div>     
                
                <br/><br/>
                
               <!-- <div class="form-group">
                  <label for="capacidad" class="col-md-2">
                    Capacidad:
                  </label>
                  <div class="col-md-10">
                      <input title="Capacidad" type="capacidad" class="form-control" name="capacidad" id="capacidad" placeholder="<?php echo $renglon['Capacidad']?>" required>
                  </div><br/><br/>
                </div>-->

                


                

                <div class="row">
                  <div class="col-md-2">
                  </div>                  
                  <div class="col-md-3">
                      <button type="submit" name="Actualizar" class="btn btn-info">
                        Actualizar
                      </button>
                  </div>
                    <br>
                    <br>
                </div>
              </form> 
        </div>
       
          
      </div>

      <hr>


<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>      
      
    </div> <!-- /container -->
    
    
    
    </body>
</html>