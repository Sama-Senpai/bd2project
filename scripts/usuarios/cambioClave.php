<?php
    
    session_start();

    //echo 'entro <br/>';

    // Conexion
    include '../../BD/conexion.php';
    //echo 'se conecto <br/>';}
    
    // Recibe las Variables
    $claveActual	= $_POST['claveActual'];
    $claveNueva 	= $_POST['claveNueva'];
    $claveNueva2 	= $_POST['claveNueva2'];
    $email  =   $_SESSION['username'];
    
    if(isset($claveActual) && !empty($claveActual) &&
    isset($claveNueva) && !empty($claveNueva) &&
    isset($claveNueva2) && !empty($claveNueva2)){
        
        if( $claveActual != $_SESSION['password'] ){
            header("Location:../../cuenta.php?errorCode=7&errorType=4");
            //echo $claveActual;
            //echo $_SESSION['password'];
        }else if( $claveNueva != $claveNueva2 ){
            header("Location:../../cuenta.php?errorCode=8&errorType=4");
        }else{
            $sel=mysql_query("UPDATE Usuarios SET Password='$claveNueva2' WHERE Correo='$email' ",$conex);
            header("Location:../../cuenta.php");
        }

        
        
        
    }else{
       //echo "Error en login, intentelo mas tarde";
        header("Location:../../cuenta.php?errorCode=6&errorType=4");
    }
    
    
    

?>
