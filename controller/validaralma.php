<?php
session_start();
 
$usuario = $_POST['username'];
$contraseña = $_POST['password'];
 
 
$_SESSION['username'] = $usuario;
include "conexion.php";
 
// Prevenir inyección SQL usando consultas preparadas
$consulta_master = "SELECT * FROM almacenista WHERE usuario = ? AND contraseña = ? and habilitar_almacenista = 1";
$statement = mysqli_prepare($conexion, $consulta_master);
 
// Vincular parámetros
mysqli_stmt_bind_param($statement, "ss", $usuario, $contraseña);
 
// Ejecutar la consulta
mysqli_stmt_execute($statement);
 
// Obtener resultados
$resultado = mysqli_stmt_get_result($statement);
 
// Obtener el número de filas
$fila = mysqli_num_rows($resultado);
 
if ($fila) {
    header('location:../view/pagina_principal.php');
}/* else {
    // Si las credenciales son incorrectas, mostrar mensaje de usuario inhabilitado
    echo '<div style="text-align: center; background:black;">';
    echo '<h1 style="font-size:2.5rem; color: white;">Usuario inhabilitado</h1>';
    echo '<div style="border-radius: 500px; overflow: hidden;">';
    echo '<img src="../img/suricata_triste.jpg" alt="suricata triste" style="width: 35%; border-radius: 210px; ">';
    echo '</div>';
    echo '<a href="meerkast_login.html" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem; color:white;">Volver</a>';
    echo '</div>';
}*/
 
// Liberar resultados y cerrar la conexión
mysqli_stmt_close($statement);
mysqli_close($conexion);
?>
 