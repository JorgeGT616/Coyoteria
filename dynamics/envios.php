<?php
    $ubicacion=(isset($_POST['envio'])) ? $_POST['envio']: "Sin ubicacion";
    $producto=(isset($_POST['seleccion'])) ? $_POST['seleccion']: "Sin producto";
    echo "<h1>Confirma tu pedido y ubicacion</h1>";
    echo "Tu producto es el siguiente ".$producto;
    echo "<br>";
    echo "y sera enviado a la siguiente ubicacion: ".$ubicacion ;
    echo "<br>";
    echo "Tu pedido tardara 10min en llegar a la ubicacion y apartir de ese momento tendras 5min para recogerlo, si no lo recoges seras sancionado sin poder pedir comida durante 5 dias habiles";
    echo "<form action= 'confirmar.php' method= 'POST'>
          <input type = 'radio' name = 'pedido' value = '.$producto.' required/>".$producto.
          "<input type = 'radio' name = 'ubi' value = '.$ubicacion.' required/>".$ubicacion.
          "<br>
          <input type = 'number' name = 'idcliente' required placeholder = 'Introduce tu id'/>
          <input type = 'submit' value='Confirmar'/>";

?>
