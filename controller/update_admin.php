<?php
//conexion a la base de datos
require "conexion.php";
 
//variables 
$nombre  = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tip_doc = $_POST['tip_doc'];
$num_doc = $_POST['num_doc'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];

//consulta
 
$actualizar = "UPDATE administrativo set 
nombre = '$nombre',
apellido = '$apellido',
tip_doc = '$tip_doc',
nu_doc = '$num_doc',
telef = '$telefono',
contraseña = '$contraseña'
where usuario = '$usuario '";

//verificar la consulta

if ($conexion->query($actualizar)=== true) {
    echo "actualizacion exitosa";
} else {
    echo "Error: " . $actualizar . "<br>" . $conexion->error;
}

"<br>";

/*echo '<div style="border-radius: 500px; overflow: hidden;">';
echo '<img src="../img/orden_trabajo.jpeg" alt="suricata feliz" style="width: 35%; border-radius: 210px;">';
echo '</div>';
echo '<a href="../view/master.php" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem;">Volver</a>';
echo '</div>';*/


echo '<script>
alert("¡Actualización exitosa!"); window.location.href = "../view/master.php";
</script>';
//cerrar la base de datos
$conexion->close();

?>