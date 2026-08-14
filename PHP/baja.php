<!DOCTYPE html>
<html>
<head>
    <title>baja1</title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
</head>
<body>
<?php
$linea1 = "SELECT * FROM empresas";
$consulta = $linea1;
//echo $consulta;

$link = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$link) {
    echo "<a href='index.html'>Error al conectar</a>";
    exit;
}

if (!mysqli_select_db($link, "buscador")) {
    echo "<a href='index.html'>Error al seleccionar BDD</a>";
    exit;
}

$result = mysqli_query($link, $consulta);
if (!$result) {
    echo "<a href='index.html'>Error en la consulta</a>";
    exit;
}

echo "<h2>Seleccione empresa/s a dar de baja</h2>";
echo "<center>";
echo "<form action='baja2.php' method='POST'>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    echo "<tr><td><input type='checkbox' name='borrar[$id]'></td><td>$nombre</td></tr>";
}
echo "</table>";
echo "<input type='submit' value='Borrar'>";
echo "</form>";
echo "</center>";

mysqli_close($link);
?>
</body>
</html>