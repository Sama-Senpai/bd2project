<?php

    include '../../BD/conexion.php';
    
    $idAlerta=$_GET['id'];
    echo $idAlerta;
    mysql_query("UPDATE Alertas SET Leido='1' WHERE Id='$idAlerta' ",$conex);
    header("Location:../../cuenta.php");
    
    
