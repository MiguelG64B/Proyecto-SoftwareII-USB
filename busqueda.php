<?php 
    include('./php/conexion.php');
    if(!isset($_GET['texto'])){
        header("Location: ./index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Resultados</title>
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
           <strong class="text-black">Resultados de busqueda</strong></div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Buscando resultados para <?php echo $_GET['texto'];?> </h2></div>
                <div class="d-flex">
                  <div class="btn-group">
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mb-5">
              <?php 
               
               $resultado = $conexion ->query("select productos.*,categorias.nombre as categoria from productos 
               inner join categorias on productos.id_categoria = categorias.id 
               where
               productos.nombre like '%".$_GET['texto']."%' or 
               categorias.nombre like '%".$_GET['texto']."%' or 
               productos.descripcion like '%".$_GET['texto']."%' 



                    order by id DESC limit 10")or die($conexion -> error);
                    if(mysqli_num_rows($resultado) > 0){ 

                   
                while($fila = mysqli_fetch_array($resultado)){
              ?>
                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="detallesproducto.php?id=<?php echo $fila['id'];?>">
                        <img src="images/<?php echo $fila['imagen'];?>" alt="<?php echo $fila['nombre'];?>" class="img-fluid"></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="detallesproducto.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h3>
                        <p class="mb-0"><?php echo $fila['descripcion'];?></p>
                        <p class="text-primary font-weight-bold">$<?php echo $fila['precio'];?></p>
                      </div>
                     
                    </div>
                  </div>
                <?php } }else{
                    echo  '<h2>Sin resultados</h2>
                    <a href="index.php"><input type="submit" class="btn btn-sm btn-primary" value="Regresar a pagina principal"></a>';            
                } ?>


            </div>
          </div>

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