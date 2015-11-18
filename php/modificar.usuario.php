<?php
//conexión a la bd
include 'conexion.php';


// tbl_usuario: activo, email, id_tipo_user, id_usuario, password

$sql = "UPDATE tbl_usuario
       SET email = '$_REQUEST[email]',
       password = '$_REQUEST[password]',
       id_tipo_user = $_REQUEST[tipoUsuario],
       activo = '$_REQUEST[activo]'
       WHERE tbl_usuario.id_usuario = ".$_REQUEST['userMod'];

mysqli_connect($conexion,$sql) or die ('No se ha realizado la consulta');

header('location: main.php?opciones=3');

 ?>
