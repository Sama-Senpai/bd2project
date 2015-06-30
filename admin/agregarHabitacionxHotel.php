<?php

 require_once('./modulos/header.php'); 

    
 require_once('../BD/conexion.php');
 require_once('./modulos/navbar.php'); 
 
 require_once('../modulos/scriptjs.php'); 


?>

<div class="jumbotron">
        
        
      <div class="container">
        <h1>Agregar Habitacion</h1>
        <p>En esta parte puede agregar Habitaciones a cada hotel</p>
      </div>
    </div>
<?php include '../scripts/alertas.php'; ?>


<form role="form" method="POST" action="../BD/admin/nuevaHabitacionXhotel.php">
        
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
 
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
        
        
               
                <?php
                

    
    $query2 = "SELECT * FROM `catalogo_habitacion`";
    $busqueda2 = mysql_query($query2);
     ?>          
                   <div class="form-group">
                  <label for="tipo" class="col-md-2">
                   Introduzca el Tipo:
                  </label>   
                  <div class="col-md-10">
                      <select name="tipo" onchange=>
                   <option value="0">Seleccione un Tipo</option>
                          
    <?php
 
    while ($datos2 = mysql_fetch_assoc($busqueda2)){
                        echo "<option value=".$datos2['cod_ch'].">".$datos2['descripcion']."</option>";                
    }
 
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
        
        <div class="form-group">
                  <label for="precio" class="col-md-2">
                    Precio:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el Precio de la Habitacion" type="text" class="form-control" name="precio" id="precio" placeholder="1400" required>
                  </div><br/><br/>
                </div>
        
                <div class="form-group">
                  <label for="desp" class="col-md-2">
                    Descripcion:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca Una descripcion para la habitacion" type="text" class="form-control" name="desp" id="desp" placeholder="Habitacion doble" required>
                  </div><br/><br/>
                </div>
        
        <div class="form-group">
                  <label for="cant" class="col-md-2">
                    Cantidad de habitaciones:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca la cantidad de habitaciones que hay de este tipo" type="text" class="form-control" name="cant" id="cant" placeholder="#" required>
                  </div><br/><br/>
                </div>
                <div class="form-group">
                  <label for="cam" class="col-md-2">
                    Camas Adicionales:
                  </label>
                  <div class="col-md-10">
                      <input title="Introduzca el numero de camas adicionales" type="text" class="form-control" name="cam" id="cam" placeholder="#" required>
                  </div><br/><br/>
                </div>
        
        
        
    
        
        
        
        
            <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button type="submit" name="Buscar" value="Buscar"class="btn btn-info" >
                        Agregar
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
</form><br/><br/><br/><br/>

 
<hr>

<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>