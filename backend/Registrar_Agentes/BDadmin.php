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
  $dni = $_POST["dni"];
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $contra = $_POST["contra"];
  $mail = $_POST["mail"];
  $telefono = $_POST["telefono"];

  // Consulta para insertar
  $insertar= "INSERT INTO administradores (dni,nombre,apellido,contra,mail,telefono) 
  VALUES ('$dni','$nombre', '$apellido', '$contra', '$mail', '$telefono')";
  //ejecutar consulta
  $resultado= mysqli_query($conexion, $insertar);

  if(!$resultado){
    echo '<script>
    Swal.fire({
      title:"Error al insertar al agente",
      text:"Es posible que el dni ya exista, verifica si es correcto",
      icon:"error",
      timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector("b")
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = "registrar.php"
        }
      })
    </script>' ;
    
  }
  else{
    echo '<script>
    Swal.fire({
              title:"Agente Agregado",
              text:"Ya podra iniciar session y empezar a trabajar",
              icon:"success",
              iconColor:"rgb(0, 156, 161)",
              timer: 1000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector("b")
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "registrar.php"
              }
            })
            </script>' ;
    
  }

  //Cerrar conexion
  mysqli_close($conexion);

?>