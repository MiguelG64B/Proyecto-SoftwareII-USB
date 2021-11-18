<?php

// Varios destinatarios
$para  =$_POST['email']; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Recuperar Contraseña';
$codigo = rand(1000, 9999);


// mensaje
$mensaje = '
<html>
<head>
  <title>Recuperar contraseña</title>
</head>
<body>
    <h1>Proyecto de software</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Recuperar  contraseña</p>
        <h3>' . $codigo . '</h3>
        <p> <a 
        href="http://localhost/proyectocopia1/reset.php?email='.$_POST['email'].'&token='.$token.'"> 
            Para recuperar da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: proyecto@software.com' . "\r\n";


// Enviarlo
$enviado = false;
if (mail($para, $título, $mensaje, $cabeceras)) {
  $enviado = true;
}
