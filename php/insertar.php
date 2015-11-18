<?php
include 'conexion.php';
/*
tbl_usuario: id_usuario, email, password, activo, id_tipo_user
tbl_tipo_user: id_tipo_user, tipo_user
*/
$sqlInsert = "INSERT INTO tbl_usuario
              values (null,'$_REQUEST[userIN]','$_REQUEST[passIN]',$_REQUEST[activo],$_REQUEST[rolIN])";

mysqli_query($conexion,$sqlInsert) or die ('La consulta ha fallado: '. mysql_error());


header('Location: ../main.php?opciones=3');

 ?>
