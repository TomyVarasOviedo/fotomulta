<?php
header('Content-Type: application/json');
include("../conexion.php");
$conMulta = mysqli_query($conexion, "SELECT COUNT(*) FROM multa");
$conArticulo = mysqli_query($conexion, "SELECT COUNT(*) FROM articulo");
$conAgentes = mysqli_query($conexion, "SELECT COUNT(*) FROM agentes");
$conAdmin = mysqli_query($conexion, "SELECT COUNT(*) FROM administradores");

$multas = mysqli_fetch_assoc($conMulta);
$articulos = mysqli_fetch_assoc($conArticulo);
$agentes = mysqli_fetch_assoc($conAgentes);
$admins = mysqli_fetch_assoc($conAdmin);

$objeto = new stdClass();
$objeto->multa = $multas["COUNT(*)"];
$objeto->articulo = $articulos["COUNT(*)"];
$objeto->agentes = $agentes["COUNT(*)"];
$objeto->admin = $admins["COUNT(*)"];
// var_dump($multas);
echo json_encode($objeto);