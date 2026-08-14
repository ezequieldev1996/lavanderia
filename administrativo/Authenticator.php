<?php
class Authenticator {
    // Función para verificar las credenciales del usuario
    public static function authenticate($username, $password) {
        // Aquí deberías tener una lógica más sofisticada para verificar las credenciales
        // En este ejemplo, simplemente comparamos con valores estáticos
        if ($username === 'administrador' && $password === 'adminpass') {
            return 'administrador';
        } elseif ($username === 'almacenista' && $password === 'almacenpass') {
            return 'almacenista';
        } else {
            return false;
        }
    }
}

// Comprobación de credenciales
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$role = Authenticator::authenticate($username, $password);

if ($role === 'administrador') {
    header('Location:administrativo.php');
    exit;
} elseif ($role === 'almacenista') {
    header('Location:almacenista.php');
    exit;  
} else {
    echo 'Credenciales incorrectas. Por favor, vuelva a intentarlo.';
}
?>
