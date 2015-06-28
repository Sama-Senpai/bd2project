<?php
 
    
include(dirname(dirname(__FILE__)).'/conexion.php');
 if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
  if (!isset($_SESSION['carrito'])){
        $juegos=0;
        $carrito=array();
        for($i=0;$i<5;$i++){ 
            $carrito[$i]=array(); 
        }    
       $_SESSION['carrito'] = $carrito; 
       $_SESSION['juegos'] = $juegos;
       $_SESSION['jugados']=0;
  }

  
  
  
  
 // header("Location:../../juegos.php?array=$cantidad");    




 
?>
