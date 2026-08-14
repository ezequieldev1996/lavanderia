<?php
//conexion
include "conexion.php";

//operacion


$detalle = $_POST['detalle'];
$valor = $_POST['valor'];
$fecha = $_POST['fecha'];


$sql = "INSERT INTO gastos (detalle, valor, fecha) VALUES ('$detalle', '$valor', '$fecha')";

if ( $conexion->query($sql)=== true){
    header("location:../view/echoexitoso.php");
}
else{
    header("location:../view/echocancelado.php");
}






?>