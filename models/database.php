<?php
  require_once("db_credentials.php");
  function db_connect(){
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    return $connection;
  }

  function db_disconnect(){
    if (isset($connection)){
      mysqli_close($connection);
    }
  }

  function confirm_db_connect(){
    if(mysqli_connect_errono()){
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

?>
