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
        <h1>Gestión de Mesas</h1>
        <p>Creación: para crear una mesa sólo rellena los siguientes campos.</p>
      </div>
    </div>

<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Formulario</h3>
            </div>
            
            <div class="panel-body" >
          
        <div class="col-lg-12">
          
            <form role="form" method="POST" action="../BD/Mesa/mesasInsertar.php">
                <div class="form-group">
                  <label for="nombreMesa" class="col-md-2">
                    Mesa:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el nombre de la mesa" type="text" class="form-control" name="nombreMesa" id="nombreMesa" placeholder="Nombre de la Mesa" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="descripcion" class="col-md-2">
                    Descripcion:
                  </label>
                  <div class="col-md-10">
                      <input title="Descripcion" type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese una breve descripcion acerca de esta mesa" required>
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
