<?php

 require_once('./modulos/header.php'); 

    
        
 require_once('./modulos/navbar.php'); 
 
 require_once('../modulos/scriptjs.php'); 


?>
<?php 
// Datos de la Conexion a la Base de Datos
	$host	= "localhost";
	$db	= "proyecto_bd2_hotel";
	$user	= "root";
	$password = "";
	// Abrir la Conexión
	$conex=@mysql_connect("$host","$user","$password");

	if(!$conex)
	{
		echo "Error al Intentar Conectarse con la Base de Datos";
		exit();
	}

	// Elegir una Base de Datos
	if(!@mysql_select_db("$db",$conex))
	{
		echo "No se pudo conectar correctamente con la Base de datos";
		exit();
	}
?>
<div class="jumbotron">
        
        
      <div class="container">
        <h1>Agregar Habitacion</h1>
        <p>En esta parte puede agregar Habitaciones a cada hotel</p>
      </div>
    </div>

<?php


if ( !($hotela=filter_input(INPUT_POST, 'hotel')) ){

    ?>
    <form role="form" method="POST" action="agregarHabitacionInd.php">
        
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


if ( $hotela=filter_input(INPUT_POST, 'hotel') ){

    ?>
   <?php
   // $query9 = "SELECT *";
   $valor="0";
    $query9= "SELECT habitacion_hotel.Hotel_cod,habitacion_hotel.catalogo_habitacion_cod_ch, habitacion_hotel.cantidad FROM habitacion_hotel WHERE habitacion_hotel.Hotel_cod=$hotela AND habitacion_hotel.poseeHab=$valor ";
    $query = "CALL unirHabitacionesAgre('$hotela')";
  
 
    
      
     
      
       
   
    
    
    
     ?>
                <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Campos:</h3>
            </div>
            <div class="span6" style="text-align:center">
               
                <form role="form" method="POST" action="../BD/admin/nuevaHabitacion.php">
                    
                    <div class="form-group">
                  <label for="Hotel" class="col-md-2">
                   Introduzca el Hotel:
                  </label>   
                  <div class="col-md-10">
                      <select name="hotel">
                   
                          
    <?php
                        echo "<option value=".$hotela.">".$hotela."</option>";                
    
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
                    
                    
                   <div class="form-group">
                  <label for="Tipo" class="col-md-2">
                    Tipo:
                  </label>   
                  <div class="col-md-10">
                      <select name="tipo">
                          
    <?php
 
    
     
 
     
        $bus = mysql_query($query9);
  
      
    while ($datos9 = mysql_fetch_assoc($bus)){
                        
                        echo "<option value=".$datos9['catalogo_habitacion_cod_ch'].">".$datos9['catalogo_habitacion_cod_ch']." +".$datos9['cantidad']."</option>";
                  
                     
    }
    mysql_free_result($bus);
    
   
      ?>
                          
      <?php
  
  
   $busqueda = mysql_query($query);
     
    while ($dato =  mysql_fetch_array($busqueda)){
                      $resultado = $dato['cantidad']-$dato['cuenta'];
                      if($resultado>=1){
                          
                        echo "<option value=".$dato['cod_CH'].">".$dato['cod_CH']." +".$resultado."</option>";
                      }
    }
    mysql_free_result($busqueda);
    
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div>
                
                  <div class="form-group">
                  <label for="num" class="col-md-2">
                    Numero de la Habitacion:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de la habitacion en el hotel" type="text" class="form-control" name="num" id="num" placeholder="C321" required>
                  </div><br/><br/>
                </div>
                
                 <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button type="submit" name="agregar" value="agregar"class="btn btn-info" >
                        Agregar
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
                    
             
                 </div> 

    </form><br/><br/><br/><br/>
    
               <div class="col-md-3">
                  <button name="atras" value="atras"  onClick="location.href='agregarHabitacionInd.php'" class="btn btn-link" >
                        << Seleccionar otro Hotel
                      </button>
                </div>
  </div>
    <?php               
}
?>
<hr>

<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>
      
      
   

 