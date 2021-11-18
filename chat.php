<?php
include "./php/conexion.php";
$re = $conexion->query("SELECT * FROM chat ORDER BY id  ASC");
while ($fila = mysqli_fetch_array($re)) {
?>
    <div>
        <span class="mb-0 badge badge-success" ><a> <?php echo $fila['nombre']; ?></a> </span>
        <span class="direct-chat-text"><?php echo $fila['mensaje']; ?></span>
        <span class="col-md-12 mb-0 direct-chat-timestamp"><?php echo $fila['fecha']; ?></span>
    </div>
<?php  }  ?>