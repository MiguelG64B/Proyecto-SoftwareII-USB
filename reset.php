<?php 
if( isset($_GET['email'])  && isset($_GET['token']) ){
    $email=$_GET['email'];
    $token=$_GET['token'];
}else{
    header("Location: ./login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Recuperar contraseña</title>
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
            <strong class="text-black">Recuperar contraseña</strong><span class="mx-2 mb-0">/</span>
            <strong class="text-black">Ingresa codigo</strong>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Recuperar contraseña </p>
        <form class="col-3" action="./php/verificartoken.php" method="POST">
                <div class="mb-3">
                    <label for="c" class="form-label">Codigo</label>
                    <input type="number" class="form-control" placeholder="Ingresa el codigo" id="c" name="codigo">
                    <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email;?>">
                    <input type="hidden" class="form-control" id="c" name="token" value="<?php echo $token;?>">
                </div>
               
                <button type="submit" class="btn btn-primary">Recuperar</button>
            </form>
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