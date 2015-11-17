<?php
   if(!isset($_SESSION['sUser'])){
     //comprueba si está vacia la sesión
     if(empty($_SESSION['sUser'])){
       //en caso afirmativo, redirige a index para login
       header('location: index.php');
     }
   }
?>
