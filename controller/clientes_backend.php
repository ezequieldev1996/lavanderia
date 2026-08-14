<?php


include "conexion.php";
include "variables.php";



    // Verificar si el cliente ya existe en la base de datos
    $sql_check = "SELECT * FROM cliente WHERE num_doc = '$num_doc'";
    $result_check = $conexion->query($sql_check);
    
    if ($result_check->num_rows > 0) {
        // Obtener el número de teléfono del cliente existente
        $cliente_existente = $result_check->fetch_assoc();
        $telefono_cliente_existente = $cliente_existente['telefono'];

        // Debug: Salida para verificar el número de teléfono existente y el nuevo número de teléfono
 

        // Actualizar el número de teléfono solo si se proporciona un nuevo valor
        if (!empty($telefono)) {
            $telefono_actualizado = $telefono;
        } else {
            $telefono_actualizado = $telefono_cliente_existente;
        }

        // Debug: Salida para verificar el número de teléfono actualizado
       

        // Realizar la actualización del cliente
        $sql = "UPDATE cliente 
                SET type_doc = '$type_doc', nombre = '$nombre', apellido = '$apellido', 
                    telefono = '$telefono_actualizado', email = '$email', direccion = '$direccion', 
                    fecha = '$fechaCreacion', id_rol = '$id_rol' 
                WHERE num_doc = '$num_doc'";

        // Debug: Salida para verificar la consulta SQL de actualización
   

        if ($conexion->query($sql) === true) {
            echo '<div style="text-align: center;">';
            echo '<h1 style="font-size:4rem;">actualización exitosa</h1>';
            echo '<div style="border-radius: 500px; overflow: hidden;">';
            echo '<img src="../img/orden_trabajo.jpeg" alt="suricata feliz" style="width: 35%; border-radius: 210px;">';
            echo '</div>';
            echo '<a href="../view/ordenes_trabajo.php" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem; ">Volver a la orden de trabajo</a>';
            echo '</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        // Si el cliente no existe, realizar una inserción

        // Código de inserción aquí...
        $sql_insert = "INSERT INTO cliente (type_doc, num_doc, nombre, apellido, telefono, email, direccion, fecha, id_rol) 
                    VALUES ('$type_doc', '$num_doc', '$nombre', '$apellido', '$telefono', '$email', '$direccion', '$fechaCreacion', '$id_rol')";

    if ($conexion->query($sql_insert) === true) {
        echo '<div style="text-align: center;">';
        echo '<h1 style="font-size:4rem;">cliente registrado exitosamente</h1>';
        echo '<div style="border-radius: 500px; overflow: hidden;">';
        echo '<img src="../img/orden_trabajo.jpeg" alt="suricata feliz" style="width: 35%; border-radius: 210px;">';
        echo '</div>';
        echo '<a href="../view/ordenes_trabajo.php" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem; ">Volver a la orden de trabajo</a>';
        echo '</div>';
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conexion->error;
    }
}
    
    
    $conexion->close();

?>





