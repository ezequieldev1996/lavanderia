<?php



$conectar = new mysqli ('localhost', 'root', '', 'ejemplo');


if ($conectar){
    echo "conexion exitosa";
}
else{
    echo"error";
}
?>