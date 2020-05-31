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
              header("Location:../templates/PantallaAdmin.html");
            }
            elseif ($aberts){
              header("Location:supervisor.php");
            }
          }
        }
        else{
          echo "
          <fieldset class='aber'>
            <legend><h1>Administradores y Supervisores</h1> </legend>
            <form  action='Administrador.php' method='post'>
              Contraseña:
              <input type='password' name='supercontra' value=''> </input>
              <input type='submit' value='Ingresar'> </input>
            </form>
          </fieldset>
          ";
        }
      }
     ?>
  </body>
</html>
