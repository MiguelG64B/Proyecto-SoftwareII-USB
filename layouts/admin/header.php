<aside class="main-sidebar sidebar-dark-primary ">

      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img href="./panel.php" src="./images/users/<?php echo $arregloUsuario['imagen']; ?>" class="img-circle elevation-2" alt="<?php echo $arregloUsuario['nombre']; ?>">
              </div>
              <div class="info">
                <a href="./panel.php" class="d-block"><?php echo $arregloUsuario['nombre']; ?></a>
              </div>
            </div>
            <?php
            if ($arregloUsuario['nivel'] == 'cliente') {
            ?>
              <li class="nav-item">
                <a href="./compras.php" class="nav-link">
                  <p>
                    Historial de compras
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./mensajes.php" class="nav-link">
                  <p>
                    Chat
                  </p>
                </a>
              </li>
            <?php } ?>
            <?php
            if ($arregloUsuario['nivel'] == 'admin') {
            ?>
              <li class="nav-item">
                <a href="./pedidos.php" class="nav-link">
                  <p>
                    Historial de ventas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./compras.php" class="nav-link">
                  <p>
                    Historial de compras
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
                <a href="./mensajes.php" class="nav-link">
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