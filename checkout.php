<?php 
session_start();
if(!isset($_SESSION['carrito'])){
  header('Location: ./carrito.php');
}
if(!isset($_SESSION['datos_login'])){
  header("Location: ./carrito.php?error=No se ha iniciado sesion");
  echo "debes regristarte";
}

$arreglo  = $_SESSION['carrito'];
$arregloUsuario = $_SESSION['datos_login'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Confirmar datos</title>
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
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Principal</a> <span class="mx-2 mb-0">/</span>
           <strong class="text-black">Carrito de compra</strong>
           <span class="mx-2 mb-0">/</span> <strong class="text-black">Confirmar datos</strong></div>
        </div>
      </div>
    </div>
    <form action="./volante.php" class="needs-validation" method="post" novalidate>
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border p-4 rounded" role="alert">
                Recuerda, si tienes cualquier duda tenemos nuestro chat en el panel de control, o en nuestro correo "correo@hotmail.com"
              </div>
            </div>
          </div>
          <div class="row">
          
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Detalles</h2>
              <div class="info border">
              <label for="c_code" class="text-black mb-3">Envio a nombre de:</label>
          <a  class="d-block"><?php echo $arregloUsuario['nombre'] ?>
          <a  class="d-block"><?php echo $arregloUsuario['Apellido'] ?>
          <a  class="d-block"><?php echo $arregloUsuario['email']; ?>
          <input type="hidden" id="email" name="email" value=" <?php echo $arregloUsuario['email']; ?> " class="form-control">
        </a>
        </div>
              <div class="p-3 p-lg-5 border">
              <label for="c_code" class="text-black mb-3">¿Quieres cambiar los datos de envio? 
                si no es el caso puedes dejar asi los espacios.</label>
                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Direccion </span></label>
                    <input type="text" name="direccion" value="<?php echo $arregloUsuario['direccion']; ?>" id="direccion" class="form-control" required>
                    <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
                  </div>
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Ciudad</span></label>
                    <input type="text" name="ciudad" value="<?php echo $arregloUsuario['ciudad']; ?>" id="ciudad"  class="form-control" required>
                    <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
                  </div>
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Departamento</span></label>
                    <input type="text" name="estado" value="<?php echo $arregloUsuario['estado']; ?>" id="estado"  class="form-control" required>
                    <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Numero de celular</span></label>
                    <input type="text" name="telefono" value="<?php echo $arregloUsuario['telefono']; ?>" id="telefono"  class="form-control" required>
                    <div class="valid-feedback">Ya es valido</div>
              <div class="invalid-feedback">Complete los campos</div>
                  </div>
                </div>
                <input type="hidden" id="id_usuario" name="id_usuario" value=" <?php echo $arregloUsuario['id_usuario']; ?> " class="form-control">
                

              </div>
            </div>
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Tu orden</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                      <?php
                        $total = 0; 
                        for($i=0;$i<count($arreglo);$i++){
                          $total =$total+ ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']); 
                      ?>
                        <tr>
                          <td><?php echo $arreglo[$i]['Nombre'];?> </td>
                          <td><?php echo $arreglo[$i]['Cantidad'];?> </td>
                          <td>$<?php echo  number_format($arreglo[$i]['Precio'], 2, '.', '');?></td>
                        </tr>
                        <tr>
                        
                        <?php 
                          }
                        ?>
                          <td></td>
                          <td>Subtotal:</td>
                          <td>$<?php echo number_format($total, 2, '.', '');?></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                    <div class="form-group">
                      <button class="btn btn-primary  py-3 btn-block" type="submit">Solicitar volante de pago</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </form>           
    <?php include("./layouts/footer.php"); ?> 
  </div>


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