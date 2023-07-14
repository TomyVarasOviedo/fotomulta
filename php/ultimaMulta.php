<?php
include_once('../conexion.php');
$usuario = $_GET['usuario'];
$consulta = mysqli_query($conexion, "SELECT * FROM multa WHERE fk_agente = '$usuario' ORDER BY n_multa DESC LIMIT 1");
$datos = new stdClass();
$row = mysqli_fetch_assoc($consulta);

$datos->id = $row['n_multa'];
$datos->patente = $row['n_patente'];
$datos->fecha = $row['fecha'];

echo json_encode($datos);