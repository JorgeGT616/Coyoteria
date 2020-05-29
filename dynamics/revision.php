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
      /*$mensaje = "Pio pio, por favor no me peguen xd";
      $ciff = Cifrar($mensaje);
      //$textoOriginal=Descifrar(Cifrar("textoOriginal"));
      $desciff = Descifrar($ciff);
      //echo $desciff;

      echo "Mensaje Original: ".$mensaje."<br>";
      echo "Mensaje Cifrado: ".$ciff."<br>";
      echo "Mensaje Descifrado: ".$desciff."<br>";*/

      if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
        $contrasenaprin = (isset($_POST['contrasena']) && $_POST['contrasena'] != "") ? $_POST['contrasena'] : 'Coloque contraseña' ;

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
          $conexion = mysqli_connect("localhost", "root", "", "Coyote");
          if( !$conexion ){
            echo mysqli_conect_error();
            echo mysqli_conect_errno();
            exit();
          }
          else {
            if (isset($_POST['tipo']) && $_POST['tipo'] == "A") {
              $nombre = (isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido";
              $papellido = (isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido";
              $mapellido = (isset($_POST['Mapellido']))? $_POST['Mapellido'] : "";
              $grupo = (isset($_POST['Grupo']) && $_POST['Grupo'] != " ")? $_POST['Grupo'] : "0";
              if (isset($_POST['NumeroCuenta']) && $_POST['NumeroCuenta'] != " ") {
                $numcuenta = $_POST['NumeroCuenta'];
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = $_POST['contrasena'];
                $pass = Cifrar($pass);
              }
              if (isset($numcuenta) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $consulta = "INSERT INTO alumno (NoCuenta, Nombre, Grupo, Contrasena) VALUES ('$numcuenta', '$nombre', '$grupo', '$pass')";
                mysqli_query($conexion, $consulta);
                header("Location: Welcome.php");
              }
            }
            elseif (isset($_POST['tipo']) && $_POST['tipo'] == "P") {
              $nombre = (isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido";
              $papellido = (isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido";
              $mapellido = (isset($_POST['Mapellido']))? $_POST['Mapellido'] : "";
              $col = (isset($_POST['col']) && $_POST['col'] != " ")? $_POST['col'] : "Desconocido";
              if (isset($_POST['rfc']) && $_POST['rfc'] != " ") {
                $rfc = $_POST['rfc'];
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = $_POST['contrasena'];
                $pass = Cifrar($pass);
              }
              if (isset($rfc) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $consulta = "INSERT INTO profesor_funcionario (RFC, Nombre, Colegio, Contrasena) VALUES ('$rfc', '$nombre', '$col', '$pass')";
                mysqli_query($conexion, $consulta);
                header("Location: Welcome.php");
              }
            }
            elseif (isset($_POST['tipo']) && $_POST['tipo'] == "T") {
              $nombre = (isset($_POST['Nombre']) && $_POST['Nombre'] != " ")? $_POST['Nombre'] : "Desconocido";
              $papellido = (isset($_POST['Papellido']) && $_POST['Papellido'] != " ")? $_POST['Papellido'] : "Desconocido";
              $mapellido = (isset($_POST['Mapellido']))? $_POST['Mapellido'] : "";
              if (isset($_POST['numtrab']) && $_POST['numtrab'] != " ") {
                $numtrab = $_POST['numtrab'];
              }
              if (isset($_POST['contrasena']) && $_POST['contrasena'] != "") {
                $pass = $_POST['contrasena'];
                $pass = Cifrar($pass);
              }
              if (isset($numtrab) && isset($pass)) {
                $nombre.=" ".$papellido." ".$mapellido;
                $consulta = "INSERT INTO trabajador (NoSeguridadSocial, Nombre, Contrasena) VALUES ('$numtrab', '$nombre', '$pass')";
                mysqli_query($conexion, $consulta);
                header("Location: Welcome.php");
              }
            }
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
