<!DOCTYPE html>
<html>
<head>
    <title>modif3</title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
</head>
<body>
<?php
// variables declaradas de la base de datos
$f_id = $_POST['id'] ?? '';
$f_nombre = $_POST['nombre'] ?? '';
$f_web = $_POST['web'] ?? '';
$f_telef = $_POST['telef'] ?? '';
$f_sector = $_POST['sector'] ?? '';
$f_descrip = $_POST['descrip'] ?? '';
$f_karma = $_POST['karma'] ?? '';
//conexion de la base de datos
$link = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$link) {
    echo "<a href='index.html'>Error al conectar</a>";
    exit;
}
if (!mysqli_select_db($link, "buscador")) {
    echo "<a href='index.html'>Error al seleccionar BDD</a>";
    exit;
}

$linea1 = "UPDATE empresas ";
$linea2 = " SET nombre='$f_nombre', web='$f_web', telef='$f_telef', sector='$f_sector', descrip='$f_descrip', karma='$f_karma' ";
$linea3 = " WHERE id='$f_id' ";
$consulta = $linea1 . $linea2 . $linea3;
echo $consulta;

$result = mysqli_query($link, $consulta);
if (!$result) {
    echo "<a href='index.html'>Error en la consulta</a>";
    exit;
}

echo "<br>Modif correcta";
echo "<br><br><a href='modif.php'>Otra modif</a>";
echo "<br><br><a href='alta.html'>Inicio</a>";

mysqli_close($link);
?>
</body>
</html>