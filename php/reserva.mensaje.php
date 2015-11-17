<?php
//se comprueba si la variable mensaje devuelto de reservar.php está instanciada.
//Si se ha devuelto, es que el insert ha sido correcto.
if(isset($_REQUEST['mensaje'])){
  //se comprueba si no está vacía
  if(!empty($_REQUEST['mensaje'])){
    //se guarda el contenido en la siguiente variable
    $mensaje = $_REQUEST['mensaje'];
    //se muestra un mensaje en un alert javascript
    echo "<script type='text/javascript'>alert('$mensaje')</script>";
    //destruimos la variable para evitar el alert al recargar la web
    unset($mensaje);
  }
}
 ?>
