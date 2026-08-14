<!DOCTYPE html>
<html>
<head>
    <title>modif1</title>
    <meta charset="UTF-8">
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
$result = mysqli_query($link, $consulta);
if (!$result) {
    echo "<a href='index.html'>Error en la consulta</a>";
    exit;
}
echo "<h2>Seleccione empresa/s a modificar</h2>";
echo "<center>";
echo "<form action='modif2.php' method='POST'>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    echo "<tr><td><input type='radio' name='modif' value='$id'></td><td>$nombre</td></tr>";
}
echo "</table>";
echo "<input type='submit' value='Modificar'>";
echo "</form>";
echo "</center>";
mysqli_close($link);
?>
</body>
</html>