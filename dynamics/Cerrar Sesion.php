<?php
  session_name("ElCoyote");
  session_id("3141592653");
  session_start();
  session_unset();
  session_destroy();
  header("Location: Inicio Sesion.php")
?>
