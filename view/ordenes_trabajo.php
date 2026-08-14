<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ordenes_trabajo.css">
    <script src="https://kit.fontawesome.com/1d02a0a801.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/iconopequeño.jpeg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <title>Ordenes De Trabajo</title>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <a href="../view/pagina_principal.php" class="logo">
            <img src="../img/zuricata.logo.ama.jpeg" alt="Logo">
            <h1 class="logo_nombre">Meerkats</h1>
        </a>
        <h1>Creación de Ordenes de Trabajo</h1>
        <nav id="carrito">
            <a href="../view/pagina_principal.php" class="nav link">Inicio</a>
            <a href="../view/inventario(alma).php" class="nav link">Inventario</a>
            <a href="acople.php" class="nav link">acople</a>
            <a href="../controller/cerrarsesion.php" class="nav link">cerrar sesión</a>
        </nav> 
    </header>

    <!-- Cuerpo de las Ordenes de Trabajo -->
    <?php
    date_default_timezone_set('America/Bogota');
    $fechaActual = date("Y-m-d");
   
    ?>
<form action="../controller/variables.php" method="post">
    <!--<form action="orden_backend2.php" method="post">-->
    <table class="table">
        <h2>Información personal del cliente</h2>
        <tr>
            <td>
                <input type="text" name="nu_doc" id="nu_doc"   placeholder="Número de documento" maxlength="15"   required>
                <select name="type_doc" id="type_doc"  required>
                    <option value="1">Cedula de ciudadania</option>
                    <option value="2">Cedula de extranjeria</option>
                    <option value="3">Pasaporte</option>
                </select>
                <input type="text" name="nombre" id="nombre" placeholder="Nombres"  required>
                <input type="text" name="apellido" id="apellido" placeholder="Apellidos" required>
                
            </td>
        </tr>
        <tr>
            <td>
                <input type="number" name="telefono" id="telefono" placeholder="Telefono"  required>
                <input type="text" name="email" id="email" placeholder="Correo electrónico" >
                <input type="text" name="direccion" id="direccion" placeholder="Escriba su dirección"  required>
                <input type="date" id="fecha" name="fecha" placeholder="ingrese fecha"value="<?php echo $fechaActual; ?>" > 
                <input type="submit" class="buscar_cliente" name="registrar" formaction="../controller/clientes_backend.php" value="regis o actu">
               <!-- <input type="submit" class="registrar_cliente" name="registrar" value="Registrar">-->
            </td>
        </tr>
    </table>
</form>






<!--
<script>
    // Obtener la fecha actual en el formato YYYY-MM-DD
    var fechaActual = new Date().toISOString().split('T')[0];
    
    // Asignar la fecha actual al campo de entrada de fecha
    document.getElementById('fecha').value = fechaActual;
</script>-->

    <script>
        document.getElementById("nu_doc").addEventListener("keydown", function(event) {
            if (event.key === "Tab") {
                event.preventDefault(); // Prevenir el comportamiento predeterminado de la tecla "Tab"
                
                // Obtener el número de documento ingresado
                var numeroDocumento = document.getElementById("nu_doc").value;
                
                // Realizar una solicitud AJAX para buscar los datos del cliente
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "codigos_php.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Parsear la respuesta JSON
                            var data = JSON.parse(xhr.responseText);
                            // Completar los campos del formulario con los datos del cliente
                            document.getElementById("type_doc").value = data.type_doc;
                            document.getElementById("nombre").value = data.nombre;
                            document.getElementById("apellido").value = data.apellido;
                            document.getElementById("telefono").value = data.telefono;
                            document.getElementById("email").value = data.email;
                            document.getElementById("direccion").value = data.direccion;
                            document.getElementById("fecha").value = data.fecha;
                        } else {
                            // Manejar errores si la solicitud no fue exitosa
                            console.error("Error al buscar cliente");
                        }
                    }
                };
                xhr.send("numeroDocumento=" + encodeURIComponent(numeroDocumento));

            }
        });
        </script>


<script>
    // Captura los valores del primer formulario y los almacena en campos ocultos del segundo formulario
    document.getElementById("nu_doc").addEventListener("change", function() {
        var nu_doc_value = document.getElementById("nu_doc").value;
        document.getElementById("nu_doc_hidden").value = nu_doc_value;
    });

    document.getElementById("fecha").addEventListener("change", function() {
        var fecha_value = document.getElementById("fecha").value;
        document.getElementById("fecha_hidden").value = fecha_value;
    });

    document.getElementById("nombre").addEventListener("change", function() {
    var nombre_value = document.getElementById("nombre").value;
    document.getElementById("nombre_hidden").value = nombre_value;
    

  
    });
</script>
    




    <!-- Carrito de compras -->
    <form action="../controller/orden_backend2.php" method="post">
    <input type="hidden" name="nu_doc" value="" id="nu_doc_hidden">
    <input type="hidden" name="fecha" value="" id="fecha_hidden">
    <input type="hidden" name="nombre" value="" id="nombre_hidden">  
    <h2>Nueva orden</h2>
    <div class="grid" id="lista-productos">
        
       <div class="item">
            <img src="../img/ordenes_trabajo/camisa.jpg" alt="Camisas">
            <div class="info">
                <h3>Camisas</h3>
                <div class="cantidad">
                    <label for="precio">5000</label>
                    
                    <input type="number"  class="cantidadd" name="cantidad[camisas]"  id="1">
                    <textarea name="observaciones[camisas]" class="pantaloness"  placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="camisas">
                </div>
               
            
                
            </div>
        </div>

        <div class="item">
            <img src="../img/ordenes_trabajo/pantalones.webp" alt="Pantalónes">
            <div class="info">
                <h3>Pantalones</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[pantalones]" id="2" >
                    <textarea name="observaciones[pantalones]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="pantalones">
                </div>
                
            </div>
        </div>
        <!-- resto del carrito-->
        <div class="item">
            <img src="../img/ordenes_trabajo/chaqueta.webp" alt="chaquetas">
            <div class="info">
                <h3>Chaquetas</h3>
                <div class="cantidad">
                    <p class="precio">$8000</p>
                    <input type="number"  class="cantidadd"name="cantidad[chaquetas]" id="3">
                    <textarea name="observaciones[chaquetas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="chaquetas" >
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/chaleco.jpg" alt="chaleco">
            <div class="info">
                <h3>Chaleco</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[chalecos]" id="4">
                    <textarea name="observaciones[chalecos]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="chalecos" >
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/camiseta.jpg" alt="camisetas">
            <div class="info">
                <h3>Camisetas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[camisetas]" id="5">
                    <textarea name="observaciones[camisetas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="camisetas">
                </div>
             
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/camisetapolo.jpg" alt="camiseta_polo">
            <div class="info">
                <h3>Camiseta polo</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd" name="cantidad[camiseta_polo]" id="6" >
                    <textarea name="observaciones[camiseta_polo]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="camiseta_polo">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/vestido paño.webp" alt="vestido_paño">
            <div class="info">
                <h3>Vestido de paño</h3>
                <div class="cantidad">
                    <p class="precio">$16000</p>
                    <input type="number"  class="cantidadd"name="cantidad[vestido_paño]" id="7">
                    <textarea name="observaciones[vestido_paño]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="vestido_paño">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/corbata.webp" alt="corbata">
            <div class="info">
                <h3>Corbata</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[corbata]" id="8">
                    <textarea name="observaciones[corbata]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="corbata">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/vestido fiesta.jpg" alt="vestido_fiesta">
            <div class="info">
                <h3>vestido fiesta</h3>
                <div class="cantidad">
                    <p class="precio">$20000</p>
                    <input type="number"  class="cantidadd"name="cantidad[vestido_fiesta]" id="9">
                    <textarea name="observaciones[vestido_fiesta]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="vestido_fiesta">
                </div>
               
            </div>
         </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/pantalonetas.webp" alt="Pantalonetas">
            <div class="info">
                <h3>Pantalonetas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[pantalonetas]" id="10">
                    <textarea name="observaciones[pantalonetas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="pantalonetas">
                </div>
             
            </div>
        </div>
        <div class="item">
            <img src="../img//ordenes_trabajo/mono-enterizo.jpg" alt="enterizo_mono">
            <div class="info">
                <h3>Enterizo-mono</h3>
                <div class="cantidad">
                    <p class="precio">$10000</p>
                    <input type="number"  class="cantidadd"name="cantidad[enterizo_mono]" id="11">
                    <textarea name="observaciones[enterizo_mono]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="enterizo_mono">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/faldas.webp" alt="faldas">
            <div class="info">
                <h3>Faldas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[falda]" id="12">
                    <textarea name="observaciones[falda]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="falda">
                </div>
           
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/zapatillas.jpg" alt="zapatillas">
            <div class="info">
                <h3>Zapatillas</h3>
                <div class="cantidad">
                    <p class="precio">$10000</p>
                    <input type="number"  class="cantidadd"name="cantidad[zapatillas]" id="13">
                    <textarea name="observaciones[zapatillas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="zapatillas">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/sweater.jpg" alt="sweater">
            <div class="info">
                <h3>Sweater</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd" name="cantidad[sweater]" id="14">
                    <textarea name="observaciones[sweater]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="sweater">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/blusa.jpg" alt="blusas">
            <div class="info">
                <h3>Blusas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd" name="cantidad[blusa]" id="15">
                    <textarea name="observaciones[blusa]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="blusa">
                </div>
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/bufanda.jpg" alt="bufandas">
            <div class="info">
                <h3>Bufandas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[bufanda]" id="16">
                    <textarea name="observaciones[bufanda]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="bufanda">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/pañoletas.jpg" alt="Pañoletas">
            <div class="info">
                <h3>Pañoletas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[pañoletas]" id="17">
                    <textarea name="observaciones[pañoletas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="pañoletas">
                </div>
              
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/gorras.png" alt="gorras">
            <div class="info">
                <h3>Gorras</h3>
                <div class="cantidad">
                    <p class="precio">$8000</p>
                    <input type="number"  class="cantidadd" name="cantidad[gorras]" id="18">
                    <textarea name="observaciones[gorras]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="gorras">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/maleta.jpg" alt="maletas">
            <div class="info">
                <h3>Maletas</h3>
                <div class="cantidad">
                    <p class="precio">$15000</p>
                    <input type="number"  class="cantidadd" name="cantidad[maletas]" id="19">
                    <textarea name="observaciones[maletas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="maletas">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado.jpg" alt="acolchado">
            <div class="info">
                <h3>Acolchado</h3>
                <div class="cantidad">
                    <p class="precio">$20000</p>
                    <input type="number"  class="cantidadd"name="cantidad[acolchado]" id="20">
                    <textarea name="observaciones[acolchado]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="acolchado">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado semidoble.webp" alt="acolchado_semidoble">
            <div class="info">
                <h3>Acolchado Semidoble</h3>
                <div class="cantidad">
                    <p class="precio">$25000</p>
                    <input type="number"  class="cantidadd"name="cantidad[acolchado_semidoble]"  id="21">
                    <textarea name="observaciones[acolchado_semidoble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="acolchado_semidoble">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado doble.webp" alt="acolchado_doble">
            <div class="info">
                <h3>Acolchado Doble</h3>
                <div class="cantidad">
                    <p class="precio">$30000</p>
                    <input type="number"  class="cantidadd"name="cantidad[acolchado_doble]" id="22">
                    <textarea name="observaciones[acolchado_doble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="acolchado_doble">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado queen.webp" alt="acolchado_queen">
            <div class="info">
                <h3>Acolchado Queen</h3>
                <div class="cantidad">
                    <p class="precio">$35000</p>
                    <input type="number"  class="cantidadd"name="cantidad[acolchado_queen]" id="23">
                    <textarea name="observaciones[acolchado_queen]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="acolchado_queen">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado kingwebp.webp" alt="acolchado_king">
            <div class="info">
                <h3>Acolchado King</h3>
                <div class="cantidad">
                    <p class="precio">$40000</p>
                    <input type="number"  class="cantidadd"name="cantidad[acolchado_king]" id="24">
                    <textarea name="observaciones[acolchado_king]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="acolchado_king">
                </div>
            
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cobija.jpg" alt="cobijas">
            <div class="info">
                <h3>Cobijas</h3>
                <div class="cantidad">
                    <p class="precio">$20000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cobijas]" id="25">
                    <textarea name="observaciones[cobijas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cobijas">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cobija doble.jpg" alt="cobija_semidoble">
            <div class="info">
                <h3>Cobijas Semidobles</h3>
                <div class="cantidad">
                    <p class="precio">$25000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cobija_semidoble]" id="26">
                    <textarea name="observaciones[cobija_semidoble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cobija_semidoble">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/acolchado doble.webp" alt="cobija_doble">
            <div class="info">
                <h3>Cobija Doble</h3>
                <div class="cantidad">
                    <p class="precio">$30000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cobija_doble]" id="27">
                    <textarea name="observaciones[cobija_doble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cobija_doble">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cobija queen.jpg" alt="cobija_queen">
            <div class="info">
                <h3>Cobija Queen</h3>
                <div class="cantidad">
                    <p class="precio">$35000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cobija_queen]" id="28">
                    <textarea name="observaciones[cobija_queen]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cobija_queen">
                </div>
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cobija king.jpg" alt="cobija_king">
            <div class="info">
                <h3>Cobija King</h3>
                <div class="cantidad">
                    <p class="precio">$40000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cobija_king]" id="29">
                    <textarea name="observaciones[cobija_king]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cobija_king">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/juego de sabanas.webp" alt="juego_de_sabanas">
            <div class="info">
                <h3>Juego de sabanas</h3>
                <div class="cantidad">
                    <p class="precio">$12000</p>
                    <input type="number"  class="cantidadd"name="cantidad[juego_sabanas]" id="30">
                    <textarea name="observaciones[juego_sabanas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="juego_sabanas">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/duvet.jpg" alt="duvet">
            <div class="info">
                <h3>Duvet</h3>
                <div class="cantidad">
                    <p class="precio">$18000</p>
                    <input type="number"  class="cantidadd"name="cantidad[duvet]" id="31">
                    <textarea name="observaciones[duvet]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="duvet">
                </div>
             
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/toallas.jpg" alt="toallas">
            <div class="info">
                <h3>Toallas</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[toallas]" id="32">
                    <textarea name="observaciones[toallas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="toallas">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/tapetes.webp" alt="tapetes">
            <div class="info">
                <h3>Tapetes</h3>
                <div class="cantidad"> 
                    <p class="precio">$100000</p>
                    <input type="number"  class="cantidadd"name="cantidad[tapetes]" id="33">
                    <textarea name="observaciones[tapetes]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="tapetes">
                </div>
             
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cubrelecho.webp" alt="cubrelecho">
            <div class="info">
                <h3>Cubrelecho</h3>
                <div class="cantidad">
                    <p class="precio">$18000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho]" id="34">
                    <textarea name="observaciones[cubrelecho]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho">
                </div>
               
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cubrelecho cubrecama sencillo.jpg" alt="cubrelecho_sencillo">
            <div class="info">
                <h3>Cubrelecho Sencillo</h3>
                <div class="cantidad">
                    <p class="precio">$18000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho_sencillo]" id="35">
                    <textarea name="observaciones[cubrelecho_sencillo]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho_sencillo">
                </div>
              
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/Cubrelecho_Semidoble.jpg" alt="cubrelecho_semidoble">
            <div class="info">
                <h3>Cubrelecho Semidoble</h3>
                <div class="cantidad">
                    <p class="precio">$20000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho_semidoble]" id="36">
                    <textarea name="observaciones[cubrelecho_semidoble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho_semidoble">
                </div>
              
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cubrelecho cubrecama doble.jpg" alt="cubrelecho_doble">
            <div class="info">
                <h3>Cubrelecho Doble</h3>
                <div class="cantidad">
                    <p class="precio">$25000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho_doble]" id="37">
                    <textarea name="observaciones[cubrelecho_doble]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho_doble">
                </div>
                
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cubrelecho cubrecama queen.jpg" alt="cubrelecho_queen">
            <div class="info">
                <h3>Cubrelecho Queen</h3>
                <div class="cantidad">
                    <p class="precio">$30000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho_queen]" id="38">
                    <textarea name="observaciones[cubrelecho_queen]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho_queen">
                </div>
              
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/cubrelelcho cubrecama king.jpg" alt="cubrelecho_king">
            <div class="info">
                <h3>Cubrelecho King</h3>
                <div class="cantidad">
                    <p class="precio">$35000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cubrelecho_king]" id="39">
                    <textarea name="observaciones[cubrelecho_king]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cubrelecho_king">
                </div>
            
            </div>
        </div>
        <div class="item">
            <img src="../img/ordenes_trabajo/otros.png" alt="otros">
            <div class="info">
                <h3>Otros</h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[otros]" id="40">
                    <textarea name="observaciones[otros]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="otros">
                </div>
            </div>
      </div>
       <div class="item">
            <img src="../img/ordenes_trabajo/plancha.jpg" alt="otros">
            <div class="info">
                <h3>prenda plancha </h3>
                <div class="cantidad">
                    <p class="precio">$2500</p>
                    <input type="number"  class="cantidadd"name="cantidad[prenda_plancha]" id="41">
                    <textarea name="observaciones[prenda_plancha]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="prenda_plancha">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>

       <div class="item">
            <img src="../img/ordenes_trabajo/plancha.jpg" alt="otros">
            <div class="info">
                <h3>mantel plancha </h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[mantel_plancha]" id="42">
                    <textarea name="observaciones[mantel_plancha]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="mantel_plancha">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>

       <div class="item">
            <img src="../img/ordenes_trabajo/plancha.jpg" alt="otros">
            <div class="info">
                <h3>dubet plancha </h3>
                <div class="cantidad">
                    <p class="precio">$12000</p>
                    <input type="number"  class="cantidadd"name="cantidad[dubet_plancha]" id="43">
                    <textarea name="observaciones[dubet_plancha]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="dubet_plancha">
                </div>
              
       </div>  
       </div>
        
       <div class="item">
            <img src="../img/ordenes_trabajo/plancha.jpg" alt="otros">
            <div class="info">
                <h3>sabanas plancha </h3>
                <div class="cantidad">
                    <p class="precio">$5000</p>
                    <input type="number"  class="cantidadd"name="cantidad[sabanas_plancha]" id="44">
                    <textarea name="observaciones[sabanas_plancha]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="sabanas_plancha">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>

       <div class="item">
            <img src="../img/ordenes_trabajo/lavado_peso.jpg" alt="otros">
            <div class="info">
                <h3>lavado libras </h3>
                <div class="cantidad">
                    <p class="precio">$3000</p>
                    <input type="number"  class="cantidadd"name="cantidad[lavado_peso]" id="45">
                    <textarea name="observaciones[lavado_peso]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="lavado_peso">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>
        
       <div class="item">
            <img src="../img/ordenes_trabajo/tintura.jpg" alt="otros">
            <div class="info">
                <h3>tintura </h3>
                <div class="cantidad">
                    <p class="precio">$20000</p>
                    <input type="number"  class="cantidadd"name="cantidad[tintura]" id="46">
                    <textarea name="observaciones[tintura]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="tintura">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>

       <div class="item">
            <img src="../img/ordenes_trabajo/chaquetas.jpeg" alt="otros">
            <div class="info">
                <h3>cueros y gamusas </h3>
                <div class="cantidad">
                    <p class="precio">$100000</p>
                    <input type="number"  class="cantidadd"name="cantidad[cueros_gamusas]" id="47">
                    <textarea name="observaciones[cueros_gamusas]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="cueros_gamusas">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>

       <div class="item">
            <img src="../img/ordenes_trabajo/zuricata_triste.jpg.jpg" alt="otros">
            <div class="info">
                <h3>devoluciones</h3>
                <div class="cantidad">
                    <p class="precio">devoluciones</p>
                    <input type="number"  class="cantidadd"name="cantidad[devoluciones]" id="48">
                    <textarea name="observaciones[devoluciones]" class="pantaloness" placeholder="Observaciones" style="resize: none;"></textarea>
                    <input type="checkbox" name="articulo[]" value="devoluciones">
                </div>
               <!-- <button class="agregar-carrito" data-id="40"   name="agregar">Agregar</button>-->
       </div>  
       </div>
        <!-- Puedes agregar más elementos siguiendo el mismo formato -->
        
       
    </div>

    <div class="boton">
           <button type="submit" class="enviar" id="enviar"   name="enviar" formaction="../controller/orden_backend2.php">enviar</button></center>
         </div>

         <script>
// JavaScript para agregar efecto de brillo al botón al hacer clic
document.getElementById('enviar').addEventListener('click', function() {
    var button = this;
    button.style.boxShadow = '0 0 10px rgba(0,0,0,0.3)'; // Agregar sombra al hacer clic
    setTimeout(function() {
        button.style.boxShadow = ''; // Restablecer sombra después de 300ms
    }, 300);
});
</script>

   
   
</form>

<footer>
    <?php
    
    include_once ('foother.php');

    ?>

</footer>
</body>
</html>