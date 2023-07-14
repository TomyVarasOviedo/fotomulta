<?php
header("Content-type:application/json");
include("../conexion.php");
if (empty($_GET["categoria"])) {
    exit("No hay categoría");
}
if (empty($_GET['patente'])) {
    exit("patente no encontrada");
}
$categoria = $_GET["categoria"];
$patente = $_GET["patente"];

#TODO: hacerlo en una BD
$posiciones = array();
$consulta = mysqli_query($conexion, "SELECT * FROM multa WHERE n_patente = '$patente' ORDER BY  n_multa DESC LIMIT 1");
while ($array = mysqli_fetch_row($consulta)) {
    $posiciones[] = $array;
}
echo json_encode([
    "icono"=>"auto.png",
    "coordenadas"=>$posiciones,
]);