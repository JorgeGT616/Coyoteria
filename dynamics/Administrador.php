<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../statics/Img/Logo.png">
    <link rel="stylesheet" href="../statics/css/Diseño.css">
  </head>
  <body>
    <?php
      $vinculo = mysqli_connect("localhost","root","","coyoteriabase");

      if(!$vinculo)
      {
        echo mysqli_connect_error();
        echo mysqli_connect_errno();
        exit();
      }
      else
      {
        if (isset($_POST['supercontra'])) {
          $supercontrasena=htmlentities($_POST['supercontra']);
          $supercontrasena=strip_tags($_POST['supercontra']);
          $traer = "SELECT contrasena FROM Administrador WHERE IdAdmin=2";
          $traerescapada = mysqli_real_escape_string ($vinculo,$traer);
          $dato = mysqli_query($vinculo, $traerescapada);
          $cosito=mysqli_fetch_array($dato, MYSQLI_NUM);
          $cositoso=$cosito[0];
          $aber=password_verify($supercontrasena, $cositoso);
          echo $aber."De admin <br>";

          $omg = "SELECT contrasena FROM Supervisor WHERE IdSupervisor=1";
          $datos = mysqli_query($vinculo, $omg);
          $cositos=mysqli_fetch_array($datos, MYSQLI_NUM);
          $cositosos=$cositos[0];
          $aberts=password_verify($supercontrasena, $cositosos);
          echo $aberts."De supervisor <br>";
          if ($aber==false && $aberts==false) {
              echo "Contraseña Incorrecta";
          }
          else {
            if ($aber) {
              session_name("ElCoyote");
              session_id("3141592653");
              session_start();
              $_SESSION['supercontra'] = $supercontrasena;
              header("Location:./PantallaAdmin.php");
            }
            elseif ($aberts){
              header("Location:supervisor.php");
            }
          }
        }
        else{
          echo "
          <form action='Inicio.php' method='post'>
            <input type='submit' value='Regresar'> </input>
          </form>
          <fieldset class='aber'>
            <legend><h2>Administradores y Supervisores</h2> </legend>
            <form  action='Administrador.php' method='post'>
              <table class ='transparente'>
                <tr>
                  <th>Contraseña:<input type='password' name='supercontra' value=''> </input> </th>
                </tr>
                <tr>
                  <th><input type='submit' value='Ingresar'> </input> </th>
                </tr>
              <table>
            </form>

          ";
        }
      }
     ?>
  </body>
</html>
