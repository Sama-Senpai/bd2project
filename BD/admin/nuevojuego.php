<script src="js/main.js"></script>
<?php   
        
        include '../BD/Mesas_extraer.php';
        // Conexion
        include '../conexion.php';

	// Recibe las Variables
        $equipo1         = $_POST['equipo1']; 
        $equipo2	= $_POST['equipo2'];
        $logro1         = $_POST['logro1'];
        $logro2         = $_POST['logro2'];
	$fechaini	= $_POST['fechaini'];
        $fechafin	= $_POST['fechafin'];
        $horaini	= $_POST['horaini'];
        $horafin	= $_POST['horafin'];
        $estado	        = $_POST['estado'];
        $min      	= $_POST['min'];
        $max            = $_POST['max'];
        $mesa            = $_POST['mesa'];
        $bandera=0;
        
        
        
                  while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        
                        $i=1;
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                                 $contador ++;                        
                                }                     
             $i++; } 

        
        if( ($mesa<=$i) && ($mesa>0) ){
            $bandera=1;
        }
        if($min>$max){
            $bandera=2;
        }
     
   
         
         if($estado=="dis"){
             $aux=1;
         }else{
             $aux=0;
         }
	
        
       
        
       if (!equipo2 || !equipo1 || !min ){
            header("Location:../../admin/agregar_juego.php");   
            echo'entra todo';
        }else{
           
           if( $bandera==0 ){
                // SQL
                $query = mysql_query("INSERT INTO Juegos
                                            (
                                            Id_mesa,Equipo1,Equipo2,logro1,logro2,Fecha_inicio ,Fecha_de_final ,Hora_de_inicio ,Hora_de_final,Mini,Maxi,Estado
                                            )
                                            VALUES
                                            (
                                            '$mesa','$equipo1','$equipo2','$logro1','$logro2','$fechaini','$fechafin','$horaini','$horafin','$min','$max','$aux'
                                            )
                                    ");

                if(!$query){
                    echo 'Error al insertar un producto';
                }else{
                    echo 'Guardo Correctamente';
                }
                
                  // Redireccion
                header("Location:../../admin/agregar_juego.php?errorCode=12&errorType=2");
           }   else{
               
           if($bandera==1){
          
                header("Location:../../admin/agregarHotel.php?errorCode=11&errorType=1");
               }
            if($bandera==2){
                header("Location:../../admin/agregar_juego.php?errorCode=15&errorType=1");
            }   
           }
                
           
            }
        
?>


