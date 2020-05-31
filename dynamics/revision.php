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
      define("HASH","sha256");
      define("PASSWORD","Secure password, plz make ec¿verything s3cur3");
      define("METHOD","aes-128-cbc");

      function Cifrado($ocultar)
      {
        $llave = openssl_digest(PASSWORD,HASH);
        $vec_len = openssl_cipher_iv_length(METHOD);
        $vec = openssl_random_pseudo_bytes($vec_len);
        $cifrado = openssl_encrypt($ocultar,METHOD,$llave,OPENSSL_RAW_DATA,$vec);
        $completo = base64_encode($vec.$cifrado);
        return $completo;
      }

      function Descifrado($cifradocomp)
      {
        $cifradocomp=base64_decode($cifradocomp);
        $vec_len= openssl_cipher_iv_length(METHOD);
        $vec= substr($cifradocomp,0,$vec_len);
        $cifrado = substr($cifradocomp,$vec_len);
        $llave=openssl_digest(PASSWORD,HASH);
        $parades=openssl_decrypt
        ($cifrado,METHOD,$llave,OPENSSL_RAW_DATA,$vec);
        return $parades;
      }
      /*$mensaje = "Pio pio, por favor no me peguen xd";
      $ciff = Cifrar($mensaje);
      //$textoOriginal=Descifrar(Cifrar("textoOriginal"));
      $desciff = Descifrar($ciff);
      //echo $desciff;

      echo "Mensaje Original: ".$mensaje."<br>";
      echo "Mensaje Cifrado: ".$ciff."<br>";
      echo "Mensaje Descifrado: ".$desciff."<br>";*/

      if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
        $contrasenaprin = htmlentities((isset($_POST['contrasena']) && $_POST['contrasena'] != "") ? $_POST['contrasena'] : 'Coloque contraseña' );
        $contrasenaprin = strip_tags($contrasenaprin);
        $resp="Okay";
        //Filtro 1
        $contcomunes = array("1234567890","0987654321","qwertyuiop","asdfghjklñ","zxcvbnm",
          "123456","654321","1234567","7654321","12345678","87654321","123456789","987654321",
          "starwars","Starwars","StarWars","dragon","Dragon","letmein","LetMeIn","password","contraseña","Password","Contraseña",
          "111111","222222","333333","444444","555555","666666","777777","888888",
          "999999","000000","qwerty","asdfgh","zxcvbn","sunshine","Sunshine", "iloveyou","ILoveYou","princess","Princess",
          "welcome","Welcome","football","Football","monkey","Monkey","abc123","abcdefg","123123","master","Master"
        );
        foreach ($contcomunes as $pass1)
        {
          if ($pass1 == $contrasenaprin)
          {
            $resp= "Su contraseña es insegura";
          }
        };

        //Filtro 2
        if ($resp!="Su contraseña es insegura") {
          $mayus = array("A","B","C","D","E","F","G","H","I","J","K","L",
            "M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","y","Z");
          $minus = array("a","b","c","d","e","f","g","h","i","j","k","l",
            "m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
          $numeros = array("1","2","3","4","5","6","7","8","9","0");
          $especiales = array("!","@","#","$","%","&","/","(",")","=","?","¿",
            "¡","<",">","´","¨","[","]","{","}","+","*","-",",",".");

          $haymayus = 0;
          foreach($mayus as $evalu)
          {
            if($haymayus == 0)
            {
              $presentamayus = strpos($contrasenaprin,$evalu);
              if ($presentamayus != false)
              {
                $resp= "¡Bien! Su contraseña tiene mayúsculas";
                $haymayus = 1;
              }
            }
          }
          if($haymayus == 0)
          {
            $resp = "Se recomienda que su contraseña tenga mayúsculas";
          }
        }
        if ($resp== "¡Bien! Su contraseña tiene mayúsculas") {
          $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
          if( !$conexion ){
            echo mysqli_conect_error();
            echo mysqli_conect_errno();
            exit();
          }
          else {
            if (isset($_POST['tipo']) && $_POST['tipo'] == "A") {
              $nombre = htmlentities((isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido");
              $nombre = strip_tags($nombre);
              $papellido = htmlentities((isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido");
              $papellido = strip_tags($papellido);
              $mapellido = htmlentities((isset($_POST['Mapellido']))? $_POST['Mapellido'] : "");
              $mapellido = strip_tags($mapellido);
              $grupo = htmlentities((isset($_POST['Grupo']) && $_POST['Grupo'] != " ")? $_POST['Grupo'] : "0");
              $grupo = strip_tags($grupo);
              if (isset($_POST['NumeroCuenta']) && $_POST['NumeroCuenta'] != " ") {
                $numcuenta = htmlentities($_POST['NumeroCuenta']);
                $numcuenta = strip_tags($numcuenta);
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = htmlentities($_POST['contrasena']);
                $pass = strip_tags($pass);
                $pass  = password_hash($pass,PASSWORD_BCRYPT);
              }
              if (isset($numcuenta) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $nombre=Cifrado($nombre);
                $consulta2 = "SELECT NoCuenta FROM alumno WHERE NoCuenta='$numcuenta'";
                $respuesta= mysqli_query($conexion, $consulta2);
                if($row=mysqli_fetch_array($respuesta)){
                  $resp = "El numero de cuenta ya tiene un usuario";
                  echo "
                    <fieldset class='aber'>
                      <legend><h1>Advertencia</h1> </legend>
                      <table class='transparente'>
                        <tr>
                          <th>".$resp."</th>
                        </tr>
                        <tr>
                          <th>
                            <form action='Registro.php' method='post'>
                              <input type='submit' name='Regresar' value='Regresar'>
                            </form>
                          </th>
                        </tr>
                      </table>
                    </fieldset>
                  ";
                }
                else{
                  $consulta = "INSERT INTO alumno (NoCuenta, Nombre, Grupo, Contrasena) VALUES ('$numcuenta', '$nombre', '$grupo', '$pass')";
                  $consulta2= mysqli_real_escape_string($vinculo,$consulta);
                  mysqli_query($conexion, $consulta2);
                  $consulta = "INSERT INTO cliente (NoCuenta) VALUES ('$numcuenta')";
                  mysqli_query($conexion, $consulta2);
                  $nombre=Descifrado($nombre);
                  session_name("ElCoyote");
                  session_id("3141592653");
                  session_start();
                  $usuario=$numcuenta;
                  $_SESSION['nombre'] = $nombre;
                  $_SESSION['usuario'] = $usuario;
                  echo $usuario;
                  header("Location: catalogo.php");
                }
              }
            }
            elseif (isset($_POST['tipo']) && $_POST['tipo'] == "P") {
              $nombre = htmlentities((isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido");
              $nombre = strip_tags($nombre);
              $papellido = htmlentities((isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido");
              $papellido = strip_tags($papellido);
              $mapellido = htmlentities((isset($_POST['Mapellido']))? $_POST['Mapellido'] : "");
              $mapellido = strip_tags($mapellido);
              $col = htmlentities((isset($_POST['col']) && $_POST['col'] != " ")? $_POST['col'] : "Desconocido");
              $col = strip_tags($col);
              if (isset($_POST['rfc']) && $_POST['rfc'] != " ") {
                $rfc = htmlentities($_POST['rfc']);
                $rfc = strip_tags($rfc);
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = htmlentities($_POST['contrasena']);
                $pass = strip_tags($pass);
                $pass  = password_hash($pass,PASSWORD_BCRYPT);
              }
              if (isset($rfc) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $nombre=Cifrado($nombre);
                $consulta2 = "SELECT RFC FROM profesor_funcionario WHERE RFC='$rfc'";
                $respuesta= mysqli_query($conexion, $consulta2);
                if($row=mysqli_fetch_array($respuesta)){
                  $resp = "El RFC ya pertenece a un usuario";
                  echo "
                    <fieldset class='aber'>
                      <legend><h1>Advertencia</h1> </legend>
                      <table class='transparente'>
                        <tr>
                          <th>".$resp."</th>
                        </tr>
                        <tr>
                          <th>
                            <form action='Registro.php' method='post'>
                              <input type='submit' name='Regresar' value='Regresar'>
                            </form>
                          </th>
                        </tr>
                      </table>
                    </fieldset>
                  ";
                }
                else {
                  $consulta = "INSERT INTO profesor_funcionario (RFC, Nombre, Colegio, Contrasena) VALUES ('$rfc', '$nombre', '$col', '$pass')";
                  mysqli_query($conexion, $consulta);
                  $consulta = "INSERT INTO  cliente (RFC) VALUES ('$rfc')";
                  mysqli_query($conexion, $consulta);
                  $nombre=Descifrado($nombre);
                  session_name("ElCoyote");
                  session_id("3141592653");
                  session_start();
                  $usuario=$rfc;
                  $_SESSION['nombre'] = $nombre;
                  $_SESSION['usuario'] = $usuario;
                  header("Location: catalogo.php");
                }
              }
            }
            elseif (isset($_POST['tipo']) && $_POST['tipo'] == "T") {
              $nombre = htmlentities((isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido");
              $nombre = strip_tags($nombre);
              $papellido = htmlentities((isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido");
              $papellido = strip_tags($papellido);
              $mapellido = htmlentities((isset($_POST['Mapellido']))? $_POST['Mapellido'] : "");
              $mapellido = strip_tags($mapellido);
              if (isset($_POST['numtrab']) && $_POST['numtrab'] != " ") {
                $numtrab = htmlentities($_POST['numtrab']);
                $numtrab = strip_tags($numtrab);
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = htmlentities($_POST['contrasena']);
                $pass = strip_tags($pass);
                $pass  = password_hash($pass,PASSWORD_BCRYPT);
              }
              if (isset($numtrab) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $nombre=Cifrado($nombre);
                $consulta2 = "SELECT NoSeguridadSocial FROM trabajador WHERE NoSeguridadSocial='$numtrab'";
                $respuesta= mysqli_query($conexion, $consulta2);
                if($row=mysqli_fetch_array($respuesta)){
                  $resp = "El Número de Trabajador ya pertenece a un usuario";
                  echo "
                    <fieldset class='aber'>
                      <legend><h1>Advertencia</h1> </legend>
                      <table class='transparente'>
                        <tr>
                          <th>".$resp."</th>
                        </tr>
                        <tr>
                          <th>
                            <form action='Registro.php' method='post'>
                              <input type='submit' name='Regresar' value='Regresar'>
                            </form>
                          </th>
                        </tr>
                      </table>
                    </fieldset>
                  ";
                }
                else {
                  $consulta = "INSERT INTO trabajador (NoSeguridadSocial, Nombre, Contrasena) VALUES ('$numtrab', '$nombre', '$pass')";
                  mysqli_query($conexion, $consulta);
                  $consulta = "INSERT INTO  cliente (NoSeguridadSocial) VALUES ('$numtrab')";
                  mysqli_query($conexion, $consulta);
                  $nombre=Descifrado($nombre);
                  session_name("ElCoyote");
                  session_id("3141592653");
                  session_start();
                  $usuario=$numtrab;
                  $_SESSION['nombre'] = $nombre;
                  $_SESSION['usuario'] = $usuario;
                  header("Location: catalogo.php");
                }
              }
            }
            mysqli_close($conexion);
          }
        }
        else {
          echo "
            <fieldset class='aber'>
              <legend><h1>Advertencia</h1> </legend>
              <table class='transparente'>
                <tr>
                  <th>".$resp."</th>
                </tr>
                <tr>
                  <th>
                    <form action='Registro.php' method='post'>
                      <input type='submit' name='Regresar' value='Regresar'>
                    </form>
                  </th>
                </tr>
              </table>
            </fieldset>
          ";
        }
      }
      else {
        header("Location: Registro.php");
      }
    ?>
  </body>
</html>
