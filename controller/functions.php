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

  function check_user($usrn,$pwd){
    $accs_set = get_all_accs();
    while ($acc = mysqli_fetch_assoc($accs_set)) {
      if ($usrn == $acc['username'] && $pwd==$acc['password']) return true;
    }
    return false;
  }
?>
