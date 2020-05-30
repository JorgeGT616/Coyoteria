<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../Statics/Img/Logo.png">
    <link rel="stylesheet" href="../Statics/css/Diseño.css">
  </head>
  <body>
    <?php
      session_name("ElCoyote");
      session_id("3141592653");
      session_start();
      $nombre = (isset($_SESSION['nombre']))? $_SESSION['nombre'] : "Desconocido";
      $usuario = (isset($_SESSION['usuario']))? $_SESSION['usuario'] : "Desconocido";
      echo "
      <fieldset class='aber'>
        <legend><h1>Regístrate</h1> </legend>
        <form  action='Cerrar Sesion.php' method='post'>
          <table class='transparente'>
            <tr>
              <th>Welcome ".$nombre."</th>
            </tr>
            <tr>
              <th><input type='submit' value='Cerrar Sesión'></th>
            </tr>
          </table>
        </form>
      </fieldset>
      ";
    ?>
  </body>
</html>
