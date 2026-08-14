<?php


// Conectar a la base de datos
include "conexion.php";

// Obtener el ID de la orden de trabajo y el nuevo estado del formulario
$orden = $_POST['orden'];
$nuevo_estado = 2; // Estado 2

// Actualizar el estado de la orden de trabajo en la base de datos
$ids_array = explode(',', $orden);

// Actualizar el estado de las órdenes de trabajo en la base de datos
$sql = "UPDATE orden_trabajo SET id_estado_prendas = $nuevo_estado WHERE id_orden IN (" . implode(',', $ids_array) . ")";
$sql2 = "UPDATE totales SET id_estado_prendas = $nuevo_estado WHERE id_orden IN (" . implode(',', $ids_array) . ")";



// Ejecutar la consulta SQL 1
if ($conexion->query($sql) === TRUE)
{
    echo "El estado de la orden de trabajo se actualizó correctamente.";
    echo "<br><a href='../view/ordenes_trabajo.php'>Volver a la orden de trabajo</a>";
} else {
    echo "Error al actualizar el estado de la orden de trabajo: " . $conexion->error;
}

if ($conexion->query($sql2) === TRUE) {
  
    
} else {
    echo "Error al actualizar el estado de la orden de trabajo: " . $conexion->error;
}

?>
