<?php

  $contrasenaprin = (isset($_POST['contrasena']) && $_POST['contrasena'] )!= "" ? $_POST['contrasena'] : 'Coloque contraseña' ;
  $hola="hola";

  //Filtro 1
  $contcomunes = array("1234567890","0987654321","qwertyuiop","asdfghjklñ","zxcvbnm",
    "123456","654321","1234567","7654321","12345678","87654321","123456789","987654321",
    "starwars","Starwars","StarWars","dragon","Dragon","letmein","LetMeIn","password","contraseña","Password","Contraseña",
    "111111","222222","333333","444444","555555","666666","777777","888888",
    "999999","000000","qwerty","asdfgh","zxcvbn","sunshine","Sunshine", "iloveyou","ILoveYou","princess","Princess",
    "welcome","Welcome","football","Football","monkey","Monkey","abc123","abcdefg","123123","master","Master"
  );

  echo $contrasenaprin;

  foreach ($contcomunes as $pass1)
  {
    if ($pass1 == $contrasenaprin)
    {
      echo "su contraseña es insegura";
    }
  }
  echo "<br>";

  //Filtro 2
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
        var_dump( $presentamayus );
        echo "bien, su contraseña tiene mayúsculas";
        $haymayus = 1;
      }
    }
  }
  if($haymayus == 0)
  {
    echo "Se recomienda que su contraseña tenga mayúsculas";
  }

  //Filtro 3

?>
