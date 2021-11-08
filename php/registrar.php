
<?php 
   include "conexion.php";
   if( isset($_POST['nombre'] ) && isset($_POST['email']) && isset($_POST['pass'] ) 
    && isset($_POST['pass2'] ) &&  isset($_POST['Apellido']) &&  isset($_POST['telefono'])
    &&  isset($_POST['ciudad']) &&  isset($_POST['estado'])&&  isset($_POST['direccion'])){

        if($_POST['pass'] == $_POST['pass2'] ){
            $name=$_POST['nombre'];
            $email=$_POST['email'];
            $Apellido=$_POST['Apellido'];
            $telefono=$_POST['telefono'];
            $ciudad=$_POST['ciudad'];
            $estado=$_POST['estado'];
            $direccion=$_POST['direccion'];
            $pass=sha1($_POST['pass']);
                $conexion->query("insert into usuario (nombre,Apellido,telefono,ciudad,estado,direccion, email,password,img_perfil,nivel) 
                    values('$name','$Apellido','$telefono','$ciudad','$estado','$direccion','$email','$pass','default.jpg','cliente')  ")or die($conexion->error);
                    header("Location: ../inicio.php");
        }else{
           
        header("Location: ../registro.php?error=password  incorrectas");
        }
    }

?>
