<?php require_once('./modulos/header.php'); ?>
<?php require_once('./BD/conexion.php'); ?>

           
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
      
        
        
<?php require_once('./modulos/navbar.php'); ?>    



   
        
      <?php


if ( !($hotela=filter_input(INPUT_POST, 'hotel')) && !($hotela=filter_input(INPUT_GET, 'hotel')) ){

    ?>
         <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Reserva y Hospedaje</h1>
        <p>Ingrese los datos del hotel y la fecha para comprobar la disponibilidad</p>
      </div>
    </div>
 <?php require_once('./scripts/alertas.php'); ?>
    
    
          
         <div class="container">
             
        <div class="row"> 
            <div class="col-lg-8">
                 <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Campos:</h3>
            </div>
                <br/>
                
    <form role="form" method="POST" action="reservaHospedaje1.php">
        
                <?php
             

    
    $query1 = "SELECT * FROM `hotel`";
    $busqueda1 = mysql_query($query1);
     ?>          
                   <div class="form-group">
                  <label for="Hotel" class="col-md-2">
                   Introduzca el Hotel:
                  </label>   
                  <div class="col-md-10">
                      <select name="hotel" onchange=>
                   <option value="0">Seleccione un Hotel</option>
                          
    <?php
 
    while ($datos1 = mysql_fetch_assoc($busqueda1)){
                        echo "<option value=".$datos1['cod_hotel'].">".$datos1['nombre']."</option>";                
    }
   mysql_free_result($busqueda1);
    ?>
                      </select>
                  </div><br/><br/>
                  
                       
                  </div> 
        
        
             <div class="form-group">
                  <label for="ini" class="col-md-2">
                    Fecha inicio:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca La fecha de inicio" type="date" class="form-control" name="ini" id="ini" placeholder="20%" required>
                  </div><br/><br/>
                </div> 
        
             <div class="form-group">
                  <label for="fin" class="col-md-2">
                    Fecha fin:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca la fecha de Fin" type="date" class="form-control" name="fin" id="fin" placeholder="20%" required>
                  </div><br/><br/>
                </div> 
        <br/>
    
            <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button style=" position:absolute;
    left: 230px; " type="submit"  name="Buscar" value="Buscar"class="btn btn-info" >
                        Buscar
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
</form><br/><br/><br/><br/>
</div> 
             </div> 
             
              </div> 
 <?php
                
    }
  
    ?>
  
        
 </div> 
             
           
    
        

    
          
          
     <!--                   
          <div class="btn-group">
  <button type="button" class="btn btn-primary">Filtro</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
   
  
  <ul class="dropdown-menu" role="menu">
  
   
   
    
  </ul>
</div>   --> 
     
             <?php

         
     if(filter_input(INPUT_POST, 'hotel')){
          $hotela=filter_input(INPUT_POST, 'hotel');
          $ini=filter_input(INPUT_POST, 'ini');
          $fin=filter_input(INPUT_POST, 'fin');
     }
     if(filter_input(INPUT_GET,"hotel")){
      $hotela=filter_input(INPUT_GET,"hotel");
      $ini=filter_input(INPUT_GET,"ini");
      $fin=filter_input(INPUT_GET,"fin");
     }
    
if ($hotela) {
       
    $m=0;
    $habitacionesLibres=mysql_query("SELECT *
FROM `habitacion_hotel`
WHERE `Hotel_cod`='$hotela'");
    
       while ($tupla = mysql_fetch_assoc($habitacionesLibres)){
    
       $descripciones[$m]=$tupla['descripcion'];
            $codigos[$m]=$tupla['catalogo_habitacion_cod_ch'];
       $precios[$m]=$tupla['precio_dia'];
       $cantidades[$m]=$tupla['cantidad'];
       $camasadicionales[$m]=$tupla['NroAdicionales'];
   
        $m++;
     
    }
    
      
      
      
        $query1 = "SELECT * 
    FROM `paquetes` INNER JOIN `catalogo_paquete` ON `paquetes`.`catalogo_paquete_cod_cp`=`catalogo_paquete`.`cod_cp`
   WHERE `paquetes`.`cod_hotel`='$hotela' AND `paquetes`.`vigencia`='1'";
    $busqueda1 = mysql_query($query1);
    
      $query = "CALL sel_rooms('$hotela','$ini','$fin')";
      
       $datos = mysql_query($query);
       
      
      
    ?>
      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Reserva Hospedaje</h1>
        <p>Vea la disponibilidad para la fecha del hotel, y ingrese los datos del cliente</p>
      </div>
    </div>
 <?php require_once('./scripts/alertas.php'); ?>
    
    
          
    <div class="container">
        
       <!-- Example row of columns -->
       <div style="width: 1500px;" class="row">
          
          
        <div class="col-lg-6">  
            <div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Habitaciones Disponibles:</h3>
            </div>
         
          
            
         <div class="table-responsive">  
             
             </br></br>
             
             <table id= "tabla" class="table table-bordered" >
              
              
                
                <thead>
                        <tr>
                                
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Camas Adicinales</th>
                               
                        </tr>
                        
                </thead>
   
                <tbody align="center">
                    
              <?php                                       
                 while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        $contador2=0;
                      
                        
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                               
                                 $contador ++;                        
                                } 
                               $array2[$contador2]=$array[4];                             
                                 $array3[$contador2]=$array[1];
                                 $contador2++;
                      
                                 
                                 $y=0;
                                 while($y<$m){
                                 if($codigos[$y]==$array[1]){
                                         $codigos[$y]=0;
                                     }
                                     $y++;
                                 }
              ?>
                    
                      <tr>
                                <td data-title="Descripción"> <?php echo $array [4]; ?>  </td>
                                <td data-title="Precio"><?php echo $array [5]; ?> </td>
                                <td data-title="Disponibles" class="numeric"><?php echo $cuenta= $array [3] - $array [2]; ?></td>
                                <td data-title="Camas Adicinales" class="numeric"> <div align="center"><?php echo $array [6]; ?> </div> </td>
                       </tr>         
              
                        
               <?php                                       
                  }
                  mysql_free_result($datos);
                      
                  $p=0;
                  while($p<$m){
                      if($codigos[$p]){
                ?>
                            <tr>    
                      <td data-title="Descripción"> <?php echo $descripciones[$p]; ?>  </td>
                                <td data-title="Precio"><?php echo $precios[$p]; ?> </td>
                      <td data-title="Disponibles" class="numeric"><?php echo $cantidades[$p]; ?></td>
                                <td data-title="Camas Adicinales" class="numeric"> <div align="center"><?php echo $camasadicionales[$p]; ?> </div> </td>
                               
                              </tr>   
                          <?php 
                      }
                      $p++;
                  }
                 
                      
                  
                ?>       
                      
                    
                    
                        
                        
                </tbody>
                      
                </tbody> 
                                   
    

                
            </table>
             
             
<div id="pageNavTransacciones" style="padding-top: 20px" align="center">
</div>
        
       <script type="text/javascript">
    var pager = new Pager('tabla', 3);
    pager.init();
    pager.showPageNav('pager', 'pageNavTransacciones');
    pager.showPage(1);
</script>    

<br/>

<div class="panel-default" >
            <div class="panel-heading">
            <h3 class="panel-title" align="center">Campos:</h3>
            </div>
            
  <div class="panel-body" >

<form role="form" method="POST" action="resevaHospedaje2.php">
        
      
      
                       
                    <div class="form-group">
                  <label for="Hotel" class="col-md-3">
                     Hotel:
                  </label>   
                  <div class="col-md-2">
                      <select name="hotel">
                   
                          
    <?php
                        echo "<option value=".$hotela.">".$hotela."</option>";  
                         echo "<option value=".$hotela." tipe >Cambiar</option>";
    
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
      
                         
                    <div class="form-group">
                  <label for="Hotel" class="col-md-3">
                   Fecha Inicio:
                  </label>   
                  <div class="col-md-2">
                      <select name="ini">
                   
                          
    <?php
                        echo "<option value=".$ini.">".$ini."</option>";
                        echo "<option value=".$ini." tipe >Cambiar</option>";
    
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
                
                             
                    <div class="form-group">
                  <label for="Hotel" class="col-md-3">
                   Fecha Fin:
                  </label>   
                  <div class="col-md-2">
                      <select name="fin">
                   
                          
    <?php
                        echo "<option value=".$fin.">".$fin."</option>";  
                        echo "<option value=".$fin." tipe >Cambiar</option>";
    
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
      

      
      
                   <div class="form-group">
                  <label for="tipo" class="col-md-3">
                   Introduzca el Tipo de habitacion:
                  </label>   
                  <div class="col-md-2">
                      <select name="tipo" onchange=>
                          <option value="0" >Seleccione un Tipo</option>
                          
    <?php
    $j=0;
    while ($j<$contador2){
                        echo "<option value=".$array3[$j].">".$array2[$j]."</option>";
                        $j++;
    }
     $pt=0;
                  while($pt<$m){
                      if($codigos[$pt]){
                      echo "<option value=".$codigos[$pt].">".$descripciones[$pt]."</option>";                
 
                           }
                      $pt++;
                  }
 
    ?>
                      </select>
                       </div><br/><br/>
                      
                 
                       
                      </div>   
     
                
    
                       
                       
       <?php
                

    
  
     ?>          
                   <div class="form-group">
                  <label for="paquete" class="col-md-3">
                      Paquete:
                  </label>   
                  <div class="col-md-2">
                      <select name="paquete" onchange=>
                   <option value="0">Seleccione un Paquete</option>
                          
    <?php
 
    while ($datos14 = mysql_fetch_assoc($busqueda1)){
                        echo "<option value=".$datos14['numero_paquete'].">".$datos14['descripcion']."</option>";                
    }
     
                          
                ?>
                        
                          
                 
   
    
                      </select>
                  </div><br/><br/>
                       
                  </div> 
    
                 <div class="form-group">
                  <label for="cantidad" class="col-md-3">
                    Cantidad:
                  </label>   
                     <div class="col-md-2">
                      <input title="Cantidad de habitaciones" type="text" class="form-control" name="cantidad" id="cantidad" placeholder="232" pattern="[0-9]"  required>
                    </div><br/><br/>
                       
                  </div> 
      
           
      
       <div class="form-group">
                  <label for="adic" class="col-md-3">
                    Numero Camas Adicionales:
                  </label>
                  <div class="col-md-2">
                      <input title="Introduzca el numero de Camas adicionales" type="text" class="form-control" name="adic" id="adic" placeholder="3"  required>
                  </div><br/><br/>
                </div> 
                        
              
      
      
        <div class="form-group">
                  <label for="cedula" class="col-md-3">
                    Cedula Cliente:
                  </label>
                  <div class="col-md-2">
                      <input title="Introduzca la cedula del cliente" type="text" class="form-control" name="cedula" id="cedula" placeholder="256021" required>
                  </div><br/><br/>
                </div>
      
      
       <label for="proce"  class="col-md-4">
                        Tipo de procedimiento:
                    </label> <br/>              
                        <label class="radio" >
                            <input type="radio" name="proce" id="Estado" value="hosp" required>
                            Hospedar
                        </label>
                        <label class="radio">
                            <input type="radio" name="proce" id="Estado" value="res" required>
                            Reservar
                        </label>
                    </div> 
                
                <br/><br/>
                
    
            <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button style=" position:absolute;
    left: 210px;
    " type="submit" name="Buscar" value="Buscar" class="btn btn-info" >
                        Aceptar
                      </button>
                  </div>
                 </div>
                   
            </div>
                
                    </div>
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button style=" position:absolute;
    left: 300px;
    " type="" name="" value="" onclick="javascript:window.open('http://localhost/bd2project/registro_cliente.php','','width=800,height=500,left=50,top=50,toolbar=yes');" class="btn btn-success" >
                        Registrar Usuario
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
</form><br/><br/>
</div>
</div>

          






    


                  
        </div>
            
        </div> 
         
        
           </div>
              <?php
                
    }
  
    ?>         
            

      
            
            
      
     

      <hr>

       <?php require_once('./modulos/footer.php'); ?> 
      <?php require_once('./modulos/scriptjs.php'); ?>

    </div> <!-- /container -->
  


    
    </body>
</html>
