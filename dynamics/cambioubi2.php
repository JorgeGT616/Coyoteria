<?php
echo "<!DOCTYPE html>";

    session_name("ElCoyote");
    session_id("3141592653");
    session_start();
    $pedido = (isset($_SESSION['pedido']))? $_SESSION['pedido'] : 'Desconocido';

    echo "<form class="" action="cambioubi.php" method="post">
       Recoger en la cafeteria<input type='Radio' name='envio' required value='Recoger'> <br>
        Enviar al pulpo <input type='Radio' name='envio' value='Pulpo' required> <br>
        Enviar a sala de maestros <input type='Radio' name='envio' value='Sala de Maestros' required> <br>
        Enviar a direccion<input type='Radio' name='envio' value='Direccion' required> <br>
        Enviar al 'Tótem'<input type='Radio' name='envio' value='Totem' required> <br>
        Enviar al auditorio <input type='Radio' name='envio' value='Auditorio' required> <br>
        Enviar a patio de cuartos <input type='Radio' name='envio' value='Patio de Cuartos' required> <br>
        Enviar al Antonio Caso <input type='Radio' name='envio' value='Antonio Caso' required> <br>
        Enviar a salones de dibujo <input type='Radio' name='envio' value='Salones de Dibujo' required> <br>
        Enviar a pimponeras <input type='Radio' name='envio' value='Pimponeras' required> <br>
        Cambiar Ubicacion <input type="submit" name="enviar" value="">
    </form>";

    $_SESSION['pedido'] = $pedido;

?>
