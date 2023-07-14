<?php
 header('Content-Type: application/json');

include_once("../conexion.php");
$array = [];
$consulta = mysqli_query($conexion, "SELECT * FROM articulo");
while ($row = mysqli_fetch_assoc($consulta)) {
    $array[] = $row;
}
echo json_encode($array);