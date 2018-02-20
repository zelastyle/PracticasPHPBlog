<?php

    function conexion()
    {

        try {

            $dbPass = '';
            $dbUser = 'root';
            $dns = 'mysql:host=localhost;dbname=pw';

            $con = new PDO($dns, $dbUser, $dbPass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo 'Falló la conexión: ' . $e->getMessage();

        }
        return $con;
    }

?>