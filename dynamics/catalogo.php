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
  $consulta = "SELECT * FROM alimento";
  $elemento = mysqli_query($vinculo, $consulta);

  echo "<form class='' action='producto.php' method='get'>";
    echo "<table border = 3 width = 800 style = 'text-align: center; margin:auto'>";
    echo "<tr>
            <td colspan = 3>
                <h3><br>MENÚ</h3>
            </td>
          </tr>";
    while($columna = mysqli_fetch_array($elemento))
    {
      if($columna[3] > 0)
      {
        echo "<tr >";
          echo "<td rowspan = 2 width = 200>";
            echo "<img src = '".$columna[4]."'title = 'Producto' height = 100>";
          echo "</td>";
          echo "<td>";
            echo "Nombre: <br>".$columna[1];
          echo "</td>";
          echo "<td rowspan = 2>";
            echo "Disponibilidad: <br>".$columna[3]." unidades";
            echo "<p><input type = 'radio' name = 'seleccion' value = '".$columna['NoSerie']."'>
                  <br>Seleccionar</p>";
          echo "</td>";
        echo "</tr>";

        echo "<tr>";
          echo "<td>";
            echo "Precio: <br>$".$columna[2];
          echo "</td>";
        echo "</tr>";
      }
    }
  echo       "<tr>
                <td colspan = 3>
                  <p>
                    <h3>Selecciona el lugar para recoger tu producto:</h3>
                    Recoger en la cafeteria<input type='Radio' name='envio' required value='Recoger'> <br>
                    Enviar al pulpo <input type='Radio' name='envio' value='Pulpo' required> <br>
                    Enviar a sala de maestros <input type='Radio' name='envio' value='SalaMaestros' required> <br>
                    Enviar a direccion<input type='Radio' name='envio' value='Direccion' required> <br>
                    Enviar al 'Tótem'<input type='Radio' name='envio' value='Totem' required> <br>
                    Enviar al auditorio <input type='Radio' name='envio' value='Auditorio' required> <br>
                    Enviar a patio de cuartos <input type='Radio' name='envio' value='PatCuartos' required> <br>
                    Enviar al Antonio Caso <input type='Radio' name='envio' value='AntonioCaso' required> <br>
                    Enviar a salones de dibujo <input type='Radio' name='envio' value='SalDibujo' required> <br>
                    Enviar a pimponeras <input type='Radio' name='envio' value='Pimponeras' required> <br>
                  </p>
                  <br>
                </td>
              </tr>";
  echo        "<tr>
                <td colspan = 3>
                  <br>
                    <input type = 'submit' value = 'Solicitar'>
                  <br>
                  <br>
                </td>
              </tr>";
  echo     "</table>";
  echo   "</form>";

}


?>
