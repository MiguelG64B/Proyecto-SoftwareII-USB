<?php
include "conexion.php";
if ( $_POST['estadoventa']  = 'Enviado') {
        $conexion->query("update productos set inventario = inventario -". $_POST['cantidad'] . " where id=" . $_POST['id_producto']) or die($conexion->error);
        header("Location: ../pedidos.php");
    }

    ?>