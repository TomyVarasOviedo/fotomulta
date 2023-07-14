<?php
   header('Content-Type: application/json');
   include_once("../conexion.php");
   $multas = [];
    $consulta = mysqli_query($conexion, "SELECT * FROM `multa`");
   while ($row = mysqli_fetch_assoc($consulta)) {
      $multas[] = $row;
   }
   echo json_encode($multas);
?>