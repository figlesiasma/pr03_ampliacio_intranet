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
       <input type="hidden" name="idUsuario" value="<?php echo $mostrar['id_usuario'];?> ">
       <input type="hidden" name="idTipoUsuario" value="<?php echo $mostrar['id_tipo_user'];?> ">
       <input type="hidden" name="activo" value="<?php
       if($mostrar['activo']){
          echo '0';
       } else{
          echo '1';
       }
       ?>">
       <input type="submit" name="modificar" class="userForm userModificar" type="button" value="">
       <?php if($mostrar['activo']){ ?>
            <input type="submit" onclick="this.form.action='php/bloquear.desbloquear.usuario.php';" name="activar" class="userForm userInactivo" title="Bloquear" alt="Bloquear" value="">
       <?php }else { ?>
            <input type="submit" onclick="this.form.action='php/bloquear.desbloquear.usuario.php';" name="desactivar" class="userForm userActivo" title="Desbloquear" alt="Desbloquear" value="">
       <?php } ?>
       <br/><br/><br/>
       <a href="#top"><img src="img/top.png" alt="Subir" title="Subir"></a>
   </div><br/>
 </form>

</div>
</div><br/>
