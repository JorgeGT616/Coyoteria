<?php

define("HASH","sha256");
define("PASSWORD","Secure password, plz make ec¿verything s3cur3");
define("METHOD","aes-128-cbc");

function Cifrando($ocultar)
{
  $llave = openssl_digest(PASSWORD,HASH);
  $vec_len = openssl_cipher_iv_length(METHOD);
  $vec = openssl_random_pseudo_bytes($vec_len);
  $cifrado = openssl_encrypt($ocultar,METHOD,$llave,OPENSSL_RAW_DATA,$vec);
  $completo = base64_encode($vec.$cifrado);
  return $completo;
}

function Descifrando($cifradocomp)
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

$dato = "Caracoles"; //contraseña a cifrar se llama $dato
$paracif = Cifrando($dato);
//$textoOriginal=Descifrar(Cifrar("textoOriginal"));
$parades = Descifrando($paracif);
//echo $desciff;

echo "Mensaje Original: ".$dato."<br>";
echo "Mensaje Cifrado: ".$paracif."<br>";
echo "Mensaje Descifrado: ".$parades."<br>";
?>
