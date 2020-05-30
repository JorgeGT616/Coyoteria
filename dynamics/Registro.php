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
      $conexion = mysqli_connect("localhost", "root", "", "Coyote");
      if( !$conexion ){
        echo mysqli_conect_error();
        echo mysqli_conect_errno();
        exit();
      }
      else {
        if (isset($_POST['Registro']) && $_POST['Registro'] == "A") {
          echo "
            <form  action='Registro.php' method='post'>
              <input type='submit' name='Regresar' value='Regresar'>
            </form>
            <fieldset class='aber'>
              <legend><h1>Regístrate</h1> </legend>
              <form  action='revision.php' method='post'>
                <table class='transparente2'>
                <tr>
                  <th>Nombre:</th>
                  <th>
                    <input type='text' name='Nombre' value='' placeholder = 'Ej: Andreo' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su nombre' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Paterno:</th>
                  <th>
                    <input type='text' name='Papellido' value='' placeholder = 'Ej: Chimal' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Materno:</th>
                  <th>
                    <input type='text' name='Mapellido' value='' placeholder = 'Ej: García' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido'>
                  </th>
                </tr>
                <tr>
                  <th>Número de cuenta:</th>
                  <th>
                    <input type='text' name='NumeroCuenta'  style='width : 170px;' placeholder = 'Ej: 318999909 (sin guiones)' title = 'El formato debe coincidir con el número de cuente (9 dígitos sin guiones)'
                    pattern = '^[0-9]{9}' required>
                  </th>
                </tr>
                  <th>Grupo: </th>
                  <th>
                    <select name='Grupo' required>
                      <option selected value='0'></option>
                      <optgroup label='Cuarto'>
                        <option value='401'>401</option>
                        <option value='402'>402</option>
                        <option value='403'>403</option>
                        <option value='404'>404</option>
                        <option value='405'>405</option>
                        <option value='406'>406</option>
                        <option value='407'>407</option>
                        <option value='408'>408</option>
                        <option value='409'>409</option>
                        <option value='410'>410</option>
                       </optgroup>
                       <optgroup label='Quinto'>
                         <option value='501'>501</option>
                         <option value='502'>502</option>
                         <option value='503'>503</option>
                         <option value='504'>504</option>
                         <option value='505'>505</option>
                         <option value='506'>506</option>
                         <option value='507'>507</option>
                         <option value='508'>508</option>
                         <option value='509'>509</option>
                         <option value='510'>510</option>
                       </optgroup>
                       <optgroup label='Sexto'>
                         <option value='601'>601</option>
                         <option value='602'>602</option>
                         <option value='603'>603</option>
                         <option value='604'>604</option>
                         <option value='605'>605</option>
                         <option value='606'>606</option>
                         <option value='607'>607</option>
                         <option value='608'>608</option>
                         <option value='609'>609</option>
                         <option value='610'>610</option>
                       </optgroup>
                    </select>
                  </th>
                </tr>
                <tr>
                  <th>Contraseña:</th>
                  <th>
                    <input type='password' name='contrasena' value='' placeholder ='*******' minlength='6' maxlength='16' required>
                  </th>
                </tr>
                <tr>
                  <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
                  <input type='hidden' name='tipo' value='A'>
                </tr>
              </form>
            </fieldset>
          ";
        }
        elseif (isset($_POST['Registro']) && $_POST['Registro'] == "P") {
          echo "
            <form  action='Registro.php' method='post'>
              <input type='submit' name='Regresar' value='Regresar'>
            </form>
            <fieldset class='aber'>
              <legend><h1>Regístrate</h1> </legend>
              <form action='revision.php' method='post'>
                <table class='transparente2'>
                <tr>
                  <th>Nombre:</th>
                  <th>
                    <input type='text' name='Nombre' value='' placeholder = 'Ej: Isauro' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su nombre' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Paterno:</th>
                  <th>
                    <input type='text' name='Papellido' value='' placeholder = 'Ej: Figueroa' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Materno:</th>
                  <th>
                    <input type='text' name='Mapellido' value='' placeholder = 'Ej: Rodríguez' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido'>
                  </th>
                </tr>
                <tr>
                  <th>RFC:</th>
                  <th>
                    <input type='text' name='rfc' value='' placeholder = 'Ej: FIRI8505137A3' title = 'El formato debe coincider con el de RFC'
                    pattern = '^[A-Z]{4}[0-9][0-9]([0][1-9]|[1][0-2])([0][1-9]|[1-2][0-9]|[3][0-1])[A-Z1-9]{3}' required>
                  </th>
                </tr>
                  <th>Colegio:</th>
                  <th>
                    <input type='text' name='col'  style='width : 170px;' placeholder='Ej: ENP 6 \"Antonio Caso\"' maxlength='50' required
                    title= 'Escriba el nombre del colegio al que pertenece'>
                  </th>
                </tr>
                <tr>
                  <th>Contraseña:</th>
                  <th>
                    <input type='password' name='contrasena' value='' placeholder ='*******' minlength='6' maxlength='16' required>
                  </th>
                </tr>
                <tr>
                  <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
                  <input type='hidden' name='tipo' value='P'>
                </tr>
              </form>
            </fieldset>
          ";
        }
        elseif (isset($_POST['Registro']) && $_POST['Registro'] == "T") {
          echo "
            <form  action='Registro.php' method='post'>
              <input type='submit' name='Regresar' value='Regresar'>
            </form>
            <fieldset class='aber'>
              <legend><h1>Regístrate</h1> </legend>
              <form  action='revision.php' method='post'>
                <table class='transparente2'>
                <tr>
                  <th>Nombre:</th>
                  <th>
                    <input type='text' name='Nombre' value='' placeholder = 'Ej: Isauro' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su nombre' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Paterno:</th>
                  <th>
                    <input type='text' name='Papellido' value='' placeholder = 'Ej: Figueroa' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido' required>
                  </th>
                </tr>
                <tr>
                  <th>Apellido Materno:</th>
                  <th>
                    <input type='text' name='Mapellido' value='' placeholder = 'Ej: Rodríguez' maxlength='25'
                    pattern = '^[A-Za-zá-úÁ-Úä-üÄ-Ü][A-Za-zá-úÁ-Úä-üÄ-Ü\- ]*' title ='Coloque su apellido'>
                  </th>
                </tr>
                <tr>
                  <th>Número de trabajador:</th>
                  <th>
                    <input type='text' name='numtrab'  style='width : 170px;' placeholder = 'Ej: 318999 (sin guiones)' title = 'El formato debe coincidir con el número de cuente (9 dígitos sin guiones)'
                    pattern = '^[0-9]{6}' required>
                  </th>
                </tr>
                <tr>
                  <th>Contraseña:</th>
                  <th>
                    <input type='password' name='contrasena' value='' placeholder ='*******' minlength='6' maxlength='16' required>
                  </th>
                </tr>
                <tr>
                  <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
                  <input type='hidden' name='tipo' value='T'>
                </tr>
              </form>
            </fieldset>
          ";
        }
        else {
          echo "
            <form  action='../Templates/Inicio.html' method='post'>
              <input type='submit' name='Regresar' value='Regresar'>
            </form>
            <fieldset class='aber'>
              <legend><h1>Regístrate</h1> </legend>
              <form  action='Registro.php' method='post'>
                <table class='transparente'>
                  <tr>
                    <th><h3>¿Qué tipo de usuario de eres?</h3></th>
                    <th><input type='Radio' name='Registro' value='A'>Alumno</th>
                    <th><input type='Radio' name='Registro' value='P'>Profesor</th>
                    <th><input type='Radio' name='Registro' value='T'>Trabajador</th>
                  </tr>
                  <tr>
                    <th colspan='4'><input type='submit' name='Continuar' value='Continuar'> </th>
                  </tr>
                </table>
              </form>
            </fieldset>
          ";
        }
        mysqli_close($conexion);
      }
    ?>
  </body>
</html>
