<?php
// Conexión a la base de datos
include "conexion.php";

// Obtener el usuario y la contraseña proporcionados por el formulario de inicio de sesión
$usuario = $_POST['username'];
$contraseña = $_POST['password'];

// Consultar la base de datos para obtener el hash de la contraseña del usuario
$consulta_administrativo = "SELECT contraseña FROM administrativo WHERE usuario = '$usuario' and usuario_habilitado = 1";
$consulta_almacenista = "SELECT contraseña FROM almacenista WHERE usuario = '$usuario'  and habilitar_almacenista = 1";

$consulta_master = "SELECT contraseña FROM master WHERE usuario = '$usuario'";

$resultado_administrativo = $conexion->query($consulta_administrativo);
$resultado_almacenista = $conexion->query($consulta_almacenista);
$resultado_master = $conexion->query($consulta_master);

if ($resultado_administrativo->num_rows == 1) {
    $fila = $resultado_administrativo->fetch_assoc();
    $hash_contraseña = $fila['contraseña'];

    if (password_verify($contraseña, $hash_contraseña)) {
        // La contraseña es correcta para el usuario administrativo
        session_start();
        $_SESSION['administrativo'] = $usuario;
        header('location:../view/administrativo.php');
        exit(); // Salir del script después de redirigir
    }
}

if ($resultado_almacenista->num_rows == 1) {
    $fila = $resultado_almacenista->fetch_assoc();
    $hash_contraseña = $fila['contraseña'];

    if (password_verify($contraseña, $hash_contraseña)) {
        // La contraseña es correcta para el usuario almacenista
        session_start();
        $_SESSION['almacenista'] = $usuario;
        header('location:../view/pagina_principal.php');
        exit(); // Salir del script después de redirigir
    }
}

if ($resultado_master->num_rows == 1) {
    $fila = $resultado_master->fetch_assoc();
    $hash_contraseña = $fila['contraseña'];

    if (password_verify($contraseña, $hash_contraseña)) {
        // La contraseña es correcta para el usuario master
        session_start();
        $_SESSION['master'] = $usuario;
        header('location:../view/master.php');
        exit(); // Salir del script después de redirigir
    }
}

// Si ninguno de los usuarios es válido o la contraseña es incorrecta, mostrar mensaje de error
echo "<script>alert('Usuario o Contraseña Incorrectos'); window.location='../view/meerkast_login.html';</script>";

// Cerrar la conexión a la base de datos
$conexion->close();
?>