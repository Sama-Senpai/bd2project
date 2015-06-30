<?php require_once('./modulos/header.php'); ?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
<?php require_once('./modulos/navbar.php'); ?> 

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Únete a la comunidad</h1>
        <p>Para jugar con nosotros es necesario que crees una cuenta con nosotros primero. Por favor rellena los siguientes campos, lee los términos y condiciones, haz click en registrar y estarás listo para jugar en RoyalBets.com</p>
        <!--<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>-->
      </div>
    </div>
<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-8">
           <?php /*   require_once('./scripts/alertas.php'); */  ?>  
            
            <form role="form" method="POST" action="BD/Usuarios/usuarios_insertar.php">              
                
                
                <div class="form-group">
                  <label for="cedula" class="col-md-2">
                    Cedula de identidad:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Cedula en el fomato: 12345678" type="text" class="form-control" name="cedula" id="cedula" placeholder="*********" pattern="[0-9]+" required>
                  </div><br/><br/>
                </div>                               
                
                
                
                <div class="form-group">
                  <label for="firstname" class="col-md-2">
                    Nombre:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Nombre" type="text" class="form-control" name="firstname" id="firstname" placeholder="Nombre" pattern="[a-zA-Z ]+" required>
                  </div><br/><br/>
                </div>

                
                
                <div class="form-group">

                  <label for="telefono" class="col-md-2">
                    Telefono:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su numero de Telefono" type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" pattern="[0-9]+" required>
                  </div><br/><br/>
                </div>

                

                <div class="form-group">
                  <label for="direccion" class="col-md-2">
                    Dirección:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Direccion" type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" pattern="[a-zA-Z0-9 ]+" required>
                  </div><br/><br/>
                </div>
                
                
                <div class="form-group">
                  <label for="emailaddress" class="col-md-2">
                    Correo electrónico:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Correo Electronico" type="email" class="form-control" name="emailaddress" id="emailaddress" placeholder="tunombre@tudominio.com" required>
                  </div><br/><br/>
                </div>
                        
                
                <div class="form-group">
                  <br/><br/>
                  <label for="nacimiento" class="col-md-2">
                    Fecha de Nacimiento:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su fecha de Nacimiento en el formato: DD/MM/YYYY" type="date" class="form-control" name="nacimiento" id="nacimiento" placeholder="DD/MM/YYYY" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" required>
                  </div><br/>
                </div>
                                             
                                
                <div class="row">
                  <div class="col-md-2">
                  </div>                  
                  <div class="col-md-3">
                      <button type="submit" name="registrar" class="btn btn-info" onclick="validar();">
                      Registrar
                      </button>
                  </div>
                </div>  
              </form>
        </div>

<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>


<?php require_once('./modulos/footer.php'); ?>       
      
    </div> <!-- /container -->
    
<?php require_once('./modulos/scriptjs.php'); ?>     
    
    </body>
</html>
