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

    try {

        $dbPass = '';
        $dbUser = 'root';
        $dns = 'mysql:host=localhost;dbname=';

        $con = new PDO($dns, $dbUser, $dbPass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
        $sql="SHOW DATABASES";
        $mostrarDatabases =$con->query($sql);

        echo "<form action='databases.php' method='post' name='formulario'><select name='selectDB' onchange='this.form.submit()'>";
        $_SESSION['variableSession']=$_POST['selectDB'];
        while($visualizar = $mostrarDatabases->fetch(PDO::FETCH_ASSOC)){
            if($visualizar['Database'] == $_POST['selectDB']){
                echo "<option selected> " . $visualizar['Database'] . "</option>" ;

            }else {
                echo "<option> " . $visualizar['Database'] . "</option>" ;
            }

        }

        echo "</form></select>";

    } catch (PDOException $e) {

        echo 'Falló la conexión: ' . $e->getMessage();
    }

    if(isset($_POST['selectDB'])) {

        // echo "caca";
        $sql2 = "SHOW TABLES FROM ". $_POST['selectDB'] . "";
        $mostrarTablas = $con->query($sql2);
        //echo $sql2;
        $tabla =$_POST['selectDB'];


        echo "<form action='databases.php' method='post'><select name='selectDB2' onchange='this.form.submit()'>";
        while ($visualizar2 = $mostrarTablas->fetch(PDO::FETCH_ASSOC)) {
            foreach($visualizar2 as $ver => $valor) {
                if($valor == $_POST['selectDB2']){
                    echo "<option selected>" . $valor . "</option>";

                }else {
                    echo "<option>" . $valor . "</option>";
                }
                //$ver[$valor] --> SALE USuaRIOS;
            }

        }
        echo "</form></select>";
    }
    ?>
    <?php
    if(isset($_POST['selectDB2'])){

        $variableSession = $_SESSION['variableSession'];

        $dns = 'mysql:host=localhost;dbname=' .$variableSession;
        $con = new PDO($dns, $dbUser, $dbPass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql3 = "SELECT * FROM". " " .$_POST['selectDB2'] . "";
        $mostrarRegistros = $con->query($sql3);

        echo "<table>";
        while($visualizar3 = $mostrarRegistros->fetch(PDO::FETCH_ASSOC)) {
            foreach($visualizar3 as $key => $valor2) {
                echo "
                  <tr>
                    <th>" . $key . "</th>
                  </tr>
                  <tr>
                    <td>" . $valor2 . "</td>
                  </tr>";
            }
        }
        echo "</table>";
    }
    ?>

</div>

</body>
</html>

