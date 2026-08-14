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
    <link rel="stylesheet" href="../css/master.css">
    <title>Panel de Administrador</title>
  
</head>
<body>
    <div id="header">
        <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
        <h2 class="logo_nombre">Meerkats</h2>
        <h1>MASTER SHIEF</h1>
       
        
    </div>
    <div id="nav">
        <a href="formulario_admin.php">registro administrador</a>
        <a href="formularioDEupdate.php">actualizar administrador</a>
        <a href="../controller/clientes.master.php">clientes administrador</a>
        <a href="../controller/cerrarsesion.php" class="usuario">Cerrar Sesion</a>
        
    </div>
    <div id="content">
        <a href="" class="admin-link">andres</a>
       
        <a href="#" class="admin-link">Ezequiel</a>
    </div>


<footer>
    <?php include_once ('foother.php'); ?>
</footer>

</body>
</html>