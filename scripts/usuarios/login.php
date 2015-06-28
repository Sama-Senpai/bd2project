<?php

    if(isset($_GET['idMesa'])){
        $idMesa=$_GET['idMesa'];
    }
        
    session_start();

    //echo 'entro <br/>';

    // Conexion
    include '../../BD/conexion.php';
    echo 'se conecto <br/>';
    
    // Recibe las Variables
    $email	= $_POST['email'];
    $pass	= $_POST['pass'];
    $nombre;
    $apellido;
    
    if(isset($email) && !empty($email) &&
    isset($pass) && !empty($pass)){
        $sel=mysql_query("SELECT Correo,Password,Nombre,Apellido,Ci,Sexo,Permisos FROM Usuarios WHERE Correo='$email' ",$conex);
        if(mysql_num_rows($sel)){
            
            $sesion=mysql_fetch_array($sel);

            if($pass==$sesion['Password']){
                $_SESSION['username']=$email;
                $_SESSION['password']=$pass;
                $_SESSION['nombre']=$sesion['Nombre'];
                $_SESSION['apellido']=$sesion['Apellido'];
                $_SESSION['ci']=$sesion['Ci'];
                $_SESSION['sexo']=$sesion['Sexo'];
                $_SESSION['permisos']=$sesion['Permisos'];
                //echo "correo coincide";
                
                if(isset($_GET['idMesa'])){
                    header("Location:../../juegos.php?array=".$idMesa);
                }else{
                    header("Location:../../index.php");
                }
                
            }else{
                //echo "Password incorrecto";
                if(isset($_GET['idMesa'])){
                    header("Location:../../login.php?errorCode=2&errorType=1&idMesa=".$idMesa);
                }else{
                    header("Location:../../login.php?errorCode=2&errorType=1");
                }
                
            }
        }else{
            //echo "Usuario incorrecto";
            if(isset($_GET['idMesa'])){
                header("Location:../../login.php?errorCode=1&errorType=1&idMesa=".$idMesa);
            }else{
                header("Location:../../login.php?errorCode=1&errorType=1");
            }
        } 
        
    }else{
       //echo "Error en login, intentelo mas tarde";
        if(isset($_GET['idMesa'])){
            header("Location:../../login.php?errorCode=3&errorType=1&idMesa=".$idMesa);
        }else{
            header("Location:../../login.php?errorCode=3&errorType=1");
        }        
    }
    
    
    

?>