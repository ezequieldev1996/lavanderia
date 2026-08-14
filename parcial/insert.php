<?php
include "conectar.php";

$nombre = $_POST['nombre'];
$segundonombre = $_POST['nombre2'];
$apellido = $_POST['apellido'];

$insert = "INSERT INTO nombre (nombre, segundoN, apellido) VALUES ('$nombre','$segundonombre','$apellido')";


if($conectar->query($insert)=== true){
  echo"insercion exitosa";
}
else{
    echo"fallo en la conexion";
}
 
$conectar ->close();

?>