<?php
include_once 'conexion.php';
$conexion = new DB();

$oxigeno = $_POST['oxigen'];
$temperatura = $_POST['temp'];
$turbidez = $_POST['turbidez'];
$co2 = $_POST['dioxido'];
$fecha = date('Y-m-d H:i:s');

$query = $conexion->connect()->prepare("INSERT INTO dispositivo(fecha, oxigeno ,temperatura, turbidez, dioxido_carbono) VALUES(:fecha, :oxigeno ,:temperatura, :turbidez, :dioxido_carbono)");
$query->bindParam("fecha", $fecha, PDO::PARAM_STR);
$query->bindParam("oxigeno", $oxigeno, PDO::PARAM_INT);
$query->bindParam("temperatura", $temperatura, PDO::PARAM_INT);
$query->bindParam("turbidez", $turbidez, PDO::PARAM_INT);
$query->bindParam("dioxido_carbono", $co2, PDO::PARAM_INT);
echo $query -> execute()
?>