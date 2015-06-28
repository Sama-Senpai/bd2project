<?php

include(dirname(dirname(__FILE__)).'/conexion.php');
    $arreglojugados =array ();
    $_SESSION['arrayjugados'] = $arreglojugados;
    $_SESSION['jugados']=0;
    if(isset($_SESSION['username'])){
        $iduser = $_SESSION['ci'];
        $consultahecha= "SELECT `Id_juego` FROM `apuestas` WHERE `Id_user`='$iduser'";
        $datoshecha= mysql_query($consultahecha,$conex) or die ("<p> No se ha podido ejecutar"
            . "la consulta, compurebe que la sintaxis sea correcta. <p>");
        
        $jugados = 0;
        while ($jugadas= mysql_fetch_row($datoshecha)){
            $arreglojugados[$jugados]=$jugadas[0];
            $jugados++;
        }
        $_SESSION['arrayjugados'] = $arreglojugados;
        $_SESSION['jugados'] = $jugados;
        
        
        
        mysql_close();
    }