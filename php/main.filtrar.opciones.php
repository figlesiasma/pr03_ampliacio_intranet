<?php
//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_material.activo, tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";

if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0 - TOT
     if($_REQUEST['opciones']>0){
        //si la opción es diferente a USUARIOS
        if($_REQUEST['opciones']!=3){
            //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
           $sql .= " WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
           //si el usuario es USER
          if ($_SESSION['sId']==0) {
             //no podrá ver los recursos desactivados
             $sql .= " AND tbl_material.activo = 1";
          }
        }else{
           //Seleccionamos todos los usuarios
           $sql = "SELECT tbl_usuario.email, tbl_usuario.id_usuario, tbl_usuario.activo, tbl_tipo_user.tipo_user, tbl_usuario.id_tipo_user
                  FROM tbl_usuario
                  INNER JOIN tbl_tipo_user on tbl_tipo_user.id_tipo_user = tbl_usuario.id_tipo_user";
                  //si la sesión es de administrador
           if ($_SESSION['sId']==1) {
             //que muestre todos los datos excepto Root
             $sql .= " WHERE tbl_tipo_user.id_tipo_user !=2";
           }
           //se ordena por el último usuario
           $sql .= " ORDER BY tbl_usuario.id_usuario DESC";
        }
      }
  }else {
     //en caso contrario, se asigna Tot
     $_REQUEST['opciones']=0;
  }
?>
