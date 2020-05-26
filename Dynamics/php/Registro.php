<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>El Coyote Hambriento</title>
    <link rel="icon" href="../../Statics/Img/Logo.png">
    <link rel="stylesheet" href="../../Statics/css/Diseño.css">
  </head>
  <body>
    <?php
      if (isset($_POST['Registro']) && $_POST['Registro'] == "A") {
        echo "
          <form  action='../../Templates/Inicio.html' method='post'>
            <input type='submit' name='Regresar' value='Regresar'>
          </form>
          <fieldset class='aber'>
            <legend><h1>Regístrate</h1> </legend>
            <form  action='Registro.php' method='post'>
              <table class='transparente2'>
              <tr>
                <th>Nombre:</th>
                <th><input type='text' name='user'placeholder='Utilizar nombre real, plz' required></th>
              </tr>
              <tr>
                <th>Número de cuenta:</th>
                <th><input type='number' name='NC'  style='width : 170px;' min='000000001' max='999999999' placeholder='Sin guiones' required> </th>
              </tr>
                <th>Grupo: </th>
                <th>
                  <select name='Grupo' required>
                    <option selected value='0'></option>
                    <optgroup label='Cuarto'>
                      <option value='401'>401</option>
                      <option value='402'>402</option>
                      <option value='403'>403</option>
                     </optgroup>
                     <optgroup label='Quinto'>
                       <option value='501'>501</option>
                       <option value='502'>502</option>
                       <option value='503'>503</option>
                     </optgroup>
                     <optgroup label='Sexto'>
                       <option value='601'>601</option>
                       <option value='602'>602</option>
                       <option value='603'>603</option>
                     </optgroup>
                  </select>
                </th>
              </tr>
              <tr>
                <th>Contraseña:</th>
                <th><input type='password' name='pass' placeholder='Utilizar carácteres alfanuméricos, plz' required></th>
              </tr>
              <tr>
                <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
              </tr>
            </form>
          </fieldset>
        ";
      }
      elseif (isset($_POST['Registro']) && $_POST['Registro'] == "P") {
        echo "
          <fieldset class='aber'>
            <legend><h1>Regístrate</h1> </legend>
            <form  action='Registro.php' method='post'>
              <table class='transparente2'>
              <tr>
                <th>Nombre:</th>
                <th><input type='text' name='user'placeholder='Utilizar nombre real, plz' required></th>
              </tr>
              <tr>
                <th>RFC:</th>
                <th><input type='text' name='RFC'  style='width : 170px;' placeholder='Ejemplo que no me acuerdo' required> </th>
              </tr>
                <th>Colegio:</th>
                <th><input type='text' name='col'  style='width : 170px;' placeholder='Pos no se' required> </th>
              </tr>
              <tr>
                <th>Contraseña:</th>
                <th><input type='password' name='pass' placeholder='Utilizar carácteres alfanuméricos, plz' required></th>
              </tr>
              <tr>
                <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
              </tr>
            </form>
          </fieldset>
        ";
      }
      elseif (isset($_POST['Registro']) && $_POST['Registro'] == "T") {
        echo "
          <fieldset class='aber'>
            <legend><h1>Regístrate</h1> </legend>
            <form  action='Registro.php' method='post'>
              <table class='transparente2'>
              <tr>
                <th>Nombre:</th>
                <th><input type='text' name='user'placeholder='Utilizar nombre real, plz' required></th>
              </tr>
              <tr>
                <th>Número de trabajador:</th>
                <th><input type='number' name='NT'  style='width : 170px;' min='000000001' max='999999999' placeholder='Sin guiones' required> </th>
              </tr>
              <tr>
                <th>Contraseña:</th>
                <th><input type='password' name='pass' placeholder='Utilizar carácteres alfanuméricos, plz' required></th>
              </tr>
              <tr>
                <th colspan='2' style='text-align:center;'> <br> <input type='submit' name='Continuar' value='Continuar'></th>
              </tr>
            </form>
          </fieldset>
        ";
      }
      else {
        echo "
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
    ?>
  </body>
</html>
