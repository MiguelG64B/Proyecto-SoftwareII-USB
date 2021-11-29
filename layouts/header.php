

<header class="site-navbar" role="banner">
  <link rel="shortcut icon" type="image/x-icon" href="images/Raid.jpg">
  <div class="site-navbar-top">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
          <form action="./busqueda.php" class="site-block-top-search" method="GET">
            <span class="icon icon-search2"></span>
            <input type="text" class="form-control border-0" placeholder="Buscar" name="texto">
          </form>
        </div>

        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
          <div class="site-logo">
            <a href="index.php" class="js-logo-clone">software</a>
          </div>
        </div>

        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">
            <ul>
              <li>
                <a href="carrito.php" class="site-cart">
                  <span class="icon icon-shopping_cart"></span>
                  <span class="count">
                    <?php
                    if (isset($_SESSION['carrito'])) {
                      echo count($_SESSION['carrito']);
                    } else {
                      echo 0;
                    }
                    ?>
                  </span>
                </a>
              </li>
              <?php
              if (isset($_SESSION['datos_login'])) {
                $arregloUsuario = $_SESSION['datos_login'];
              ?>
                <div class="info">
                  <p> panel de control
                  <a href="panel.php" color="#7971ea" class="mb-0 d-block"><?php echo $arregloUsuario['nombre']; ?></a>
                  </p>
                </div>
              <?php } else {?>
              <li><a href="inicio.php"><input type="submit" class="btn btn-outline-primary btn-sm btn-bloc" value="Iniciar sesion"></a></li>
              <li><a href="registro.php"><input type="submit" class="btn btn-sm btn-primary" value="Registrarse"></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">

            <ul>

              <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle">
                  <span class="icon-menu"></span></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        <li>
          <a href="index.php">Principal</a>
        </li>
        <li>
          <a href="sobrenosotros.php">Sobre nosotros</a>
        </li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>
</header>