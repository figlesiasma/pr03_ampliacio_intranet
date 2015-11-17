<?php
//se continúa la sesión
session_start();
//conexión bd
include 'php/conexion.php';
//consultar session
include 'php/session.php';

if ($_REQUEST['disponibilidad']==0){
  //consulta de inserción
  $insert = "INSERT INTO tbl_reservas (id_usuario, hora_entrada, id_material)
            SELECT tbl_usuario.id_usuario as id_usuario, NOW() as hora_entrada, $_REQUEST[material] as id_material
            FROM tbl_usuario WHERE tbl_usuario.email = '$_SESSION[sUser]'";

  $update = "UPDATE tbl_material
            SET tbl_material.disponible = 1
            where tbl_material.id_material = $_REQUEST[material] ";

}else{

  $insert = "UPDATE tbl_reservas
            SET tbl_reservas.hora_salida = NOW()
            where tbl_reservas.id_material = $_REQUEST[material]";

  $update = "UPDATE tbl_material
            SET tbl_material.disponible = 0
            where tbl_material.id_material = $_REQUEST[material]";

}

mysqli_query($conexion,$insert) or die ('La consulta ha fallado: '. mysql_error());
mysqli_query($conexion,$update) or die ('La consulta ha fallado: '. mysql_error());


//se redirige a la pantalla main con un mensaje
header('location: ../main.php?mensaje=La petición se ha realizado correctamente');

?>