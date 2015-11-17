<div id="divMaterial"><br/>
 <form id="formMaterial" action="php/reservar.php" method="get">
   <div id="formQuery">
      <div id="formQueryFoto">
       <p><img class ="fotoMini" src="img/material/<?php echo $mostrar['id_material']; ?>.jpg" alt="" title"" /></p>
      </div>
      <div id="formQueryTexto">
       <p id="formTituloMaterial"><?php echo utf8_encode($mostrar['descripcion']); ?><p>
       <p>Disponibilidad: <?php
          if(!$mostrar['disponible']){
           echo "<img src='img/ok.png' alt='Ok' title='Ok' />";
          }else {
           echo "<img src='img/ko.png' alt='Ko' title='Ko' />";
          }
       ?><p>
       <p>Incidencia:<?php
          if($mostrar['incidencia']){
           echo "Si";
          }else {
           echo "No";
          }
       ?><p>
       <p>Tipo de incidencia:<?php echo utf8_encode($mostrar['descripcion_incidencia']); ?><p>
          <!-- campo oculto para enviar el id_material -->
       <input type="hidden" name="disponibilidad" value="<?php echo $mostrar['disponible']; ?>">
       <input type="hidden" name="material" value="<?php echo $mostrar['id_material']; ?>">
       <!-- Se comprueba el valor de disponible y se asigna un texto al botón -->
       <input type="submit" id="reservar" name="reservar" value=<?php
          if(!$mostrar['disponible']){
           echo "Reservar";
          }else {
           echo "Devolver";
          }
          ?>
       <a href="#top"><img src="img/top.png" alt="Subir" title="Subir"/></a>
      </div>
   </div><br/>
 </form>
</div><br/>
