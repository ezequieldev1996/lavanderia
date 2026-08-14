<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor de la acción del formulario
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Conectar a la base de datos
    include "conexion.php";

    // Inicializar la variable $sql para la consulta
    $sql = '';
    
    // Manejar las diferentes acciones del formulario
    switch ($action) {
        case 'orden':
            // Obtener el valor del campo de texto "orden"
            $orden_id = isset($_POST['orden']) ? $_POST['orden'] : '';
            // Realizar la consulta para buscar por el ID de la orden de trabajo
            $sql = "SELECT * FROM orden_trabajo 
            INNER JOIN cliente ON orden_trabajo.num_doc = cliente.num_doc
            INNER JOIN estado_prendas ON orden_trabajo.id_estado_prendas = estado_prendas.id_estado_prendas
            WHERE orden_trabajo.id_orden = '$orden_id'";
            break;
            
        case 'cliente':
            // Obtener el valor del campo de texto "cliente"
            $num_doc_cliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
            // Realizar la consulta para buscar todas las órdenes asociadas al cliente con el número de documento especificado
            $sql = "SELECT * FROM orden_trabajo 
            INNER JOIN cliente ON orden_trabajo.num_doc = cliente.num_doc
            INNER JOIN estado_prendas ON orden_trabajo.id_estado_prendas = estado_prendas.id_estado_prendas
            WHERE cliente.num_doc LIKE '%$num_doc_cliente%'";
            break; 

        case 'estado':
                // Obtener el valor del campo de selección "estado"
                $estado_seleccionado = isset($_POST['estado']) ? $_POST['estado'] : '';
                // Realizar la consulta para buscar todas las órdenes asociadas al estado seleccionado
                $sql = "SELECT * FROM orden_trabajo 
                        INNER JOIN cliente ON orden_trabajo.num_doc = cliente.num_doc
                        INNER JOIN estado_prendas ON orden_trabajo.id_estado_prendas = estado_prendas.id_estado_prendas
                        WHERE estado_prendas.id_estado_prendas = '$estado_seleccionado'";
                break;

        case 'fecha':
                    // Obtener el valor del campo de fecha
                    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
                
                    // Realizar la consulta para buscar las órdenes de trabajo con la fecha especificada
                    $sql = "SELECT * FROM orden_trabajo 
                            INNER JOIN cliente ON orden_trabajo.num_doc = cliente.num_doc
                            INNER JOIN estado_prendas ON orden_trabajo.id_estado_prendas = estado_prendas.id_estado_prendas
                            WHERE DATE(orden_trabajo.fecha_creacion) = '$fecha'";
                    break;    
    } 


    // Ejecutar la consulta si se definió
    if ($sql != '') {
        $resultado = $conexion->query($sql);

        // Procesar los resultados y mostrarlos en HTML
       /* if ($resultado->num_rows > 0) {
            echo "<div class='resultado'>";
            echo "<h2>Órdenes de trabajo del cliente</h2>";
            
            // Iterar sobre todas las filas de resultados
            while ($orden_info = $resultado->fetch_assoc()) {
                // Generar el HTML con estilos para mostrar la información de cada orden de trabajo
                echo "<p><strong>ID de Orden:</strong> " . $orden_info['id_orden'] . "</p>";
                echo "<p><strong>Cliente:</strong> " . $orden_info['nombre'] . "</p>";
                echo "<p><strong>Dirección:</strong> " . $orden_info['direccion'] . "</p>";
                echo "<p><strong>Teléfono:</strong> " . $orden_info['telefono'] . "</p>";
                echo "<p><strong>Estado de Prenda:</strong> " . $orden_info['nombre_estado'] . "</p>";
                echo "<p><strong>Fecha de Creación:</strong> " . $orden_info['fecha_creacion'] . "</p>";
                echo "<hr>"; // Línea divisoria entre órdenes
            }
            
            echo "</div>";
        } else {
            echo "No se encontraron órdenes para el cliente especificado.";
        }

        echo"<a href='../view/inventario.php' style='font-size: 16px; color: #333; text-decoration: none; background-color: #4CAF50; padding: 10px 20px; border-radius: 5px; display: inline-block;'>volver</a>";
    }*/
    // Cerrar la conexión a la base de datos

   echo" <style>
    .resultado {
        text-align: center;
        margin: 0 auto;
        width: 50%; /* Ancho del contenedor */
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .resultado p {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .resultado hr {
        border: none;
        border-top: 1px solid #ccc;
        margin: 20px 0;
    }
    .volver {
        font-size: 16px;
        color: #333;
        text-decoration: none;
        background-color: #4CAF50;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        margin-top: 20px;
    }
</style>";


    
if ($resultado->num_rows > 0) {
    echo "<div class='resultado'>";
    echo "<h2>Órdenes de trabajo del cliente</h2>";
    
    // Iterar sobre todas las filas de resultados
    while ($orden_info = $resultado->fetch_assoc()) {
        // Generar el HTML con estilos para mostrar la información de cada orden de trabajo
        echo "<p><strong>ID de Orden:</strong> " . $orden_info['id_orden'] . "</p>";
        echo "<p><strong>Cliente:</strong> " . $orden_info['nombre'] . "</p>";
        echo "<p><strong>Dirección:</strong> " . $orden_info['direccion'] . "</p>";
        echo "<p><strong>Teléfono:</strong> " . $orden_info['telefono'] . "</p>";
        echo "<p><strong>Estado de Prenda:</strong> " . $orden_info['nombre_estado'] . "</p>";
        echo "<p><strong>Fecha de Creación:</strong> " . $orden_info['fecha_creacion'] . "</p>";
        echo "<hr>"; // Línea divisoria entre órdenes
    }
    echo "<a href='../view/inventario(alma).php' class='volver'>Volver</a>";
    echo "</div>";
    
} else {
    echo "No se encontraron órdenes para el cliente especificado.";
}
    }



    $conexion->close();
}
?>