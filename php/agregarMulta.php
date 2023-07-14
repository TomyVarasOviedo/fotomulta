<?php
    include_once('../conexion.php');
    $datos = new stdClass();
    $datos->patente = $_POST['patente'];
    $datos->id_multa = $_POST['num_multa'];
    $datos->usuario = $_POST['usuario'];
    $datos->latitud = $_POST['latitud'];
    $datos->longitud = $_POST['longitud'];
    $datos->imagen = $_FILES['imagen']['name'];
    $datos->imagenTipo = $_FILES['imagen']['type'];
    $datos->articulo = $_POST['articulo'];
    $datos->descripcion = $_POST['descripcion'];
    $datos->fecha = $_POST['fecha'];
        $insertar = mysqli_query($conexion, "INSERT INTO multa VALUES (NULL,'$datos->patente','$datos->fecha','$datos->latitud','$datos->longitud','$datos->imagen','$datos->usuario','$datos->descripcion')");    
        $consulta_id = mysqli_query($conexion, "SELECT * FROM multa ORDER BY n_multa DESC LIMIT 1");
        // var_dump($consulta_id);
        $id_multa=mysqli_fetch_assoc($consulta_id);
        foreach ($datos->articulo as $i => $articulo) {
            $insertar_articulo = $conexion->query("INSERT INTO multa_articulo VALUES (null, '".$id_multa['n_multa']."','$articulo')");
        }  
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/fotomulta/img/';
    move_uploaded_file($_FILES ['imagen']['tmp_name'] , $carpeta_destino . $datos->imagen);
    echo json_encode("Datos Guardados");