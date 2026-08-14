<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>

<?php 
date_default_timezone_set('America/Bogota'); 
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja-salida</title>
    <link rel="stylesheet" href="../css/caja.css">
</head>
<body>
    <header>
       
            <a href="../view/pagina_principal.php" class="logo">
                <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
                <h1 class="logo_nombre">Meerkats</h1>
            </a>
            <h1>Caja Salida</h1>
            <nav id="carrito">
                <a href="../view/pagina_principal.php" class="nav link">Inicio</a>
                <a href="../view/ordenes_trabajo.php" class="nav link">Trabajo</a>
                <a href="../controller/cerrarsesion.php" class="nav link">cerrar sesión</a>
            </nav> 
       
    </header>
    <div class="caja-salida">
        <form action="../controller/cajaback.php" method="post">
        <h2>Salida de Orden de Trabajo</h2>
        <div class="formulario">
            <label for="numero-orden">Número de Orden:</label>
            <input type="text" id="numero-orden" name="orden" placeholder="Ingrese el número de orden">

           

           

            <button type="submit">Salida</button>
       
        </div>
        </form>
    </div>

    <div class="caja-salida">
        <form action="../controller/gastos.php" method="post">
        <h2>Gastos o novedades</h2>
        <div class="formulario">
    <label for="gastos-adicionales">Gastos:</label>
    <input type="text" id="gastos-adicionales" name="detalle">
    <label for="gastos-adicionales">Ingrese valor:</label>
    <input type="number" id="gastos-adicionales" name="valor">


    <input type="hidden" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">

    <button type="submit"  formaction="../controller/gastos.php">Enviar</button>
    </div>
    </form>
</div>
    

    <script src="script.js"></script>



    <footer>
        <?php
        include_once ('foother.php');
        ?>
    </footer>
</body>
</html>
