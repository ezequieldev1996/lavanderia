

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
    <link rel="stylesheet" href="../css/cliente.css">
    <title>Formulario de Información Personal</title>
   
</head>
<body>
    <!-- Formulario de Información Personal -->
    <form action="../controller/clientes_backend.php" method="post">
        <h2>Información personal del cliente</h2>
        <table>
            <tr>
                <td>
                    <input type="text" name="nu_doc" id="nu_doc" placeholder="Número de documento" maxlength="15" required>
                    <select name="type_doc" id="type_doc" required>
                        <option value="1">Cedula de ciudadania</option>
                        <option value="2">Cedula de extranjeria</option>
                        <option value="3">Pasaporte</option>
                    </select>
                    <br>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres" required>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="telefono" id="telefono" placeholder="Teléfono" required>
                    <br>
                    <input type="email" name="email" id="email" placeholder="Correo electrónico">
                    <br>
                    <input type="text" name="direccion" id="direccion" placeholder="Escriba su dirección" required>
                    <br>
                    <input type="date" id="fecha" name="fecha" placeholder="Ingrese fecha" required>
                    <br>
                    <input type="submit" class="buscar_cliente" name="registrar" formaction="clientes_backend.php" value="Registrar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
