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
            <?php require_once('./scripts/alertas.php'); ?>
            
            <form role="form" method="POST" action="BD/Usuarios/usuarios_insertar.php">              
                <div class="form-group">
                  <label for="firstname" class="col-md-2">
                    Nombre:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Nombre" type="text" class="form-control" name="firstname" id="firstname" placeholder="Nombre" pattern="[a-zA-Z ]+" required>
                  </div><br/><br/>
                </div>

                <div class="form-group">
                  <label for="lastname" class="col-md-2">
                    Apellido:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Apellido" type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido" pattern="[a-zA-Z ]+" required>
                  </div><br/><br/>
                </div> 
                
                <div class="form-group">
                  <label for="cedula" class="col-md-2">
                    Cedula de identidad:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Cedula en el fomato: (V ó E)-12345678" type="text" class="form-control" name="cedula" id="cedula" placeholder="V-12345678 o E-12345678" pattern="[VE]+[-]+[0-9]+" required>
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
                    <label for="password" class="col-md-2">
                      Contraseña:
                    </label>
                    <div class="col-md-10">
                        <input title="Introduzca un Password" type="password" class="form-control" name="password" id="password" placeholder="Password" pattern="[a-zA-Z0-9]+" required>
                      <p class="help-block">
                        Min: 6 caracteres (Solo alfanumerico)
                      </p>
                    </div>
                    
                </div>
                
                <div class="form-group">
                                        <br/><br/>
                  <label for="password2" class="col-md-2">
                    Confirmar contraseña:
                  </label>
                  <div class="col-md-10">
                      <input title="Repita su Password" type="password" class="form-control" name="password2" id="password2" placeholder="Password" pattern="[a-zA-Z0-9]+" required>

                  </div><br/><br><br>
                </div> 
                
                <div class="alert alert-danger alert-dismissable" id="alertapassword2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Atención!</strong> la contraseña debe tener mínimo 6 caracteres.
                </div>
                <br>
                <div class="form-group">
                    <label for="sex" class="col-md-2">
                        Sexo:
                    </label>
                    <div class="col-md-10">
                        <label class="radio">
                            <input type="radio" name="sex" id="sex" value="male" required>
                            Hombre
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" id="sex" value="female" required>
                            Mujer
                        </label>
                    </div><br /><br />
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
                
                <div class="form-group">
                  <br/><br/>
                  <label for="country" class="col-md-2">
                    País:
                  </label>
                  <div class="col-md-10">
                      <select tittle="Seleccione su Pais" name="country" id="country" class="form-control" required>
                      <?php require_once('./modulos/paises-ciudades/paises.php'); ?>
                      </select>    
                  </div><br/><br/>
                </div>
                
<!--
                <div class="form-group">
                  <label for="uploadimage" class="col-md-2">
                    Upload Image:
                  </label>
                  <div class="col-md-10">
                    <input type="file" name="uploadimage" id="uploadimage">
                    <p class="help-block">
                      Allowed formats: jpeg, jpg, gif, png
                    </p>
                  </div><br/><br/>
                </div>
-->
                <div class="form-group">
                  <label for="city" class="col-md-2">
                    Ciudad:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su Ciudad" type="text" class="form-control" id="city" name="city" placeholder="Ciudad" pattern="[a-zA-Z ]+" required>
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

                  <label for="telefono" class="col-md-2">
                    Telefono:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca su numero de Telefono" type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" pattern="[0-9]+" required>
                  </div><br/><br/>
                </div>



                <div class="checkbox">
                  <div class="col-md-2">
                  </div>
                  <div class="col-md-10">
                    <label>
                        <input type="checkbox" required><a href="./img/terminosycondiciones.pdf" target="_blank">Acepto los términos y condiciones</a></label>
                  </div><br/><br/>
                </div>
                
                <div class="alert alert-danger alert-dismissable" id="alertapassword">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Atención!</strong> las contraseñas ingresadas no coinciden.
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