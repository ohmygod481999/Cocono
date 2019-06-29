<?php
  session_start();
  session_unset();
  session_destroy();
  ob_start();
  header("location: ../view/index.php");
  ob_end_flush();
?>
