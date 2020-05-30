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
      $producto=(isset($_POST['seleccion'])) ? $_POST['seleccion']: "Sin pedido";
      $ubicacion=(isset($_POST['ubi'])) ? $_POST['ubi']: "Sin ubicacion";
      $cliente=(isset($_POST['idcliente'])) ? $_POST['idcliente']: "Sin id";
      $precio="SELECT Precio FROM alimento ";
      $precio2= mysqli_query($vinculo, $precio);
      $precio3=mysqli_fetch_array($precio2);
      $sql = "INSERT INTO pedido VALUES (,$producto,$ubicacion,$precio3[0],,$cliente)";
      if (mysqli_query($vinculo,$sql)) {
        while ($precio3=mysqli_fetch_array($precio2)) {
          echo $precio3[0];
        }
        echo "Pedido registrado correctamente";
        echo "Estimado usuario con el id ".$cliente;
        echo "<br>";
        echo "Tu producto es el siguiente ".$producto;
        echo "<br>";
        echo "y sera enviado a la siguiente ubicacion ".$ubicacion;
        echo "<br>";
        echo "Tu pedido tardara 10min en llegar a la ubicacion y apartir de ese momento tendras 5min para recogerlo, si no lo recoges seras sancionado sin poder pedir comida durante 5 dias habiles";
      }
      else {
        echo "Algo fallo :c intentalo de nuevo mas tarde";
        echo "<br>";
      }
    }

?>
