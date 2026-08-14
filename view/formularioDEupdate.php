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
    <link rel="stylesheet" href="../css/formularios.css">
    <title>Actualizar Datos</title>
</head>
<body>
    
<div class="contenedor">
    <form action="../controller/update_admin.php" method="POST">
     <h2 class="titulo">Actualizar Datos</h2>
        <label for="usuario">Nombre de Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" class="input" required><br>
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"  class="input"><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" class="input" id="apellido" name="apellido"><br>
        <label for="tip_doc">Tipo de Documento:</label><br>
        <select name="tip_doc" id="tip_doc" class="input">tipo de documento:
            <option value="1">cedula de ciudadania</option>
            <option value="2">cedula de extrangeria</option>
            <option value="3">pasaporte</option>
            <option value="4">nit</option>
        </select required><br>
        <label for="num_doc">Número de Documento:</label><br>
        <input type="text" class="input" id="num_doc" name="num_doc"><br>
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" class="input" id="telefono" name="telefono"><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" class="input" id="password" name="password"><br><br>
        <input type="submit" class="boton-registrar" value="Actualizar">
        
        

        <a href="master.php" class="boton-registrar">Regresar</a>
    </form>
</div>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    var usuarioInput = document.getElementById("usuario");

    usuarioInput.addEventListener("keyup", function() {
        var usuario = usuarioInput.value.trim();

        if (usuario !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "buscar_usuario(admin).php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById("nombre").value = response.nombre;
                    document.getElementById("apellido").value = response.apellido;
                    document.getElementById("tip_doc").value = response.tip_doc;
                    document.getElementById("num_doc").value = response.nu_doc;
                    document.getElementById("telefono").value = response.telef;
                }
            };
            xhr.send("usuario=" + encodeURIComponent(usuario));
        }
    });
});



    </script>













    
</body>
</html>