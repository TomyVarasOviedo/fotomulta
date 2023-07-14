<?php $nombre = $_GET['nombre']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sesion Cerrada <?php echo $nombre ?></title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
unset($_SESSION['dni']);
echo'<script>
        Swal.fire({
            title: "Sesion  Cerrada",
            text: "El usuario '. $nombre.' ha cerrado la sesion",
            icon:"success",
            iconColor: "rgb(0, 156, 161)",
            timer: 2500,
            showConfirmButton: false
        }).then(result=>{
            if(result.dismiss == Swal.DismissReason.timer){
                window.location.href = "../index.html"
            }
        })
    </script>'
?>
