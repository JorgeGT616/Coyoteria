<?php
 echo "<!DOCTYPE html>";
 $vinculo = mysqli_connect("localhost","root","","coyoteriabase");
 $client = (isset($_POST['idcliente'])) ? $_POST['idcliente']: "Sin datos";
 $pedido = (isset($_POST['idpedido'])) ? $_POST['idpedido']: "Sin datos";
 if(!$vinculo)
 {
   echo mysqli_connect_error();
   echo mysqli_connect_errno();
   exit();
 }
 else
 {
   $sql = "UPDATE pedido SET Sancion=\"Sancionado\" WHERE NoPedido='$pedido'";
   $si=mysqli_query($vinculo,$sql);
   if (isset($si)){
     echo "El usuario ".$client." ha sido sancionado con exito";
     echo "<br>";
     echo "<br>";
     echo "<a href = './supervisor.php'>Regresar a la pagina de supervisor</a>";
     echo "<br>";
   }
   else {
     echo "El usuario ".$client." no ha sido sancionado con exito. Valores equivocados";
     echo "<br>";
     echo "<br>";
     echo "<a href = './supervisor.php'>Regresar a la pagina de supervisor</a>";
     echo "<br>";
   }

 }


?>
