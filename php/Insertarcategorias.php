<?php 
include "./conexion.php";

if(isset($_POST['nombre']) &&  isset($_POST['descripcion']) ){
    
    $carpeta="../images/";
    $nombre = $_FILES['imagen']['name'];
    $temp= explode( '.' ,$nombre);
    $extension= end($temp);
    
    $nombreFinal = time().'.'.$extension;
   
    if($extension=='jpg' || $extension == 'png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
            $conexion->query("insert into categorias 
                (nombre,descripcion, imagen) values
                (
                    '".$_POST['nombre']."',
                    '".$_POST['descripcion']."',
                    '$nombreFinal'
                )   ")or die($conexion->error);
                header("Location: ./categoriaspanel.php?success");
        }else{
            header("Location: ./categoriaspanel.php?error=No se pudo subir la imagen");
        }
    }else{
        header("Location: ./categoriaspanel.php?error=Favor de subir una imagen valida");
    }

}else{
    header("Location: ./categoriaspanel.php?error=Favor de llenar todos los campos");
}

?>