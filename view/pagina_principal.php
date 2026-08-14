<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>


<html lang="en">
<head>
    <link rel="shortcut icon" href="../img/iconopequeño.jpeg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEERKATS</title>
    <link rel="stylesheet" href="../css/pagina_principal.css">
</head>
<body>
    <header>
        <a href="../view/pagina_principal.php" class="logo">
            <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
            <h1 class="logo_nombre">Meerkats</h1>
        </a>
        
        <nav>
             
       <a href="../view/ordenes_trabajo.php" class="trabajo">Trabajo</a>
       
       <a href="../view/inventario(alma).php" class="inventario" >Inventario</a>
      
 
        <!--<a href="../view/caja.html" class="caja">Caja</a>-->
        <a href="acople.php" class="inventario">Acople</a>
        <a href="../view/caja.php" class="inventario">Caja</a>
        
     
       <a href="../controller/cerrarsesion.php" class="usuario">Cerrar Sesion</a>
        </nav> 
    </header>
       
    
    
    
    
    
       
    
   </header> 
   <img src="../img/interfaz/ilustracion3.svg" class="imagen_body">
    
    


  <footer>
    <?php include_once ('foother.php'); ?>
  </footer>

</body>
</html>

