<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Productos</title>
        <link rel = "stylesheet" href = "../statics/css/Diseño.css">
    </head>
    <body>
        <!--Inicio php-->
        <?php
            //Número de serie de producto
            $serie = $_POST["serie"];
            //Existente o nuevo
            $alimento = $_POST["alimento"];
            //Atributos
            $producto = $_POST["producto"];
            $precio = $_POST["precio"];
            $dispo = $_POST["dispo"];
            $imagen = $_POST["imagen"];
            //Se modificará un producto existente
            if($alimento == "Existente"){
                $modif = $_POST["modif"];
                //Condiciones para actualizar o eliminar el registro
                if($modif == "Actualizar")
                    $consulta = "UPDATE Alimento SET Producto='$producto', Precio='$precio', Disponibilidad='$dispo', Imagen='$imagen' WHERE NoSerie='$serie'";
                else
                    $consulta = "DELETE FROM Alimento WHERE NoSerie='$serie'";
            }
            //Se añade producto nuevo
            else
                $consulta = "INSERT INTO Alimento (NoSerie, Producto, Precio, Disponibilidad, Imagen) VALUES ($serie, '$producto', $precio, $dispo, '$imagen')";
            //Inicia conexión con base, ejecuta la consulta y cierra conexión
            $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            //Envía mensaje de acción realizada
            if($alimento == "Existente"){
                if($modif == "Actualizar")
                    echo "El producto $producto ha sido actualizado en la base de datos.";
                else
                    echo "El producto $producto se ha eliminado de la base de datos.";
            }
            else
                echo "El producto $producto se añadió a la base.";
            //Link de regreso
            echo "<p><a href = './ModifProducto.php'>Regresa a pantalla de productos</a></p>";
        ?>
    </body>
</html>

