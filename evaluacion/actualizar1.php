<?php
include("Conexion.php");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

function obtenerDetallesUsuario($id, $conexion)
{
    $query = "SELECT * FROM formulario WHERE id = '$id'";
    $result = mysqli_query($conexion, $query);

    return $result ? mysqli_fetch_assoc($result) : null;
}

$detallesUsuario = null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['modificar'])) {
    $selectedUserId = $_GET['modificar'];
    $detallesUsuario = obtenerDetallesUsuario($selectedUserId, $conexion);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulario.css">
    <title>Modificar Usuario</title>
</head>

<body>
    <div class="titulo">
        <h2>Formulario de Actualización de Usuario</h2>
    </div>
    <div class="contenedor">
        <center>
            <form class="formNovedad" method="GET" action="actualizar1.php" style="border: 1px;">
                <p style="color:#ffffff">Usuario a Modificar</p>
                <select class="entrada" name="modificar" required>
                    <?php
                    $result = mysqli_query($conexion, "SELECT id, CONCAT_WS(' ', nombre, apellido) as 'Nombre Completo' FROM formulario ORDER BY nombre");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $selectedUserId) ? "selected" : "";
                        echo "<option value='{$row['id']}' $selected>{$row['Nombre Completo']}</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Buscar registro">
            </form>

            <?php
            if ($detallesUsuario) {
                ?>
                <form class="formNovedad" method="POST" action="modificar.php" style="border: 1px;">
                    <input type="hidden" name="modificar" value="<?php echo $selectedUserId; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $detallesUsuario['nombre']; ?>" required>

                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $detallesUsuario['apellido']; ?>" required>

                    <label for="tip_doc">Tipo de Documento:</label>
                    <input type="text" name="tip_doc" value="<?php echo $detallesUsuario['tip_doc']; ?>" required>

                    <label for="num_doc">Número de Documento:</label>
                    <input type="text" name="num_doc" value="<?php echo $detallesUsuario['num_doc']; ?>" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" value="<?php echo $detallesUsuario['telefono']; ?>" required>

                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $detallesUsuario['usuario']; ?>" required>

                    <label for="pais">País:</label>
                    <input type="text" name="pais" value="<?php echo $detallesUsuario['pais']; ?>" required>

                    <input type="submit" value="Actualizar">
                </form>
                <?php
            }
            ?>
        </center>
    </div>
</body>

</html>
