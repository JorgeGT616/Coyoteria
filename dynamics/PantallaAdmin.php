<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Administradores</title>
        <link rel = "stylesheet" href = "../statics/css/Diseño.css">
    </head>
    <body>
      <?php
      session_name("ElCoyote");
      session_id("3141592653");
      session_start();
        if (isset($_SESSION['supercontra'])){
          echo '
                <fieldset class="aber">
                <legend><h2>Selecciona lo que modificarás</h2></legend>
                <table class="transparente">
                  <tr>
                    <th>
                      <form  action="../dynamics/ModifUsuario.php" method="post">
                        <input type="submit" name="Modificar usuarios" value=Modificar usuarios">
                      </form>
                    <th>
                  </tr>
                  <tr>
                    <th>
                      <form  action="../dynamics/ModifProducto.php" method="post">
                        <input type="submit" name="Modificar Productos" value="Modificar Productos">
                      </form>
                    <th>
                  </tr>
                  <tr>
                    <th>
                      <form  action="../dynamics/Inicio.php" method="post">
                        <input type="submit" name="Regresar" value="Regresar">
                      </form>
                    <th>
                  </tr>
                <table>
                </fieldset>

          ';
        }
        else {
          header('Location: Administrador.php');
        }
      ?>
    </body>
</html>
