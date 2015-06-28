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

 <div class="jumbotron">
      <div class="container"  >
        <h1>Gestión de Moneda Virtual</h1>
        <p>Aquí se realiza la administración pertinente al manejo monetario virtual de la casa. Deposite o retire saldo de un usuario.</p>
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
<div class="col-md-6">   
                <img src=" ../img/moneda1.jpg">   
        </div>

            <form role=form method="POST" action="../BD/admin/points/trans_helper.php">
    <table id=Validar class="table table-bordered">
    </FORM>

<div class="form-group">

                  <label for="transaccion" class="col-md-5">
                    Tipo de Transaccion:
                  </label>
                  <div class="col-md-6">
                      <select tittle="Seleccione su transaccion" name="transaccion" id="transaccion" class="form-control" required>
                      <?php require_once('./points/transac_type.php'); ?>
                      </select>    
                  </div><br/><br/><br/>
                </div>

<div class="form-group">
                  <label for="cedula" class="col-md-5">
                    Cedula de identidad:
                  </label>
                  <div class="col-md-6">
                      <input title="Introduzca su Cedula" type="text" class="form-control" name="cedula" id="cedula" placeholder="V-12345678 o E-12345678" pattern="[VE]+[-]+[0-9]+" required>
                  </div><br/><br/><br/>
                </div>

<div class="form-group">
                  <label for="monto" class="col-md-5">
                    Monto a Procesar:
                  </label>
                  <div class="col-md-6">
                      <input title="introduzca el monto" type="text" class="form-control" name="monto" id="monto" placeholder="1500 ó 5000" pattern="[0-9]+" required>
                  </div><br/><br/><br/>
                </div>

            <div class="row">
                  <div class="col-md-5">
                  </div>                  
                  <div class="span6">
                      <input TYPE=submit class="btn btn-default" NAME=OK VALUE="Continuar"><BR
                  </div>
                </div>
            </div>
            

<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>