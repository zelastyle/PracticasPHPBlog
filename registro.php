<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>BLOG Alejandro Rodríguez</title>
</head>
<body>
<?php
 if(isset($_POST['submit'])) {
     $username = $_POST['username'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $pass = $_POST['pass'];
     $pass2 = $_POST['pass2'];
 }
?>

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
        <h1>CREA UNA CUENTA</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="formulario_registro">
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="text" id="nombre" placeholder="Nombre" name="nombre">
            <input type="text" id="apellido" placeholder="Apellido" name="apellido">
            <input type="password" id="pass" placeholder="Contraseña" name="pass">
            <input type="password" id="pass2" placeholder="Repetir contraseña" name="pass2">
            <input type="submit" id="btn-submit" value="Registrar" name="submit">
            <?php
            include 'php/validacionRegistro.php';
            ?>
        </form>
    </div>


</body>
</html>