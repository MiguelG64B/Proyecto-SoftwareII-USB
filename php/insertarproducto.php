<?php 
include "./conexion.php";

if(isset($_POST['nombre']) &&  isset($_POST['descripcion'])   &&  isset($_POST['precio'])
&&  isset($_POST['inventario']) &&  isset($_POST['categoria'])){
    
    $carpeta="../images/";
    $nombre = $_FILES['imagen']['name'];
    $temp= explode( '.' ,$nombre);
    $extension= end($temp);
    
    $nombreFinal = time().'.'.$extension;
   
    if($extension=='jpg' || $extension == 'png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
            $conexion->query("insert into productos 
                (nombre,descripcion, imagen,precio,id_categoria,inventario) values
                (
                    '".$_POST['nombre']."',
                    '".$_POST['descripcion']."',
                    '$nombreFinal',
                    ".$_POST['precio'].",
                    ".$_POST['categoria'].",
                    '".$_POST['inventario']."'
                )   ")or die($conexion->error);
                header("Location: ../productospanel.php?success");
        }else{
            header("Location: ../productospanel.php?error=No se pudo subir la imagen");
        }
    }else{
        header("Location: ../productospanel.php?error=Favor de subir una imagen valida");
    }

}else{
    header("Location: ../productospanel.php?error=Favor de llenar todos los campos");
}

?>