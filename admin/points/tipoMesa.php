<?php require_once('../BD/Mesa/Mesas_extraer.php'); ?>



<?php      
               
             
                  while ($registro= mysql_fetch_row($datos)){
                      
                        $contador=0;
                        
                        $i=0;
                                foreach ($registro as $clave){

                                 $array[$contador]= $clave;  
                                 $contador ++;                        
                                } 
                              

                 ?>
               
      
            <?php $i++; } ?>
