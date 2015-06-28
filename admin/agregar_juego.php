<?php require_once('./modulos/header.php'); ?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
<?php require_once('./modulos/navbar.php'); ?> 
        
   <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Gestión de Juegos</h1>
        <p>Para crear un nuevo juego, es necesario rellenar los siguientes cambios:</p>
        <!--<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>-->
      </div>
    </div>
<br>

  <div class="container">
       <div class="col-lg-8">            
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Formulario</h3>
            </div>
            
            <div class="panel-body" >
          <form role="form" method="POST" action="../BD/admin/nuevojuego.php">
              <?php require_once('../scripts/alertas.php'); ?>
              
        <div class="col-lg-12">
           
               
                <div class="form-group">
                  <label for="equipo1" class="col-md-2">
                    Primer equipo:
                  </label>  
                     <div class="col-md-5"> 
                        <input title="Introduzca el nombre del primer equipo" type="text" class="form-control" name="equipo1" id="equipo1" placeholder="Equipo" required>
                      </div>
                 </div>   
               <div class="form-group">
                  <label for="logro1" class="col-md-2">
                    Logro:
                  </label>   
                     <div class="col-md-3">
                      <input title="Valor del equipo" type="text" class="form-control" name="logro1" id="logro1" placeholder="+212 o -121" pattern="[-+]+[0-9]+"  required>
                    </div><br/><br/>
                 </div>
              
      
                <div class="form-group">
                     <!--<div class="col-md-10">-->
                  <label for="equipo2" class="col-md-2">                     
                    Segundo equipo:
                  </label>
                     <div class="col-md-5">
                      <input title="Introduzca el nombre del segundo equipo" type="text" class="form-control" name="equipo2" id="equipo2" placeholder="Equipo" required>
                   </div>
                  <label for="logro2" class="col-md-2">
                    Logro:
                  </label>   
                     <div class="col-md-3">
                      <input title="Valor del equipo" type="text" class="form-control" name="logro2" id="logro2" placeholder="+212 o -121" pattern="[-+]+[0-9]+" required>
                     </div><br/><br/>
                     
                     <!--</div><br/><br/>-->
                </div> 
                                        
                <div class="form-group">
                  <!--<div class="col-md-10">-->
                  <label for="fechaini" class="col-md-2">
                    Fecha de inicio:
                  </label>
                  <div class="col-md-5">
                      <input title="Introduzca la fecha de inicio" type="date" class="form-control" name="fechaini" id="fechaini" required>
                  </div><br/><br/>
                </div>               
                
                <div class="form-group">
                  <!--<div class="col-md-10">-->
                  <label for="fechafin" class="col-md-2">
                    Fecha de final:
                  </label>
                     <div class="col-md-5">
                      <input title="Introduzca la fecha de finalizacion" type="date" class="form-control" name="fechafin" id="fechafin"  required>
                  </div><br/><br/>
                </div>
          
          

                <div class="form-group">
                   <!--<div class="col-md-10">-->
                  <label for="horaini" class="col-md-2">
                    Hora de inicio:
                  </label>
                    <div class="col-md-5">
                      <input title="Introduzca la hora de inicio" type="time" class="form-control" name="horaini" id="horaini" placeholder="Time" required>             
                  </div><br/><br/>
                </div>
                
            
                <div class="form-group">
                      <!--<div class="col-md-10">-->
                  <label for="horafin" class="col-md-2">
                    Hora de fin:
                  </label>
                      <div class="col-md-5">
                      <input title="Introduzca la hora de finalizacion" type="time" class="form-control" name="horafin" id="horafin" placeholder="Time" required>                  
                  </div><br/><br/>
                </div>
               
                  <label for="mesa" class="col-md-2">
                    Id de mesa:
                  </label>  
                      <div class="col-md-2">
                      <input title="Id de Mesa" type="text" class="form-control" name="mesa" id="mesa" placeholder="#" required>
                    </div><br/><br/>
                     
                 <div class="form-group">
                     <!--<div class="col-md-10">-->
                  <label for="min" class="col-md-2">                     
                    Monto Minimo:
                  </label>
                     <div class="col-md-5">
                      <input title="Monto minimo a apostar" type="text" class="form-control" name="min" id="min" placeholder="$" pattern="[0-9]+" required>
                    </div><br/><br/>
                    </div>
            
                  <label for="max" class="col-md-2">
                    Monto Maximo:
                  </label>  
                      <div class="col-md-5">
                      <input title="Monto Maximo a apostar" type="text" class="form-control" name="max" id="max" placeholder="$" pattern="[0-9]+" required>
                    </div><br/><br/>
                    <br/>
                  <div class="form-group">
                   
                    <div class="col-md-2">
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
                    </div><br/><br/>
                </div> <br/><br/>   
                    
                    
                   </div>
               
                            
              
           
                 <div class="form-group" style="text-align:center">
               <!--<div class="col-md-10">-->                                     
                      <button type="submit" name="registrar" class="btn btn-info" >
                      Crear
                      </button>
                  <!--</div>-->
               </div>
              </form> 
              </div>      
            </div> 
           </div> 
           
         </div> 
          <?php require_once('../modulos/sidebar.php'); //twitter?> 
       </div>   
      
     </div>    
        
           
      </div>

      <hr>
<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>


<?php require_once('../modulos/footer.php'); ?>       
      
    </div> <!-- /container -->
    
<?php require_once('../modulos/scriptjs.php'); ?>     
    
    </body>
</html>
<?php



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

