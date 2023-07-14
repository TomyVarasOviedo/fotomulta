<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title></title>
</head>
<body>
  
</body>
</html>
<?php
include ("../conexion.php");
  // recibir datos y almacenarlos en variables
  $n_articulo = $_POST['n_articulo'];
  $inciso = $_POST['inciso'];
  $descripcion = $_POST['descripcion'];

  // Consulta para insertar
  $insertar= "INSERT INTO articulo (id_articulo,n_articulo,inciso,descripcion) 
  VALUES (null,'$n_articulo', '$inciso', '$descripcion')";
  //ejecutar consulta
  $resultado= mysqli_query($conexion, $insertar);

  if(!$resultado){
    echo '<script>
    Swal.fire({
      title:"Error al agregar articulo",
      text:"Es posible que su conexion no sea muy buena",
      icon:"error",
      timer: 2000
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = "articulo.php"
        }
      })
    </script>' ;
    
  }
  else{
    echo '<script>
    Swal.fire({
              title:"Articulo Agregado",
              text:"El agente ya podra agregarlo a su informe",
              icon:"success",
              iconColor:"rgb(0, 156, 161)",
              showConfirmButton: false,
              timer: 1000
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "articulo.php"
              }
            })
            </script>' ;
    
  }

  //Cerrar conexion
  mysqli_close($conexion);

?>