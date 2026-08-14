<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="inabilitar">habilita o inhabilitar administrador</h2>
<div class="contenedor">
    <table>
        <form action="#" method="post">
         <label for="username">Nombre de usuario:</label><br>
         <input type="text" name="username" class="input" id="username"><br>
         <label for="numero">numero de documento</label>
         <input type="text" name="numero" class="input" id="numero" placeholder="ingrese numero">
         <input type="submit" class="boton" value="inhabilitar">
         <input type="submit" class="boton" value="habilitar">
         
        </form>
    </table>
</div>

<style>

.inabilitar{
    text-align: center;
        margin: auto;
        width: 300px;
        padding: 10px;
        background-color: rgb(255, 255, 255);
        
        text-align: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-style: italic;
        font-weight: bold;
        color: yellowgreen;
}
   /* Estilos para el contenedor principal */
.contenedor {
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    width: 300px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}

/* Estilos para el formulario */
.contenedor form {
    display: inline-block;
}

/* Estilos para las etiquetas */
.contenedor label {
    margin-bottom: 5px;
    display: block;
}

/* Estilos para los inputs */
.contenedor .input {
    margin-bottom: 10px;
    padding: 5px;
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Estilos para el botón */
.contenedor .boton {
    padding: 8px 20px;
    background-color: yellowgreen;
    color: #fff;
    border: 5px;
    border-radius: 3px;
    cursor: pointer;
    margin-right: 10px;
}

/* Estilos para el botón al pasar el ratón */
.contenedor .boton:hover {
    background-color: #0056b3;
}

</style>
</body>
</html>

<?php

?>