<?php
session_start();
session_destroy();
 
 
 
// Redirige a la página de inicio de sesión
header('Location: ../index.html');
exit;
?>