<?php
 echo "<!DOCTYPE html>";
 session_name("ElCoyote");
 session_id("3141592653");
 session_start();
 $pedido = (isset($_SESSION['pedido']))? $_SESSION['pedido'] : 'Desconocido';
 $vinculo = mysqli_connect("localhost","root","","coyoteriabase");
 $cambioubi = (isset($_POST['envio'])) ? $_POST['envio']: "Sin datos";
 if(!$vinculo)
 {
   echo mysqli_connect_error();
   echo mysqli_connect_errno();
   exit();
 }
 else
 {
   $sql = "UPDATE pedido SET lugar='.$cambioubi' WHERE NoPedido='$pedido'";
   $si=mysqli_query($vinculo,$sql);
   if (isset($si)){
     echo "La ubicacion para recoger el pedido ahora es".$cambioubi;
     echo "<br>";
   }
   else {
     echo "La ubicacion para recoger el pedido no se ha podido actualizar con exito";
     echo "<br>";
   }

 }

?>
