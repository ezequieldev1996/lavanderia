<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
</head>
<body>
<?php
$f_borrar = $_POST['borrar'] ?? [];

$link = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$link) {
    echo "<a href='index.html'>Error al conectar</a>";
    exit;
}

if (!mysqli_select_db($link, "buscador")) {
    echo "<a href='index.html'>Error al seleccionar BDD</a>";
    exit;
}

foreach ($f_borrar as $indice => $valor) {
    if ($valor == "on") {
        $linea1 = "DELETE FROM empresas ";
        $linea2 = " WHERE id='$indice' ";
        $consulta = $linea1 . $linea2;
        //echo "$consulta";
        if (!mysqli_query($link, $consulta)) {
            echo "<a href='index.html'>Error en el borrado</a>";
            exit;
        }
    }
}

echo "<br>Borrado correcto";
echo "<br><br><a href='baja.php'>Otra baja</a>";
echo "<br><br><a href='alta.html'>Inicio</a>";
mysqli_close($link);
?>
</body>
</html>