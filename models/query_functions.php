<?php
  function get_courses(){
    global $db;

    $query = "SELECT * FROM `course`;";
    $result = mysqli_query($db,$query);

    return $result;
  }

?>
