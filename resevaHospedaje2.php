<?php require_once('./BD/conexion.php');


   $bandera=0;
       $hotel=filter_input(INPUT_POST, 'hotel');
      $ini=filter_input(INPUT_POST, 'ini');
      $fin=filter_input(INPUT_POST, 'fin');
       $tipo=filter_input(INPUT_POST, 'tipo');
       $cantidad=filter_input(INPUT_POST, 'cantidad');
     
          $paquete=filter_input(INPUT_POST, 'paquete');
       
        $adic=filter_input(INPUT_POST, 'adic');
    
          $cedula=filter_input(INPUT_POST, 'cedula');
    
       $proce=filter_input(INPUT_POST, 'proce');
       
       //Validar que haya tipo de habitacion
             if(!$tipo){
                    
                    $bandera=1;
           
       header("Location:./reservaHospedaje1.php?errorCode=5&errorType=4");
      
                }
       
       
       
       //Validar que el numero de camas adicionales no exeda al numero de adicionales de la hab
          $validarCamasCat = mysql_query("SELECT * FROM habitacion_hotel WHERE Hotel_cod='$hotel' AND catalogo_habitacion_cod_ch='$tipo'");
           $resultadoVcamasCat=mysql_fetch_assoc($validarCamasCat);
               
        
                if(($resultadoVcamasCat['NroAdicionales']<$adic)){
                    
                    $bandera=1;
           
       header("Location:./reservaHospedaje1.php?errorCode=3&errorType=4&hotel=$hotel&ini=$ini&fin=$fin");
      
                }
                
                //Validar fecha insonsitencia
                    if($ini>$fin){
                    
                    $bandera=1;
           
       header("Location:./reservaHospedaje1.php?errorCode=4&errorType=4");
      
                }
       
       
       
       //Validacion de que queden camas adicionales en el hotel 
           $validarCamas = mysql_query("SELECT * FROM hotel WHERE cod_hotel='$hotel'");
           $resultadoVcamas=mysql_fetch_assoc($validarCamas);
               
       $camasHotel= $resultadoVcamas['numero_camas_dips'];
                if(($camasHotel<($adic*$cantidad))){
                    echo 'No hay camas adicionales en este hotel';
                    $bandera=1;
           
       header("Location:./reservaHospedaje1.php?errorCode=2&errorType=4&hotel=$hotel&ini=$ini&fin=$fin");
      
                }
       
       
       
         //Validacion de que exista el cliente
           $validarCliente = mysql_query("SELECT * FROM cliente WHERE CI='$cedula'");
           $resultadoCliente=mysql_fetch_assoc($validarCliente);
           
                if(!$resultadoCliente){
                    echo 'El cliente no esta agregado';
                    $bandera=1;
           
       header("Location:./reservaHospedaje1.php?errorCode=1&errorType=4&hotel=$hotel&ini=$ini&fin=$fin");
      
                }else{
                $nombreCliente=$resultadoCliente['nombre'];
                }
       
       
         $fechaAct = date("Y-m-d");   
          
          //Aca arriba van las validaciones
          
        
          
            //Calculo de dias entre las dos fechas
        
        $inicio = strtotime($ini);
        $fin2 = strtotime($fin);
       
        $dif = $fin2 - $inicio;
       
         $dias = (( ( $dif / 60 ) / 60 ) / 24);
        
        
        //Calculo Descuento
         
         if($paquete){
            
          $query3 = mysql_query("SELECT * 
                 FROM `catalogo_paquete` 
                 WHERE `catalogo_paquete`.`cod_cp`='$paquete'");
          
          $resultado3=mysql_fetch_assoc($query3);
          
         $descuentoPaquete=$resultado3['descuento'];
         $descripcionPaquete=$resultado3['descripcion'];
         
          
         }
          
          
         //Calculo del precio               
          $query2 = mysql_query("SELECT * FROM habitacion_hotel WHERE Hotel_cod='$hotel' AND catalogo_habitacion_cod_ch='$tipo'");
          $resultado1=mysql_fetch_assoc($query2);
          
          $nombreTipo= $resultado1['descripcion'];
         $precioDia=$resultado1['precio_dia'];
      
           $precioCamaDia=$resultado1['precio_dia']/4;
          
          $precioCama=$precioCamaDia*$adic;
          $precioporHabitacion=$precioDia+$precioCama;
          $montoTotalSin= (($precioDia+$precioCama)*$dias);
          $montoTotalCon=($montoTotalSin*($descuentoPaquete/100));
        
          if($proce=="hosp"){
             if(!$paquete){
              $pagado=$montoTotalSin;
              $montoTotal=$montoTotalSin;
             }else{
               $pagado=$montoTotalCon;
                $montoTotal=$montoTotalCon;
             }
              $rc="1";
          }else{
              
                if(!$paquete){
                 $montoTotal=$montoTotalsin;
                 $pagado=$montoTotalSin*(0.20);
             }else{
                 $montoTotal=$montoTotalCon;
                 $pagado=$montoTotalCon*(0.20);
          
             }
           
              $rc="0";
              
          }
          
          $cod="";
         //Los querys 
          
         //$query1= "CALL free_rooms ('$hotel','$tipo','$ini','$fin')"; 
         $query1="SELECT habitacion.n_hab
FROM habitacion
WHERE habitacion.cod_hotel='$hotel' AND 
      habitacion.cod_CH='$tipo' AND
      habitacion.n_hab!=( SELECT reserva_hospedaje.numero_hab
                          FROM reserva_hospedaje
                          WHERE reserva_hospedaje.cod_hotel='$hotel' AND 
                                reserva_hospedaje.cod_CH='$tipo' AND
                                (reserva_hospedaje.rc='1' OR reserva_hospedaje.rc='2' OR  reserva_hospedaje.rc='0') AND
                                reserva_hospedaje.f_inicio<'$fin' AND reserva_hospedaje.f_fin>'$ini')";
         $busqueda1 = mysql_query($query1);
  
     $i=0;
     
     
     if($bandera==0){
         $camasNuevas=($camasHotel-($adic*$cantidad));
         
         $queryActHab= mysql_query(" UPDATE hotel
   SET n_hab='$camasNuevas'
   WHERE cod_hotel='$hotel'");
         
    while ($i<$cantidad){
        $datos1 = mysql_fetch_assoc($busqueda1);
   
      $nHab[$i]=$datos1['n_hab'];
       $queryFinal2 = mysql_query("INSERT INTO reserva_hospedaje (id_reserva, Cliente_CI, cod_hotel, cod_CH, numero_paquete, numero_hab, f_inicio, f_fin, f_reserva, pagado, rc, camas_adicionales, p_cd)
VALUES ('$cod', '$cedula', '$hotel', '$tipo', '$paquete', '$nHab[$i]', '$ini', '$fin', '$fechaAct', '$pagado', '$rc', '$adic', '$montoTotal');
");
     $i++;
     
     
    }
     }
     
     

?>

           
 <?php require_once('./modulos/header.php'); ?>
     
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
   
<?php require_once('./modulos/navbar.php'); ?>   
   
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Factura de Reserva/hospedaje</h1>
        <p>Luego de confirmar los datos puede continuar.</p>
      </div>
    </div>

    
    
          
    <div class="container">
        
        
         <table width="300" border="0" cellspacing="0" cellpadding="1"> 
<tr bgcolor="blue" align="center"> 
<td><b><font color="#FFFFFF">Informacion de Reserva/Hospedaje</font></b></td> 
</tr> 
<tr bgcolor="blue"> 
<td> 
<table width="100%" border="0" cellspacing="0" cellpadding="5"> 
<tr bgcolor="#FFFFFF"> 
<td>Fecha: <?php echo $fechaAct; ?>----- Nombre Hotel  -------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>/////////////////// Inf Precio ///////////////////////
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>Precio/Habitacion: <?php echo $precioporHabitacion; ?>
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>Numero Dias: <?php echo $dias; ?>
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>Numero Hab: <?php echo $cantidad; ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Descuento:   <?php echo $descuentoPaquete; ?> %
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Monto Total: <?php 
if($paquete){
echo $montoTotalCon;
}else{
 echo $montoTotalSin;
}
?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Monto Pagado: <?php echo $pagado; ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr> 
<tr bgcolor="#FFFFFF"> 
<td>/////////////////Info Reserva/hospedaje/////////////////
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>--------------------------------------------------------
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Habitaciones: <?php    $j=0;
    while ($j<$cantidad){
   echo $nHab[$j];
   echo "-";
     $j++;} ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Camas/hab:  <?php echo $adic; ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Nombre Paquete: <?php echo $descripcionPaquete; ?>
    </td> 
</tr>
<tr bgcolor="#FFFFFF"> 
<td>Tipo Habitacion:  <?php echo $nombreTipo; ?>
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
<td>Nombre: <?php echo $nombreCliente; ?>
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
        
        
    </div>
      
<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>

<?php require_once('./modulos/footer.php'); ?> 
      
      
    </div> <!-- /container -->

<?php require_once('./modulos/scriptjs.php'); ?> 
    
    </body>
</html>
