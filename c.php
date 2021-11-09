<?php
session_start();
include "./php/conexion.php";
if (!isset($_SESSION['datos_login'])) {
  header("Location: ./index.php");
}
$arregloUsuario = $_SESSION['datos_login'];
if ($arregloUsuario['nivel'] != 'admin') {
  header("Location: ./index.php");
}
$resultado = $conexion ->query("
select ventas.*, usuario.nombre, usuario.telefono, usuario.email from ventas
inner join usuario on ventas.id_usuario = usuario.id
")or die($conexion->error);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de administracion| compras</title>
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
</head>

<body>
  <div class="wrapper">
    <?php include "./layouts/header.php"; ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Panel de administracion</strong>
            <span class="mx-2 mb-0">/</span> <strong class="text-black">Historial de compras</strong>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper">
      <aside class="main-sidebar sidebar-dark-primary">

        <div class="sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="./images/users/<?php echo $arregloUsuario['imagen']; ?>" class="img-circle elevation-2" alt="<?php echo $arregloUsuario['nombre']; ?>">
                </div>
                <div class="info">
                  <a href="./panel.php" class="d-block"><?php echo $arregloUsuario['nombre']; ?></a>
                </div>
              </div>
              <li class="nav-item">
                <a href="./pedidospanel.php" class="nav-link">
                  <p>
                    Historial de ventas
                  </p>
                </a>
              </li>
              <?php
              if ($arregloUsuario['nivel'] == 'admin') {
              ?>
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
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Compras</h1>
              </div>
            </div>
          </div>
        </div>
        <form action="./php/estadoventa.php" method="post">
        <section class="content">
          <div class="container-fluid">
            <table class="table">
              <thead>
                <tr>
                  <th>Id Venta</th>
                  <th>Id Usuario</th>
                  <th>Precio total</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                  <th>Estado de la venta</th>
                </tr>

              </thead>
              <tbody>

                <?php
               while ($f = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td><?php echo $f['id']; ?></td>
                    <td><?php echo $f['id_usuario']; ?></td>
                    <td>$<?php echo $f['total']; ?></td>
                    <td><?php echo $f['fecha']; ?></td>
                    <td>
                      <button class="btn btn-primary btn-small btnEditar" data-toggle="modal" data-target="#modalEditar">
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                    <td>
                      <select class="form-select" name="estadoventa" aria-label="Default select example">
                      <option selected value="<?php echo $f['estadoventa']; ?>"><?php echo $f['estadoventa']; ?></option>
                        <option value="En revision">En revision</option>
                        <option value="Enviado">Enviado</option>
                        <option value="Cancelado">Cancelado</option>
                      </select>
                    </td>
                  </tr>
                <?php
                }
                ?>
                
              </tbody>
            </table>
          </div>
        </section>
        </form>
      </div>


    </div>
    <?php include "./layouts/footer.php"; ?>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
    <script src="./dashboard/plugins/jquery/jquery.min.js"></script>


    <!-- jQuery UI 1.11.4 -->
    <script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="./dashboard/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="./dashboard/plugins/moment/moment.min.js"></script>
    <script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dashboard/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./dashboard/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dashboard/dist/js/demo.js"></script>
</body>

</html>