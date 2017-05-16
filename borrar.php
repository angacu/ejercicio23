<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar</title>
  </head>
  <body>
    <?php
      include 'dbNBA.php';
          $equipo=new dbNBA();
      // funcion
      $borrar=$equipo->BorrarEquipo($_GET["nombre"]);
          if ($borrar==true) {
      ?>
       <em>Borrado realizado</em>
          <a href="index.php">Inicio</a>
          <a href="listaequipos.php">Borrar Otro</a>
       <?php
      }else {
        ?>
          <a href="listaequipos.php">Error en el borrado</a>
      }
  </body>
</html>
