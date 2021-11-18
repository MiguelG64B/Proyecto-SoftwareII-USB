<?php 
session_start();
include './php/conexion.php';
$arregloUsuario = $_SESSION['datos_login'];
$id_usuario=$arregloUsuario ['id_usuario'];
if(!isset($_SESSION['carrito'])){header("Location: ./index.php?todobien=Compra realizada, El volante de pago llego a tu correo, tienes 24h para realizar el pago.");} 
$arreglo  = $_SESSION['carrito'];
$total= 0;
for($i=0; $i<count($arreglo);$i++){
  $total = $total+($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

if(isset($_POST['id_usuario']) &&  isset($_POST['telefono']) &&  isset($_POST['direccion'])
&&  isset($_POST['ciudad']) &&  isset($_POST['estado'])&&  isset($_POST['email'])){ 
    $conexion->query("update usuario set 
    telefono='".$_POST['telefono']."',
    direccion='".$_POST['direccion']."',
    ciudad='".$_POST['ciudad']."',
    estado='".$_POST['estado']."'
    where id=".$_POST['id_usuario']);
    
    echo "se actualizo";
    header("Location: ./volante.php");
} 

$fecha = date('Y-m-d h:m:s');
$conexion -> query("insert into ventas(id_usuario,total,fecha,estadoventa) values($id_usuario,$total,'$fecha','En revision')")or die($conexion->error);
$id_venta = $conexion ->insert_id;

for($i=0; $i<count($arreglo);$i++){
  $conexion -> query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal) 
    values(
      $id_venta,
      ".$arreglo[$i]['Id'].",
      ".$arreglo[$i]['Cantidad'].",
      ".$arreglo[$i]['Precio'].",
      ".$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']."
      ) ")or die($conexion->error);
  $conexion->query("update productos set inventario =inventario -".$arreglo[$i]['Cantidad']." where id=".$arreglo[$i]['Id']  )or die($conexion->error);    
}

$conexion->query(" insert into envios(email,telefono, direccion,estado,ciudad,id_venta) values
      (
        '".$_POST['email']."',
        '".$_POST['telefono']."',
        '".$_POST['direccion']."',
        '".$_POST['estado']."',
        '".$_POST['ciudad']."',
        $id_venta
      )  
      
      ")or die($conexion->error);
  include './php/volantedepago.php';  
  unset($_SESSION['carrito']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Volante enviado!</title>
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
    
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("./layouts/header.php"); ?> 

   <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Volante enviado!</h2>
            <p class="lead mb-5">Tu orden fue enviada correctamente.</p>
            <p class="lead mb-5">Recuerda que tienes 24h para realizar el pago</p>
            <p class="lead mb-5">Si este pago no se realizar un administrador eliminara tu pedido</p>
            <p><a href="index.php" class="btn btn-sm btn-primary">Regresar a la tienda</a></p>
          </div>
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