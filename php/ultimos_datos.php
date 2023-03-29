<?php
  include_once 'conexion.php';
  $conexion = new DB();

  $query = $conexion -> connect() -> query("SELECT * FROM dispositivo ORDER BY fecha DESC LIMIT 1");
  $query -> execute();

  $row = $query -> fetch();

  $json = array("fecha" => strftime("%I:%M %p", strtotime($row['fecha'])), "oxigeno" => $row['oxigeno'], "temperatura" => $row['temperatura'], "turbidez" => $row['turbidez'], "dioxido_carbono" => $row['dioxido_carbono']);

  echo json_encode($json);
?>