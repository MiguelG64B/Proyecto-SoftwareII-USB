<?php
include 'conexion.php';
$arregloUsuario = $_SESSION['datos_login'];

    $to= $arregloUsuario['email'];
    $subject = 'Volante de pago';
	$from = 'proyecto@software.com';
	$header = 'MIME-Version 1.0'."\r\n";
	$header.="Content-type: text/html; charset=iso-8859-1\r\n";
	//$header.="X-Mailer: PHP/".phpversion();//esto me genera error
    $header.= 'From: proyecto@software.com'."\r\n";
$message='<html>
<body>
	<h1 style="color:#1d1d1d">Volante de pago '.$arregloUsuario['nombre']." ".$arregloUsuario['Apellido'].'</h1>
	<p>Recuerda que tienes 24h para realizar el pago o un administrador cancela tu pedido</p>
	<h3>Detalles</h3>
	<table>
		<thead>
			<tr>
				<td>Producto</td>
				<td>Precio</td>
				<td>Cantidad</td>
				<td>Subtotal</td>
				
			</tr>
		</thead>
		<tbody>';
		$total = 0;
		$arregloCarrito =$_SESSION['carrito'];
    for($i=0;$i<count($arregloCarrito);$i++){
        $total= $total + ( $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'] );
        $message.='<tr><td>'. $arregloCarrito[$i]['Nombre'].'</td>';
        $message.='<td>'. $arregloCarrito[$i]['Precio'].'</td>';
        $message.='<td>'. $arregloCarrito[$i]['Cantidad'].'</td>';
        $message.='<td>'. ($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']).'</td></tr>';
    }
    $message.='</tbody></table>';
    $message.='<h2>Total del pedido: '.$total.'</h2> 
	 </body>
	 </html>';

if(mail($to, $subject, $message, $header)){
	
}else{
	echo 'no se puede enviar el mail';
}
