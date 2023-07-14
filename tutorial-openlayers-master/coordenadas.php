
<?php
header("Content-type:application/json");
include("../conexion.php");
if (empty($_GET["categoria"])) {
    exit("No hay categoría");
}
if (empty($_GET['usuario'])) {
    exit("usuario no encontrado");
}
$categoria = $_GET["categoria"];
$usuario = $_GET["usuario"];
$fecha_actual = date("Y-m-d",time());

#TODO: hacerlo en una BD
$posiciones = array();
$consulta = mysqli_query($conexion, "SELECT longitud, latitud, n_patente, n_multa FROM multa WHERE fk_agente = ".$usuario." AND fecha LIKE '$fecha_actual%'");
while ($array = mysqli_fetch_row($consulta)) {
    $posiciones[] = $array;
}
echo json_encode([
    "icono"=>"auto.png",
    "coordenadas"=>$posiciones,
]);
