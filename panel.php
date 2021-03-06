<?php
session_start();

if (!isset($_SESSION['datos_login'])) {
  header("Location: ./index.php?error=No se ha iniciado sesion");
  echo "debes regristarte";
}
$arregloUsuario = $_SESSION['datos_login'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel</title>
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


</head>

<body>
  <?php include "./layouts/header.php"; ?>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Panel</strong>
          <span class="mx-2 mb-0">/</span> <strong class="text-black">Editar perfil</strong>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <?php include "./layouts/admin/header.php"; ?>
    <div class="content-wrapper">
      <form class="needs-validation" action="./php/editarperfil.php" method="post" novalidate>
        <h1>Editar perfil</h1>
        <div class="form-group container col-md-4 input-group mb-3">
          <label for="nombre">Nombre
            <input type="nombreEdit" name="nombre" value="<?php echo $arregloUsuario['nombre']; ?>" id="nombreEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <label for="Apellido">Apellido
            <input type="text" name="Apellido" value="<?php echo $arregloUsuario['Apellido']; ?>" id="ApellidoEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <label for="telefono">Telefono
            <input type="text" name="telefono" value="<?php echo $arregloUsuario['telefono']; ?>" id="telefonoEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <label for="ciudad">Ciudad
            <input type="text" name="ciudad" value="<?php echo $arregloUsuario['ciudad']; ?>" id="ciudadEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <label for="estado">Departamento
            <input type="text" name="estado" value="<?php echo $arregloUsuario['estado']; ?>" id="estadoEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <label for="estado">Direccion
            <input type="text" name="direccion" value="<?php echo $arregloUsuario['direccion']; ?>" id="direccionEdit" class="form-control" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </label>
          <input type="hidden" id="id_usuario" name="id_usuario" value=" <?php echo $arregloUsuario['id_usuario']; ?> " class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary ">Guardar</button>
        </div>
      </form>
      <?php 
            if(isset($_GET['todobien'])){
              echo '<div class="col-12 alert alert-success">'.$_GET['todobien'].'</div>';
            }
          ?>
    </div>
  </div>
  <?php include "./layouts/footer.php"; ?>

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