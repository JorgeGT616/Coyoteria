<?php
$vinculo = mysqli_connect("localhost","root","","baseproductos");

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
    {
      echo "Numero de pedido ".$columna['Nopedido'];
      echo "<br>";
      echo "Numero de serie ".$columna[1];
      echo "<br>";
      echo "Destinatario ".$columna[2];
      echo "<br>";
      echo "Precio del producto ".$columna[3];
      echo "<br>";
      echo "Sancion? ".$columna[4];
      echo "<br>";
      echo "Id del cliente ".$columna[5];
      echo "<br>";
    }
    mysqli_close($vinculo);
}
echo "Selecciona si el pedido fue entregado con exito o tendras que sancionar al usuario ";
echo "<br>";
echo "<a href = './entregado.html'>Entregado con exito</a>";
echo "<br>";
echo "<a href = './sancion.html'>Sancionar al usuario</a>";


?>
