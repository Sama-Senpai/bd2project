<?php require_once('./modulos/header.php'); ?>
<?php require_once('./BD/conexion.php'); ?>

           
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
      
        
        
<?php require_once('./modulos/navbar.php'); ?>    


        
      <?php


if ( (!$hotela=filter_input(INPUT_POST, 'hotel')) && !($hotela=filter_input(INPUT_GET, 'hotel')) ){

    ?>
        
        

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Confirmacion de Reserva</h1>
        <p>Ingresa El hotel, la cedula, y el cliente que desea ver la reserva.</p>
      </div>
    </div>
 <?php require_once('./scripts/alertas.php'); ?>
    
    
          
    <div class="container">
        
    <form role="form" method="POST" action="confirmacionReserva.php">
        
        <div class="form-group">
                  <label for="cedula" class="col-md-2">
                    Cedula Cliente:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca la cedula del cliente" type="text" class="form-control" name="cedula" id="cedula" placeholder="256021" required>
                  </div><br/><br/>
                </div>
        
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
                    Fecha inicio:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca la fecha de Fin" type="date" class="form-control" name="fin" id="fin" placeholder="20%" required>
                  </div><br/><br/>
                </div> 
        
         
    
            <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button type="submit" name="Buscar" value="Buscar"class="btn btn-info" >
                        Buscar
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
</form><br/><br/><br/><br/>

 <?php
                
    }
  
    ?>
  
        



     
             <?php

         
     if(filter_input(INPUT_POST, 'hotel')){
          $hotela=filter_input(INPUT_POST, 'hotel');
          $ini=filter_input(INPUT_POST, 'ini');
          $fin=filter_input(INPUT_POST, 'fin');
          $cedula=filter_input(INPUT_POST, 'cedula');
     }
     if(filter_input(INPUT_GET,"hotel")){
      $hotela=filter_input(INPUT_GET,"hotel");
      $ini=filter_input(INPUT_GET,"ini");
      $fin=filter_input(INPUT_GET,"fin");
      $cedula=filter_input(INPUT_GET, 'cedula');
     }
   
    
if ($hotela) {
       
    
      
      
           $fechaAct = date("Y-m-d");  
        $query1 = "CALL conf_rooms ('$hotela', '$cedula','$ini', '$fin');";
        
        $busqueda1 = mysql_query($query1);
        
        if(!$busqueda1){
            header("Location:./confirmacionReserva.php?errorCode=9&errorType=2");
        }
        
        
        $contador=0;
         while ($registro= mysql_fetch_assoc($busqueda1)){
                      
                     
                        if($contador==0){
                            $pagado=$registro['pagado'];
                            $montoTotal=$registro['p_cd'];
                            $adicionales=$registro['camas_adicionales'];
                        }
                                           
                              $arrayHab[$contador]= $registro['nPuerta'];  
                               
                                 $contador ++;                        
                               
         }
        
        mysql_free_result($busqueda1);
                      
               
    ?>
             
                        <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Confirmacion de Reserva</h1>
        <p>Despues del que cliente confirme el pato precione el boton "confirmar"</p>
      </div>
    </div>
 <?php require_once('./scripts/alertas.php'); ?>
    
    
          
    <div class="container">
             
       <!-- Example row of columns -->
      <div class="row">
          
          
        <div class="col-lg-8">

          
            
         <div class="table-responsive">   
         


              
         <table width="300" border="0" cellspacing="0" cellpadding="1"> 
<tr bgcolor="blue" align="center"> 
<td><b><font color="#FFFFFF">Confirmacion de Reserva</font></b></td> 
</tr> 
<tr bgcolor="blue"> 
<td> 
<table width="100%" border="0" cellspacing="0" cellpadding="5"> 
<tr bgcolor="#FFFFFF"> 
<td>Fecha: <?php echo $fechaAct; ?>-----Hotelid:  <?php echo $hotela; ?>   -------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>/////////////////// Inf Precio ///////////////////////
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
<tr bgcolor="#FFFFFF"> 
<td>Monto Pagado: <?php 
echo $pagado;
?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Monto a Pagar: <?php echo $apagar=$montoTotal-$pagado ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>/////////////////Info Hospedaje/////////////////
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Habitaciones: <?php $j=0;
if($j<$contador){
    echo "-";
    echo $arrayHab[$j];
    $j++;
}
?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Camas/hab:  <?php echo $adicionales;  ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>//////////////////////Info Cliente///////////////////////
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
<tr bgcolor="#FFFFFF"> 
<td>Ci: <?php echo $cedula; ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>------------------------------------------------------
    </td> 
</tr>
</table> 
</td> 
</tr> 
</table> 
             <button type="submit" onclick = "location='http://localhost/bd2project/BD/reservaHospedaje/confirmarReserva.php?hotel=<?php echo $hotela; ?>&ini=<?php echo $ini; ?>&fin=<?php echo $fin; ?>&cedula=<?php echo $cedula; ?>'" class="btn btn-success" >Confirmar</button>
                     
       
             
             
             
             



         <?php
                
    }
  
    ?>     


                  
        </div>
            
        </div>    
            
        
          
             
            

      
            
            
            
<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>

<?php require_once('./modulos/footer.php'); ?> 
      
      
    </div> <!-- /container -->

<?php require_once('./modulos/scriptjs.php'); ?> 
    
    </body>
</html>
