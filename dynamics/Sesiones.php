<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $usuario = (isset($_POST['user']) && $_POST['user'] != " ")? $_POST['user'] : "";
      $contra = (isset($_POST['pass']) && $_POST['pass'] != " ")? $_POST['pass'] : "";
      $conexion = mysqli_connect("localhost", "root", "", "coyoteriabase");
      if( !$conexion ){
        echo mysqli_conect_error();
        echo mysqli_conect_errno();
        exit();
      }
      else {
        $consulta = "SELECT NoCuenta  FROM Alumno WHERE NoCuenta='$usuario'";
        $respuesta= mysqli_query($conexion, $consulta);
        if($row=mysqli_fetch_array($respuesta)){
          $row = mysqli_fetch_array($respuesta);
          print_r($row);
          echo "aber";
          mysqli_close($conexion);
        }
        else {
          echo "anumames wuatafac";
        }
        /*else {
          $consulta = "SELECT RFC  FROM profesor_funcionario WHERE RFC='$usuario'";
          if(){
            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
          }
          else {
            $consulta = "SELECT NoSeguridadSocial  FROM trabajador WHERE NoSeguridadSocial='$usuario'";
            if(){
              mysqli_query($conexion, $consulta);
              mysqli_close($conexion);
            }
            else
          }
        }*/
      }
     ?>
  </body>
</html>
