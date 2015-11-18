<!--
tbl_usuario: activo, email, id_tipo_user, id_usuario, password
-->
<div id="divMaterial"><br/>
 <form id="formMaterial" action="modificacion.php" method="get">
   <div id="formQuery">
      <div id="formQueryFoto">
       <p><img class ="fotoMini" src="img/material/no_disponible.jpg" alt="" title"" /></p>
      </div>
      <div id="formQueryTexto">
       <p id="formTituloMaterial"><?php echo utf8_encode($mostrar['email']); ?></p>
       <p>Activo: <?php
          if($mostrar['activo']){
           echo "<img src='img/ok.png' alt='Ok' title='Ok' />";
          }else {
           echo "<img src='img/ko.png' alt='Ko' title='Ko' />";
        }?></p>
       <p>Tipo de usuario: <?php echo utf8_encode($mostrar['tipo_user']); ?></p>
          <!-- campo oculto para enviar el id_USUARIO -->
       <input type="hidden" name="idUsuario" value="<?php echo $mostrar['id_usuario'];?>">
       <input type="hidden" name="idTipoUsuario" value="<?php echo $mostrar['id_tipo_user'];?>">
       <input type="submit" name="modificar" class="userForm userModificar" type="button" value="">
       <?php
        if($mostrar['activo']){
            echo '<input type="submit" name="activar" class="userForm userInactivo" title="Bloquear" alt="Bloquear" value="">';
        }else {
            echo '<input type="submit" name="desactivar" class="userForm userActivo" title="Desbloquear" alt="Desbloquear" value="">';
        }
       ?><br/><br/><br/>
       <a href="#top"><img src="img/top.png" alt="Subir" title="Subir"></a>
   </div><br/>
 </form>

</div>
</div><br/>
