<?php
  include_once 'conexion.php';
  $conexion = new DB();

  $fecha = $_POST['fecha'];

  $query = $conexion -> connect() -> query("SELECT * FROM dispositivo WHERE DATE_FORMAT(fecha, '%Y-%m-%d') = '$fecha' ORDER BY fecha");
  $query -> execute();

  $datos = $query -> fetchAll();

  $array = array();
  $tempArray = array();

  foreach($datos as $i){
    $tempArray = array("fecha" => strftime("%I:%M %p", strtotime($i['fecha'])), "oxigeno" => $i['oxigeno'], "temperatura" => $i['temperatura'], "turbidez" => $i['turbidez'], "dioxido_carbono" => $i['dioxido_carbono']);
    array_push($array, $tempArray);
  }

  echo json_encode($array);
?>