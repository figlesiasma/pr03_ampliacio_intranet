<?php
//se continúa la sesión
session_start();
//conexión bd
include 'php/conexion.php';
//consultar session
include 'php/session.php';
// mensaje de retorno al reservar
include 'php/reserva.mensaje.php';

//Filtración de opciones donde se comprueba la opción de admin para filtrar por usuarios
include 'php/main.filtrar.opciones.php';

?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
   <head>
       <?php include 'template/header.html';  ?>
   </head>
    <body>
      <a name="top">
        <!--BARRA NEGRA SUPERIOR -->
      <div id="barraNegra">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li id="identificate">Hola <?php echo $_SESSION['sUser']?> </li>
            <li><a href="php/salir.php"><img src="img/exit.png" alt="Salir" title="Salir" /></a></li>
          </ul>
        </div>
      </div>

        <!--BARRA DE MENÚ -->
      <header>
        <section id="cabecera">
          <figure>
            <a href="index.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
             <?php include 'php/main.nav.php'; ?>
          </nav>
        </section>
      </header>

      <div id="barraNegraDatos">
         <div id="barraOpciones">
           <!-- FORMULARIO SELECT PARA FILTRAR EL CONTENIDO -->
           <?php include 'php/main.form.filtrar.php' ?>
         </div>
      </div>
        <main>
        	<section id="centro">
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
            <?php
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              //si se devuelve un valor diferente a 0 (hay datos)
              if(mysqli_num_rows($datos)!=0){
                while ($mostrar = mysqli_fetch_array($datos)) {
                  if($_REQUEST['opciones']!=3){
                     include 'php/main.mostrar.datos.material.php';
                  }else {
                     include 'php/main.mostrar.datos.usuarios.php';
                  }
                }//fin while $mostrar
              }else {
                include 'php/nohaydatos.php';
              }
            ?>
        	</section>
        </main>
    </body>
</html>
