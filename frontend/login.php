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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../tutorial-openlayers-master/css/ol.css">
    <link rel="stylesheet" href="login.css">
    <title>Iniciar Session</title>
</head>
<body>
    <noscript>No tenes javascript</noscript>
    <!-- Navegacion -->
    <nav class="navbar navbar-expand-lg">
        <div class="toggle">
            <i class="fas fa-bars"></i>
        </div>
        <div class="sidebar">
            <div class="menu-header">
                <button><i class="fas fa-user"></i></button>
                <div class="info-user">
                    <ul>
                        <li>Nombre: <?php echo $_SESSION['nombre'] ?></li>
                        <li>Apellido: <?php echo $_SESSION['apellido'] ?></li>
                        <li>DNI: <?php echo $_SESSION['dni'] ?></li>
                    </ul>
                </div>
            </div>
            <ul>
                <li><a class="link" href="#">Inicio</a></li>
                <hr>
                <li><a class="link" href="#ingresar">Crear Multa</a></li>
                <hr>
                <li><a class="link" href="#buscar">Buscar Multa</a></li>
                <hr>
                <li><a class="link" href="#mapa">Mapa</a></li>
                <hr>
                <li><a class="link" href="../php/cerrarSession.php?nombre=<?php echo $_SESSION['nombre'] ?>">Cerrar Sesion</a></li>
            </ul>
        </div>
        <div class="logo">
            <img width="80"  src="../img/marca-lacosta.png" alt="">
        </div>
    </nav>
    <aside class="navbar-bottom">
        <ul>
            <li class="bot-link"><a href="#mapa" onClick="cerrarNavbar()"><i class="fas fa-map-marked-alt"></a></i></li>
            <li class="bot-link"><a href="#ingresar" onClick="cerrarNavbar()"><i class="fas fa-book-open"></a></i></li>
            <li class="bot-link"><a href="#buscar" onClick="cerrarNavbar()"><i class="fas fa-search"></i></a></li>
        </ul>
    </aside>
    <!-- Navegacion -->
    <!-- Inicio -->
    <div class="container">
        <section id="inicio" onClick="cerrarNavbar()">
            <h1 class="text-center">Estadisticas</h1>
            <div class="col-12">
                <button>Ultima Multa</button>
                <ul class="p-0 mt-3">
                    <li id="patente"></li>
                    <li id="numero"></li>
                    <li id="fecha"></li>
                </ul>
            </div>
            <div class="col-12 multa-count">
                <h1 class="text-center">Multas Realizadas Hoy</h1>
                <h3 class="text-center" id="contarMultas">0</h3>
            </div>
        </section>
    <!-- Inicio -->
    <!-- Ingresar Multa -->
    <section id="ingresar" onClick="cerrarNavbar()">
        <h1 class="text-center mt-5">Ingresar Multa</h1>
        <form id="formulario" class="col-12">
            <input type="text" name="usuario" id="inputUsuario" value="<?php echo $_SESSION['dni'] ?>" hidden>
            <input type="text" class="form-control p-3 mb-3" name="patente" Placeholder="N°Patente">
            <div class="container-input">
                <input type="file" name="imagen" id="file-1" class="inputfile inputfile-1" accept="image/*"/>
                <label for="file-1">
                    <i class="fas fa-camera" class="iborrainputfile" width="30"></i>
                </label>
            </div>
            <select name="articulo[]" id="articulos" class="js-example-basic-multiple js-states form-control p-2 mb-3" multiple="multiple" style="width:100%">
            </select>
            <textarea name="descripcion" class="form-control my-3" placeholder="Descripcion"></textarea>
            <div class="errorDiv text-center"></div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-info px-3 py-2">Agregar</button>
            </div>
        </form>
    </section>
    <!-- Ingresar Multa -->
    <!-- Buscar Multa -->
    <section id="buscar" onClick="cerrarNavbar()">
        <h1 class="text-center mt-5">Buscar Multa</h1>
        <div class="buscador p-4">
        <form id="formularioBuscar">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar Multa...." aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
        </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Patente</th>
                    <th scope="col">N°de Multa</th>
                    <th scope="col">fecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </section>
    <!-- Buscar Multa -->
    <!-- Mapa -->
    <section id="mapa" role="main" onClick="cerrarNavbar()">
        <h1 class="text-center mt-0">Mapa de Multas</h1>
        <div class="row">
            <select id="selectCategorias">
                <option value="veterinarias">Multas</option>
            </select>
            <div class="col-12">
                <div id="map" class="map"></div>
            </div>
        </div>
    </section>
    <!-- Mapa -->
    </div>
    <!-- Templates -->
    <template id="tabla-fila">
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
        </tr>
    </template>
    <!-- Templates -->
    <!-- JS -->
    <script src="js/geolocalizacion.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.6.1/build/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../tutorial-openlayers-master/js/ol.js"></script>
    <script src="../tutorial-openlayers-master/js/script.js"></script>
    <script src="js/front.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Seleccione un articulo'
            });
        });
    </script>
</body>
</html>