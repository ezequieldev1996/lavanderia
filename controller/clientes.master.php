<?php

include "conexion.php";

$consulta= "SELECT administrativo.id_administrativo,tipo_doc.alias ,nu_doc,nombre,apellido,telef,usuario,usuario_habilitado from administrativo INNER JOIN tipo_doc on tipo_doc.tip_doc=administrativo.tip_doc;";

$resultado=mysqli_query($conexion,$consulta);

echo "<div style='width: 100%; text-align: center; background: #81d7f1;'>";
echo "<h1 style='font-size: 24px; color: #333;'>Listado de Administradores</h1>";
echo "<table style='margin: 0 auto; background-color:  #81d7f1; font-family: Arial, sans-serif; font-size: 16px; border: 5px solid #ddd; text-align: center;'>";
echo "<tr>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>ID</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Tipo De Documento</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Numero Documento</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Nombre </th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Apellido</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Usuario</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Telefono</th>";
echo "<th style='background-color: #ccc; font-weight: bold; font-size: 15px;'>Usuario Habilitado</th>";

echo "</tr>";

while ($columna = mysqli_fetch_array($resultado)){

    echo "<tr>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['id_administrativo']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['alias']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['nu_doc']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['nombre']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['apellido']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['usuario']."</h2></td>";
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><h2 style='margin: 0; font-size: 14px;'>". $columna['telef']."</h2></td>";
    $estatus = ($columna['usuario_habilitado'] == 1 ? 
    '<a href="estatus.master.php?id_administrativo='.$columna['id_administrativo'].'&estatus=0" style="padding: 6px 12px; border: 1px solid #28a745; color: #fff; background-color: #28a745; border-color: #28a745; text-decoration:none;">Permitir</a>' :
    '<a href="estatus.master.php?id_administrativo='.$columna['id_administrativo'].'&estatus=1" style="padding: 6px 12px; border: 1px solid #dc3545; color: #fff; background-color: #dc3545; border-color: #dc3545; text-decoration:none;">Denegado</a>');
    echo "<td style='padding: 10px; border: 1px solid #ddd;'>".$estatus."</td>";
  

}
echo "</table>";

mysqli_close($conexion);
echo "<br>";

echo '<a href="../view/master.php" style="font-size: 16px; color: #333; text-decoration: none; background-color: #4CAF50; padding: 10px 20px; border-radius: 5px; display: inline-block;">volver</a>';


include_once "../view/foother.php";
?>