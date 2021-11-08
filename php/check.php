<?php 
session_start();
include "./conexion.php";

if(  isset($_POST['email'])  && isset($_POST['password'])  ){
    
    $resultado = $conexion->query("select * from usuario where 
        email='".$_POST['email']."' and 
        password='".sha1($_POST['password'])."' limit 1")or die($conexion->error);
        
    if(mysqli_num_rows($resultado)>0 ){
        $datos_usuario = mysqli_fetch_row($resultado); 
        $nombre= $datos_usuario[1];
        $Apellido= $datos_usuario[2];
        $telefono= $datos_usuario[3];
        $ciudad= $datos_usuario[4];
        $estado= $datos_usuario[5];
        $direccion= $datos_usuario[6];
        $id_usuario= $datos_usuario[0];
        $email= $datos_usuario[7];
        $imagen_perfil= $datos_usuario[9];
        $nivel= $datos_usuario[10];
     
        $_SESSION['datos_login']= array(
            'nombre'=>$nombre,
            'Apellido'=>$Apellido,
            'telefono'=>$telefono,
            'ciudad'=>$ciudad,
            'id_usuario'=>$id_usuario,
            'email'=>$email,
            'estado'=>$estado,
            'direccion'=>$direccion,
            'imagen'=>$imagen_perfil,
            'nivel'=>$nivel 
        );
        header("Location: ../panel.php");
    }

    else{
        header("Location: ../inicio.php?error=Credenciales incorrectas");
    }



}else{
    header("../inicio.php");
}



?>

