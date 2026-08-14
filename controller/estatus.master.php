<?php
include "conexion.php";

// Obtener los parámetros de la URL
$id = $_GET['id_administrativo'];
$estatus = $_GET['estatus'];

// Escapar los valores de las variables en la consulta SQL
$id = mysqli_real_escape_string($conexion, $id);
$estatus = mysqli_real_escape_string($conexion, $estatus);

// Construir la consulta SQL con los valores escapados
$consulta = "UPDATE administrativo SET 	
usuario_habilitado='$estatus' WHERE id_administrativo='$id'";

// Ejecutar la consulta SQL
mysqli_query($conexion, $consulta);

// Redirigir al usuario después de ejecutar la consulta
header('Location: clientes.master.php');
?>