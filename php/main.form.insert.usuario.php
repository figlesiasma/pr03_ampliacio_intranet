<!--
tbl_usuario: activo, email, id_tipo_user, id_usuario, password

tbl_tipo_user: id_tipo_user, tipo_user
-->
<div id="divInsert"><br/>
   <div id="imgInsertarUser">
      <table>
         <tr>
            <td>
               <a href="#" onclick="mostrarInsertar()"><img id="imgIn" src="img/user-plus.png" alt="" /></a>
            </td>
            <th>
               <span id="tituloUserIn">NUEVO USUARIO</span>
            </th>
         </tr>
      </table>
   </div>
   <form id="formInsert" action="php/insertar.php" method="get">
      <div id="formQueryInsert">
         <div id="formQueryTextoInsert">
          <p>Usuario:</p>
          <p><input type="email" name="userIN" value="" selected required> </p>
          <p>Password:</p>
          <p><input type="pass" name="passIN" value="" required></p>
          <p>Tipo: <select name="rolIN">
             <option value="0">Usuario</option>
             <option value="1">Administrador</option>
             <?php
               if ($_SESSION['sId']==2) {
                  echo "<option value='2'>Root</option>";
               }
              ?>
          </select></p>
          <p>Activo: <select name="activo">
             <option value="0" selected>Si</option>
             <option value="1">No</option>
          </select></p>
          <input type="hidden" name="activo" value="0">
          <input type="submit" class="reservar" alt="Insertar" title="Insertar" name="Insertar" value="Insertar">
         </div>
      </div><br/>
   </form>
</div><br/>
