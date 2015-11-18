<!--
tbl_usuario: activo, email, id_tipo_user, id_usuario, password

tbl_tipo_user: id_tipo_user, tipo_user

VIENE DE MODIFICACION.PHP
-->
<?php
include 'conexion.php';

$sqlModificar = "SELECT tbl_usuario.email, tbl_usuario.password, tbl_usuario.activo, tbl_tipo_user.tipo_user, tbl_usuario.id_tipo_user, tbl_usuario.id_usuario
                  FROM tbl_usuario
                  INNER JOIN tbl_tipo_user on tbl_tipo_user.id_tipo_user = tbl_usuario.id_tipo_user
                  WHERE tbl_usuario.id_usuario = ".$_REQUEST['idUsuario'];

$queryModificar = mysqli_query($conexion,$sqlModificar);

 ?>
<div id="divModificar"><br/>
   <form id="formModificar" action="php/modificar.usuario.php" method="get">
      <?php
      if ($datosModificar = mysqli_fetch_array($queryModificar)) {
      ?>
      <table id="tablaModificacion">
         <tr>
            <th>Usuario:</th>
            <td><input type="email" name="email" value="<?php echo $datosModificar['email'];?>"></td>
         </tr>
         <tr>
            <th>Password:</th>
            <td><input type="password" name="password" value="<?php echo $datosModificar['password'];?>"></td>
         </tr>
         <tr>
            <th>Activo:</th>
            <td>
               <?php
                  if ($datosModificar['activo']) {
                     echo '
                     Si&nbsp;<input type="radio" name="activo" value="1" checked>&nbsp;
                     No&nbsp;<input type="radio" name="activo" value="0">&nbsp;';
                  }else {
                     echo '
                     Si&nbsp;<input type="radio" name="activo" value="1">&nbsp;
                     No&nbsp;<input type="radio" name="activo" value="0" checked>&nbsp;';
                  }
                ?>
            </td>
         </tr>
         <tr>
            <th>Tipo de usuario:</th>
            <td>
               <select name="tipoUsuario">
                  <?php
                     //se selecciona los datos para rellenar el select
                     $sqlOpt = "SELECT DISTINCT tbl_tipo_user.id_tipo_user, tbl_tipo_user.tipo_user, tbl_usuario.id_tipo_user
                                FROM tbl_tipo_user
                                INNER JOIN tbl_usuario on tbl_usuario.id_tipo_user = tbl_tipo_user.id_tipo_user";
                     //si el usuario no es root, no puede cambiar el tipo de usuario a root
                     if ($_SESSION['sId']<2) {
                        $sqlOpt .= " WHERE tbl_usuario.id_tipo_user != 2";
                     }

                     //se guarda el resultado de la consulta
                     $queryOpt = mysqli_query($conexion,$sqlOpt);

                     while ($selOpt = mysqli_fetch_array($queryOpt)) {
                        //si el valor recogido en el hidden formulario es = al valor recogido para rellenar el select
                        if ($selOpt['id_tipo_user']==$_REQUEST['idTipoUsuario']) {
                           //se recupera la opción que tiene el usuario asignado y se le añade la opción SELECTED
                           echo '<option value="'.$selOpt['id_tipo_user'].'" selected>'.$selOpt['tipo_user'].'</option>';
                        }else {
                           echo '<option value="'.$selOpt['id_tipo_user'].'">'.$selOpt['tipo_user'].'</option>';
                        }

                     }
                  ?>
               </select>
            </td>
         </tr>
      </table>
    <input type="hidden" name="userMod" value="<?php echo $datosModificar['id_usuario']; ?>">
    <input type="submit" class="reservar" alt="Insertar" title="Insertar" name="Insertar" value="Aceptar">
 <?php } ?>
   </form>
</div>
