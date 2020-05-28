<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Productos</title>
    </head>
    <body>
        <fieldset><legend><h2>Modificación de productos</h2></legend>
        <?php
            //Inicia conexión con la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "ECH");
            $consulta = "SELECT * FROM Alimento";
            $respuesta = mysqli_query($conexion, $consulta);
            //Coloca productos de la base 
            while($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)){
                echo "<form action= './EAP.php' method= 'POST'>";
                    echo "No. Serie: <input type = 'hidden' name = 'serie' value = '$fila[0]'/>".$fila[0]."<br>";
                    echo "Producto: <input type = 'text' name = 'producto' value = '$fila[1]'/><br>";
                    echo "Precio: <input type = 'text' name = 'precio' value = '$fila[2]'/><br>";
                    echo "Disponibilidad: <input type = 'text' name = 'dispo' value = '$fila[3]'/><br>";
                    echo "Imagen: <input type = 'text' name = 'imagen' value = '$fila[4]'><br>";
                    echo "<p><input type = 'radio' name = 'modif' value = 'Actualizar' checked/>Actualizar";
                    echo "<input type = 'radio' name = 'modif' value = 'Eliminar'/>Eliminar</p>";
                    echo "<p><input type = 'submit' value = 'Eliminar/Actualizar'/></p>";
                    echo "<input type = 'hidden' name = 'alimento' value = 'Existente'/>";
                    echo "</form>";
            }
            //Cierra conexión
            mysqli_close($conexion);
        ?>
        </fieldset>
        <form action= 'EAP.php' method= 'POST'>
            <fieldset><legend><h2>Nuevo producto</h2></legend>
                <?php
                    //Inicia conexión con base para indicar número de serie a nuevo producto
                    $conexion = mysqli_connect("localhost", "root", "", "ECH");
                    $consulta = "SELECT MAX(NoSerie) FROM Alimento";
                    $respuesta = mysqli_query($conexion, $consulta);
                    $valor = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                    $valorserie = $valor[0] + 1;
                    mysqli_close($conexion);
                    echo "No.Serie: <input type = 'hidden' name = 'serie' value = '$valorserie'/>$valorserie<br>";
                ?>
                Producto: <input type = 'text' name = 'producto'/><br>
                Precio: <input type = 'text' name = 'precio'/><br>
                Disponibilidad: <input type = 'text' name = 'dispo'/><br>
                Imagen: <input type = 'text' name = 'imagen'/><br>
                <p><input type = 'submit' value = 'Agregar'></p>
                <input type = 'hidden' name = 'alimento' value = 'Nuevo'/>
            </fieldset>
        </form>
        <p><a href = "./PantallaAdmin.html">Regresa a pantalla de administradores</a></p>
    </body>
</html>