<?php

$encontrado = false;
$vinculo = mysqli_connect("localhost","root","","coyoteriabase");

if(!$vinculo)
{
  echo mysqli_connect_error();
  echo mysqli_connect_errno();
  exit();
}
else
{
  //Primer formulario
  echo "funciono";
  echo "<form class='' action='experimentoseguridad.php' method='post'>";
  echo "Escirbe la contraseña: <input type = 'password' name = 'lacontra' value = '' placeholder = 'miau' required>
        <input type = 'submit' value = 'yamandame'>";
  echo "</form>";

  $traer = "SELECT * FROM contrasena";
  $dato = mysqli_query($vinculo, $traer);

  while($columna = mysqli_fetch_array($dato))
  {
    echo $columna['numero_de_contra'].". ".$columna[1]."<br>";
  }

  if (isset($_POST['lacontra']))
  {
    $hasheada = password_hash($_POST['lacontra'],PASSWORD_BCRYPT);
    echo "Contraseña hasheada: ".$hasheada;
    $insercion = "INSERT INTO contrasena () VALUES (\"\",\"$hasheada\")";
    mysqli_query($vinculo,$insercion);
    echo "<br>Enviada la contraseña";
  }

  echo "<br>
        <h2>Revision de contraseña</h2>";
  echo "<form class='' action='experimentoseguridad.php' method='post'>";
  echo "Selecciona un el número de tu cuenta <input type = 'number' name = 'cuenta' value = '' required>";
  echo "Comprueba la contraseña: <input type = 'password' name = 'lanuevacontra' value = '' placeholder = 'miau' required>
              <input type = 'submit' value = 'Comprobar'>";
  echo "</form>";

  if ((isset($_POST['lanuevacontra']))&&(isset($_POST['cuenta'])))
  {
    $neocuenta = ($_POST['cuenta']);
    $neocontra = ($_POST['lanuevacontra']);
    $verif = "SELECT contra FROM contrasena WHERE $neocuenta = numero_de_contra";
    $respu = mysqli_query($vinculo, $verif);
    $res = mysqli_fetch_array($respu,MYSQLI_NUM);
    if(password_verify($neocontra,$res[0]))
    {
      echo $res[0]."<br>";
      echo "Cuenta encontrada";
      $encontrado = true;
    }
    else if ($encontrado == false)
    {
      echo "No se han encontrado coincidencias";
    }
  }
}




?>
