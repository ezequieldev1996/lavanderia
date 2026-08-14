<?php
$server = "localhost";
$database = "parcial";
$username = "root";
$password = "";
//establecer conexion
$conexion = mysqli_connect($server, $username, $password, $database);


if ($conexion) {
    echo "conectado correctamente.";
} else {
    echo "Error al conectar: " . mysqli_error($conexion);
}


$f_nombre = $_POST['Nombres'];
$f_apellido = $_POST['Apellidos'];
$f_tipo_doc = $_POST['tipo_doc'];
$f_num_doc = $_POST['num_doc'];
$f_telefono = $_POST['Telefono'];
$f_email = $_POST['email'];
$f_contrasenia = $_POST['contrasenia'];
$f_direccion = $_POST['direccion'];

$Ingres = "INSERT INTO `usuarios` (`id_usuario`, `Nombres`, `Apellidos`, `tipo_doc`, `numero_de_documento`, `Telefono`, `email`, `contrasenia`, `direccion`)
 VALUES (NULL, '$f_nombre', '$f_apellido', '$f_tipo_doc', '$f_num_doc', '$f_telefono', '$f_email', '$f_contrasenia', '$f_direccion')";

$result = mysqli_query($conexion, $Ingres);
/*
$linea1 = "INSERT INTO usuarios (id_usuario,Nombres, Apellidos, tipo_doc, numero_de_documento, Telefono, email, contrasenia, direccion)					
VALUES ('','$f_nombre', '$f_apellido', '$f_tipo_doc', '$f_num_doc', '$f_telefono', '$f_email','$f_contrasenia','$f_direccion ')";

*/

 mysqli_query($conexion, $Ingres);
if ($result) {
    echo "Registro insertado correctamente";
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}



	