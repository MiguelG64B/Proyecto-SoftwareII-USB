
<?php 
session_start();

if(!isset($_SESSION['datos_login'])){
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
  <title>Panel de control | administrador </title>
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
<body >
<?php include "./layouts/header.php";?>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Panel de administracion</strong>
        </div>
      </div>
    </div>
<div class="wrapper">

  <aside class="main-sidebar sidebar-dark-primary ">
   
    <div class="sidebar">
 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./images/users/<?php echo $arregloUsuario['imagen']; ?>" class="img-circle elevation-2" 
            alt="<?php echo $arregloUsuario['nombre']; ?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $arregloUsuario['nombre']; ?></a>
        </div>
      </div>
          <?php 
            if($arregloUsuario['nivel']== 'cliente'){         
          ?>
            <li class="nav-item">
            <a href="./pedidos.php" class="nav-link">
              <p>
                Historial de compras
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="./usuarios.php" class="nav-link">
                  <p>
                    Chat
                  </p>
                </a>
              </li>
          <?php } ?>
          <?php 
            if($arregloUsuario['nivel']== 'admin'){         
          ?>
            <li class="nav-item">
            <a href="./pedidos.php" class="nav-link">
              <p>
                Historial de ventas
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="./categoriaspanel.php" class="nav-link">
                  <p>
                    Categorias
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./productospanel.php" class="nav-link">
                  <p>
                    Productos
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./usuarios.php" class="nav-link">
                  <p>
                    Chat
                  </p>
                </a>
              </li>
          <?php } ?>
          <li class="nav-item">
            <a href="./php/cerrar_sesion.php" class="nav-link">
              <p>
                Salir
              </p>
            </a>
          </li>
        </ul>
      </nav>
     
    </div>
  
  </aside>
  <div class="content-wrapper">
    <form action="./php/editarperfil.php" method="post">
    	<h1>Editar perfil</h1>
              <div class="form-group container col-md-4 input-group mb-3">
                  <label for="nombre">Nombre
                  <input type="nombreEdit" name="nombre" value="<?php echo $arregloUsuario['nombre']; ?>" id="nombreEdit"  class="form-control">
                  </label>
                  <label for="Apellido">Apellido
                  <input type="text" name="Apellido" value="<?php echo $arregloUsuario['Apellido']; ?>" id="ApellidoEdit"  class="form-control">
                  </label>
                  <label for="telefono">Telefono
                  <input type="text" name="telefono" value="<?php echo $arregloUsuario['telefono']; ?>" id="telefonoEdit"  class="form-control">
                  </label>
                  <label for="ciudad">Ciudad
                  <input type="text" name="ciudad" value="<?php echo $arregloUsuario['ciudad']; ?>" id="ciudadEdit"  class="form-control">
                  </label>
                  <label for="estado">Departamento
                  <input type="text" name="estado" value="<?php echo $arregloUsuario['estado']; ?>" id="estadoEdit"  class="form-control">
                  </label>
                  <label for="estado">Direccion
                  <input type="text" name="direccion" value="<?php echo $arregloUsuario['direccion']; ?>" id="direccionEdit"  class="form-control">
                  </label>
                  <input type="hidden" id="id_usuario" name="id_usuario" value=" <?php echo $arregloUsuario['id_usuario']; ?> " class="form-control">
              </div>
              <div class="modal-footer">
            <button type="submit" class="btn btn-primary editar">Guardar</button>
          </div>
    </form>

  </div>
</div>
<?php include "./layouts/footer.php";?>



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
