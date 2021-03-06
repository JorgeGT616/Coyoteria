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
    session_name("ElCoyote");
    session_id("3141592653");
    session_start();
    if (isset($_SESSION['nombre'])) {
      header('Location: catalogo.php');
    }
    else {
      define("HASH","sha256");
      define("PASSWORD","Secure password, plz make ec¿verything s3cur3");
      define("METHOD","aes-128-cbc");
      //funcion de cifrado para las contraseñas
      function Cifrado($ocultar)
      {
        $llave = openssl_digest(PASSWORD,HASH);
        $vec_len = openssl_cipher_iv_length(METHOD);
        $vec = openssl_random_pseudo_bytes($vec_len);
        $cifrado = openssl_encrypt($ocultar,METHOD,$llave,OPENSSL_RAW_DATA,$vec);
        //Integración del cifrado con el vector de inicialización
        $completo = base64_encode($vec.$cifrado);
        return $completo;
      }
      //función de descifrado
      function Descifrado($cifradocomp)
      {
        $cifradocomp=base64_decode($cifradocomp);
        $vec_len= openssl_cipher_iv_length(METHOD);
        $vec= substr($cifradocomp,0,$vec_len);
        $cifrado = substr($cifradocomp,$vec_len);
        $llave=openssl_digest(PASSWORD,HASH);
        //Descifrado del mensaje
        $parades=openssl_decrypt($cifrado,METHOD,$llave,OPENSSL_RAW_DATA,$vec);
        return $parades;
      }
        //Traida y protección de la información del usuario para establecer variables
        if ((isset($_POST['user']) && $_POST['user'] != " ") && (isset($_POST['pass']) && $_POST['pass'] != " ")) {
          $usuario = htmlentities($_POST['user']);
          $usuario = strip_tags($usuario);
          $contra = htmlentities($_POST['pass']);
          $contra = strip_tags($contra);
          $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
          //Verificación de la conexión
          if( !$conexion ){
            echo mysqli_conect_error();
            echo mysqli_conect_errno();
            exit();
          }
          else {
            //Acciones solo tras confirmada la conexión
            $consulta = "SELECT NoCuenta FROM alumno WHERE NoCuenta='$usuario'";
            //$consulta2 = mysqli_real_escape_string($conexion, $consulta);
            $respuesta= mysqli_query($conexion, $consulta);
            if($row=mysqli_fetch_array($respuesta)){
              //Consulta a la base de datos
              $consulta = "SELECT contrasena, nombre FROM alumno WHERE NoCuenta='$usuario'";
              $consulta2 = mysqli_real_escape_string($conexion, $consulta);
              $respuesta = mysqli_query($conexion, $consulta2);
              //Intercambio de la iformación como cadena
              $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
              $hasheo = $row[0];
              //Verificación de la contraseña
              $deshasheo=password_verify($contra,$hasheo);
              if ($deshasheo==$contra) {
                $nombre=$row[1];
                $nombre=Descifrado($nombre);
                session_name("ElCoyote");
                session_id("3141592653");
                session_start();
                $_SESSION['nombre'] = $nombre;
                $_SESSION['usuario'] = $usuario;
                header("Location: catalogo.php");
              }
              else {
                echo "
                <form  action='Inicio Sesion.php' method='post'>
                  <input type='submit' name='Regresar' value='Regresar'>
                </form>
                <fieldset class='aber'>
                  <legend><h1>Regístrate</h1> </legend>
                  <form  action='Inicio Sesion.php' method='post'>
                    <table class='transparente'>
                      <tr>
                        <th>Contraseña incorrecta</th>
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
              //Consulta específica para docentes
              $consulta = "SELECT RFC FROM profesor_funcionario WHERE RFC='$usuario'";
              //$consulta2 = mysqli_real_escape_string($conexion, $consulta);
              $respuesta= mysqli_query($conexion, $consulta);
              if($row=mysqli_fetch_array($respuesta)){
                $consulta = "SELECT contrasena, nombre FROM profesor_funcionario WHERE RFC='$usuario'";
                //$consulta2 = mysqli_real_escape_string($conexion, $consulta);
                $respuesta= mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                $hasheo = $row[0];
                $deshasheo=password_verify($contra,$hasheo);
                //Inicio de sesion para profesor y funcionario
                if ($deshasheo==$contra) {
                  $nombre=$row[1];
                  $nombre=Descifrado($nombre);
                  session_name("ElCoyote");
                  session_id("3141592653");
                  session_start();
                  $_SESSION['nombre'] = $nombre;
                  $_SESSION['usuario'] = $usuario;
                  header("Location: catalogo.php");
                }
                else {
                  echo "
                  <form  action='Inicio Sesion.php' method='post'>
                    <input type='submit' name='Regresar' value='Regresar'>
                  </form>
                  <fieldset class='aber'>
                    <legend><h1>Regístrate</h1> </legend>
                    <form  action='Inicio Sesion.php' method='post'>
                      <table class='transparente'>
                        <tr>
                          <th>Contraseña incorrecta</th>
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
                //Consulta de información especifica para trabajadores
                $consulta = "SELECT NoSeguridadSocial FROM trabajador WHERE NoSeguridadSocial='$usuario'";
                //$consulta2 = mysqli_real_escape_string($conexion, $consulta);
                $respuesta= mysqli_query($conexion, $consulta2);
                if($row=mysqli_fetch_array($respuesta)){
                  $consulta = "SELECT contrasena, nombre FROM trabajador WHERE NoSeguridadSocial=''";
                  //$consulta2 = mysqli_real_escape_string($conexion, $consulta);
                  $respuesta= mysqli_query($conexion, $consulta);
                  $row = mysqli_fetch_array($respuesta, MYSQLI_NUM);
                  $hasheo = $row[0];
                  //Verificacion de la contraseña
                  $deshasheo=password_verify($contra,$hasheo);
                  if ($deshasheo==$contra) {
                    $nombre=$row[1];
                    $nombre=Descifrado($nombre);
                    session_name("ElCoyote");
                    session_id("3141592653");
                    session_start();
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['usuario'] = $usuario;
                    header("Location: catalogo.php");
                  }
                  else {
                    echo "Contraseña incorrecta";
                  }
                  mysqli_close($conexion);
                }
                else {
                  echo "
                  <form  action='Inicio Sesion.php' method='post'>
                    <input type='submit' name='Regresar' value='Regresar'>
                  </form>
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
          echo "
          <form  action='Inicio.php' method='post'>
            <input type='submit' name='Regresar' value='Regresar'>
          </form>
          <fieldset class='aber'>
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
      }
    ?>
  </body>
</html>
