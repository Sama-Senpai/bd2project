<!--<script>           
        function delayer(){
            window.location = "./login.php";
        }
        function validarCarrito(){
                setTimeout('delayer()', 1);          
        }
    validarCarrito();   
</script>-->

<?php

    if (session_status() !== PHP_SESSION_ACTIVE) {
       session_start();
       }
                    
    include(dirname(dirname(__FILE__)).'/conexion.php');
        // Fecha Actual
        $fecha = date("d/m/Y");
        list($dia, $mes, $anio)=explode('/',$fecha);
        // Hora Actual
        $datos_tiempo = date("g-i-A"); 
        list($hour, $minuto, $ampm)=explode('-',$datos_tiempo);
        $hora = $hour.":".$minuto." ".$ampm;        // Hora actual
        //
    if(isset($_SESSION['username'])){  //Subimos a la base de datos
        $user = $_SESSION['ci'];
        $consultatrans = "SELECT  `Saldo` FROM  `transacciones` WHERE  `Ci` =  '$user' ORDER BY  `Id` DESC" ;
        $datossaldo= mysql_query($consultatrans,$conex) or die ("<p> No se ha podido ejecutar"
                . "la consulta, compurebe que la sintaxis sea correcta. <p>");
        $ultimosaldo = mysql_fetch_row($datossaldo);
        $monto = 0;
        for ($i=0;$i<$_SESSION['juegos'];$i++){   
                $monto = $monto + $_SESSION['carrito'][$i][1];
        }
        if($ultimosaldo[0]>=$monto){
            $consultapuesta= "SELECT `Grupo` FROM apuestas ORDER BY Grupo DESC";
            $datosapuesta= mysql_query($consultapuesta,$conex) or die ("<p> No se ha podido ejecutar"
                . "la consulta, compurebe que la sintaxis sea correcta. <p>");
            $ultimogrupo= mysql_fetch_row($datosapuesta);

            if($ultimogrupo){
                //$ultimogrupo;
                echo $ultimogrupo[0]++;
            }else{
                $ultimogrupo[0]=1;
            }
             echo $ultimosaldo[0];
            echo $monto;
            $ultimosaldo[0] = $ultimosaldo[0] - $monto;
           
            $query=  mysql_query ("INSERT INTO `transacciones`( `Ci`, `Tipo_de_transaccion`, `Monto`, `Fecha`, `Hora`, `Saldo`) 
                    VALUE ('$user','Cobro de Apuesta','$monto','$fecha','$hora','$ultimosaldo[0]')");

            for ($i=0;$i<$_SESSION['juegos'];$i++){   
                $monto = $_SESSION['carrito'][$i][1];
                $idm = $_SESSION['carrito'][$i][2];
                $LoV = $_SESSION['carrito'][$i][3];
                $idj = $_SESSION['carrito'][$i][4];
                $query = mysql_query("INSERT INTO `apuestas`(`Id_user`,`Id_mesa`, `Id_juego`, `Equipo`, `Monto`, `Fecha`, `Hora`, `Estado`, `Grupo`) 
                         VALUE ('$user','$idm','$idj','$LoV','$monto','$fecha','$hora','0','$ultimogrupo[0]')  ");
            }
            $juegos=0;
            $carrito=array();
            for($i=0;$i<5;$i++){ 
                $carrito[$i]=array(); 
            }    
            $_SESSION['carrito'] = $carrito; 
            $_SESSION['juegos'] = $juegos;

            if(!$query || !$query1){
               echo 'Error al insertar una apuesta en la BD';
            }else
               echo 'Exito';

             // Redireccion
             mysql_close();
             header("Location: ../../index.php");            
        }else{
            $mesa = $_SESSION['carrito'][0][2];
        ?>    <script> 
                function delayer(){
                    window.location = "../../juegos.php?array=<?php echo $mesa; ?>";
                }
                function validarCarrito(){
                        window.alert("Su saldo no es suficiente para apostar sobre el monto del carrito"); 
                        setTimeout('delayer()', 1);    
                }
                validarCarrito();
                 
            </script>
           <?php mysql_close();
            
        }
       
    
    }else{  //Logeamos 
        
        $mesa = $_SESSION['carrito'][0][2];
        header("Location: ../../login.php?idMesa=$mesa;");
    }
        
    
 ?>

	
