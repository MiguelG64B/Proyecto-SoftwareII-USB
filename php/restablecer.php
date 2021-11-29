<?php 
    include "./conexion.php";
    $em= $conexion->query("SELECT email FROM usuario WHERE email = '".$_POST['email']."'")or die($conexion->error);
    if(mysqli_num_rows($em)==0){
        header("Location: ../restablecer.php?error=correo no registrado");
    }
    else{
    $email =$_POST['email'];
    $bytes = random_bytes(5);
    $token =bin2hex($bytes);

   
    include "mail_reset.php";

    if($enviado){
        $conexion->query(" insert into passwords(email, token, codigo) 
         values('$email','$token','$codigo') ") or die($conexion->error);
         header("Location: ../restablecer.php?todobien=revisa tu correo e ingresa al link .");
    }
}

?>