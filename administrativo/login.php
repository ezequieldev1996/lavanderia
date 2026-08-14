<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>

   

    
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h2>Inicio de Sesión</h2>
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Iniciar Sesión">

        <?php
    include 'conexion.php';
    
// Incluir el archivo de conexión a la base de datos


// Incluir el archivo que contiene la clase Authenticator
include 'Authenticator.php';

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las credenciales del formulario
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Verificar las credenciales utilizando la clase Authenticator
    $role = Authenticator::authenticate($username, $password);

    // Redirigir según el rol del usuario
    if ($role === 'administrador') {
        header('Location: administrativo.php');
        exit;
    } elseif ($role === 'almacenista') {
        header('Location: almacenista.php');
        exit;
    } else {
        echo 'Credenciales incorrectas. Por favor, vuelva a intentarlo.';
    }
}
?>
    </form>

   
</body>
</html>
