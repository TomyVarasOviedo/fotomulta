<?php
   header('Content-Type: application/json');
    include('../conexion.php');
    $agentes = [];
    $consulta = mysqli_query($conexion, "SELECT * FROM agentes");
   while ($row = mysqli_fetch_assoc($consulta)) {
      $agentes[] = $row;
   }

   echo json_encode($agentes);