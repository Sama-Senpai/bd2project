<?php require_once('./modulos/header.php'); ?>
<?php require_once('./BD/Mesa/extraer_resultados.php'); ?>
           
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
      
        
        
<?php require_once('./modulos/navbar.php'); ?>         

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Resultados</h1>
        <p>Conoce los resultados de las diferentes categorías.</p>
      </div>
    </div>

    
    
          
    <div class="container">
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
             <table id= "tablaResultados" class="table table-bordered" >
                <thead>
                        <tr>
                                <th></th>
                                <th>Local</th>
                                <th>vs.</th>
                                <th>Visitante</th>
                                <th></th>
                        </tr>  
                </thead>
                <tbody align="center">
                    
                    
               <?php                                       
                  while ($resultado= mysql_fetch_row($datosResultado)){
                      
                        $contador=0;
                        
                        
                                foreach ($resultado as $claveResultado){

                                 $array[$contador]= $claveResultado;  
                                 $contador ++;                        
                                } 

                 ?>
               
    
                <?php     if ( $filtro == "Todos"){ ?>
                    
                             <tr>
                                <td> <?php echo $array [6]; ?>  </td>
                                <td><?php echo $array [2]; ?></td>
                                <td>vs.</td>
                                <td><?php echo $array [3]; ?></td>
                                <td><?php echo $array [7]; ?></td>
                                
                        </tr>   
                        
                    <?php }  else { if ( $filtro == $array [3]){ ?>
                        <tr>
                                <td> <?php echo $array [1]; ?>  </td>
                                <td><?php echo $array [2]; ?></td>
                                <td><?php  echo $array [3]; ?></td>
                                
                        </tr>                                                                                                       
                        
                        <?php } ?>
                        
                        
                  <?php } } ?>        
                        
                        
                </tbody>
                        
 
                        
                </tbody>               
            </table>
             
             
<div id="pageNavTransacciones" style="padding-top: 20px" align="center">
</div>
                                
<script type="text/javascript">
    var pager = new Pager('tablaResultados', 3);
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
            