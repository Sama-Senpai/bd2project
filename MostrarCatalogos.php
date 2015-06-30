<?php
 require_once('./modulos/header.php'); 

    
        
 require_once('./modulos/navbar.php'); 
 require_once('./modulos/scriptjs.php');  
 //require_once('../modulos/scriptjs.php');  

 ?>

<div class="jumbotron">
      <div class="container"  >
        <h1>Catologo de paquetes </h1>
        <p>En esta area se permite visualizar los paquetes agregados al sistema</p>
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
require_once("./BD/conexion.php");
//require_once("../BD/conexion.php");
        $sql="SELECT * from `catalogo_paquete` ";
        $datos = mysql_query($sql);
        if (!$datos)
            echo "no entro bien x.x";
 
        
// cambiar metodo

/*echo"
<form role=form method=\"POST\" action=\"../admin/index.php\">
*/
echo"
    <form role=form method=\"POST\" action=\"./index.php\">
<br>

<table id=Validar class=\"table table-bordered\">";
      echo "<thead>
           <tr>
                                
                 <th>Codigo de paquete</th>
                 <th>Vigencia</th>
                 <th>Descripcion</th>
                 <th>Descuento</th>
                                
                                
           </tr>
           </thead>
           <tbody> ";

while ($renglonConsulta = mysql_fetch_assoc($datos)){
      echo "<tr>";
      echo "<td>". $renglonConsulta['cod_cp']."</td>";
      echo "<td>". $renglonConsulta['vigencia']."</td>";
      echo "<td>". $renglonConsulta['descripcion']."</td>";
      echo "<td>". $renglonConsulta['descuento']."%</td>";
      //echo "<td>". $renglonConsulta['Monto']."</td>";
     // echo "<td>". $renglonConsulta['Fecha']."</td>";
     // echo "<td><input type=checkbox name=". $renglonConsulta['Id']." >". $renglonConsulta['Id_user']."<br></td>"; 
     // echo "<td><Input type = 'Radio' name =". $renglonConsulta['Id']." value= 'valida'>Validar&nbsp&nbsp";
     // echo "<Input type = 'Radio' name =". $renglonConsulta['Id']." value= 'no valida'>No Validar</td>";


      
      echo "</tr>";
} 
echo "
</tbody>    
</table>

<div class=\"span6\" style=\"text-align:center\">

    <button type=\"submit\" name=\"Crear\" class=\"btn btn-info\" >
                        Volver
    </button>
</div>
</FORM>";         
echo "</div>";
echo "</div>";
echo "</div>";
echo "<hr>";
    
?>
<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8" align="center">
    <img src="./img/foobar.png" align="center">

<!--<img src="../img/foobar.png" align="center">-->
    </div>
</footer>