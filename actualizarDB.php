<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar ultimoInsertado</title>
  </head>
  <body>
    <?php
  if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {

    // incluimos la base de datos
    include 'dbNBA.php';
    $equipo=new dbNBA();
    // para actualizar esta funcion:
    $actualizar=$equipo->ActualizarEquipo($_POST["nombre"], $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);
    // devolvemos el ultimo insertado
    if ($actualizar==true) {
      $tablaequipo=$equipo->DevolverEquipoNombre($_POST["nombre"]);
      foreach ($tablaequipo as $fila) {
        echo "Nombre: ".$fila["Nombre"]."<br>";
        echo "Ciudad: ".$fila["Ciudad"]."<br>";
        echo "Conferencia: ".$fila["Conferencia"]."<br>";
        echo "Division: ".$fila["Division"]."<br>";
      }
    // enlaces
        echo "<br>";
        echo "<a href='actualizar.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>"
        echo "<br>";
        echo "<a href='listaequipos.php'>Borrar registro.</a>";
    }else {
      echo "Error en la actualizacion";
        }
      }
     ?>
  </body>
</html>
