<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
 
//la conexion a la base de datos si la mueven de carpeta toca saberla llamar
error_reporting(0);
include "conexion.php";
include "validarmaster.php";
include "validaradmi.php";
include "validaralma.php";
include "autentificar_pass.php";


 
//las variables declaradas en el formularios
$usuario = $_POST['username'];
$contraseña = $_POST['password'];
 
 
//consulta para verificar el usuario
 
 
$consulta_master = "SELECT * FROM master where usuario = ? and contraseña = ?";
$consulta_admin = "select * from administrativo where usuario = ? and contraseña = ? and usuario_habilitado = 1";
$consulta_almacen = "select * from almacenista where usuario = ? and contraseña = ? and habilitar_almacenista = 1";
 
//ejecutar la consulta del master
// las otras consultas son iguales solo cambia el nombre si es master o admin o almacenista
$sentencia_master = $conexion->prepare($consulta_master);
$sentencia_master -> bind_param("ss", $usuario , $contraseña);
$sentencia_master -> execute();
$resultado_master = $sentencia_master -> get_result();
 
//ejecutar la consulta del administrador
 
$sentencia_admin = $conexion -> prepare ($consulta_admin);
$sentencia_admin -> bind_param("ss", $usuario, $contraseña);
$sentencia_admin -> execute();
$resultado_admin = $sentencia_admin -> get_result();
 
//ejecutar la consulta del almacenista
 
$sentencia_almacen = $conexion -> prepare ($consulta_almacen);
$sentencia_almacen ->bind_param("ss", $usuario, $contraseña);
$sentencia_almacen -> execute();
$resultado_almacen = $sentencia_almacen ->get_result();
 
// aqui para abajo esta los resultados de la consulta se traen con un if y un else
// mas facil no se puede  jajaja o no se si se puede o no
 
if ($resultado_master ->num_rows == 1){
    header ('location:../view/master.php');
}
else if ($resultado_admin ->num_rows == 1){
    header ('location:../view/administrativo.php');
}
else if ($resultado_almacen ->num_rows == 1){
    header ('location:../view/pagina_principal.php');
}
else {
    echo '<div style="text-align: center; background:black;">';
    echo '<h1 style="font-size:2.5rem; color: white;">usuario inhabilitado</h1>';
    echo '<div style="border-radius: 500px; overflow: hidden;">';
    echo '<img src="../img/zuricata_triste.jpg.jpg" alt="suricata triste" style="width: 35%; border-radius: 210px; ">';
    echo '</div>';
    echo '<a href="../view/meerkast_login.html" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem; color:white;">Volver</a>';
    echo'</div>';
}
?>