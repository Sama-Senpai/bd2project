<script src="js/main.js"></script>
<?php   
        // Conexion
        include '../conexion.php';

	// Recibe las Variables
	$cedula         = filter_input(INPUT_POST, 'cedula');
        $firstname	= filter_input(INPUT_POST, 'firstname');
	$telefono	= filter_input(INPUT_POST, 'telefono');
        $direccion	= filter_input(INPUT_POST, 'direccion');
        $emailaddress	= filter_input(INPUT_POST, 'emailaddress');
        $nacimiento	= filter_input(INPUT_POST, 'nacimiento');
        
        
        
        
        date_default_timezone_set ("America/Caracas");
        
        // Nacimiento del usuario
        list($diaU, $mesU, $anioU)=explode('/',$nacimiento);
        // Fecha Actual
        $fecha = date("d/m/Y");
        list($dia, $mes, $anio)=explode('/',$fecha);
        // Hora Actual
        $datos_tiempo = date("g-i-A"); 
        list($hour, $minuto, $ampm)=explode('-',$datos_tiempo);
        $hora = $hour.":".$minuto." ".$ampm;        // Hora actual
        
        $ano = $anio;
        if (($ano - $anioU) == 18){
            if (($mesU == $mes) && ($diaU > $dia)) {
                $ano=($ano-1); }
            if ($mesU > $mes) {
                $ano=($ano-1);            
            }
        }
        $edad=($ano-$anioU);
        
        // Verifica si la Ci ingresada existe en la base de datos
        $queryCI = mysql_num_rows(mysql_query("SELECT * FROM cliente WHERE Ci='$cedula'"));
        $queryEmail = mysql_num_rows(mysql_query("SELECT * FROM cliente WHERE Correo='$emailaddress'"));
        
        if(($queryCI > 0) || ($queryEmail > 0)){    // Si la Ci o el Correo existe
            if($queryCI > 0){
                header("Location:../../registro.php?errorCode=8&errorType=1");
            }
            if($queryEmail > 0){
                header("Location:../../registro.php?errorCode=9&errorType=1");
            }
        }else{      // Si la Ci no existe
            
           

                if (!$firstname || !$cedula || !$emailaddress || !$nacimiento || !$telefono || !$direccion){
                    header("Location:../../registro.php?errorCode=5&errorType=4");
                }else{      // Si todos los campos estan llenos
                       

                        // SQL
                        $query = mysql_query("INSERT INTO cliente
                                                    (
                                                    Ci,nombre,n_tlf,direccion,dir_elec,f_nac
                                                    )
                                                    VALUES
                                                    (
                                                    '$cedula','$firstname','$telefono','$direccion','$emailaddress','$nacimiento'
                                                    )
                                            ");
                 
                        header("Location:../../registro_cliente.php");
                    
                }
            
        }
?>
