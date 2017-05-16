<?php
// conexion vs base de datos
class dbNBA
{
  // atributos necesarios para la conexion.
    private $host="localhost";
      private $user="root";
        private $pass="root";
          private $db_name="nba";

  // objeto conector
  private $conexion;

  // control de errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  // control de error en la conexion
  function hayError(){
    return $this->error;
  }

  // insertar en base de datos:
  public function Insertarequipo($nombre, $ciudad, $conferencia, $division)
  {
    $equipo="INSERT INTO equipos(Nombre, Ciudad, Conferencia, Division) VALUES ('".$nombre."', '".$ciudad ."', '" .$conferencia ."', '" .$division ."')";
    if (!$this->conexion->query($equipo)) {
      echo "Falló la creacion de la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
      return false;
    }
  }

  // devolver ultimo equipo x nombre
  public function DevolverEquipoNombre($nombre)
  {
    $tablaequipo=[];
    $equipo="SELECT * FROM equipos WHERE Nombre='" .$nombre ."'";
    if($this->error==false){
      $resultado = $this->conexion->query($equipo);
      while($fila=$resultado->fetch_assoc()){
        $tablaequipo[]=$fila;
      }
      return $tablaequipo;
    }else{
      return null;
    }
  }

  // actualizarr
  public function ActualizarEquipo($nombre, $ciudad, $conferencia, $division)
  {
    if ($this->error==false) {
          $actualizar="UPDATE equipos SET Nombre='" .$nombre ."', Ciudad='" .$ciudad ."', Conferencia='" .$conferencia ."', Division='" .$division ."' WHERE Nombre='" .$nombre ."'";
    if (!$this->conexion->query($actualizar)) {
          echo "Falló la actualizacion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else {
      return false;
    }
  }

  // borrado
  public function BorrarEquipo($nombre)
  {
    if($this->error==false)
    {
        $borrar="DELETE FROM equipos WHERE Nombre='".$nombre ."'";
    if (!$this->conexion->query($borrar)) {
        echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }

  // listar equipos funcion
  public function ListaEquipos()
  {
    $tablalista=[];
    $equipos="SELECT * FROM equipos";
    if($this->error==false){
      $resultado = $this->conexion->query($equipos);
      while ($fila=$resultado->fetch_assoc()) {
        $tablalista[]=$fila;
      }
      return $tablalista;
    }else{
      return null;
    }
  }

}
 ?>
