<?php
include_once('../conexion.php');
    session_start();
    if (!isset($_SESSION['dni'])) {
        header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../multas/multas.css">
    <link rel="stylesheet" href="../../tutorial-openlayers-master/css/ol.css">
    <link rel="stylesheet" href="../../tutorial-openlayers-master/css/styles.css">
    <title>Inicio</title>
</head>
<body>
    <?php include("../menu.php") ?>
    <div class="container-fluid">
        <div class="jumbotron pb-3 text-center">
            <h1>Panel de control</h1>
        </div>
        <div class="row text-center">
            <div class="col-md-6 row justify-content-center">
                <div class="col-md-6 ">
                    <div class="card pb-3">
                        <h2>Agregar Administrador</h3>
                        <a href="../Registrar_Agentes/admnistradores.php" class="btn btn-danger mx-3">Agregar</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card pb-3">
                        <h2>Agregar Articulo</h3>
                        <a href="../articulo/articulo.php" class="btn btn-danger mx-3">Agregar</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card pb-3">
                        <h2>Agregar Agentes</h3>
                        <a href="../Registrar_Agentes/registrar.php" class="btn btn-danger mx-3">Agregar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 row justify-content-center">
                <div class="col-md-6 mb-2">
                    <div class="card py-3">
                        <h3>Multas realizadas</h3>
                        <h1 id="contaMultas">0</h1>
                        <a href="../multas/multas.php" class="btn btn-danger mx-3">Lista de multas</a>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card py-3">
                        <h3> Agentes actualmente</h3>
                        <h1 id="contaAgentes">0</h1>
                        <a href="../Registro_de_Agentes/interfas.php" class="btn btn-danger mx-3">Lista de Agentes</a>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card py-3">
                        <h3>Articulos actualmente</h3>
                        <h1 id="contaArticulo">0</h1>
                        <a href="../articulo/articulo_lista.php" class="btn btn-danger mx-3">Lista de Articulo</a>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card py-3">
                        <h3>Administradores actualmente</h3>
                        <h1 id="contaAdmin">0</h1>
                        <a href="../articulo/admin.php" class="btn btn-danger mx-3">Lista de Administradores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../frontend/js/geolocalizacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.6.1/build/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
    <script src="../../tutorial-openlayers-master/js/ol.js"></script>
    <script src="../../tutorial-openlayers-master/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/inicio.js"></script>
</body>
</html>