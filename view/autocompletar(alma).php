
<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>





<?php
// Conexión a la base de datos 
include "../controller/conexion.php";

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el nombre de usuario enviado por la solicitud GET
$usuario = $_GET['usuario'];

// Consulta para obtener los datos del usuario
$sql = "SELECT nombre, apellido, tip_doc, no_doc, telef FROM almacenista WHERE usuario = '$usuario'";
$result = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Convertir resultados a un array asociativo
    $row = $result->fetch_assoc();

    // Crear un array con los datos del usuario
    $userData = array(
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'tip_doc' => $row['tip_doc'],
        'no_doc' => $row['no_doc'],
        'telef' => $row['telef']
    );

    // Devolver los datos del usuario como JSON
    echo json_encode($userData);
} else {
    // Si no se encontraron resultados, devolver un array vacío como JSON
    echo json_encode(array());
}

// Cerrar conexión
$conexion->close();
?>


