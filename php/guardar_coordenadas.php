<?php
include_once 'conexion.php';
$conexion = new DB();

$latitud = $_POST['lat'];
$longitud = $_POST['lng'];
$fecha = date('Y-m-d H:i:s');

$query = $conexion->connect()->prepare("INSERT INTO coordenadas(fecha, latitud, longitud) VALUES(?, ?, ?)");
$query -> bindValue(1, $fecha);
$query -> bindValue(2, $latitud);
$query -> bindValue(3, $longitud);
echo $query -> execute()
?>