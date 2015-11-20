<?php
//se continúa la sesión
session_start();
//conexión bd
include 'php/conexion.php';
//consultar session
include 'php/session.php';

$sqlMaterial = "SELECT * FROM tbl_material where tbl_material.id_material = ".$_REQUEST['material']." LIMIT 1";

$sqlReserva = "SELECT tbl_reservas.*, tbl_material.*,tbl_usuario.*,tbl_tipo_material.*,tbl_tipo_user.*
               FROM tbl_usuario
               INNER JOIN tbl_reservas on tbl_reservas.id_usuario = tbl_usuario.id_usuario
               INNER JOIN tbl_material on tbl_reservas.id_material = tbl_material.id_material
               INNER JOIN tbl_tipo_material on tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material
               INNER JOIN tbl_tipus_user on tbl_tipo_user.id_tipus_user = tbl_usuario.id_tipo_user";

$datosMaterial = mysqli_query($conexion,$sqlMaterial);

?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <?php include 'template/header.html';  ?>
  </head>
<body><a name="top">
        <!--BARRA NEGRA SUPERIOR -->
      <?php include 'php/session.cabecera.php' ?>

        <!--BARRA DE MENÚ -->
      <header>
        <section id="cabecera">
          <figure>
            <a href="index.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
            <ul>
              <a href="main.php"><li>INICIO</li></a>
              <a href="reserva.php"><li>RESERVAS</li></a>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">
         </div>
      </div>
        <main>
        	<section id="centro">
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
            <?php if($datos = mysqli_fetch_array($datosMaterial)){?>
               <div id="divModificar"><br/>
                  <form id="formReserva" action="php/reserva.material.reservar.php" method="get">
                     <table id="tablaReserva">
                        <tr><th>MATERIAL</th></tr>
                        <tr>
                           <td><?php echo utf8_encode($datos['descripcion']) ?></td></tr>
                        <tr>
                           <th>Fecha Inicio:</th>
                           <td><input type="datetime-local" name="fechaInicio" value=""></td>
                        </tr>
                        <tr>
                           <th>Fecha Final:</th>
                           <td><input type="datetime-local" name="fechaInicio" value=""></td>
                        </tr>
                     </table>
                     <input type="hidden" name="userMod" value="<?php echo $datosModificar['id_usuario']; ?>">
                     <input type="submit" class="reservar" alt="Insertar" title="Insertar" name="Insertar" value="Reservar">
                     <input type="button" onclick="window.location: main.php?opcion=3" class="reservar" alt="Volver" title="Volver" name="Volver" value="Volver">
                  </form>
            <?php } ?>
        	</section>
        </main>
    </body>
</html>
