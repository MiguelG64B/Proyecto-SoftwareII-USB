<?php 
include "conexion.php";
if(isset($_POST['nombre']) &&  isset($_POST['id_usuario']) &&  isset($_POST['Apellido']) &&  isset($_POST['telefono'])
&&  isset($_POST['ciudad']) &&  isset($_POST['estado'])&&  isset($_POST['direccion'])){ 
    $conexion->query("update usuario set 
    nombre='".$_POST['nombre']."',
    Apellido='".$_POST['Apellido']."',
    telefono='".$_POST['telefono']."',
    ciudad='".$_POST['ciudad']."',
    direccion='".$_POST['direccion']."',
    estado='".$_POST['estado']."'
    where id=".$_POST['id_usuario']);

    echo "se actualizo";
    header("Location: ../panel.php?todobien=En la proxima sesion se vera reflejado el cambio");
}   
?>