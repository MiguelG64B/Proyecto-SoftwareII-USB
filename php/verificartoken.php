<?php
include "conexion.php";
$email = $_POST['email'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];
$res = $conexion->query("select * from passwords where 
        email='$email' and token='$token' and codigo=$codigo") or die($conexion->error);
$correcto = false;
if (mysqli_num_rows($res) > 0) {
  $fila = mysqli_fetch_row($res);
  $fecha = $fila[4];
  $fecha_actual = date("Y-m-d h:m:s");
  $seconds = strtotime($fecha_actual) - strtotime($fecha);
  $minutos = $seconds / 60;
  /* if($minutos > 10 ){
            echo "token vencido";
        }else{
            echo "todo correcto";
        }*/
  $correcto = true;
} else {

  $correcto = false;
  header("Location: ../reset.php?email=$email&token=$token");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Proyecto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/aos.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../ccs/estilos.css">
</head>

<body>
  <div class="site-wrap">

  <?php include("../layouts/header.php"); ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Recuperar contraseña</strong>/</span>
            <strong class="text-black">Ingresa codigo</strong>/</span>
            <strong class="text-black">Nueva contraseña</strong>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
      <?php if ($correcto) { ?>
        <p>Recuperar contraseña </p>
        <form class="needs-validation  container col-3" action="./cambiarpassword.php" method="POST" novalidate>
          <a>Ingresa tu Codigo
          </a>
          <div class=" mb-3">
            <label for="c" class="form-label">Ingresa tu nueva contraseña</label>
            <input type="password" class="form-control" id="c" name="p1" pattern=".{3,10}" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </div>
          <div class="mb-3">
            <label for="c" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="c" name="p2" pattern=".{3,10}" required>
            <div class="valid-feedback">Ya es valido</div>
            <div class="invalid-feedback">Complete los campos</div>
          </div>
          <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email ?>">
          <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </form>
        <?php } else { ?>
          <div class="alert alert-danger">Código incorrecto o vencido, vuelve a ingresar al link de tu correo</div>
        <?php } ?>
        <?php
        if (isset($_GET['todobien'])) {
          echo '<div class="col-12 alert alert-success">' . $_GET['todobien'] . '</div>';
        }
        ?>
        <?php
        if (isset($_GET['error'])) {
          echo '<div class="col-12 alert alert-danger">' . $_GET['error'] . '</div>';
        }
        ?>
      </div>
    </div>
  </div>
  <?php include("../layouts/footer.php"); ?>
  </div>


  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>



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

</body>

</html>