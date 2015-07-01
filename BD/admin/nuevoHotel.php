<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $nombreH=filter_input(INPUT_POST, 'nombreH');
        $riff=filter_input(INPUT_POST, 'riff');
        $direccion=filter_input(INPUT_POST, 'direccion');
        $direE=filter_input(INPUT_POST, 'direE');
        $tlf=filter_input(INPUT_POST, 'tlf');
        $cam=filter_input(INPUT_POST, 'cam');
        $cam1=$cam;
        $cod="";
        
    
           
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `hotel`(`cod_hotel`, `rif`, `nombre`, `n_tlf`, `direccion`, `dir_elec`, `numero_camas_dips`, `numero_camas_totales`)
                                            VALUES(
                                            '$cod','$riff','$nombreH','$tlf','$direccion','$direE','$cam','$cam1')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     header("Location:../../admin/agregarHotel.php?errorCode=9&errorType=1");
                     
                }else{
                    echo 'Guardo Correctamente';
                     header("Location:../../admin/agregarHotel.php?errorCode=6&errorType=3");
                   
                }
               
           }  
              
?>

