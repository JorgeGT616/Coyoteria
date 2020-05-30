<!--Elizabeth Salgado Abreu-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Usuarios</title>
        <link rel = "stylesheet" href = "../statics/css/Diseño.css">
    </head>
    <body>
        <?php
            //No. de cuenta, RFC o No. Seguridad Social
            $usuario = $_POST["usuario"];
            //Alumno, ProfoFunc, Trabajador
            $cliente = $_POST["cliente"];
            //Actualizar o Eliminar
            $modif = $_POST["modif"];
            //Variables de los 3
            $nombre = $_POST["nombre"];
            $contrasena = $_POST["contra"];
            //Si es alumno, recibe variable de grupo
            if($cliente == "Alumno"){
                $grupo = $_POST["grupo"];
                //Condiciones para actualizar o eliminar el registro
                if($modif == "Actualizar")
                    $consulta = "UPDATE Alumno SET Nombre='$nombre', Grupo='$grupo', Contrasena='$contrasena' WHERE NoCuenta='$usuario'";
                else
                    $consulta = "DELETE FROM Alumno WHERE NoCuenta='$usuario'";
            }
            //Si es profesor o funcionario, recibe varible de colegio
            elseif($cliente == "ProfoFunc"){
                $colegio = $_POST["colegio"];
                //Condiciones para actualizar o eliminar el registro
                if($modif == "Actualizar")
                    $consulta = "UPDATE Profesor_Funcionario SET Nombre='$nombre', Colegio='$colegio', Contrasena='$contrasena' WHERE RFC='$usuario'";
                else
                    $consulta = "DELETE FROM Profesor_Funcionario WHERE RFC='$usuario'";
            }
            //Si es trabajador
            else{
                //Condiciones para actualizar o eliminar el registro
                if($modif == "Actualizar")
                    $consulta = "UPDATE Trabajador SET Nombre='$nombre', Contrasena='$contrasena' WHERE NoSeguridadSocial='$usuario'";
                else    
                    $consulta = "DELETE FROM Trabajador WHERE NoSeguridadSocial='$usuario'";
            }
            //Inicia conexión con base, ejecuta la consulta y cierra conexión
            $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            //Envía mensaje de acción realizada
            if($modif == "Actualizar")
                echo "El usuario '$usuario' de nombre '$nombre' ha sido actualizado en la base de datos.";
            else
                echo "El usuario '$usuario' de nombre '$nombre' se ha eliminado de la base de datos.";
            //Link de regreso
            echo "<p><a href = './ModifUsuario.php'>Regresa a pantalla de usuarios</a></p>";
        ?>
    </body>
</html>
