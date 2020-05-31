<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Usuarios</title>
        <link rel = "stylesheet" href = "../statics/css/Diseño.css">
    </head>
    <body>
        <fieldset><legend><h2>Actualización de información y regulación de usuarios</h2></legend>
        <?php
            //Inicia conexión con base de datos
            $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
            //Refiere a entidad "Alumno"
            $consulta = "SELECT * FROM Alumno";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset ><legend><h3>Alumnos</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EAU.php' method= 'POST' class='transparente'";
                    echo "Número de cuenta: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'/><br>";
                    echo "Grupo: <input type = 'text' name = 'grupo' value = '$fila[2]'/><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[3]'/><br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Actualizar' checked/>Actualizar";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Actualizar'/></p>";
                    echo "<input type = 'hidden' name = 'cliente' value = 'Alumno'/>";
                    echo "</form>";
            }
            echo "</fieldset>";
            //Refiere a entidad "Profesor_Funcionario"
            $consulta = "SELECT * FROM Profesor_Funcionario";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset ><legend><h3>Profesores o Funcionarios</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EAU.php' method= 'POST' class='transparente'>";
                    echo "RFC: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'/><br>";
                    echo "Colegio: <input type = 'text' name = 'colegio' value = '$fila[2]'/><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[3]'/><br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Actualizar' checked/>Actualizar";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Actualizar'/></p>";
                    echo "<input type = 'hidden' name = 'cliente' value = 'ProfoFunc'/>";
                    echo "</form>";
            }
            echo "</fieldset>";
            //Refiere a entidad "Trabajador"
            $consulta = "SELECT * FROM Trabajador";
            $respuesta = mysqli_query($conexion, $consulta);
            echo "<fieldset ><legend><h3>Trabajadores</h3></legend>";
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EAU.php' method= 'POST' class='transparente'>";
                    echo "Número de Seguridad Social: <input type = 'hidden' name = 'usuario' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Nombre: <input type = 'text' name = 'nombre' value = '$fila[1]'/><br>";
                    echo "Contraseña: <input type = 'text' name = 'contra' value = '$fila[2]'/><br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Actualizar' checked/>Actualizar";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Actualizar'/></p>";
                    echo "<input type = 'hidden' name = 'cliente' value = 'Trabajador'/>";
                    echo "</form>";
            }
            echo "</fieldset>";
            mysqli_close($conexion);
        ?>
        <p><a href = "PantallaAdmin.php">Regresa a pantalla de administradores</a></p>
        </fieldset>
    </body>
</html>
