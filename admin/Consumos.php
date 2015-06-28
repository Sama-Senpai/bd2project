<?php
 require_once('./modulos/header.php'); 
 require_once('./modulos/navbar.php');  
 require_once('../modulos/scriptjs.php'); 
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 ?>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


    <div class="jumbotron">
      <div class="container"  >
        <h1>Consumos </h1>
        <p>Esta área es permite añadir los consumos del cliente. Es necesario rellenar los siguientes campos:</p>
      </div>
    </div> 
<div class="container">
    
    
      <div class="col-lg-6 ">  
    <div class="row" > 
    <div class="panel-default" >
        <div class="panel-heading">
          <h3 class="panel-title" align="center">Formulario</h3>
        </div>
        <div class="panel-body" >
            <?php require_once('../scripts/alertas.php'); ?>
            
            <form role="form" method="POST" action="../BD/admin/agregarConsumo.php">           
                <div class="form-group">
                  <label for="id_usr" class="col-md-2">
                    C.I de Usuario:
                  </label>
                  <div class="col-md-5">
                      <input title="Introduzca su Cedula en el fomato: (V ó E)-12345678" type="text" class="form-control" name="id_usr" id="id_usr" placeholder="V-12345678 o E-12345678" pattern="[VE]+[-]+[0-9]+" required>
                  </div><br/><br/>
                </div>

                <div class="form-group" >
                  <label for="producto" class="col-md-2" >
                    Producto:
                  </label>
                  <div class="col-md-5" >
                      <input title="Introduzca el identificador del producto" type="text" class="form-control" name="producto" id="producto" placeholder="123456" required>
                  </div><br/><br/>
                </div>
                
                <div class="form-group">
                  <label for="monto" class="col-md-2">
                    Monto:
                  </label>
                  <div class="col-md-5">
                      <input title="Monto del producto" type="text" class="form-control" name="monto" id="monto" placeholder="Moneda virtual" pattern="[0-9]+" required>
                  </div><br/><br/>
                </div>
                
                </div>
          </div>
            <div class="col-md-10" >                 
             <button type="submit" name="cargar" class="btn btn-info" onclick="">
            Cargar
            </button>
        </div>
    </div>
        </div>
        <div class="col-md-6">   
        <img src=" ../img/consumo.jpg">   
    </div>
    
    </div>
      
</div>
 
<div class="row">
<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>  
    
  
