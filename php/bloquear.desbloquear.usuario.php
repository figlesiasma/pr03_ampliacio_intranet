<?php
//conexión a la bd
include 'conexion.php';

// tbl_usuario: activo, email, id_tipo_user, id_usuario, password

//si el usuario está activo, envía el contrario para desactivar
$sql = "UPDATE tbl_usuario
        SET tbl_usuario.activo = ".$_REQUEST['activo']." WHERE tbl_usuario.id_usuario = ".$_REQUEST['idUsuario'];

mysqli_query($conexion,$sql) or die ('No se ha realizado la consulta');

header('location: ../main.php?opciones=3');

 ?>
