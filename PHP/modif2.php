<!DOCTYPE html>
<html>
<head>
    <title>modif2</title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
</head>
<body>
<?php
$f_modif = $_POST['modif'] ?? '';

$link = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$link) {
    echo "<a href='index.html'>Error al conectar</a>";
    exit;
}

if (!mysqli_select_db($link, "buscador")) {
    echo "<a href='index.html'>Error al seleccionar BDD</a>";
    exit;
}

$linea1 = "SELECT * FROM empresas ";
$linea2 = " WHERE id='$f_modif' ";
$consulta = $linea1 . $linea2;

$result = mysqli_query($link, $consulta);
if (!$result) {
    echo "<a href='index.html'>Error en la consulta</a>";
    exit;
}
?>

<h2>Modif de empresa</h2>
<center>
<FORM action='modif3.php' method='POST'>
<TABLE border=0>
<?php
$row = mysqli_fetch_assoc($result);
if ($row) {
    echo "<TR>";
    echo "<TD>Nombre</TD><TD><INPUT type='text' name='nombre' size='30' maxlength='30' value='" . $row['nombre'] . "'></TD>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>Web</TD><TD><INPUT type='text' name='web' size='30' maxlength='30' value='" . $row['web'] . "'></TD>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>Telef</TD><TD><INPUT type='text' name='telef' size='20' maxlength='20' value='" . $row['telef'] . "'></TD>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>Sector</TD><TD><INPUT type='text' name='sector' size='30' maxlength='30' value='" . $row['sector'] . "'></TD>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>Descrip</TD><TD><INPUT type='text' name='descrip' size='50' maxlength='50' value='" . $row['descrip'] . "'></TD>";
    echo "</TR>";
    echo "<TR>";
    echo "<TD>Karma</TD><TD><INPUT type='text' name='karma' size='3' maxlength='3' value='" . $row['karma'] . "'></TD>";
    echo "</TR>";
    echo "<INPUT type='hidden' name='id' value='" . $row['id'] . "'>";
}
?>
</TABLE>
<INPUT type='submit' value='Aceptar'>
</FORM>
</center>

<?php
mysqli_close($link);
?>
</body>
</html>