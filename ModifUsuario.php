<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Usuarios</title>
    </head>
    <body>
        <fieldset><legend><h2>Actualización de información y regulación de usuarios</h2></legend>
        <?php
            $conexion = mysqli_connect("localhost", "root", "", "El_Coyote_Hambriento");
            $consulta = "SELECT * FROM Alumno";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset><legend><h3>Alumnos</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EliminarU.php'>";
                    echo "Número de cuenta: ".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'><br>";
                    echo "Grupo: <input type = 'text' name = 'grupo' value = '$fila[2]'><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[3]'><br>";
                    echo "<p><input type = 'submit' value = 'Eliminar'></p>";
                    echo "<input type = 'submit' value = 'Actualizar'>";
                    echo "</form>";
            }
            echo "</fieldset>";

            $conexion = mysqli_connect("localhost", "root", "", "El_Coyote_Hambriento");
            $consulta = "SELECT * FROM Profesor_Funcionario";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset><legend><h3>Profesores o Funcionarios</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EliminarU.php'>";
                    echo "RFC: ".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'><br>";
                    echo "Colegio: <input type = 'text' name = 'colegio' value = '$fila[2]'><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[3]'><br>";
                    echo "<p><input type = 'submit' value = 'Eliminar'></p>";
                    echo "<input type = 'submit' value = 'Actualizar'>";
                    echo "</form>";
            }
            echo "</fieldset>";

            $conexion = mysqli_connect("localhost", "root", "", "El_Coyote_Hambriento");
            $consulta = "SELECT * FROM Trabajador";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset><legend><h3>Trabajadores</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EliminarU.php'>";
                    echo "Número de Seguridad Social: ".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[2]'><br>";
                    echo "<p><input type = 'submit' value = 'Eliminar'></p>";
                    echo "<input type = 'submit' value = 'Actualizar'>";
                    echo "</form>";
            }
            echo "</fieldset>";
        ?>
        <p><a href = "./PantallaAdmin.html">Regresa a pantalla de administradores</a></p>
        </fieldset>
    </body>
</html>

