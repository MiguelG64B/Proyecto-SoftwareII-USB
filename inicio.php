<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Proyecto</title>
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
  <div class="site-wrap">
  
    <?php include("./layouts/header.php"); ?> 
        <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">inicio de sesion</strong></div>
        </div>
      </div>
    </div>
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa tu correo y contraseña</p>

      <form action="./php/check.php" method="post">
        <div class=" container col-md-4 input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          </div>
          <div class=" container col-md-4 input-group mb-3 ">
          <input type="password" class="form-control" placeholder="contraseña" name="password">
        </div>
        <div class="row">
          <div class=" container col-md-4 input-group mb-3 ">
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
          </div>
        <br>
        <br>
          <?php 
            if(isset($_GET['error'])){
              echo '<div class="col-12 alert alert-danger">'.$_GET['error'].'</div>';
            }
          ?>
        </div>
      </form>

     

      <p class="mb-1">
        <a href="recuperarcontraseña.php">Olvide mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="registro.php" class="text-center">Registrarme</a>
      </p>
    </div>

  </div>
</div>

    <?php include("./layouts/footer.php"); ?> 
    </div>
 

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