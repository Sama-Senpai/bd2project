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
        
        
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO `catalogo_habitacion`(`cod_ch`, `king`, `queen`, `b_clase_a`, `matrimonial`, `individual`, `b_clase_b`, `b_clase_s`, `Maxper`)                                  VALUES(
                                            '$cod_ch','$king','$queen','$b_clase_a','$matrimonial','$individual','$b_clase_b','$b_clase_s','$Maxper')
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                     
                }else{
                    echo 'Guardo Correctamente';
                   
                }
                header("Location:../../admin/agregarCatHab.php");
           }  
              
?>


