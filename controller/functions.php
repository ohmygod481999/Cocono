<?php
  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }
  function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  function check_login($usrn,$pwd){
    $accs_set = get_all_accs();
    while ($acc = mysqli_fetch_assoc($accs_set)) {
      if ($usrn == $acc['username'] && $pwd==$acc['password']) return $acc;
    }
    return false;
  }
  function is_logged_in(){
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) return true;
    return false;
  }

  function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }

  function check_logged_in_as_admin(){
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['privilege'] == 'admin'){
      return true;
    }
    else{
      echo $_SESSION['loggedin'] . " " . $_SESSION['privilege'];
      echo "Please go back and log in with admin user</br>";
      echo url_for('index.php');
      echo "<a href='" .url_for('index.php') . "'>login </a> ";
      exit;
    }
  }
?>
