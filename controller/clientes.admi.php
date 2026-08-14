<?php

include "conexion.php";

$consulta= "SELECT id_cliente,tipo_doc.alias,num_doc,nombre,apellido,telefono,email,direccion,fecha from cliente INNER JOIN tipo_doc on tipo_doc.tip_doc=cliente.type_doc;";
$resultado=mysqli_query($conexion,$consulta);

echo "<div style='width: 100%; text-align: center; background: #81d7f1;'>";
echo "<h1 style='font-size: 24px; color: #333;'>Listado de clientes</h1>";
echo "<table style='margin: 0 auto; background-color:  #81d7f1; font-family: Arial, sans-serif; font-size: 16px; border: 5px solid #ddd; text-align: center;'>";
echo "<tr>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>ID</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Tipo De Documento</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Numero Documento</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Nombre </th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Apellido</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Telefono</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Email</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Direccion</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Fecha</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array($resultado)){

    echo "<tr>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['id_cliente']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['alias']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['num_doc']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['nombre']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['apellido']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['telefono']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['email']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['direccion']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['fecha']."</h2></td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conexion);
echo "<br>";

echo '<a href="../view/administrativo.php" style="font-size: 16px; color: #333; text-decoration: none; background-color: #4CAF50; padding: 10px 20px; border-radius: 5px; display: inline-block;">volver</a>';



include_once "../view/foother.php";
?>