<?php
header('Content-Type: application/json');
include_once("../conexion.php");
$n_multa = $_GET['multa'];
$articulos = [];
$consulta = mysqli_query($conexion, "SELECT n_multa, fk_agente, id_articulo, n_articulo, articulo.descripcion FROM `multa` INNER JOIN multa_articulo INNER JOIN articulo ON multa.n_multa = multa_articulo.fk_multa AND multa_articulo.fk_articulo = articulo.id_articulo WHERE n_multa = $n_multa");
while ($row = mysqli_fetch_assoc($consulta)) {
    $articulos[] = $row;
}
echo json_encode($articulos);