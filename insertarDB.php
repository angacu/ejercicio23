<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insertar nuevo equipo</title>
  </head>
  <body>
    <?php
    // comprobacion para ver que los campos no estan vacios, en el caso de estarlo dara error.
    if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {
      // invclude para la bbdd y creacion de objeto
      include 'dbNBA.php';
      $equipo=new dbNBA();
      // llamamos a la funcion que nos inserta en la bd
      $resultado=$equipo->Insertarequipo($_POST["nombre"],  $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);
      // filtrado UltimoEquipo por nombre
      echo "ULTIMO REGISTRO: <br>";
      $tablaequipo=$equipo->DevolverEquipoNombre($_POST["nombre"]);
      foreach ($tablaequipo as $fila) {
        echo "Nombre: " .$fila["Nombre"] ."<br>Ciudad: " .$fila["Ciudad"] ."<br>Conferencia: " .$fila["Conferencia"] ."<br>Division: " .$fila["Division"];
      }
      // actualizar datos acabados de insertar
      echo "<br>";
      echo "<a href='actualizar.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>";
      echo "<br>";
      echo "<a href='listaequipos.php'>Borrar registro.</a>";
    }else {
      echo "<a href='index.php'> Debes rellenar todos los campos </a>";
    }
     ?>
  </body>
</html>
