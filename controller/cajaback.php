<?php

// Conexión a la base de datos (reemplaza los valores con los de tu configuración)


include "conexion.php";

// Consulta para obtener los detalles de la orden de trabajo
   
$orden = $_POST['orden'];
$nuevo_estado = 3; // Estado 2

// Actualizar el estado de la orden de trabajo en la base de datos
$ids_array = explode(',', $orden);

// Actualizar el estado de las órdenes de trabajo en la base de datos
$sql = "UPDATE orden_trabajo SET id_estado_prendas = $nuevo_estado WHERE id_orden IN (" . implode(',', $ids_array) . ")";
$sql2 = "UPDATE totales SET id_estado_prendas = $nuevo_estado WHERE id_orden IN (" . implode(',', $ids_array) . ")";


if ($conexion -> query ($sql)=== true){
    header("location:../view/echoexitoso.php");
}
else{
    header("location:../view/echocancelado.php");
}

if ($conexion -> query ($sql2)=== true){}

?>

