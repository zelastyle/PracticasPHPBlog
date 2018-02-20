<?php
if(isset($_POST['submit'])) {
    if ($username == "") {
        echo "<p class='error'>* El nombre de usuario no puede estar vacío</p>";
    }

    if ($nombre == "") {
        echo "<p class='error'>* El nombre no puede estar vacío</p>";
    }

    if ($apellido == "") {
        echo "<p class='error'>* El apellido no puede estar vacío</p>";
    }

    if ($pass == "" || $pass2 == "") {
        echo "<p class='error'>* Las contraseñas no pueden estar vacias</p>";

    } else if ($pass != $pass2) {
        echo "<p class='error'>* Las contraseñas deben ser iguales</p>";

    } else if (strlen($pass) < 8 || strlen($pass2) < 8) {
        echo "<p class='error'>* Las contraseñas deben tener al menos 8 caracteres</p>";
    } else {
        include 'registrar.php';
    }
}