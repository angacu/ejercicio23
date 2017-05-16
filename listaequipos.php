<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de equipos</title>
  </head>
  <body>
    <?php
      include 'dbNBA.php';
      $equipo=new dbNBA();
      ?>
      <table border="1.5px">
        <thead>
         <tr>
           <th>Nombre</th>
           <th>Ciudad</th>
           <th>Conferencia</th>
           <th>Division</th>
           <th>Borrar</th>
         </tr>
        </thead>
      <?php
      $tablalista=$equipo->ListaEquipos();
      foreach ($tablalista as $fila) {
          echo "<tr><td>" .$fila["Nombre"] ."</td><td>" .$fila["Ciudad"] ."</td><td>" .$fila["Conferencia"] ."</td><td>" .$fila["Division"] ."</td><td><a href='borrarDB.php?nombre=".$fila["Nombre"]."'>Borrar registro</a></td></tr>";
      }
     ?>
     </table>
  </body>
</html>
