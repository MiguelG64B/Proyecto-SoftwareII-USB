<?php 
include "conexion.php";
if(isset($_POST['estadoventa'])&&  isset($_POST['id'])){ 
    
    $conexion->query("update ventas set 
    estadoventa='".$_POST['estadoventa']."'
     where id=".$_POST['id']);

    echo "se actualizo";
    header("Location: ../ventas.php");
}   
  
?>
