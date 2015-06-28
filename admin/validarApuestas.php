<?php
 require_once('./modulos/header.php'); 

    
        
 require_once('./modulos/navbar.php'); 
 
 require_once('../modulos/scriptjs.php');  

 ?>

<div class="jumbotron">
      <div class="container"  >
        <h1>Gestión de Apuestas </h1>
        <p>Esta área es permite aceptar o rechazar las apuestas del cliente. Es necesario rellenar los siguientes campos:</p>
      </div>
    </div> 
    <div class="container" >
    <div class="col-lg-12 ">    
      <div class="row" > 
         
<?php 

echo "<div class=\"row\">";
echo "<div class=\"col-lg-12\">";
      echo "  <div class=\"col-lg-12\">";

//echo "APROBADAS TODAS LAS APUESTAS";

echo "</div>";
$pendiente= 0;
require_once("../BD/conexion.php");
        $sql="SELECT * from `Apuestas` WHERE `Estado`='$pendiente'";
        $datos = mysql_query($sql);
        if (!$datos)
            echo "no entro bien x.x";
 
        

echo"
<form role=form method=\"POST\" action=\"../BD/admin/actualizarEstadoApuestas.php\">

<b>Seleccione a continuacion las apuestas que desea validar:</b><br>

<table id=Validar class=\"table table-bordered\">";
      echo "<thead>
           <tr>
                                
                 <th>Id Apuesta</th>
                 <th>Id Usuario</th>
                 <th>Id Mesa</th>
                 <th>Id Juego</th>
                 <th>Monto</th>
                 <th>Fecha</th>
                 <th>Opciones</th>
                                
                                
           </tr>
           </thead>
           <tbody> ";

while ($renglonConsulta = mysql_fetch_assoc($datos)){
      echo "<tr>";
      echo "<td>". $renglonConsulta['Id']."</td>";
      echo "<td>". $renglonConsulta['Id_user']."</td>";
      echo "<td>". $renglonConsulta['Id_mesa']."</td>";
      echo "<td>". $renglonConsulta['Id_juego']."</td>";
      echo "<td>". $renglonConsulta['Monto']."</td>";
      echo "<td>". $renglonConsulta['Fecha']."</td>";
     // echo "<td><input type=checkbox name=". $renglonConsulta['Id']." >". $renglonConsulta['Id_user']."<br></td>"; 
      echo "<td><Input type = 'Radio' name =". $renglonConsulta['Id']." value= 'valida'>Validar&nbsp&nbsp";
      echo "<Input type = 'Radio' name =". $renglonConsulta['Id']." value= 'no valida'>No Validar</td>";


      
      echo "</tr>";
} 
echo "
</tbody>    
</table>

<div class=\"span6\" style=\"text-align:center\">
<input TYPE=submit class=\"btn btn-default\" NAME=OK VALUE=\"Continuar\"><BR>
</div>
</FORM>";         
echo "</div>";
echo "</div>";
echo "</div>";
echo "<hr>";
    
?>
<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>