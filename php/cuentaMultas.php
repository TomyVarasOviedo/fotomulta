<?php
include_once('../conexion.php');
$usuario = $_GET['usuario'];
$FechaHoy = date("Y-m-d",time());
$consulta = mysqli_query($conexion, "SELECT COUNT(*) FROM `multa` WHERE fk_agente = '$usuario' AND fecha LIKE '$FechaHoy%'");
$row = mysqli_fetch_assoc($consulta);
echo json_encode($row['COUNT(*)']);