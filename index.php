<?php
    $Title ="Mi primera pagina web en php";
$mensaje ="Hola mundo!!!";
$suma = 1 + 1;
//comentarios siempre en el php nunca en el html
?>
<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8"/>
     <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
     <title><?php echo $Title; ?> </title>
     
 </head>   
 <body>
     <h1>
        <?php echo $Title; 
         ?>
         </h1>
         <h2>
             <?php 
             echo $mensaje;
             ?>
         </h2>
         
         <h3>
             <?php 
             echo $suma;
             ?>
         </h3>
 </body>


    
</html>