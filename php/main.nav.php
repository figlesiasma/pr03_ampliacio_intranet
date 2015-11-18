<?php if ($_SESSION['sId']<1){
   echo "
   <ul>
    <a href='main.php'><li>INICIO</li></a>
    <a href='reserva.php'><li>RESERVAS</li></a>
  </ul>";
}else {
   echo "
  <ul>
   <a href='main.php'><li>INICIO</li></a>
   <a href='reserva.php'><li>RESERVAS</li></a>
 </ul>";
}?>
