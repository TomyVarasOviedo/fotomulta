<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../multas/multas.css">
    <title>Formulario Administradores</title>
  </head>
  
  <body>

  <?php include ("../menu.php");?>

    <div class= "container">
      <div class="jumbotron p-5 text-center">
        <h1>Ingrese los datos del administrador</h1>
      </div>
      <form action="BDadmin.php" method="POST">
        <div class="mb-3">
        <div class="row">
          <div class="col-md-6 mt-3">
            <label for="exampleInputEmail1" class="form-label">D.N.I</label>
            <input type="text" name="dni" placeholder="D.N.I" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 

            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
        </div>
        <div class="col-md-6 mt-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" name="apellido" placeholder="apellido" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
              <label for="exampleInputEmail1" class="form-label">Contraseña</label>
            <input type="password" name="contra" placeholder="Contraseña" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
        </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
              <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
              <input type="email" name="mail" placeholder="Correo Electronico" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
            </div>
            <div class="col-md-6 mt-3">
              <label for="exampleInputEmail1" class="form-label">Telefono</label>
              <input type="text" name="telefono" placeholder="Telefono" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3"> 
          <button type="submit" class="btn btn-info px-3">Registrar</button>
        </div>
      </form>
    </div>
  </body>
</html>
