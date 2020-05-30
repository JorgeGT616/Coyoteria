<?php
 echo "<!DOCTYPE html>";
 $vinculo = mysqli_connect("localhost","root","","baseproductos");
 $client = (isset($_POST['idcliente'])) ? $_POST['idcliente']: "Sin datos";
 $elemento2 = mysqli_query($vinculo, $client);
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

   $sql = "UPDATE pedido SET Sancion=Si WHERE IdCliente='.$client'";
   mysqli_query($vinculo, $sql);

 }
 echo "El usuario ".$client." ha sido sancionado con exito";
 echo "<br>";
 echo "<br>";
 echo "<a href = './supervisor.php'>Regresar a la pagina de supervisor</a>";
 echo "<br>";
?>
