<?php
  // include ("../conexion.php");
  // include ("../menu.php");
  // $agentes= "SELECT * FROM agentes ";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agentes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css"> 
  <link rel="stylesheet" href="../../fontawesome/css/all.css">
  <link rel="stylesheet" href="interfas.css">
  <link rel="stylesheet" href="../../tutorial-openlayers-master/css/ol.css">
  <link rel="stylesheet" href="../../tutorial-openlayers-master/css/styles.css">
</head>
  <body>
    <?php include('../menu.php'); ?>
      <div class="container">
        <table id="tabla" class="display table-striped table-hover text-center">
          <thead class="menu-color text-dark mt-5 p-3">
              <tr>
                  <th>D.N.I</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <!-- <th>Contraseña</th> -->
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th></th>

              </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
              <tr>
                  <th>D.N.I</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <!-- <th>Contraseña</th> -->
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th></th>
              </tr>
          </tfoot>
      </table>
      </div>
    </div>
    <script src="../../frontend/js/geolocalizacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.6.1/build/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
    <script src="../../tutorial-openlayers-master/js/ol.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="confirmacion.js"></script>
    <script>
      $(document).ready(function () {
        var table = $('#tabla').DataTable({
          "ajax":{
                 "url": "agentes.php",
                  "dataSrc":""
               },
                "columns":[
                  {"data":"dni"},
                  {"data":"nombre"},
                  {"data":"apellido"},
                  // {"data":"contra"},
                  {"data":"mail"},
                  {"data":"telefono"},
                  {"defaultContent":"<button class='btn btn-info mx-1 btn-mapa'><i class='fa fa-check-square'></i></button><button class='btn btn-danger mx-1'><i class='fa fa-times'></i></button>"}
                  
              ],
              "language": {
                            "sZeroRecords": "No se encontraron datos",
                            "paginate": {
                                "first":      "Primero",
                                "last":       "Ultimo",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                            },
                            "search": "Buscar:",
                            "lengthMenu": 'Se muestran <select>'+
                                '<option value="5">5</option>'+
                                '<option value="10">10</option>'+
                                '<option value="20">20</option>'+
                                '<option value="40">40</option>'+
                                '<option value="100">100</option>'+
                                '<option value="-1">Todos</option>'+
                            '</select> registros'
                          },
            "pageLength": 5
        })
        obtenerMapa("#tabla tbody", table)
        obtenerdata("#tabla tbody", table)
      });
    </script>
  </body>
</html>