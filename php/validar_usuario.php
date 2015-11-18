<?php
//se continúa la sesión
session_start();
//conexión bd
include 'conexion.php';

  //sentencia SQL donde se compara las variables de sesión anteriores con los datos de la base de datos
  //tbl_usuario: activo,email,id_tipo_user,id_usuario,password
  //El usuario debe estar activo para poder logear
  $sql = "SELECT * FROM tbl_usuario WHERE email = '$_REQUEST[email]' AND password = '$_REQUEST[password]' AND activo = 1";

  // se realiza la consulta anterior
  $query = mysqli_query($conexion,$sql);

  //se comprueba la consulta anterior y si es 1, es que hay una coincidencia
    if($dato = mysqli_fetch_array($query)){
        //guardamos datos en sessions
        $_SESSION['sUser']=$dato['email'];
        $_SESSION['sId']=$dato['id_tipo_user'];
        header('location: ../main.php');
     }else{
      //se redirige a la pantalla login incluyendo un mensaje de error
       header('location: ../index.php?error=No existe el usuario');
    }


?>
