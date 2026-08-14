<!DOCTYPE html>
<html>
<head>
    <title>alta2</title>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Quanta Plus">
</head>
<body>

<!--borrar estructura html innecesaria es un archivo backend no necesita visualizar-->
<?php
//?? es un alias sirve tambien para llamar las variables declaradas
$f_nombre = $_POST['nombre'] ?? '';
$f_web = $_POST['web'] ?? '';
$f_telef = $_POST['telef'] ?? '';
$f_sector = $_POST['sector'] ?? '';
$f_descrip = $_POST['descrip'] ?? '';
$f_karma = $_POST['karma'] ?? '';

// establecer primero la conexion y luego si se hace la consulta//
//arreglar el nombre de la base de datos "buscador"//
$conn = mysqli_connect('localhost', 'root', '', 'buscador');
if (!$conn) {
    echo "<a href='index.html'>Error al conectar</a>";

}
//borrar la comprobacion de conexion a la base de datos//
// reducir a solo 1 linea la consulta //
$linea1 = "INSERT INTO empresas (nombre, web, telef, sector, descrip, karma) VALUES ('$f_nombre', '$f_web', '$f_telef', '$f_sector', '$f_descrip', '$f_karma')";
$consulta = $linea1;





if (!mysqli_query($conn, $consulta)) {
    echo "<a href='index.html'>Error en la consulta</a>";

}

echo "<br>Alta correcta";
echo "<br><br><a href='alta.html'>Otra alta</a>";
echo "<br><br><a href='alta.html'>Inicio</a>";
mysqli_close($conn);
?>
</body>
</html>