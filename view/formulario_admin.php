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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formularios.css">
    <title>Document</title>
</head>
<body>
 
<div class="titulo">
    
</div>
<div class="contenedor">
    <table>
    <form action="../controller/insert_admin.php" method="post">
        <h2>formulario de registro</h2>
        <label for="nombre">ingrese nombre:</label>
        <input type="text"  placeholder="nombre"name="nombre" id="nombre"  class="input" required>
      

      
        <label for="apellido">ingrese apellido:</label>
        <input type="text" placeholder="apellido" name="apellido" id="apellido" class="input" required>
      

      
        <label for="tip_doc">selecione su documento:</label>
        <select name="tip_doc" id="tip_doc" class="input">
            <option value="1">cedula de ciudadania</option>
            <option value="2">Cedula de extranjeria</option>
            <option value="3">pasaporte</option>
            <option value="4">nit</option>
        </select>
      

      
        <label for="num_doc">ingrese numero de documento:</label>
        <input type="text" placeholder="numero de documento" name="num_doc" id="num_doc" class="input" required>

      
       
      
        <label for="telefono">ingrese telefono:</label>
        <input type="text"  placeholder="numero de telefono" name="telefono" id="telefono" class="input" required>

      
        <label for="usuario">como te llamaremos:</label>
        <input type="text" placeholder="nombre usuario" name="usuario" id="usuario" class="input" required>

      
        <label for="contraseña">ingrese contraseña:</label>
        <input type="password" placeholder="contraseña" name="password" id="password" class="input" required>
      
   
      
        <button type="submit" class="boton-registrar" value="registrar" > registrar</button>
        <a href="formularioDEupdate.php" class="boton-registrar">actualizar admin</a>
        <a href="master.php" class="boton-registrar">volver</a>
      
      
    

    </form>

    </table>
</div>
 
</body>
</html>