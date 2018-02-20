<?php

include 'conexion.php';

    $con = conexion();

        $sql ="INSERT INTO usuarios(username, nombre, apellido, password) VALUES(:username, :nombre, :apellido, :password)";
        $sql2 ="SELECT username FROM usuarios WHERE username =:username";
        $comprobar =$con->prepare($sql2);
        $comprobar->execute(array(':username'=>$username));

        if($comprobar->rowCount() == 0) {

            $insertar =$con->prepare($sql);


            $agregar =$insertar->execute(array(':username'=>$username, ':nombre'=>$nombre, ':apellido'=>$apellido, ':password'=>$pass));

            if($agregar){
                echo "<p class='mensaje'>usuario agregado</p>";
                header( "Location:../index.php");
            } else {
                echo "<p class='mensaje'>no se ha podido agregar el usuario</p>";
            }
        } else {
            echo "<p class='mensaje'>Ya existe ese usuario</p>";
        }


?>