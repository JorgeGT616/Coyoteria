<?php
//Esta wea es la que manda el archivo
function upload($temporal,$destino)
{
  if(file_exists($destino) != true)
  {
    echo "<br>El archivo ya existe";
    move_uploaded_file($temporal,$destino);
    echo "<img src='".$destino."' width='200'>";
  }
  else
  {
    echo "ya existe el archivo";
  }
}

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0)
{
  $nombre_arch = $_FILES['archivo']['name'];//Este es el nombre original del archivo
  //$tipo_arch = $_FILES['archivo']['type'];
  $nom_tmp_arch = $_FILES['archivo']['tmp_name'];//Este es el nombre temporal del archivo
  //$tam_arch = $_FILES['archivo']['size'];*/
  $ext = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);//Este te saca la extensión del archivo
  echo "<br>Recibí el archivo: ".$nombre_arch.
       //"<br>Del tipo: ".$tipo_arch.
       //"<br>Nombre Temporal: ".$nom_tmp_arch.
       //"<br>Tamaño: ".$tam_arch.
       "<br>Extensión: ".$ext."<br>";
  $carpeta_img = "../statics/img/";//esta es la ubicación a la que será mandado el archivo
  $destino = $carpeta_img.$nombre_arch;//Este es el nombre completo del archivo
  if($ext == ("png"||"jpg"||"jpeg"||"PNG"||"JPG"||"JPEG"))//verifica el formato
  {
    upload($nom_tmp_arch,$destino);//trae la función de enviar el archivo
  }
  else
  {
    echo "No es el formato que busco";
  }
}

?>
