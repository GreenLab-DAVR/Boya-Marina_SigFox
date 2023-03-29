<?php
  include_once 'conexion.php';
  $conexion = new DB();

  $query = $conexion -> connect() -> query("SELECT * FROM coordenadas ORDER BY fecha DESC LIMIT 1");
  $query -> execute();

  $row = $query -> fetch();

  echo json_encode($row);
?>