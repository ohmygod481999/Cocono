<?php
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
