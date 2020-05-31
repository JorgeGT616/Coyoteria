<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../statics/Img/Logo.png">
    <link rel="stylesheet" href="../Statics/css/Diseño.css">
  </head>
  <body>
    <?php
    $vinculo = mysqli_connect("localhost","root","","coyoteriabase");

    if(!$vinculo)
    {
      echo mysqli_connect_error();
      echo mysqli_connect_errno();
      exit();
    }
    else
    {
      $pedido = "SELECT * FROM pedido";
      $elemento2 = mysqli_query($vinculo, $pedido);

        while($columna = mysqli_fetch_array($elemento2))
        { echo "
          <table class='transparente'>
            <tr>
              <th>Numero de pedido ".$columna['NoPedido']."</th>
            </tr>
            <tr>
              <th>Numero de serie ".$columna[1]."</th>
            </tr>
            <tr>
              <th>Destinatario ".$columna[2]."</th>
            </tr>
            <tr>
              <th>Precio del producto ".$columna[3]."</th>
            </tr>
            <tr>
              <th>Sancion? ".$columna[4]."</th>
            </tr>
            <tr>
              <th>Id del cliente ".$columna[5]."</th>
            </tr>
          </table>";

        }
        mysqli_close($vinculo);
    }
    echo "
      Selecciona si el pedido fue entregado con exito o tendras que sancionar al usuario <br>
      <a href = '../templates/entregado.html'>Entregado con exito</a>
      <a href = '../templates/sancion.html'>Sancionar al usuario</a>
    ";
    ?>
  </body>
</html>
