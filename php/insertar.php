<?php
include 'conexion.php';
/*
tbl_usuario: id_usuario, email, password, activo, id_tipo_user
tbl_tipo_user: id_tipo_user, tipo_user
*/

//se comprueba si existe el usuario

//se realiza la consulta
$sqlComprobar = "SELECT * FROM tbl_usuario WHERE tbl_usuario.email = '$_REQUEST[userIN]' LIMIT 1";

$datos = mysqli_query($conexion,$sqlComprobar) or die ('Error en la consulta'.mysqli_error());

//si se recibe recibe datos
if (mysqli_num_rows($datos)>0) {
   //se manda mensaje de usuario existente
   header('Location: ../main.php?opciones=3+&error=El usuario ya existe');
   //en caso contrario
}else {
   //se realiza la consulta de inserción
   $sqlInsert = "INSERT INTO tbl_usuario
                 values (null,'$_REQUEST[userIN]','$_REQUEST[passIN]',$_REQUEST[activo],$_REQUEST[rolIN])";

   mysqli_query($conexion,$sqlInsert) or die ('La consulta ha fallado: '. mysql_error());

   //se se redirige
   header('Location: ../main.php?opciones=3+&error=El usuario se ha registrado correctamente');
}



 ?>
