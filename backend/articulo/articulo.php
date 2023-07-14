<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../multas/multas.css">
    <link rel="stylesheet" href="articulo.css">
    <title>Formulario Articulo</title>
  </head>
  
  <body>

  <?php include ("../menu.php");?>

    <div class= "container">
      <div class="jumbotron p-5 text-center">
        <h1>Ingrese los datos del Articulo</h1>
      </div>
      <form action="BDarticulo.php" method="POST">
        <div class="mb-3">
        <div class="row">
          <div class="col-md-6 mt-3">
            <label for="exampleInputEmail1" class="form-label">Numero de articulo</label>
            <input type="number" name="n_articulo" placeholder="Articulo N°" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="11"> 

            <label for="exampleInputEmail1" class="form-label">Inciso</label>
            <input type="text" name="inciso" placeholder="Inciso"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="1"> 
        </div>
        <div class="col-md-6 mt-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <textarea name="descripcion" placeholder="¿De que trata el articulo?" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onKeyPress="validar()" onkeyUp="validar()"></textarea> 
        </div>
        </div>
        <div class="d-flex justify-content-end mt-3"> 
          <button type="submit" class="btn btn-info px-3">Registrar</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let textarea = document.querySelector('textarea')
        let validar =()=>{
          let caracteres = textarea.value.length
            if (caracteres > 150){
                console.log("entre")
                Swal.fire({
                    title:'Error',
                    text:'Haz excedido el numero de caracteres permitidos',
                    icon: 'error'
                })
            }
        }
        textarea.addEventListener('keydown', validar)
    </script>
  </body>
</html>
