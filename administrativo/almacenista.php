<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz del Almacenista</title>

    <?php
    include 'conexion.php';
    ?>
    <style>


        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #666;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        section {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Interfaz del Almacenista</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inventario</a></li>
            <li><a href="#">Recepción de Suministros</a></li>
            <li><a href="#">Registro de Entradas/Salidas</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
    </nav>
    <section>
        <!-- Aquí irían los contenidos específicos de cada sección -->
        <h2>Bienvenido al Panel del Almacenista</h2>
        <p>Seleccione una opción del menú de navegación para empezar.</p>
