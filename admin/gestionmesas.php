<html lang="es">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    
    <!DOCTYPE html>
<html lang="es">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="shortcut icon" href="../favicon.ico?v=2" />

        <script src="./js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="./js/main.js"></script>
        <script src="./js/__jquery.tablesorter/jquery-latest.js" type="text/javascript"></script>
        <script src="./js/__jquery.tablesorter/jquery.tablesorter.js" type="text/javascript"></script>
        </head>
    <script type="text/javascript" >
        $(document).ready(function() 
    { 
        $("#tabla").tablesorter(); 
    } 
); </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
     <!--  <p>epale</p>-->

<?php require_once('./modulos/navbar.php'); ?> 
<?php require_once('../modulos/scriptjs.php'); ?>  
 
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        
        
      <div class="container">
        <h1>Gestión de Mesas</h1>
        <p>Parte encargada de toda la administración de las mesas que darán base a los juegos y apuestas del usuario.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-12">
      <!--    <h2>Gestion de Mesas</h2> 
          <p>epaleeee</p> -->
      
      
      <?php
         /*   $filas=2;
            $columnas=4;
            $tipos = array("premium","normal");
            $descripcion = array("Esta la mesa es para futbol","Esta es la mesa para tenis");
            $deporte = array ("Real Madrid vs Barcelona","Federer vs Nadal");
            $capacidad = array ("1/100","2/100");
        
            echo "<div class=\"table-responsive\">";   
            echo "<table class=\"table table-bordered\">"; 
            echo "<thead>
                <tr>
                                
                                <th>Mesa</th>
                                <th>Descripcion</th>
                                <th>Deporte</th>
                                <th >Capacidad</th>
                </tr>
                </thead>";
            
           echo "<tbody>";
            for ($i = 0 ; $i < $filas ; $i++){
                echo "<tr>
                                <td data-title=\"Tipo\"> $tipos[$i] </td>
                                <td data-title=\"descripcion\">$descripcion[$i]</td>
                                <td data-title=\"deporte\"> $deporte[$i]</td>
                                <td data-title=\"capacidad\">$capacidad[$i]</td>
                        </tr>";
            }
             echo" </tbody>
             </table>
        </div>";*/
                
      
        require_once("../BD/conexion.php");
        $sql = "select * from Mesas";
        $datos = mysql_query($sql,$conex);    
        
           // echo "<div >";  ?> 
      
      <table id="tabla" class="table table-bordered" border="1" align="center" width="100%" border="0" cellpadding="0" cellspacing="1">
            <thead>
                <tr>
                                <th>Id</th>
                                <th>Mesa</th>
                                <th>Descripcion</th>
                                <th>Deporte</th>
                    <!--            <th>Capacidad</th> -->
                                
                                
                </tr>
                </thead>
                <tbody> 
         <?php
            
        while( $renglon = mysql_fetch_array($datos)){
          
            
            if ($renglon['Estado']){
                echo "<tr>";
            echo "<td>".$renglon['Id']."</td>";        
            echo "<td>".$renglon['Mesa']."</td>";
            echo "<td>". $renglon['Descripcion']."</td>";
            echo "<td>". $renglon['Deporte']."</td>";
          //  echo "<td>". $renglon['Capacidad']."</td>";
           ?>
            <td><a href="editarMesa.php?mesa=<?php echo $renglon['Id'] ?>"/>Editar</a>
               &nbsp&nbsp<a href="../BD/Mesa/mesaBorrar.php?Id=<?php echo $renglon['Id'] ?>"/>Borrar</a></td><?php
            echo "</tr>";
            }
           
        }
        mysql_close();
        ?>
        </tbody>
        </table>
        
        
          
        
        
          
    </div>
      </div>
    </div>
      
    
    

      <div class="row">
        <div class="span6" style="text-align:center">
            
            <button type="button" class="btn btn-default" onclick="location.href='crearMesa.php'">Crear</button>
           <!-- <button type="button" class="btn btn-default">Editar</button>
            <button type="button" class="btn btn-default">Eliminar</button>-->
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
      
      
    </div> <!-- /container -->

   
    
    </body>
</html>

