<?php 
    include "conexion.php";
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1=sha1($p1);
        $conexion->query("update usuario set password='$p1' where email='$email' ")or die($conexion->error);
        header("Location: ../inicio.php?todobien=Contraseña cambiada, ya puedes iniciar sesion."); 
    }else{
        header("Location: ./verificartoken.php?error=No coinciden las contraseñas");
    }
?>