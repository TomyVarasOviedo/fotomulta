<?php
//include('../conexion.php');
 $conexion = mysqli_connect("mysql.hostinger.com.ar","u878650187_multa", "Abc.12345678", "u878650187_multa") or die("Error en conexion");
$dni = $_POST['dni'];
$contra = $_POST['contra'];

// $query = "SELECT * FROM agentes");
$consulta = mysqli_query($conexion, "SELECT * FROM agentes WHERE dni=' $dni ' AND contra = '$contra'");
$array_usuario = mysqli_fetch_assoc($consulta);
$consulta_admin = mysqli_query($conexion, "SELECT * FROM administradores WHERE dni=' $dni ' AND contra = '$contra'");
$array_admin = mysqli_fetch_assoc($consulta_admin);
if ($array_usuario != null) {
    session_start();
    $_SESSION['dni'] = $array_usuario['dni'];
    $_SESSION['nombre'] = $array_usuario['nombre'];
    $_SESSION['apellido'] = $array_usuario['apellido'];
    header("Location: ../frontend/login.php");
}elseif ($array_admin != null) {
    session_start();
    $_SESSION['dni'] = $array_admin['dni'];
    $_SESSION['nombre'] = $array_admin['nombre'];
    $_SESSION['apellido'] = $array_admin['apellido'];
    header("Location: ../backend/inicio/inicio.php");
}else {
    header("Location: ../index.html");
}
?>