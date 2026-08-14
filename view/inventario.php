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
    <title>meerkats</title>
    <link rel="stylesheet" href="../css/inventario.css">
    <link rel="shortcut icon" href="../img/iconopequeño.jpeg" type="image/x-icon">
</head>

<body>
   <header>
    <a href="../view/administrativo.php" class="logo">
     <img src="../img/zuricata.logo.ama.jpeg" alt="logo-empresa"> 
    <h2 class="logo-empresa">meerkats</h2>
    </a>
 <nav>
     <a href="../view/administrativo.php" class="nav-link">inicio</a>
     <a href="../controller/cerrarsesion.php" class="nav-link">cerrar sesión</a>

    
 </nav>
</header> 
<h1 class="inventario">inventario</h1> 
    <img src = "../img/zuricata.logo.ama.jpeg"  alt="putavida" class="putavida">

<div class="info">
        <form action="../controller/informes.php" method="post">
            <div class="seleccion">
            <select name="seleccionables" class="seleccionables">
                <option value="opcion1">Informes</option>
                <option value="opcion2">Diario</option>
                <option value="opcion3">Quincenal</option>
               <option value="opcion4">Mensual</option>
                <option value="opcion5">Anual</option>
            </select>
        </div>
        <div class="fechas">
            <label for="fecha">Selecciona una fecha:</label><br>
            <input type="date" id="fecha" name="fecha">
            
        </div>
        <button type="submit" class="boton">Generar</button>
        </form>
       
</div>

<h1 class="informes"> informes</h1>

<form action="../controller/inventarioInner.php" method="post">
    <table>
        <tr>
            <th>Orden de Trabajo</th>
            <td><input type="text" name="orden" placeholder="ingrese orden" > <button type="submit" name="action" value="orden">Buscar</button></td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td><input type="text" name="cliente" placeholder="ingresar documento" > <button type="submit" name="action" value="cliente">Buscar</button></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>
                <select name="estado" >
                    
                    <option value="1">en proceso</option>
                    <option value="2">lista por entregar</option>
                    <option value="3">entregado</option>
                </select>
                <button type="submit" name="action" value="estado">Buscar</button>
            </td>
        </tr>
        <tr>
            <th>fecha</th>
            <td><input type="date" id="fecha" name="fecha" placeholder="ingrese fecha" > <button type="submit" name="action" value="fecha">Buscar</button></td>
            
        </tr>
        
    </table>
<br>


    <br>
    <br>
</form>




<footer>    
    <?php
    include_once ('foother.php');
    ?>
</footer>

</body>



</html>














