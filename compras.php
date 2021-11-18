<?php
session_start();
include "./php/conexion.php";
if (!isset($_SESSION['datos_login'])) {
  header("Location: ./index.php");
}
$arregloUsuario = $_SESSION['datos_login'];

/*$resultado = $conexion->query("
select ventas.*, usuario.nombre,usuario.Apellido, usuario.telefono, usuario.email from ventas
inner join usuario on ventas.id_usuario = ".$arregloUsuario['id_usuario']) or die($conexion->error);
*/
$resultado= $conexion->query("SELECT * FROM ventas WHERE id_usuario = '".$arregloUsuario['id_usuario']."'")

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel | Historial de compras </title>
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
           <span class="mx-2 mb-0">/</span> <strong class="text-black">Historial de compras</strong></div>
        </div>
      </div>
    </div>
  <div class="wrapper">
  <?php include "./layouts/admin/header.php"; ?>
    
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="accordion" id="accordionExample">
            <?php
            while ($f = mysqli_fetch_array($resultado)) {
            ?>
              <div class="card">
                <div class="card-header" id="heading<?php echo $f['id']; ?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $f['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $f['id']; ?>">
                      <?php echo $f['fecha'] . '-' . $arregloUsuario['nombre'] . '-' . $arregloUsuario['Apellido']; ?>
                    </button>
                  </h5>
                </div>

                <div id="collapse<?php echo $f['id']; ?>" class="collapse" aria-labelledby="heading<?php echo $f['id']; ?>" data-parent="#accordionExample">
                  <div class="card-body">
                    <p>Nombre Cliente: <?php echo $arregloUsuario['nombre']; ?> </p>
                    <p>Email Cliente: <?php echo $arregloUsuario['email']; ?> </p>
                    <p>Telefono: <?php echo $arregloUsuario['telefono']; ?> </p>
                      <input type="hidden" id="id" name="id" value=" <?php echo $f['id']; ?> " class="form-control">
                    <p class="h6"> Detalles</p>
                    <p>estado de venta: <?php echo $f['estadoventa']; ?> </p>
                    <?php
                    $re = $conexion->query("select * from envios where id_venta=" . $f['id']) or die($conexion->error);
                    $fila = mysqli_fetch_row($re);
                    ?>
                    <p>Telefono: <?php echo $fila[2]; ?> </p>
                    <p>Direccion: <?php echo $fila[3]; ?> </p>
                    <p>Ciudad: <?php echo $fila[5]; ?> </p>
                    <p>Departamento: <?php echo $fila[4]; ?> </p>
                  
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Id Pedido</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th>Cantidad</th>
                          <th>Subtotal</th>
                          <th></th>
                        </tr>

                      </thead>
                      <tbody>
                        <?php
                        $re = $conexion->query("SELECT productos_venta.*,productos.nombre
                 FROM productos_venta INNER JOIN productos
                 ON productos_venta.id_producto = productos.id
                 WHERE productos_venta.id_venta =" . $f['id']) or die($conexion->error);
                        while ($f2 = mysqli_fetch_array($re)) {
                        ?>
                          <tr>
                            <td><?php echo $f2['id']; ?></td>
                            <td><?php echo $f2['nombre']; ?></td>
                            <td><?php echo  number_format($f2['precio'], 2, '.', ''); ?></td>
                            <td><?php echo $f2['cantidad']; ?></td>
                            <td><?php echo  number_format($f2['subtotal'], 2, '.', ''); ?></td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div><!-- /.container-fluid -->
      </section>

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


</body>

</html>