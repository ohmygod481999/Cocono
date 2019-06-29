<?php
  function insert_acc($acc){
    global $db;

    $username = $acc['username'];
    $password = $acc['password'];
    $privilege = $acc['privilege'];
    $name_user = $acc['name_user'];
    $email = $acc['email'];
    $phone_number = $acc['phone_number'];

    $query = "INSERT INTO `account` (`username`, `password`, `privilege`, `name_user`, `email`, `phone_number`) VALUES ('$username','$password','$privilege','$name_user','$email','$phone_number');";
    $result = mysqli_query($db,$query);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function get_all_accs(){
    global $db;

    $query = "SELECT * FROM `account`;";
    $result = mysqli_query($db,$query);

    return $result;
  }

  function delete_course($id){
      global $db;

      $query = "DELETE FROM `course` WHERE id_co = '$id' LIMIT 1";
      $result = mysqli_query($db,$query);

      if($result) {
        return true;
      } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
  }


  function update_course($course){
    global $db;

    $id_co = $course['id_co'];
    $id_ca = $course['id_ca'];
    $name_co = $course['name_co'];
    $length_co = $course['length_co'];
    $num_lecture = $course['num_lecture'];
    $num_quizzes = $course['num_quizzes'];
    $path_pic = $course['path_pic'];
    $price = $course['price'];
    $id_te = $course['id_te'];
    $overview_co = $course['overview_co'];
    $requirement_co = $course['requirement_co'];

    $query = "UPDATE `course` SET id_ca='$id_ca', name_co='$name_co', length_co= '$length_co', num_lecture='$num_lecture', num_quizzes = '$num_quizzes', path_pic = '$path_pic', price='$price', id_te = '$id_te',overview_co = '$overview_co', requirement_co='$requirement_co' WHERE id_co = '$id_co'";
    $result = mysqli_query($db,$query);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function insert_course($course){
    global $db;

    $id_ca = $course['id_ca'];
    $name_co = $course['name_co'];
    $length_co = $course['length_co'];
    $num_lecture = $course['num_lecture'];
    $num_quizzes = $course['num_quizzes'];
    $path_pic = $course['path_pic'];
    $price = $course['price'];
    $id_te = $course['id_te'];
    $overview_co = $course['overview_co'];
    $requirement_co = $course['requirement_co'];

    $query = "INSERT INTO `course` (`id_co`, `id_ca`, `name_co`, `length_co`, `num_lecture`, `num_quizzes`, `path_pic`, `price`, `id_te`, `overview_co`, `requirement_co`) VALUES (NULL, '$id_ca','$name_co','$length_co','$num_lecture','$num_quizzes','$path_pic','$price','$id_te','$overview_co','$requirement_co');";
    $result = mysqli_query($db,$query);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function get_categories(){
    global $db;

    $query = "SELECT * FROM `category`;";
    $result = mysqli_query($db,$query);

    return $result;
  }

   function count_course_category($id){
     global $db;

     $query = "SELECT COUNT(id_ca) as count FROM course WHERE id_ca =" . $id;
     $result = mysqli_query($db,$query);
     $count = mysqli_fetch_assoc($result);
     return $count['count'];
   }

  function get_courses(){
    global $db;

    $query = "SELECT * FROM `course`;";
    $result = mysqli_query($db,$query);

    return $result;
  }

  function get_teachers(){
    global $db;

    $query = "SELECT * FROM `teacher`;";
    $result = mysqli_query($db,$query);

    return $result;
  }



  function get_course_by_id($id){
    global $db;

    $query = "SELECT * FROM `course` WHERE id_co =" . $id;
    $result = mysqli_query($db,$query);
    $course = mysqli_fetch_assoc($result);
    return $course;
  }

  function get_courses_by_id_teacher($id){
    global $db;

    $query = "SELECT * FROM `course` WHERE id_te =" . $id;
    $result = mysqli_query($db,$query);
    return $result;
  }

  function get_courses_by_id_category($id){
    global $db;

    $query = "SELECT * FROM `course` WHERE id_ca =" . $id;
    $result = mysqli_query($db,$query);
    return $result;
  }

  function get_category_by_id($id){
    global $db;

    $query = "SELECT * FROM `category` WHERE id_ca =" . $id;
    $result = mysqli_query($db,$query);
    $category = mysqli_fetch_assoc($result);
    return $category;
  }

  function get_teacher_by_id($id){
    global $db;

    $query = "SELECT * FROM `teacher` WHERE id_te =" . $id;
    $result = mysqli_query($db,$query);
    $teacher = mysqli_fetch_assoc($result);
    return $teacher;
  }





?>
