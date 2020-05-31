<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../statics/Img/Logo.png">
    <link rel="stylesheet" href="../statics/css/Diseño.css">
  </head>
  <body>
    <?php
      session_name("ElCoyote");
      session_id("3141592653");
      session_start();
      $nombre = (isset($_SESSION['nombre']))? $_SESSION['nombre'] : 'Desconocido';
      $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : 'Desconocido';
      $pedido=(isset($_SESSION['pedido'])) ? $_SESSION['pedido']: "Sin pedido";
      $ubicacion=(isset($_SESSION['ubi'])) ? $_SESSION['ubi']: "Sin ubi";
      $producto=(isset($_SESSION['producto'])) ? $_SESSION['producto']: "Sin producto";

      $vinculo = mysqli_connect("localhost","root","","coyoteriabase");

      if(!$vinculo)
      {
        echo mysqli_connect_error();
        echo mysqli_connect_errno();
        exit();
      }
      else
      {
        //numero de serie
        $clientoso="SELECT idCliente FROM cliente WHERE (NoCuenta=$usuario) OR (RFC=\".$usuario.\") OR (NoSeguridadSocial=$usuario)";
        $corroborar=mysqli_query($vinculo,$clientoso);
        $columna = mysqli_fetch_array($corroborar);
        $cliente=$columna[0];
        $precio="SELECT Precio FROM alimento ";
        $precio2= mysqli_query($vinculo, $precio);
        $precio3=mysqli_fetch_array($precio2);
        $sql = " INSERT INTO pedido () VALUES (\"\", $pedido,\"$ubicacion\",$precio3[0],\"Por entregar\",$cliente)";
        if (mysqli_query($vinculo,$sql)) {
          echo "
          <form  action='Cerrar Sesion.php' method='post'>
            <input type='submit' name='Cerrar Sesion' value='Cerrar Sesion'>
          </form>
          <fieldset class='aber'>
            <legend><h2>Pedido registrado correctamente</h2> </legend>
            <form  action='catalogo.php' method='post'>
              <table class='transparente' style='height: 237px;'>
                <tr>
                  <th>Estimado usuario ".$usuario." con el id ".$cliente.":</th>
                </tr>
                <tr>
                  <th>Tu producto es el siguiente: ".$producto.", almacenado con un id de envío ".$pedido.",</th>
                </tr>
                <tr>
                  <th>y será enviado a la siguiente ubicación: ".$ubicacion.".</th>
                </tr>
                <tr>
                  <th>Tu pedido tardará 10 minutos en llegar a la ubicación y a partir de ese momento tendrás 5 minutos para recogerlo, si no lo recoges serás sancionado sin poder pedir comida durante 5 dias hábiles.</th>
                </tr>
                <tr>
                  <th><input type='submit' name='Regresar' value='Regresar'></th>
                </tr>
              </table>
            </form>
          </fieldset>
          ";
        }
        else {
          echo "Algo fallo :c intentalo de nuevo mas tarde";
          echo "<br>";
          echo"<form  action='catalogo.php' method='post'>
            <input type='submit' name='Regresar' value='Regresar'>
          </form>";
        }

      }
    ?>
  </body>
</html>
