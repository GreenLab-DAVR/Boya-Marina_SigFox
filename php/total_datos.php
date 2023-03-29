<?php
  include_once 'conexion.php';
  $conexion = new DB();

  $query = $conexion -> connect() -> query("SELECT * FROM dispositivo WHERE DATE_FORMAT(fecha, '%Y-%m-%d') = CURDATE() ORDER BY fecha");
  $query -> execute();

  echo json_encode($query -> rowCount());
?>