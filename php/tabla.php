<?php
  include_once 'conexion.php';
  $conexion = new DB();

  $query = $conexion -> connect() -> query("SELECT * FROM dispositivo ORDER BY fecha ASC");
  $query -> execute();
  $datos = $query -> fetchAll();

  $array = array();
  $tempArray = array();

  foreach($datos as $i){
    $tempArray = array("id_mensaje" => $i['id_mensaje'], "fecha" => strftime("%I:%M %p", strtotime($i['fecha'])), "oxigeno" => $i['oxigeno'], "temperatura" => $i['temperatura'], "turbidez" => $i['turbidez'], "dioxido_carbono" => $i['dioxido_carbono']);
    array_push($array, $tempArray);
  }

  echo json_encode($array);

?>