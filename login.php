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
        <h1>CREA UNA CUENTA</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="formulario_login">
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="pass" placeholder="Repetir contraseña" name="pass">
            <input type="submit" id="btn-submit" value="Entrar" name="logear">
        </form>
        <?php
        include 'php/conexion.php';
        $con = conexion();

        if(isset($_POST['logear'])){

            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $sql = "SELECT * FROM usuarios WHERE username='$username' and password='$pass'";
            $obtenerUsuario = $con->query($sql);

            if($obtener=$obtenerUsuario->fetch(PDO::FETCH_ASSOC)){
                echo '<p>usuario conectado</p>';
            } else {
                echo '<p>username o contraseña incorrecta</p>';
            }
        }

        ?>
    </div>



</body>
</html>

