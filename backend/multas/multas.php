<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="../../fontawesome/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css"> 

      <link rel="stylesheet" href="multas.css">
      <title>Multas</title>
    </head>

    <body>
      <?php include('../menu.php') ?>
      <div class="container">
        <table id="tabla" class="display table-striped table-hover text-center">
          <thead class="menu-color text-dark mt-5">
              <tr>
                  <th>N° Multa</th>
                  <th>Patente</th>
                  <th>Fecha</th>
                  <th>Agente</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
              <tr>
                  <th>N° Multa</th>
                  <th>Patente</th>
                  <th>Fecha</th>
                  <th>Agente</th>
                  <th>Acciones</th>
              </tr>
          </tfoot>
      </table>
      </div>

      <!-- ---TEMPLATES--- -->
      <template id="my-template">
        <swal-html>
        </swal-html>
      </template>
     <!-- ---TEMPLATES--- -->

      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      <script src="multas.js"></script>
      <script>
        $(document).ready( function () {
         var tabla =  $('#tabla').DataTable( {
            "ajax":{
                 "url": "https://www.tecnica1lacosta.com.ar/multa/backend/multas/buscador.php",
                  "dataSrc":""
               },
                "columns":[
                  {"data":"n_multa"},
                  {"data":"n_patente"},
                  {"data":"fecha"},
                  {"data":"fk_agente"},
                  {"defaultContent":"<button data-swal-toast-template='#my-template' class='btn btn-info mx-1 btn-mapa'><i class='fa fa-check-square'></i></button>"}
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
          } );
          obtenerIdMulta("#tabla tbody", tabla)
        } );
      </script>
    </body>
</html>