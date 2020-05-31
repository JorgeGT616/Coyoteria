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
      echo "
        <fieldset class='aber'><legend><h2>Actualizaciones</h2></legend>
        <table class='transparente'>
        <tr>
          <th>Selecciona si el pedido fue entregado con exito o tendras que sancionar al usuario <br> </th>
        </tr>
        <tr>
          <th><form  action='../templates/entregado.html' method='post'>
            <input type='submit' name='Entregado con éxito' value='Entregado con éxito'>
          </form> </th>
        <tr>
        </tr>
          <th><form  action='../templates/sancion.html' method='post'>
            <input type='submit' name='Sancionar al usuario' value='Sancionar al usuario'>
          </form></th>
          </tr>
          <tr>
            <th><form  action='Administrador.php' method='post'>
              <input type='submit' name='Regresar' value='Regresar'>
            </form> </th>
          <tr>
        </table>

        </fieldset>
      ";
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
          </table>
          <br>
          <br>
          ";

        }
        mysqli_close($vinculo);
    }

    ?>
  </body>
</html>
