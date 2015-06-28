<?php require_once('../BD/admin/extJuegos.php'); ?>
<?php require_once('./modulos/header.php'); ?> 
<?php require_once('./modulos/navbar.php'); ?> 

<body>
<script>
    
    function agregarRE(){
     document.getElementById('agregarRE').style.display = 'block';
}
   

    window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
  
   
 document.getElementById('agregarRE').style.display = 'none';
 
}

//Funcion para las tablas
function Pager(tableName, itemsPerPage) {
    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;
    this.showRecords = function(from, to) {
        var rows = document.getElementById(tableName).rows;
        // i starts from 1 to skip table header row
        for (var i = 1; i < rows.length; i++) {
            if (i < from || i > to)
                rows[i].style.display = 'none';
            else
                rows[i].style.display = '';
        }
    }

    this.showPage = function(pageNumber) {
        if (! this.inited) {
            alert("not inited");
            return;
        }

        var oldPageAnchor = document.getElementById('pg'+this.currentPage);
        oldPageAnchor.className = 'pg-normal';
        this.currentPage = pageNumber;
        var newPageAnchor = document.getElementById('pg'+this.currentPage);
        newPageAnchor.className = 'pg-selected';
        var from = (pageNumber - 1) * itemsPerPage + 1;
        var to = from + itemsPerPage - 1;
        this.showRecords(from, to);

    }

    this.prev = function() {
        if (this.currentPage > 1)
            this.showPage(this.currentPage - 1);
    }

    this.next = function() {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
        }
    }

    this.init = function() {
        var rows = document.getElementById(tableName).rows;
        var records = (rows.length - 1);

        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    }

    this.showPageNav = function(pagerName, positionId) {
        if (! this.inited) {
            alert("not inited");
            return;
        }


        var element = document.getElementById(positionId);
        var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal"> « Prev </span> ';
        for (var page = 1; page <= this.pages; page++)
            pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span> ';
        
        pagerHtml += '<span onclick="'+pagerName+'.next();" class="pg-normal"> Next »</span>';
        element.innerHTML = pagerHtml;
    }

}
    </script>
 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Gestión de Juegos</h1>
        <p>Cree, consulte, edite y borre los juegos del sistema fácilmente.</p>
        <!--<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>-->
      </div>
    </div>

  

      <!-- Example row of columns -->
       <div class="container">
   
           <?php require_once('../scripts/alertas.php'); ?>
            <div class="panel-default" >
                <div class="panel-heading">
                    <h3 class="panel-title" align="center">Juegos</h3>
                </div>
                <div class="panel-body" >
               
            
         <div class="table-responsive" align="center">   
                 
             
             
  <div class="btn-group" align="left">
  <button type="button" class="btn btn-primary">Filtro</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
   
  
  <ul class="dropdown-menu" role="menu">
  
    <li> <?php echo "<a href ='juegos.php?filter=Todos' > Todos </a>"; ?></li> 
    <li> <?php echo "<a href ='juegos.php?filter=Activos' > Activos </a>"; ?></li>
    <li> <?php echo "<a href ='juegos.php?filter=Terminados' > Terminados </a>"; ?></li>
 
    
    
  </ul>
</div>   
                 
            
                   </br></br>



    
    
    
    
    <table id="tablepaging" class="table table-bordered" align="center">
   
            <thead>
                        <tr>
                                
                                <th>Id</th>
                                <th>Logro</th>
                                <th>Informacion</th>
                                <th>Logro</th>   
                                <th>Resultado</th>  
                                <th>Estado</th>   
                                <th>Fecha Inicio</th> 
                                <th>Hora Inicio/fin</th> 
                               
                        </tr>
                        
                </thead>

               
<tbody>
    
    <?php      
               
             
                  while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        
                        $i=0;
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                                 $contador ++;                        
                                } 
                                $vari = "vs";
                                $global;

                 ?>
    
    
               
                  <?php     if ( $filtro == "Todos" ){ ?>
                        <tr>
                                <td data-title="Id" class="numeric"> <div align="center"> <?php echo $array [0]; ?></td>
                                <td data-title="Logro" class="numeric"> <div align="center"> <?php echo $array [4]; ?></td>
                                <td data-title="Informacion"> <div align="center"> <?php echo $array [2]; echo " ";  echo $vari; echo " ";  echo $array [3]; ?>  </td>
                                <td data-title=" Logro" class="numeric"> <div align="center"> <?php  echo $array [5]; ?></td>              
                                <td data-title="Resultado" class="numeric" > <div align="center"> <?php   echo $array [6]; echo " "; echo "-"; echo ""; echo $array[7];  ?> </td >                 
                                <td data-title="Estado" > <div align="center"> 
                                    <?php 
                                if($array [14]==1){
                                    $global="Activo";                        
                                }else{$global="Terminado";} 
                                echo $global; ?></td>
                                <td data-title="Fecha Inicio" class="date"> <div align="center"> <?php echo $array [8]; ?></td>
                                <td data-title="Hora Inicio/Fin" class="time"> <div align="center"> <?php echo $array [10]; echo "/"; echo $array [11];?></td>
                            <!--    <td data-title="equis" class="date"> <div align="center"> <a href ="juegos.php?array=  <?php  ?> "  class="btn btn-primary"> Entrar </a> </div> </td>            -->                    
                        </tr>         
                        
                <?php }  
                
                
                  if ( ($filtro == "Activos") && ($array[14] == 1) ){ ?>
                        
                         <tr>
                                <td data-title="Id" class="numeric"> <div align="center"> <?php echo $array [0]; ?></td>
                                <td data-title="Logro" class="numeric"> <div align="center"> <?php echo $array [4]; ?></td>
                                <td data-title="Informacion"> <div align="center"> <?php echo $array [2]; echo " ";  echo $vari; echo " ";  echo $array [3]; ?>  </td>
                                <td data-title=" Logro" class="numeric"> <div align="center"> <?php  echo $array [5]; ?></td>              
                                <td data-title="Resultado" class="numeric" > <div align="center"> <?php   echo $array [6]; echo " "; echo "-"; echo ""; echo $array[7];  ?> </td >                 
                                <td data-title="Estado" > <div align="center"> 
                                    <?php 
                                if($array [14]==1){
                                    $global="Activo";                        
                                }else{$global="Terminado";} 
                                echo $global; ?></td>
                                <td data-title="Fecha Inicio" class="date"> <div align="center"> <?php echo $array [8]; ?></td>
                                <td data-title="Hora Inicio/Fin" class="time"> <div align="center"> <?php echo $array [10]; echo "/"; echo $array [11];?></td>
                            <!--    <td data-title="equis" class="date"> <div align="center"> <a href ="juegos.php?array=  <?php  ?> "  class="btn btn-primary"> Entrar </a> </div> </td>            -->                    
                        </tr>    
                        
                        
                <?php } 
                
                
               if( ($filtro == "Terminados") && ($array[14] == 0) ){?>
                 
                        <tr>
                                <td data-title="Id" class="numeric"> <div align="center"> <?php echo $array [0]; ?></td>
                                <td data-title="Logro" class="numeric"> <div align="center"> <?php echo $array [4]; ?></td>
                                <td data-title="Informacion"> <div align="center"> <?php echo $array [2]; echo " ";  echo $vari; echo " ";  echo $array [3]; ?>  </td>
                                <td data-title=" Logro" class="numeric"> <div align="center"> <?php  echo $array [5]; ?></td>              
                                <td data-title="Resultado" class="numeric" > <div align="center"> <?php   echo $array [6]; echo " "; echo "-"; echo ""; echo $array[7];  ?> </td >                 
                                <td data-title="Estado" > <div align="center"> 
                                    <?php 
                                if($array [14]==1){
                                    $global="Activo";                        
                                }else{$global="Terminado";} 
                                echo $global; ?></td>
                                <td data-title="Fecha Inicio" class="date"> <div align="center"> <?php echo $array [8]; ?></td>
                                <td data-title="Hora Inicio/Fin" class="time"> <div align="center"> <?php echo $array [10]; echo "/"; echo $array [11];?></td>
                            <!--    <td data-title="equis" class="date"> <div align="center"> <a href ="juegos.php?array=  <?php  ?> "  class="btn btn-primary"> Entrar </a> </div> </td>            -->                    
                     </tr>  
                       
                        
                <?php }  ?> 
    
            <?php $i++; } ?>

</tbody>



    </table>

    
    <div id="pageNavPosition" style="padding-top: 20px" align="center">
</div>
                                
<script type="text/javascript">
    var pager = new Pager('tablepaging', 5);
    pager.init();
    pager.showPageNav('pager', 'pageNavPosition');
    pager.showPage(1);
</script>
   

</div>
 
          
                                    
       <div class="col-lg-40">
           
      <div class="btn-group">
  <a  class="btn btn-default" href="./agregar_juego.php">Nuevo Juego</a>   
  <a  class="btn btn-default" onclick="agregarRE()">Resultado</a>  
     </div>
          </div>        
     </div>  
           
           
       
         
      
     
       
            
                                    
        
      <div  id="agregarRE" class="container">
       <div class="col-lg-3">       

           <form role="form" method="POST" action="../BD/admin/points/editarResultados.php">
                
                <div class="form-group">
                      
                    
                      <div class="col-md-40">              
                        <input title="Id de Juego" type="text" class="form-control" name="id" id="id" placeholder="Id de Juego"   pattern="[0-9]+" required>
                      </div>
                    
                  <label for="equipo1" class="col-md-40">
                    Resultados:
                  </label> 
                    
                   
                    
                     <div class="col-md-40">
                  
                        <input title="Primer Equipo" type="text" class="form-control" name="resul1" id="resul1" placeholder="Resultado"   pattern="[0-9]+" required>
                      </div>
                    
                      
                     <div class="col-md-40">
                      <input title="Segundo Equipo" type="text" class="form-control" name="resul2" id="resul2" placeholder="Resultado" pattern="[0-9]+" required>
                    </div>
                     </div><br/><br/> 
                   
                    <div class="form-group">
               <div class="col-md-20">                                     
                  <div class="col-md-2">
                      <button type="submit" name="cambiar" class="btn btn-info" >
                      Cambiar
                      </button>
                  </div>
                </div>
               </div> 
                  </form>    
                 </div> 
          
               </div>       
               </div>       
          
     

    


<footer align="center">
     <!--<img src="img/boot.png">-->
   <div class="col-md-8">
    <img src="../img/foobar.png" align="center">
    </div>
</footer>     
      
    </div> <!-- /container -->
    
<?php require_once('../modulos/scriptjs.php'); ?>     
    </body>
</html> 
<?php

