<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor seleccionado del informe
    $informe = isset($_POST['seleccionables']) ? $_POST['seleccionables'] : '';
    
    // Conectar a la base de datos
    include "conexion.php"; // Asegúrate de incluir el archivo de conexión adecuado

    // Inicializar las variables para los totales de cada informe
    $totalValorEntrada = 0; 
    $totalPrendasEntrada = 0;
    $totalValorSalida = 0; 
    $totalPrendasSalida = 0;


    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

    if (empty($fecha)) {
        // Si la fecha no está seleccionada, muestra una alerta
        echo '<script>alert("Por favor selecciona una fecha.");window.history.back();</script>';
    }

    if (!empty($fecha)) {

    // Definir la consulta según el tipo de informe seleccionado
    switch ($informe) {
        case 'opcion1': // Informe general
            // Aquí implementarías la lógica para el informe general
            break;



        case 'opcion2': // Informe diario
            // Obtener la fecha seleccionada del formulario
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

            // Consulta SQL para órdenes de entrada (estado 1 o 2) del día
            $sqlEntrada = "SELECT * FROM totales WHERE fecha = '$fecha' AND id_estado_prendas = '1' OR id_estado_prendas = '2'";
            $resultadoEntrada = $conexion->query($sqlEntrada);

            // Consulta SQL para órdenes de salida (estado 3) del día
            $sqlSalida = "SELECT * FROM totales WHERE fecha = '$fecha' AND id_estado_prendas = '3'";
            $resultadoSalida = $conexion->query($sqlSalida);
            
            $sqlGastos = "SELECT SUM(valor) AS total_gastos FROM gastos WHERE fecha = '$fecha'";
            $resultadoGastos = $conexion->query($sqlGastos);
            $filaGastos = $resultadoGastos->fetch_assoc();
            $totalGastos = $filaGastos['total_gastos'];
            break;


           
        case 'opcion3': // Informe quincenal
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

    // Calcular la fecha de inicio del período quincenal
    $fechaInicio = date('Y-m-d', strtotime('-15 days', strtotime($fecha)));
    
    // Consulta SQL para órdenes de entrada (estado 1 o 2) dentro del período quincenal
    $sqlEntrada = "SELECT * FROM totales WHERE fecha >= '$fechaInicio' AND fecha <= '$fecha' AND (id_estado_prendas = '1' OR id_estado_prendas = '2')";
    $resultadoEntrada = $conexion->query($sqlEntrada);

    // Consulta SQL para órdenes de salida (estado 3) dentro del período quincenal
    $sqlSalida = "SELECT * FROM totales WHERE fecha >= '$fechaInicio' AND fecha <= '$fecha' AND id_estado_prendas = '3'";
    $resultadoSalida = $conexion->query($sqlSalida);

    // Consulta SQL para gastos dentro del período quincenal
    $sqlGastos = "SELECT SUM(valor) AS total_gastos FROM gastos WHERE fecha >= '$fechaInicio' AND fecha <= '$fecha'";
    $resultadoGastos = $conexion->query($sqlGastos);
    $filaGastos = $resultadoGastos->fetch_assoc();
    $totalGastos = $filaGastos['total_gastos'];
            break;






        case 'opcion4': // Informe mensual
            $anio = isset($_POST['anio']) ? $_POST['anio'] : '';
    $mes = isset($_POST['mes']) ? $_POST['mes'] : '';

    // Calcular la fecha de inicio y fin del mes seleccionado
    $primerDiaMes = date('Y-m-01', strtotime("$anio-$mes-01"));
    $ultimoDiaMes = date('Y-m-t', strtotime("$anio-$mes-01"));
    
    // Consulta SQL para órdenes de entrada (estado 1 o 2) dentro del mes
    $sqlEntrada = "SELECT * FROM totales WHERE fecha >= '$primerDiaMes' AND fecha <= '$ultimoDiaMes' AND (id_estado_prendas = '1' OR id_estado_prendas = '2')";
    $resultadoEntrada = $conexion->query($sqlEntrada);

    // Consulta SQL para órdenes de salida (estado 3) dentro del mes
    $sqlSalida = "SELECT * FROM totales WHERE fecha >= '$primerDiaMes' AND fecha <= '$ultimoDiaMes' AND id_estado_prendas = '3'";
    $resultadoSalida = $conexion->query($sqlSalida);

    // Consulta SQL para gastos dentro del mes
    $sqlGastos = "SELECT SUM(valor) AS total_gastos FROM gastos WHERE fecha >= '$primerDiaMes' AND fecha <= '$ultimoDiaMes'";
    $resultadoGastos = $conexion->query($sqlGastos);
    $filaGastos = $resultadoGastos->fetch_assoc();
    $totalGastos = $filaGastos['total_gastos'];
            break;




        case 'opcion5': // Informe anual
             // Obtener el año seleccionado del formulario
    $anio = isset($_POST['anio']) ? $_POST['anio'] : '';

    // Calcular la fecha de inicio y fin del año seleccionado
    $primerDiaAnio = date('Y-01-01', strtotime("$anio-01-01"));
    $ultimoDiaAnio = date('Y-12-31', strtotime("$anio-01-01"));
    
    // Consulta SQL para órdenes de entrada (estado 1 o 2) dentro del año
    $sqlEntrada = "SELECT * FROM totales WHERE fecha >= '$primerDiaAnio' AND fecha <= '$ultimoDiaAnio' AND (id_estado_prendas = '1' OR id_estado_prendas = '2')";
    $resultadoEntrada = $conexion->query($sqlEntrada);

    // Consulta SQL para órdenes de salida (estado 3) dentro del año
    $sqlSalida = "SELECT * FROM totales WHERE fecha >= '$primerDiaAnio' AND fecha <= '$ultimoDiaAnio' AND id_estado_prendas = '3'";
    $resultadoSalida = $conexion->query($sqlSalida);

    // Consulta SQL para gastos dentro del año
    $sqlGastos = "SELECT SUM(valor) AS total_gastos FROM gastos WHERE fecha >= '$primerDiaAnio' AND fecha <= '$ultimoDiaAnio'";
    $resultadoGastos = $conexion->query($sqlGastos);
    $filaGastos = $resultadoGastos->fetch_assoc();
    $totalGastos = $filaGastos['total_gastos'];
            break;





        default:
            // Acción no reconocida, mostrar un mensaje de error o manejarlo como desees
            echo "Informe no reconocido";
            exit;
    }

    // Procesar y mostrar los resultados de órdenes de entrada
   /* if ($resultadoEntrada->num_rows > 0) {
        echo "<h2>Órdenes de Entrada del $fecha</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Orden</th><th>Cantidad Total</th><th>Total Total</th></tr>";
        
        while ($filaEntrada = $resultadoEntrada->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $filaEntrada['id_orden'] . "</td>";
            echo "<td>" . $filaEntrada['cantidadTotal'] . "</td>";
            echo "<td>" . $filaEntrada['totalTotal'] . "</td>";
            echo "</tr>";
            
            // Calcular totales de órdenes de entrada
            $totalPrendasEntrada += $filaEntrada['cantidadTotal'];
            $totalValorEntrada += $filaEntrada['totalTotal'];
        }
        
        // Mostrar totales de órdenes de entrada
        echo "<tr><td colspan='3'>Total de prendas de entrada: $totalPrendasEntrada</td></tr>";
        echo "<tr><td colspan='3'>Total valor de entrada: $totalValorEntrada</td></tr>";
        
        echo "</table>";
    } else {
        echo "<p>No hay órdenes de entrada para el $fecha.</p>";
    }
    echo "<a href='../view/inventario(alma).php'>Volver</a>";

    // Procesar y mostrar los resultados de órdenes de salida
    if ($resultadoSalida->num_rows > 0) {
        echo "<h2>Órdenes de Salida del $fecha</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Orden</th><th>Cantidad Total</th><th>Total Total</th></tr>";
        
        while ($filaSalida = $resultadoSalida->fetch_assoc()) {

            $totalSalidaConGastos = $filaSalida['totalTotal'] - $totalGastos;

            echo "<tr>";
            echo "<td>" . $filaSalida['id_orden'] . "</td>";
            echo "<td>" . $filaSalida['cantidadTotal'] . "</td>";
            echo "<td>" . $filaSalida['totalTotal'] . "</td>";
              
            echo "</tr>";
            
            // Calcular totales de órdenes de salida
            $totalValorSalida += $filaSalida['totalTotal'];
            $totalPrendasSalida += $filaSalida['cantidadTotal'];
           // $totalValorSalida += $totalSalidaConGastos;
        }
        
        // Mostrar totales de órdenes de salida
        echo "<tr><td colspan='3'>Total de prendas de salida: $totalPrendasSalida</td></tr>";
        echo "<tr><td colspan='3'>Total valor de salida (sin gastos): $totalValorSalida</td></tr>";
        echo "<tr><td colspan='3'>Total gastos restados: $totalGastos</td></tr>";
        echo "<tr><td colspan='3'>Total valor de salida (con gastos): " . ($totalValorSalida - $totalGastos) . "</td></tr>";
        
        echo "</table>";

        echo "<a href='../view/inventario(alma).php'>Volver</a>";
    } else {
        echo "<p>No hay órdenes de salida para el $fecha.</p>";
    }  */

    if ($resultadoEntrada->num_rows > 0) {
        echo "<div class='resultado'>";
        echo "<h2>Órdenes de Entrada del $fecha</h2>";
        echo "<table class='tabla'>";
        echo "<tr><th>ID Orden</th><th>Cantidad Total</th><th>Total Total</th></tr>";
        
        while ($filaEntrada = $resultadoEntrada->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $filaEntrada['id_orden'] . "</td>";
            echo "<td>" . $filaEntrada['cantidadTotal'] . "</td>";
            echo "<td>" . $filaEntrada['totalTotal'] . "</td>";
            echo "</tr>";
            
            // Calcular totales de órdenes de entrada
            $totalPrendasEntrada += $filaEntrada['cantidadTotal'];
            $totalValorEntrada += $filaEntrada['totalTotal'];
        }
        
        // Mostrar totales de órdenes de entrada
        echo "<tr><td colspan='3'>Total de prendas de entrada: $totalPrendasEntrada</td></tr>";
        echo "<tr><td colspan='3'>Total valor de entrada: $totalValorEntrada</td></tr>";
        
        echo "</table>";
    } else {
        echo "<p>No hay órdenes de entrada para el $fecha.</p>";
    }
    
    // Estilos CSS para la tabla
    echo "<style>
        .resultado {
            text-align: center;
            margin: 0 auto;
            width: 50%; /* Ancho del contenedor */
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .tabla {
            width: 100%;
            border-collapse: collapse;
        }
        .tabla th, .tabla td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .tabla th {
            background-color: #f2f2f2;
        }
        .volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .volver:hover {
            background-color: #45a049;
        }
    </style>";
    
    if ($resultadoSalida->num_rows > 0) {
        echo "<h2>Órdenes de Salida del $fecha</h2>";
        echo "<table class='tabla'>";
        echo "<tr><th>ID Orden</th><th>Cantidad Total</th><th>Total Total</th></tr>";
        
        while ($filaSalida = $resultadoSalida->fetch_assoc()) {
    
            $totalSalidaConGastos = $filaSalida['totalTotal'] - $totalGastos;
    
            echo "<tr>";
            echo "<td>" . $filaSalida['id_orden'] . "</td>";
            echo "<td>" . $filaSalida['cantidadTotal'] . "</td>";
            echo "<td>" . $filaSalida['totalTotal'] . "</td>";
              
            echo "</tr>";
            
            // Calcular totales de órdenes de salida
            $totalValorSalida += $filaSalida['totalTotal'];
            $totalPrendasSalida += $filaSalida['cantidadTotal'];
           // $totalValorSalida += $totalSalidaConGastos;
        }
        
        // Mostrar totales de órdenes de salida
        echo "<tr><td colspan='3'>Total de prendas de salida: $totalPrendasSalida</td></tr>";
        echo "<tr><td colspan='3'>Total valor de salida (sin gastos): $totalValorSalida</td></tr>";
        echo "<tr><td colspan='3'>Total gastos restados: $totalGastos</td></tr>";
        echo "<tr><td colspan='3'>Total valor de salida (con gastos): " . ($totalValorSalida - $totalGastos) . "</td></tr>";
        
        echo "</table>";
    
        echo "<a href='../view/inventario(alma).php' class='volver'>Volver</a>";
    } else {
        echo "<p>No hay órdenes de salida para el $fecha.</p>";
        echo "<a href='../view/inventario.php' class='volver'>Volver</a>";
    }
    // Cerrar la conexión a la base de datos
    $conexion->close();
}

}


?>
