<form action="main.php" method="get">
 <span style="color:white;">Filtrar por:</span><select name="opciones" onchange="this.form.submit()">
    <option value="" disabled selected>-Elige una opción-</option>
    <option value="0">Todo</option>
    <?php
       //Rellenar datos del SELECT con los datos de la base de datos
       $sqlTipo = "SELECT * FROM tbl_tipo_material";
       //consulta del select
       $query = mysqli_query($conexion,$sqlTipo);
       //variable para numerar la opción admin
       $i=1;
       //mientras por cada dato en el array $query
       while ($mostrarOpciones = mysqli_fetch_array($query)) {
       //crea una opción en el dato extraido de la base de datos
          echo "<option value='$mostrarOpciones[id_tipo_material]'>$mostrarOpciones[tipo]</option>";
          $i++;
       }
       if ($_SESSION['sId']>0){
          echo "<option value='$i'>Usuarios</option>";
       }
     ?>
   </select>
</form>
