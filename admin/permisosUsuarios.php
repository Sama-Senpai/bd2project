<?php
include '../BD/conexion.php';
 require_once('./modulos/header.php'); 

    
        
 require_once('./modulos/navbar.php'); 
 
 require_once('../modulos/scriptjs.php'); 


?>
<div class="jumbotron">
        
        
      <div class="container">
        <h1>Permisos de Usuarios</h1>
        <p>En esta parte puede otorgar y remover permisos de administrador a los Usuarios.</p>
      </div>
    </div>
    <form role="form" method="POST" action="permisosUsuarios.php">
            <div class="form-group">
                  <label for="Id_usuario" class="col-md-2">
                    Introduzca el id del usuario:
                  </label>
                  <div class="col-md-4">
                      <input title="" type="text" class="form-control" name="Id_usuario" id="Id_usuario" placeholder="V-123456" required>
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

 <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="panel-default" >
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Usuarios</h3>
            </div>
            <div class="span6" style="text-align:center">
<?php

$ciPermisos="";
if ($_REQUEST){
$ciPermisos = $_POST['Id_usuario'];
//echo $ciPermisos;

    $query = "SELECT * FROM `Usuarios` WHERE `Ci`='$ciPermisos'";
    $busqueda = mysql_query($query);
    echo '<table>';?>
      <table id="tablaPermisos" class="table table-bordered" border="1" align="center" width="100%" border="0" cellpadding="0" cellspacing="1">
            <thead>
                <tr>
                                
                                <th>Ci</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Permisos</th>
                    <!--            <th>Capacidad</th> -->
                                
                                
                </tr>
                </thead>
                <tbody> <?php
    
    while ($datos = mysql_fetch_assoc($busqueda)){
        echo "<tr>";
        echo "<td>".$datos['Ci']."</td>";
        echo "<td>".$datos['Nombre']."</td>";
        echo "<td>".$datos['Apellido']."</td>";
        echo "<td>".$datos['Telefono']."</td>";
        echo "<td>".$datos['Correo']."</td>";
       // echo '<td>'.$datos['Direccion'].'</td>';
        if ($datos['Permisos']==255)
            echo "<td>Admin</td>";
        else
            echo "<td>Normal</td>";
        echo "</tr>"; 
                
    }
    echo "</table>";
    ?>
   <button type="button" class="btn btn-default" onclick="location.href='../BD/admin/editarPermisos.php?Tipo=<?php echo 1 ?>&Ci=<?php echo $ciPermisos ?>'">Dar Permisos Admin</button>
   <button type="button" class="btn btn-default" onclick="location.href='../BD/admin/editarPermisos.php?Tipo=<?php echo 0 ?>&Ci=<?php echo $ciPermisos ?>'">Dar Permisos Normales</button>
   <?php
}          

?>
  </div>
<hr>

<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>
      
      
   

 