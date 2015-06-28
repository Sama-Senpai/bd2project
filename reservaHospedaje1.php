<?php require_once('./modulos/header.php'); ?>
<?php require_once('./BD/conexion.php'); ?>

           
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
      
        
        
<?php require_once('./modulos/navbar.php'); ?>         

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Selección de Mesas</h1>
        <p>Ingresa en la sala que desees. Disfruta de diferentes deportes.</p>
      </div>
    </div>

    
    
          
    <div class="container">
        
      <?php


if ( !($hotela=filter_input(INPUT_POST, 'hotel')) ){

    ?>
    <form role="form" method="POST" action="reservaHospedaje1.php">
        
                <?php
                

    
    $query1 = "SELECT * FROM `hotel`";
    $busqueda1 = mysql_query($query1);
     ?>          
                   <div class="form-group">
                  <label for="Hotel" class="col-md-2">
                   Introduzca el Hotel:
                  </label>   
                  <div class="col-md-10">
                      <select name="hotel" onchange=>
                   <option value="0">Seleccione un Hotel</option>
                          
    <?php
 
    while ($datos1 = mysql_fetch_assoc($busqueda1)){
                        echo "<option value=".$datos1['cod_hotel'].">".$datos1['nombre']."</option>";                
    }
   mysql_free_result($busqueda1);
    ?>
                      </select>
                  </div><br/><br/>
                       
                  </div> 
    
            <div class="row">
                 <div class="span6" style="text-align:center">
                  <div class="col-md-3">
                      <button type="submit" name="Buscar" value="Buscar"class="btn btn-info" >
                        Buscar
                      </button>
                  </div>
                 </div>
                    <br>
                    <br>
            </div>
</form><br/><br/><br/><br/>

 <?php
                
    }
  
    ?>
  
        
        
       <!-- Example row of columns -->
      <div class="row">
          
          
        <div class="col-lg-8">

          
            
         <div class="table-responsive">   
        

    
          
          
                       
          <div class="btn-group">
  <button type="button" class="btn btn-primary">Filtro</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
   
  
  <ul class="dropdown-menu" role="menu">
  
   
    
    
  </ul>
</div>   
             </br></br>
             
             <table id= "tabla" class="table table-bordered" >
              
              
                
                <thead>
                        <tr>
                                
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Camas Adicinales</th>
                        </tr>
                        
                </thead>
           <?php

         
     

if ( ($hotela=filter_input(INPUT_POST, 'hotel')) ){

    ?>
                <tbody align="center">
                    
              
                        
                        
                </tbody>
                        
 
                        
                </tbody> 
                                   
    
 <?php
                
    }
  
    ?>
                
            </table>
             
             
<div id="pageNavTransacciones" style="padding-top: 20px" align="center">
</div>
        
       <script type="text/javascript">
    var pager = new Pager('tabla', 3);
    pager.init();
    pager.showPageNav('pager', 'pageNavTransacciones');
    pager.showPage(1);
</script>      
             


                  
        </div>
            
        </div>    
            
        
          
             
            

      
            
            
            
<?php require_once('./modulos/sidebar.php'); ?>           
          
      </div>

      <hr>

<?php require_once('./modulos/footer.php'); ?> 
      
      
    </div> <!-- /container -->

<?php require_once('./modulos/scriptjs.php'); ?> 
    
    </body>
</html>
