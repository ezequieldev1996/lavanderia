<?php
include "conexion.php";
include "variables.php";

// esta se supone que es la ruta de la libreria para el codigo de barras 


require 'vendor/autoload.php';


//esta parte es donde se llama la funcion 
use Picqer\Barcode\BarcodeGeneratorHTML;

// Inicializar variables para el total total y la cantidad total





$totalTotal = 0;
$cantidadTotal = 0;
$observacionestotal = "";
$nombre=$_POST['nombre'];


    
    $estado="1";
    // Valor predeterminado para el estado
    // Insertar_orden
  
    $sqlOrden = "INSERT INTO orden_trabajo (num_doc, fecha_creacion, id_estado_prendas ) VALUES ('$num_doc', '$fechaCreacion', '$estado')";
    if ($conexion->query($sqlOrden) === TRUE) {
        $idOrden = $conexion->insert_id;
    }
       // prueba
       
   

      
       $sqlCliente = "SELECT cliente.nombre, cliente.direccion, cliente.telefono 
       FROM orden_trabajo 
       INNER JOIN cliente 
       ON orden_trabajo.num_doc = cliente.num_doc 
       WHERE orden_trabajo.id_orden = '$idOrden'";
$resultadoCliente = $conexion->query($sqlCliente);


if ($resultadoCliente->num_rows > 0) {

$cliente = $resultadoCliente->fetch_assoc();






        // Procesar cada artículo seleccionado
      

if (isset($_POST['articulo']) && is_array($_POST['articulo'])) {
    // Inicializar variables para totales
    $totalTotal = 0;
    $cantidadTotal = 0;
    $observacionestotal = '';

    // Estilos CSS
    echo "<style>
    body {
        background-color: #f0f0f0; /* Cambiar color de fondo del cuerpo */
        font-family: Arial, sans-serif; /* Cambiar fuente del texto */
        color: #333; /* Cambiar color del texto */
    }
    .container {
        border: 2px solid #007bff; /* Cambiar color del borde */
        padding: 20px;
        width: 80%;
        margin: 50px auto; /* Centrar horizontalmente y dar espacio superior */
        background-color: #fff; /* Cambiar color de fondo */
        box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Agregar sombra */
        border-radius: 10px; /* Agregar borde redondeado */
        text-align: center; /* Centrar el contenido */
    }
    .logo-container {
        text-align: center; /* Centrar el contenido */
        margin-bottom: 20px;
    }
    .logo {
        max-width: 200px;
        max-height: 100px;
        border-radius: 10px; /* Agregar borde redondeado */
    }
    .details-container {
        border-bottom: 2px solid #007bff; /* Cambiar color del borde inferior */
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .details-container h1 {
        margin-bottom: 10px;
        color: #007bff; /* Cambiar color del título */
    }
    .item {
        border: 1px solid #ddd; /* Cambiar color del borde */
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9; /* Cambiar color de fondo */
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Agregar sombra */
        border-radius: 5px; /* Agregar borde redondeado */
    }
    .item p {
        margin: 5px 0;
        color: #555; /* Cambiar color del texto */
        text-align: center; /* Centrar el texto */
    }
    .observaciones {
        margin-top: 20px;
    }
    .botones {
        margin-top: 20px;
        text-align: center; /* Centrar el contenido */
    }
    .botones button {
        padding: 10px 20px;
        background-color: #007bff; /* Cambiar color de fondo del botón */
        color: #fff; /* Cambiar color del texto del botón */
        border: none;
        border-radius: 5px; /* Agregar borde redondeado */
        cursor: pointer;
        transition: background-color 0.3s; /* Agregar transición al color de fondo */
        font-size: 16px; /* Ajustar tamaño de fuente */
    }
    .botones button:hover {
        background-color: #0056b3; /* Cambiar color de fondo al pasar el mouse */
    }
</style>";

// Mostrar la imagen
echo "<div class='logo-container'>";
echo "<img class='logo' src='../img/zuricata.logo.ama.jpeg' alt='Logo'>";

echo "</div>";



    // Loop sobre los artículos
    foreach ($_POST['articulo'] as $producto) {
        // Obtener cantidad y observaciones
        $cantidad = isset($_POST['cantidad'][$producto]) ? $_POST['cantidad'][$producto] : 0;
        $observaciones = isset($_POST['observaciones'][$producto]) ? $_POST['observaciones'][$producto] : '';

        // Obtener precio del producto desde la base de datos
        $sqlPrecio = "SELECT precio FROM productos WHERE nombre_prenda = '$producto'";
        $resultadoPrecio = $conexion->query($sqlPrecio);
        $precio = $resultadoPrecio->fetch_assoc()['precio'] ?? 0;

        // Calcular total por artículo
        $total = $precio * $cantidad;

        // Sumar al total total de la orden
        $totalTotal += $total;
        $cantidadTotal += $cantidad;

        // Concatenar las observaciones
        $observacionestotal .= $observaciones . "/// ";

        // Insertar detalles del artículo en la base de datos
        $sqlDetalle = "INSERT INTO orden_producto (id_orden, nombre_prenda, cantidad, observaciones, total) VALUES ('$idOrden', '$producto', '$cantidad', '$observaciones', '$total')";
        if ($conexion->query($sqlDetalle) === TRUE) {
            // Éxito al insertar detalle
        } else {
            // Manejar error al insertar detalle
            echo "Error al insertar detalle: " . $conexion->error;
        }

        // Imprimir los detalles de cada prenda
        echo "<div class='item'>";
        echo "<p><strong>Prenda:</strong> $producto</p>";
        echo "<p><strong>Cantidad:</strong> $cantidad</p>";
        echo "<p><strong>Observaciones:</strong>$observaciones</p>";
        echo "<p><strong>Precio Unitario:</strong> $precio</p>";
        echo "<p><strong>Total por Prenda:</strong> $total</p>";
        echo "</div>";
    }

    // Insertar totales en la base de datos
    $sqltotales = "INSERT INTO totales (id_orden, cantidadTotal, totalTotal, fecha, id_estado_prendas ) VALUES ('$idOrden', '$cantidadTotal','$totalTotal','$fechaCreacion', '$estado' )";
     
    //aqui la idea es poder crear el codigo de barras 
    $barrasCodigo = new BarcodeGeneratorHTML ();

    

    if ($conexion->query($sqltotales) === true) {
        // Éxito al insertar totales
    } else {
        echo "Error al insertar totales: " . $conexion->error;
    }

    // Imprimir resumen de la orden
    echo "<div class='item'>";
    echo "<p><strong>Total de Prendas:</strong> $cantidadTotal</p>";
    echo "<p><strong>Total de la Orden:</strong> $totalTotal</p>";
    
    echo "<p><strong>cliente:</strong> ". $cliente ['nombre']." </p>";
    echo "<p><strong>direccion:</strong> ". $cliente ['direccion'] ." </p>";
    echo "<p><strong>orden de trabajo:</strong> ". $idOrden ." </p>";
    //echo "<p><strong>codigo</strong> ". $barrasCodigo->getbarcode($idOrden, $barrasCodigo ::TYPE_CODE_128) . "</p>"; 
    echo "</div>";

    // Imprimir observaciones

    echo "<style>
        .text-container {
            text-align: center;
        }
        .text-container p {
            font-weight: bold;
        }
        .text-container button {
            display: block;
            margin: 0 auto;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #03051e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .text-container a {
            display: block;
            margin: 0 auto;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
      </style>";

echo "<div class='text-container'>";
echo "<p><strong>codigo:</strong>  ". $barrasCodigo->getbarcode ($idOrden, $barrasCodigo ::TYPE_CODE_128) ." </p>";
echo "<button onclick='window.print();'>Imprimir Orden de Trabajo</button>";
echo "<a href='../view/ordenes_trabajo.php'>Nueva Orden</a>";
echo "</div>";

    $conexion->close();
} else {
    echo "No se seleccionaron artículos.";
}
}


?>



