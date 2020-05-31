<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../Statics/Img/Logo.png">
    <link rel="stylesheet" href="../Statics/css/Diseño.css">
  </head>
  <body>
    <?php
    session_name("ElCoyote");
    session_id("3141592653");
    session_start();
    $nombre = (isset($_SESSION['nombre']))? $_SESSION['nombre'] : 'Desconocido';
    $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : 'Desconocido';
    echo "
    <form  action='Cerrar Sesion.php' method='post'>
      <input type='submit' name='Cerrar Sesion' value='Cerrar Sesion'>
    </form>
    <fieldset class='aber'>
      <legend><h1>Usuario</h1> </legend>
        <table class='transparente'>
          <tr>
            <th>¡Hola, ".$nombre."! Selecciona el producto que deseas consumir</th>
          </tr>
        </table>
    </fieldset> <br>
    ";

      //conexion con la base de datos
      $vinculo = mysqli_connect("localhost","root","","coyoteriabase");

      if(!$vinculo)//Comprueba si la conexión se efectuó
      {
        echo mysqli_connect_error();
        echo mysqli_connect_errno();
        exit();
      }
      else
      {
        //Variable de la consulta
        $consulta = "SELECT * FROM alimento";
        //Realiza la consulta
        $elemento = mysqli_query($vinculo, $consulta);

        $nada = false;
        //inicia el formulario para hacer el pedido
        echo "<form action='envios.php' method='post'>";
          echo "<table border = 3 width = 800 style = 'text-align: center; margin:auto; background-color:rgba(0, 0, 0, 0.76); color: white;'>";
          echo "<tr>
                  <td colspan = 3>
                      <h3><br>MENÚ</h3>
                  </td>
                </tr>";
          //While para realizar la tabla mientras existan elementos en la base
          while($columna = mysqli_fetch_array($elemento))
          {
            if($columna[3] > 0)
            {
              echo "<tr >";
                echo "<td rowspan = 2 width = 200>";
                //posicionamiento con los datos por columna
                  echo "<img src = '".$columna[4]."'title = 'Producto' height = 100>";
                echo "</td>";
                echo "<td>";
                  echo "Nombre: <br>".$columna[1];
                  $nada = true;
                echo "</td>";
                echo "<td rowspan = 2>";
                  echo "Disponibilidad: <br>".$columna[3]." unidades";
                  echo "<p><input type = 'radio' name = 'seleccion' value = '".$columna['NoSerie']."' required>
                        <br>Seleccionar</p>";
                echo "</td>";
              echo "</tr>";

              echo "<tr>";
                echo "<td>";
                  echo "Precio: <br>$".$columna[2];
                echo "</td>";
              echo "</tr>";
            }
          }
        //Formulario para agregar la ubicación a la que será llevado el pedido
        if ($nada = true)
        {
          echo       "<tr>
                        <td colspan = 3>
                          <p>
                            <h3>Selecciona el lugar para recoger tu producto:</h3>
                            Recoger en la cafeteria<input type='Radio' name='envio' required value='Recoger'> <br>
                              Enviar al pulpo <input type='Radio' name='envio' value='Pulpo' required> <br>
                              Enviar a sala de maestros <input type='Radio' name='envio' value='Sala de Maestros' required> <br>
                              Enviar a direccion<input type='Radio' name='envio' value='Direccion' required> <br>
                              Enviar al 'Tótem'<input type='Radio' name='envio' value='Totem' required> <br>
                              Enviar al auditorio <input type='Radio' name='envio' value='Auditorio' required> <br>
                              Enviar a patio de cuartos <input type='Radio' name='envio' value='Patio de Cuartos' required> <br>
                              Enviar al Antonio Caso <input type='Radio' name='envio' value='Antonio Caso' required> <br>
                              Enviar a salones de dibujo <input type='Radio' name='envio' value='Salones de Dibujo' required> <br>
                              Enviar a pimponeras <input type='Radio' name='envio' value='Pimponeras' required> <br>
                            </p>
                          <br>
                        </td>
                      </tr>";
          echo        "<tr>
                        <td colspan = 3>
                          <br>
                            <input type = 'submit' value = 'Solicitar'>
                          <br>
                          <br>
                        </td>
                      </tr>";
          echo     "</table>";
          echo   "</form>";
        }
        echo $nombre;
        echo $usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['usuario'] = $usuario;
      }
    ?>
  </body>
</html>
