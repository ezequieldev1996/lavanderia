

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
  <title>Lavandería XYZ</title>
  <link rel="stylesheet" href="../css/acople.css">
</head>
<body>
  <header>
    <a href="../view/pagina_principal.php" class="logo">
        <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
        <h1 class="logo_nombre">Meerkats</h1>
    </a>
    <h1>Acople</h1>
    <nav id="carrito">
        <a href="../view/pagina_principal.php" class="nav link">Inicio</a>
        <a href="../view/ordenes_trabajo.php" class="nav link">Trabajo</a>
        <a href="../controller/cerrarsesion.php" class="nav link">cerrar sesión</a>
    </nav> 
</header>
  <main>
    <div class="contenedor">
      <form action="../controller/acopleBack.php" method="post" id="formulario">
        <label for="costo">Ordenes listas para entrega</label>
        <input type="text" name="orden" id="costo" placeholder="Ingrese la orden">
       <!-- <label for="pago">Pago del Cliente:</label>
        <input type="number" id="pago" placeholder="Ingrese el monto pagado">-->
        <button type="submit">actualizar</button>
      </form>
      <div id="resultado"></div>
    </div>
  </main>
  <footer>
    <?php include_once ('foother.php'); ?>
  </footer>
  <script src="script.js"></script>
</body>
</html>






