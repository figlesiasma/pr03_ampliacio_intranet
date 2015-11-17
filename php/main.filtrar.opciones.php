<?php
//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";



if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0 - TOT
     if($_REQUEST['opciones']>0){
        //si la opción es diferente a USUARIOS
        if($_REQUEST['opciones']!=3){
            //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
           $sql .= " WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
        }else{
           //Seleccionamos todos los usuarios
           $sql = "SELECT tbl_usuario.email, tbl_usuario.activo, tbl_tipo_user.tipo_user, tbl_usuario.id_tipo_user
                  FROM tbl_usuario
                  INNER JOIN tbl_tipo_user on tbl_tipo_user.id_tipo_user = tbl_usuario.id_tipo_user";
           if ($_SESSION['sId']==1) {
             $sql .= " WHERE tbl_tipo_user.id_tipo_user !=2";
           }

        }

      }
  }else {
     $_REQUEST['opciones']=0;
  }
?>
