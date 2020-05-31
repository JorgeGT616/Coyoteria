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

    //conexion con la base de datos
    $vinculo = mysqli_connect("localhost","root","","coyoteriabase");

    if(!$vinculo)//Comprueba si la conexión se efectuó
    {
      echo mysqli_connect_error();
      echo mysqli_connect_errno();
      exit();
    }
    else{
      $ubicacion=(isset($_POST['envio'])) ? $_POST['envio']: "Sin ubicacion";
      $producto=(isset($_POST['seleccion'])) ? $_POST['seleccion']: "Sin producto";
      $consulta="SELECT NoSerie, Producto FROM Alimento WHERE NoSerie=$producto";
      $datos = mysqli_query($vinculo, $consulta);
      $columna = mysqli_fetch_array($datos);
      $producto=$columna[1];
      echo "
        <form  action='catalogo.php' method='post'>
          <input type='submit' name='Regresar' value='Cancelar'>
        </form>
        <fieldset class='aber'>
          <legend><h2>Confirma tu pedido y ubicacion</h2></legend>
          <table class='transparente'>
            <tr>
              <th>Tu producto es el siguiente: ".$producto."</th>
            </tr>
            <tr>
              <th>y será enviado a la siguiente ubicación: ".$ubicacion.".</th>
            </tr>
            <tr>
              <th>Tu pedido tardará 10 minutos en llegar a la ubicación y apartir de ese momento tendrás 5 minutos para recogerlo, si no lo recoges serás sancionado sin poder pedir comida durante 5 dias hábiles.</th>
            </tr>
            <tr>
              <th>
                <form action= 'confirmar.php' method= 'POST'>
                  <input type = 'submit' value='Confirmar'/>
                </form>
              </th>
            </tr>

          </table>
        </fieldset>

      ";
            $_SESSION['pedido'] = $columna[0];
            $_SESSION['ubi'] = $ubicacion;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['producto'] = $producto;
    }
    ?>
  </body>
</html>
