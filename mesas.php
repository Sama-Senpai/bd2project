<?php require_once('./modulos/header.php'); ?>
<?php require_once('./BD/Mesa/Mesas_extraer.php'); ?>

           
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
  
    <li> <?php echo "<a href ='mesas.php?filter=Todos'> Todos </a>"; ?></li> 
    <li> <?php echo "<a href ='mesas.php?filter=Futbol'> Futbol </a>"; ?></li>
    <li> <?php echo "<a href ='mesas.php?filter=Beísbol'> Beísbol </a>"; ?></li>
    <li> <?php echo "<a href ='mesas.php?filter=NHL'> NHL </a>"; ?></li>
    <li> <?php echo "<a href ='mesas.php?filter='> Tenis </a>"; ?></li>
    <li> <?php echo "<a href ='mesas.php?filter=Baloncesto'> Baloncesto </a>"; ?></li>
    <li> <?php echo "<a href ='mesas.php?filter=Voleibol'> Voleibol </a>"; ?></li>
    
    
  </ul>
</div>   
             </br></br>
             
             <table id= "tablamesas" class="table table-bordered" >
              
              
                
                <thead>
                        <tr>
                                
                                <th>Mesa</th>
                                <th>Descripción</th>
                                <th>Deporte</th>
                                <th>Selección</th>
                        </tr>
                        
                </thead>
        
                <tbody align="center">
                    
                    
               <?php                                       
                  while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        
                        
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                                 $contador ++;                        
                                } 

                 ?>
               
    
                <?php     if ( $filtro == "Todos" && $array [5]== 1 ){ ?>
                    
                             <tr>
                                <td data-title="Mesa"> <?php echo $array [1]; ?>  </td>
                                <td data-title="Descripcion"><?php echo $array [2]; ?></td>
                                <td data-title="Deporte" class="numeric"><?php echo $array [3]; ?></td>
                                <td data-title="Selección" class="numeric"> <div align="center"> <?php echo "<a href ='juegos.php? array= $array[0]' class='btn btn-primary'> Entrar </a>"; ?>  </div> </td>
                                
                        </tr>   
                        
                    <?php }  else { if ( $filtro == $array [3] && $array [5] == 1){ ?>
                        <tr>
                                <td data-title="Mesa"> <?php echo $array [1]; ?>  </td>
                                <td data-title="Descripcion"><?php echo $array [2]; ?></td>
                                <td data-title="Deporte" class="numeric"><?php  echo $array [3]; ?></td>
                                <td data-title="Selección" class="numeric"> <div align="center"> <?php echo "<a href ='juegos.php? array= $array[0]' class='btn btn-primary'> Entrar </a>"; ?>  </div> </td>
                                
                        </tr>                                                                                                       
                        
                        <?php } ?>
                        
                        
                  <?php } } ?>        
                        
                        
                </tbody>
                        
 
                        
                </tbody>               
            </table>
             
             
<div id="pageNavTransacciones" style="padding-top: 20px" align="center">
</div>
                                
<script type="text/javascript">
    var pager = new Pager('tablamesas', 3);
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
