
<?php 
session_start();
include "./php/conexion.php";
if(!isset($_SESSION['datos_login'])){
  header("Location: ./index.php?error=No se ha iniciado sesion");
  echo "debes regristarte";
}

$arregloUsuario = $_SESSION['datos_login'];
if($arregloUsuario['nivel']!= 'admin'){ 
  header("Location: ./index.php");
}   

$arregloUsuario = $_SESSION['datos_login'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel | mensajes </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
   <!-- css del boostrap -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
 <!-- css del boostrap -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="ccs/estilos.css">
 <link rel="stylesheet" href="ccs/panel.css">

 <script type="text/javascript">
    function ajax() {
      var req = new XMLHttpRequest();

      req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById('chat').innerHTML = req.responseText;
        }
      }

      req.open('GET', 'chat.php', true);
      req.send();
    }
    setInterval(function(){ajax();}, 1000);
  </script>
</head>
<body >
<?php include "./layouts/header.php";?>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Panel</strong>
           <span class="mx-2 mb-0">/</span> <strong class="text-black">Mensajes</strong></div>
        </div>
      </div>
    </div>
<div class="wrapper">
<?php include "./layouts/admin/header.php"; ?>
  <div class="content-wrapper">

<div class="contenedor p-3 p-lg-5 border">
<h1>Chat grupal entre los administradores</h1>
<div class="card" style="width: 40rem;">
  <div class="card-body">
    <div id="caja-chat"> 
      <div id="chat"></div>
    </div>
  <form method="POST" class="needs-validation" action="mensajes.php" novalidate>
    <input  type="hidden"name="nombre" value=" <?php echo $arregloUsuario['nombre']; ?>">
    <textarea class="form-control" name="mensaje" placeholder="Ingresa un mensaje" required></textarea>
    <input class="btn btn-primary " type="submit" name="enviar" value="Enviar">
  </form>
  </div>
</div>
  <?php
  if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $mensaje = $_POST['mensaje'];
    $re = "INSERT INTO chat (nombre,mensaje) VALUES ('$nombre','$mensaje')";
    $ejecutar = $conexion->query($re);
  }
  ?>
</div>


  </div>
</div>
<?php include "./layouts/footer.php";?>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>


</body>
</html>
