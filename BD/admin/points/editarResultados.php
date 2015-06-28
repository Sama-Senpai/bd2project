<script src="js/main.js"></script>

<?php   

        include './notf_jugadores.php';     

	// Recibe las Variables
        
        
        
        $re1         = $_POST['resul1']; 
        $re2	= $_POST['resul2'];
        $id3= $_POST['id'];
        $e=0;
        
        	
     
    $consultajuegos= "SELECT * FROM Juegos WHERE Id_mesa='$id3'";
    $datos= mysql_query($consultajuegos);
     $datosjuegos=mysql_fetch_array($datos);
       
       if ($re1>$re2) {
             $resultado=0;
             
       } else { if ($re2>$re1){
                     $resultado=1;
                     
                } else {$resultado=10;
                  }  
         }
	
       proc_apuesta ($id3,$resultado); 
       
      
       
        
        if ( !resul1 || !resul2 || !id3 ){
            header("Location:../../../admin/juegos.php");   
            echo'entra todo';
        }else{
           
        if($datosjuegos['Estado']==1 ){
               // SQL
	$query = mysql_query("UPDATE Juegos
						SET
							Resultado1 = '$re1',
							Resultado2 = '$re2',
                                                        Estado = '$e'
                                                           
                                                            
						WHERE
							Id 	='$id3'
						");
	
                if(!$query){
                    echo 'Error al insertar un producto';
                }else{
                    echo 'Guardo Correctamente';
                }
                            
                // Redireccion
                header("Location:../../../admin/juegos.php?errorCode=13&errorType=2");	
       }else{
           
                header("Location:../../../admin/juegos.php?errorCode=14&errorType=1");	
                
             }
             
            }
        
?>

