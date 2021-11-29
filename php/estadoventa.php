<?php
include "conexion.php";
if (isset($_POST['estadoventa']) &&  isset($_POST['id']) &&  isset($_POST['id_producto']) &&  isset($_POST['cantidad'])) {
    $conexion->query("update ventas set 
    estadoventa='" . $_POST['estadoventa'] . "'
     where id=" . $_POST['id']);
    echo "se actualizo";
    header("Location: ../pedidos.php");
}


?>