
    <?php

    include 'conexion.php';
    $con = conexion();

    $sql ="SELECT * FROM usuarios";
    $mostrar =$con->query($sql);
    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>NOMBRE USUARIO</th>
                    <th>CONTRASEÑA</th>
                </tr> ";

    while($visualizar =$mostrar->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <tr>
                    <td>" . $visualizar['id'] . "</td>
                    <td>" . $visualizar['nombre'] . "</td>
                    <td>" . $visualizar['apellido'] . "</td>
                    <td>" . $visualizar['username'] . "</td>
                    <td>" . $visualizar['password'] . "</td>
                </tr>
              ";

    }
    ?>
        </table>
