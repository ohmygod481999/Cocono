<?php
  require_once('initialize.php');
  if (is_post_request()){
    $uname = $_POST['username'];
    $pwd = $_POST['password'];
    if ($account = check_login($uname,$pwd)){
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $uname;
      $_SESSION['password'] = $pwd;
      $_SESSION['privilege'] = $account['privilege'];

      switch ($account['privilege']) {
        case 'admin':
          //redirect_to(url_for('staff/courses_management.php'));
          redirect_to('/Cocono/view/staff/courses_management.php');
          break;
        case 'user':
          redirect_to('/Cocono/view/index.php');
          break;
        default:
          // code...
          break;
      }
    }
    else echo "invalid username or password";
  }
  else {
    exit;
  }
?>
