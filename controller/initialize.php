<?php
  session_start();
  define("CONTROLLER_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(CONTROLLER_PATH));
  define("SHARED_PATH", CONTROLLER_PATH . '/shared');
  define("MODELS_PATH", PROJECT_PATH . '/models');
  define("VIEWS_PATH", PROJECT_PATH . '/view');
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/view') + 5;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);
  require_once('functions.php');
  require_once(MODELS_PATH . '/database.php');
  require_once(MODELS_PATH . '/query_functions.php');
  $db = db_connect();
?>
