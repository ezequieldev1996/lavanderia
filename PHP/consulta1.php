<!DOCTYPE html>
<html>

<head>
    <title>Consulta1</title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
    <meta http-equiv="Content-Type" content="text/html; charset=iso8859-1">
</head>

<body>
    <?php
$link = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$link) {
    echo "<a href='alta.html'>Error al conectar</a>";
    exit;
}

if (!mysqli_select_db($link, "buscador")) {
    echo "<a href='alta.html'>Error al seleccionar BDD</a>";
    exit;
}

$linea1 = "SELECT * FROM empresas ORDER BY nombre";
$consulta = $linea1;

$result = mysqli_query($link, $consulta);
if (!$result) {
    echo "<a href='alta.html'>Error en la consulta</a>";
    exit;
}
?>
    <h2>Empresas</h2>
    <CENTER>
        <TABLE BORDER=1>
            <TR>
                <TD>Nombre</TD>
                <TD>Web</TD>
                <TD>Telef.</TD>
                <TD>Sector</TD>
                <TD>Descrip.</TD>
                <TD>Karma</TD>
            </TR>
            <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<TR>";
    echo "<TD>" . $row['nombre'] . "</TD>";
    echo "<TD>" . $row['web'] . "</TD>";
    echo "<TD>" . $row['telef'] . "</TD>";
    echo "<TD>" . $row['sector'] . "</TD>";
    echo "<TD>" . $row['descrip'] . "</TD>";
    echo "<TD>" . $row['karma'] . "</TD>";
    echo "</TR>";
}
?>
     </TABLE>
    </CENTER>
    <?php
mysqli_close($link);
?>
</body>

</html>