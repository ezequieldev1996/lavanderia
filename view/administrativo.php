<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>


<html lang="es">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QW5VSqAX1OFP4WQVp62KIaK9O5fGbsjT5K20cNvKj+3FZIFCq5k/8lA2ys59VzghnszFk5zqjVfPOmh3ucfl9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/administrativo.css">
    <title>Administración de Lavandería</title>



    <?php
    require "../controller/conexion.php";
    ?>
   
</head>
<body>
    <header>
        <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
        <h2 class="logo_nombre">Meerkats</h2>
        <h1>Administración de Lavandería</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../controller/clientes.admi.php">Clientes de meerkats</a></li>
            <li><a href="../controller/list.almacenista.php">listado de almacenista</a></li>
            <li><a href="formulario_regist.php">registro almacenista</a></li>
            <li><a href="formulario_up_almacen.php">actualiza almacenista</a></li>
            <li><a href="inventario.php">Inventario</a></li>
            <li><a href="../controller/cerrarsesion.php">cerrar sesión</a></li>
        </ul>
    </nav>
    <section>
        <!-- Aquí irían los contenidos específicos de cada sección -->
        <h2>Bienvenido al Panel de Administración</h2>
        <p>Seleccione una opción del menú de navegación para empezar.</p>
    </section>
    <footer>
     <?php include_once ('foother.php');?>
    </footer>
</body>
</html>
