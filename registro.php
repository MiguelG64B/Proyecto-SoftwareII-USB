<!DOCTYPE html>
<html lang="en">

<head>
  <title>Regristro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</head>

<body>

  <?php include("./layouts/header.php"); ?>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Registro</strong>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Registro</p>
        <div class="row justify-content-md-center" style="margin-top:10%">
          <form class="needs-validation" method="post" action="./php/registrar.php" novalidate>

            <div class="  input-group mb-3">
              <input type="text" class="form-control" placeholder="Nombre" id="Nombre" name="nombre" required>
              <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
                  <input type="text" name="Apellido" placeholder="Apellido" id="Apellido"  class="form-control" required>
                  <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
            <input type="text" name="telefono" placeholder="Telefono" id="telefono"  class="form-control"required>
            <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
                  <input type="text" name="ciudad" placeholder="Ciudad" id="ciudad"  class="form-control"required>
                  <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
            <input type="text" name="estado" placeholder="Departamento"  id="estado"  class="form-control"required>
            <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
            <input type="text" name="direccion" placeholder="Direccion"  id="direccion"  class="form-control"required>
            <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" id="exampleInputEmail1" name="email"required>
              <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class=" input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" id="exampleInputPassword1" name="pass" pattern=".{3,10}" required>
              <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

            <div class="  input-group mb-3">
              <input type="password" class="form-control" placeholder="Confirmar Password" id="exampleInputPassword2" name="pass2" pattern=".{3,10}" required>
              <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
            </div>

              <div class="  input-group mb-3 ">
                <p class="mb-0">
                  <button type="submit" class="text-center btn btn-primary btn-block">Registrar</button>
                </p>
              </div>
          </form>
        </div>
        <?php 
            if(isset($_GET['error'])){
              echo '<div class="col-12 alert alert-danger">'.$_GET['error'].'</div>';
            }
          ?>
      </div>
    </div>
  </div>


  <?php
  include("./php/registrar.php");
  ?>

  <?php include("./layouts/footer.php"); ?>

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