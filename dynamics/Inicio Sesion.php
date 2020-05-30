<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../../Statics/Img/Logo.png">
    <link rel="stylesheet" href="../Statics/css/Diseño.css">
  </head>
  <body>
    <?php
    define("HASH","sha256");
    define("PASSWORD","Secure password, plz make ec¿verything s3cur3");
    define("METHOD","aes-128-cbc");

    function Cifrar($text)
    {
      $key = openssl_digest(PASSWORD,HASH);
      $iv_len = openssl_cipher_iv_length(METHOD);

      $iv = openssl_random_pseudo_bytes($iv_len);
      $textoCifrado = openssl_encrypt
      (
        $text,
        METHOD,
        $key,
        OPENSSL_RAW_DATA,
        $iv
      );
      $ciffWIv=base64_encode($iv.$textoCifrado);
      return $ciffWIv;
    }

    function Descifrar($cifradoWIv)
    {
      $cifradoWIv=base64_decode($cifradoWIv);
      $iv_len= openssl_cipher_iv_length(METHOD);
      $iv= substr($cifradoWIv,0,$iv_len);
      $cifrado = substr($cifradoWIv,$iv_len);

      $key=openssl_digest(PASSWORD,HASH);

      $desciff=openssl_decrypt
      (
        $cifrado,
        METHOD,
        $key,
        OPENSSL_RAW_DATA,
        $iv
      );

      return $desciff;
    }

      if ((isset($_POST['user']) && $_POST['user'] != " ") && (isset($_POST['pass']) && $_POST['pass'] != " ")) {
        $usuario = $_POST['user'];
        $contra = $_POST['pass'];
        $conexion = mysqli_connect("localhost", "root", "", "Coyote");
        if( !$conexion ){
          echo mysqli_conect_error();
          echo mysqli_conect_errno();
          exit();
        }
        else {
          $consulta = "SELECT NoCuenta FROM alumno WHERE NoCuenta='$usuario'";
          $respuesta= mysqli_query($conexion, $consulta);
          if($row=mysqli_fetch_array($respuesta)){
            $consulta = "SELECT contrasena FROM alumno WHERE NoCuenta='$usuario'";
            $respuesta= mysqli_query($conexion, $consulta);
            $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
            $hasheo = $row[0];
            $deshasheo=Descifrar($hasheo);
            if ($deshasheo==$contra) {
              header("Location: Welcome.php");
            }
            else {
              echo "
              <fieldset class='aber'>
                <legend><h1>Regístrate</h1> </legend>
                <form  action='Inicio Sesion.php' method='post'>
                  <table class='transparente'>
                    <tr>
                      <th>Contraseña incorrecta</th>
                      ".$deshasheo."
                    </tr>
                    <tr>
                      <th><input type='submit' name='Regresar' value='Regresar'></th>
                    </tr>
                  </table>
                </form>
              </fieldset>
              ";
            }
            mysqli_close($conexion);
          }
          else {
            $consulta = "SELECT RFC FROM profesor_funcionario WHERE RFC='$usuario'";
            $respuesta= mysqli_query($conexion, $consulta);
            if($row=mysqli_fetch_array($respuesta)){
              $consulta = "SELECT contrasena FROM profesor_funcionario WHERE RFC='$usuario'";
              $respuesta= mysqli_query($conexion, $consulta);
              $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
              $hasheo = $row[0];
              $deshasheo="chale";
              $deshasheo=Descifrar($hasheo);
              if ($deshasheo==$contra) {
                header("Location: Welcome.php");
              }
              else {
                echo "
                <fieldset class='aber'>
                  <legend><h1>Regístrate</h1> </legend>
                  <form  action='Inicio Sesion.php' method='post'>
                    <table class='transparente'>
                      <tr>
                        <th>Contraseña incorrecta</th>
                        ".$deshasheo."
                      </tr>
                      <tr>
                        <th><input type='submit' name='Regresar' value='Regresar'></th>
                      </tr>
                    </table>
                  </form>
                </fieldset>
                ";
              }
              mysqli_close($conexion);
            }
            else {
              $consulta = "SELECT NoSeguridadSocial FROM trabajador WHERE NoSeguridadSocial='$usuario'";
              $respuesta= mysqli_query($conexion, $consulta);
              if($row=mysqli_fetch_array($respuesta)){
                $consulta = "SELECT contrasena FROM trabajador WHERE NoSeguridadSocial='$usuario'";
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                $hasheo = $row[0];
                $deshasheo=Descifrar($hasheo);
                if ($deshasheo==$contra) {
                  header("Location: Welcome.php");
                }
                else {
                  echo "Contraseña incorrecta";
                }
                mysqli_close($conexion);
              }
              else {
                echo "
                <fieldset class='aber'>
                  <legend><h1>Regístrate</h1> </legend>
                  <form  action='Inicio Sesion.php' method='post'>
                    <table class='transparente'>
                      <tr>
                        <th>Usuario o Contraseña incorrectos</th>
                      </tr>
                      <tr>
                        <th><input type='submit' name='Regresar' value='Regresar'></th>
                      </tr>
                    </table>
                  </form>
                </fieldset>
                ";
              }
            }
          }
        }
      }
      else{
        echo "<fieldset class='aber'>
          <legend><h1>Inicia Sesion</h1> </legend>
          <form  action='Inicio Sesion.php' method='post'>
            <table class='transparente2'>
              <tr>
                <th><h3>Usuario:</h3></th>
                <th><input type='text' name='user' size='25' placeholder='No. Cuenta, RFC, No. Trabajador' required></th>
              </tr>
              <tr>
                <th><h3>Contraseña</h3></th>
                <th><input type='password' name='pass' size='25' placeholder=''*******'' required> </th>
              </tr>
              <tr>
                <th colspan='2' style='text-align:center;'> <input type='submit' value='Iniciar Sesion'> </th>
              </tr>
            </table>
          </form></th>
        </fieldset>";
      }
    ?>

  </body>
</html>
