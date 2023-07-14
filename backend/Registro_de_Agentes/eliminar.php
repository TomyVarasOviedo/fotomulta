<?php
   include ("../conexion.php");
    
   $id = $_GET['id'];
   $eliminar = "DELETE FROM agentes WHERE dni='$id'";
   $resultadoEliminar = mysqli_query($conexion, $eliminar);
   echo json_encode("usuario eliminado");
?>