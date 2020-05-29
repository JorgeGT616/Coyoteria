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
$mensaje = "Pio pio, por favor no me peguen xd";
$ciff = Cifrar($mensaje);
//$textoOriginal=Descifrar(Cifrar("textoOriginal"));
$desciff = Descifrar($ciff);
//echo $desciff;

echo "Mensaje Original: ".$mensaje."<br>";
echo "Mensaje Cifrado: ".$ciff."<br>";
echo "Mensaje Descifrado: ".$desciff."<br>";

?>
