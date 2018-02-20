<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>BLOG Alejandro Rodríguez</title>
</head>
<body>

<div id="menu_bar">
    <img src="img/usuario.png"/>
    <nav>
        <ul>
            <li><a href="registro.php">REGISTRARSE</a></li>
            <li><a href="login.php">ACCEDER</a></li>
            <li><a href="index.php?registros">MOSTRAR REGISTROS</a></li>
            <li><a href="galeria.php">GALERIA DE IMAGENES</a></li>
            <li><a href="databases.php">SHOW DATABASES</a></li>
        </ul>
    </nav>
</div>
<div id="contenedor">
<?php

function listar_archivos(){
    $dir ="./galeria";
    if(is_dir($dir)){
        if($open = opendir($dir)) {
            while (($archivo = readdir($open)) !== false) {
                if ($archivo != '.' && $archivo != '..') {
                   // $name = substr($archivo, 0, -4);
                    echo '<span class="nav-item">
                            <img src="galeria/' . $archivo . '" width="256px" height="256px"/>
                        </span>';
                }
            }
            closedir($open);
        }
    }
}

echo listar_archivos();
?>
</div>

</body>
</html>

