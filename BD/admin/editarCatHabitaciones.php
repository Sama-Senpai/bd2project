<script src="js/main.js"></script>
<?php   
        
        // Conexion
        include '../conexion.php';

        $bandera=0;
        
        $cod_ch=filter_input(INPUT_POST, 'cod_ch');
        $king=filter_input(INPUT_POST, 'king');
        $queen=filter_input(INPUT_POST, 'queen');
        $b_clase_a=filter_input(INPUT_POST, 'b_clase_a');
        $matrimonial=filter_input(INPUT_POST, 'matrimonial');
        $individual=filter_input(INPUT_POST, 'individual');
        $b_clase_b=filter_input(INPUT_POST, 'b_clase_b');
        $b_clase_s=filter_input(INPUT_POST, 'cb_clase_sam');
        $Maxper=filter_input(INPUT_POST, 'Maxper');
        $desc=filter_input(INPUT_POST, 'desp');
        
        
           if( $bandera==0 ){
                // SQL
               /*
                $query = mysql_query("update `catalogo_habitacion`set(`cod_ch`, `king`, `queen`, `b_clase_a`, `matrimonial`, `individual`, `b_clase_b`, `b_clase_s`, `Maxper`, `descripcion`)                                  
                    VALUES( '$cod_ch','$king','$queen','$b_clase_a','$matrimonial','$individual','$b_clase_b','$b_clase_s','$Maxper','$desc')
                                    ");
                */
               
               $query = mysql_query("UPDATE `proyecto_bd2_hotel`.`catalogo_habitacion` "
                       . "SET `king`='$king',"
                       . " `queen`='$queen',"
                       . " `b_clase_a`='$b_clase_a',"
                       . " `matrimonial`='$matrimonial',"
                       . " `individual`='$individual',"
                       . " `b_clase_b`='$b_clase_b',"
                       . " `b_clase_s`='$b_clase_s',"
                       . " `Maxper`='$Maxper',"
                       . " `descripcion`='$desc'"
                       . " WHERE `cod_ch`='$cod_ch'"
                       );

                if(!$query){
                    echo 'Error al insertar un producto';
                    header("Location:../../admin/index.php?errorCode=9&errorType=1");
                     
                }else{
                    echo 'Guardo Correctamente';
                    header("Location:../../admin/index.php?errorCode=6&errorType=3");
                   
                }
                
           }  
              
?>


