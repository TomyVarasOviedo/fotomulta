<?php
  include ("../conexion.php");

  $n_multa= $_POST["n_multa"];
  $n_patente= $_POST["n_patente"];
  $ubicacion= $_POST["ubicacion"];
  $fecha= $_POST["fecha"];
  $foto=$_POST["foto"];
  $fk_agente= $_POST["fk_agente"];
  $descripcion= $_POST["descripcion"];

  

  //actualizar datos
    $actualizar="UPDATE multa SET n_multa='$n_multa', n_patente='$n_patente', ubicacion='$ubicacion', 
     fecha='$fecha', foto='$foto', fk_agente='$fk_agente', descripcion='$descripcion' WHERE n_multa='$n_multa'";
  
    $consult="SELECT * FROM agentes a INNER JOIN multa m ON a.dni = m.fk_agente";

   $resultado= mysqli_query($conexion, $actualizar);

     if(!$resultado){
    echo 'No se pudo actualizar los cambios' ;
  }
  else{
    echo 'Los datos se han actualizado correctamente' ;
  }

  //Cerrar conexion
  mysqli_close($conexion);

?>