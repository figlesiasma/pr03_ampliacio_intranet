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
   <a href='usuarios.php'><li>USUARIOS</li></a>
   <a href='materiales.php'><li>MATERIALES</li></a>
 </ul>";
}?>
