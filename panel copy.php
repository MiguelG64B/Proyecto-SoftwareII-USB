<?php

include "./php/conexion.php";
if(!isset($_GET['id_venta'])){
    header("Location: ./");
}
session_start();

if(!isset($_SESSION['datos_login'])){
  header("Location: ./index.php?error=No se ha iniciado sesion");
  echo "debes regristarte";
}
$arregloUsuario = $_SESSION['datos_login'];
$datos = $conexion->query("select 
        ventas.*,  
        usuario.nombre,usuario.telefono,usuario.email
        from ventas 
        inner join usuario on ventas.id_usuario = usuario.id
        where ventas.id=".$_GET['id_venta'])or die($conexion->error);
$datosUsuario = mysqli_fetch_row($datos);
$datos2 = $conexion->query("select * from envios where id_venta=".$_GET['id_venta'])or die($conexion->error);
$datosEnvio= mysqli_fetch_row($datos2);

$datos3= $conexion->query("select productos_venta.*,    
                productos.nombre as nombre_producto, productos.imagen 
                from productos_venta inner join productos on productos_venta.id_producto = productos.id 
                where id_venta =".$_GET['id_venta'])or die($conexion->error);
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
           <strong class="text-black">Panel de administracion</strong><span class="mx-2 mb-0">/</span>
           <strong class="text-black">Historial de compras</strong><span class="mx-2 mb-0">/</span>
           <strong class="text-black">Detalles del pedido</strong>
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
            <a href="./pedidospanel.php" class="nav-link">
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
            <a href="./ventas.php" class="nav-link">
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
  <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Detalles de pedido</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Venta #<?php echo $_GET['id_venta'];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nombre: <?php echo $datosUsuario[5];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Email: <?php echo $datosUsuario[7];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Telefono: <?php echo $datosUsuario[6];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Departamento: <?php echo $datosEnvio[4];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Ciudad: <?php echo $datosEnvio[5];?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Direccion: <?php echo $datosEnvio[3];?></label>
                  </div>
                </div>
                
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
          <?php
            while($f = mysqli_fetch_array($datos3)){

            
          ?>
            <div class="p-4 border mb-3">
                <img src="./images/<?php echo $f['imagen'];?>" width="50px"/>
              <span class="d-block text-primary h6 text-uppercase"><?php echo $f['nombre_producto'];?></span> <br>
              <span class="d-block text-primary h6 text-uppercase">Cantidad:<?php echo $f['cantidad'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Precio:<?php echo $f['precio'];?></span>
              <span class="d-block text-primary h6 text-uppercase">Subtotal:<?php echo $f['subtotal'];?></span>
            </div>
            <?php } ?>
            <h4>Total: <?php echo $datosUsuario[2];?></h4>
          </div>
        </div>
      </div>
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
