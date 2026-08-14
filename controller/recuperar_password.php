<?php
// Conexión a la base de datos
include "conexion.php";
 
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario del formulario
    $usuario = $_POST['usuario'];
   
    // Obtener la nueva contraseña proporcionada por el usuario
    $nueva_contraseña = $_POST['nueva_contraseña'];
 
    // Validar la longitud de la contraseña
    if (strlen($nueva_contraseña) < 8) {
        echo "<script>alert('Tu contraseña no puede tener menos de 8 caracteres'); window.location='../view/recuperar_contraseña.html';</script>";
        exit;
    }
 
    // Encriptar la nueva contraseña
    $contraseña_encriptada = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
 
    // Actualizar la contraseña en la base de datos para el usuario correspondiente
    $update_sql = "";
 
    // Consulta SQL para verificar si el usuario existe como administrativo
    $sql_administrativo = "SELECT * FROM administrativo WHERE usuario = '$usuario'";
    $result_administrativo = $conexion->query($sql_administrativo);
 
    // Consulta SQL para verificar si el usuario existe como almacenista
    $sql_almacenista = "SELECT * FROM almacenista WHERE usuario = '$usuario'";
    $result_almacenista = $conexion->query($sql_almacenista);
 
    if ($result_administrativo->num_rows > 0) {
        $row = $result_administrativo->fetch_assoc();
        $user_id = $row['id_administrativo'];
        // Actualizar la contraseña en la base de datos
        $update_sql = "UPDATE administrativo SET contraseña = '$contraseña_encriptada' WHERE id_administrativo = '$user_id'";
    } elseif ($result_almacenista->num_rows > 0) {
        $row = $result_almacenista->fetch_assoc();
        $user_id = $row['id_almacenista'];
        // Actualizar la contraseña en la base de datos
        $update_sql = "UPDATE almacenista SET contraseña = '$contraseña_encriptada' WHERE id_almacenista = '$user_id'";
    } else {
        echo "<script>alert('Usuario no encontrado. Por favor, verifica tu nombre de usuario.'); window.location='../view/recuperar_contraseña.html';</script>";
        exit; // Terminar la ejecución del script si el usuario no existe
    }
 
    // Ejecutar la consulta de actualización de contraseña
    if ($conexion->query($update_sql) === TRUE) {
        
        echo "<br>";
        echo "<script>alert('Tu contraseña se ha actualizado correctamente'); window.location='../view/meerkast_login.html';</script>";
    } else {
        echo "Error al actualizar la contraseña: " . $conexion->error;
    }
}
 
$conexion->close();
?>

 