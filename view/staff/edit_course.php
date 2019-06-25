<?php require_once("../../controller/initialize.php"); ?>
<?php if(is_get_request()){
    $id = $_GET['id'] ?? '1';
    $course = get_course_by_id($id);
    $category = get_category_by_id($course['id_ca']);
    $option['edit'] = $_GET['edit'] ?? false;
    $option['delete'] = $_GET['delete'] ?? false;
    if($option['edit']){
      $categories_set = get_categories();
      $teachers_set = get_teachers();
    }
    elseif ($option['delete']) {
      $result = delete_course($id);
      if ($result == true){
        redirect_to('courses_management.php');
      }
      else{
        $errors = $result;
      }
    }
}
?>

<?php
  if(is_post_request()){
    $new_course = [];
    $new_course['id_co'] = $_POST['id_co'];
    $new_course['id_ca'] = $_POST['id_ca'];
    $new_course['name_co'] = $_POST['name_co'];
    $new_course['length_co'] = $_POST['length_co'];
    $new_course['num_lecture'] = $_POST['num_lecture'];
    $new_course['num_quizzes'] = $_POST['num_quizzes'];
    $new_course['path_pic'] = $_POST['path_pic'];
    $new_course['price'] = $_POST['price'];
    $new_course['id_te'] = $_POST['id_te'];
    $new_course['overview_co'] = $_POST['overview_co'];
    $new_course['requirement_co'] = $_POST['requirement_co'];

    $result = update_course($new_course);
    if ($result == true){
     redirect_to('edit_course.php?id='.$new_course['id_co']);
    }
    else {
      $errors = $result;
    }
  }
?>
<?php
  $courses_set = get_courses();

?>
  <?php require_once(SHARED_PATH . '/staff_header.php'); ?>

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(../images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Edit course</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../#">Staff</a></li>
                                <li class="breadcrumb-item"><a href="../#">Courses management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit course</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES SINGEl PART START ======-->

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3><?php echo $course["name_co"]; ?></h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="../images/course/teacher/t-1.jpg" alt="Teacher">
                                        </div>
                                        <div class="name">
                                            <span>Giảng viên</span>
                                            <h6><?php echo get_teacher_by_id($course["id_te"])['name_te']; ?></h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category">
                                        <span>Thể loại</span>
                                        <h6><?php echo $category['name_ca']; ?> </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="review">
                                        <span>Đánh giá</span>
                                        <ul>
                                            <li><a href="../#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="../#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="../#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="../#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="../#"><i class="fa fa-star"></i></a></li>
                                            <li class="rating">(20 Đánh giá)</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- course terms -->

                        <div class="corses-singel-image pt-50">
                            <img src="../<?php echo $course["path_pic"]; ?>" alt="Courses">
                        </div> <!-- corses singel image -->

                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Chương trình</a>
                                </li>
                                <li class="nav-item">
                                    <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Người hướng dẫn</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>Tổng quan về khóa học</h6>
                                            <p><?php echo $course['overview_co']; ?></p>
                                        </div>
                                        <div class="singel-description pt-40">
                                            <h6>Yêu cầu</h6>
                                            <p><?php echo $course['requirement_co']; ?></p>
                                        </div>
                                    </div> <!-- overview description -->
                                </div>
                                <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                    <div class="curriculam-cont">
                                        <div class="title">
                                            <h6>Learn basis javascirpt Lecture Started</h6>
                                        </div>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <a href="../#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.1</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingTow">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseTow" aria-expanded="true" aria-controls="collapseTow">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.2</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapseTow" class="collapse" aria-labelledby="headingTow" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.3</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingFore">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseFore" aria-expanded="false" aria-controls="collapseFore">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.4</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="collapseFore" class="collapse" aria-labelledby="headingFore" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingFive">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.5</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingSix">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.6</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="headingSeven">
                                                    <a href="../#" data-toggle="collapse" class="collapsed" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Lecture 1.7</span></li>
                                                            <li><span class="head">What is javascirpt</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- curriculam cont -->
                                </div>
                                <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                    <div class="instructor-cont">
                                        <div class="instructor-author">
                                            <div class="author-thum">
                                                <img src="../images/instructor/i-1.jpg" alt="Instructor">
                                            </div>
                                            <div class="author-name">
                                                <a href="../#"><h5>Sumon Hasan</h5></a>
                                                <span>Senior WordPress Developer</span>
                                                <ul class="social">
                                                    <li><a href="../#"><i class="fa fa-facebook-f"></i></a></li>
                                                    <li><a href="../#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="../#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="../#"><i class="fa fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="instructor-description pt-25">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga ratione molestiae unde provident quibusdam sunt, doloremque. Error omnis mollitia, ex dolor sequi. Et, quibusdam excepturi. Animi assumenda, consequuntur dolorum odio sit inventore aliquid, optio fugiat alias. Veritatis minima, dicta quam repudiandae repellat non sit, distinctio, impedit, expedita tempora numquam?</p>
                                        </div>
                                    </div> <!-- instructor cont -->
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-cont">
                                        <div class="title">
                                            <h6>Student Reviews</h6>
                                        </div>
                                        <ul>
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="../images/review/r-1.jpg" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>Bobby Aktar</h6>
                                                            <span>April 03, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <span>/ 5 Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="../images/review/r-2.jpg" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>Humayun Ahmed</h6>
                                                            <span>April 13, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <span>/ 5 Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="../images/review/r-3.jpg" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>Tania Aktar</h6>
                                                            <span>April 20, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                                        <div class="rating">
                                                            <ul>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <span>/ 5 Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                        </ul>
                                        <div class="title pt-15">
                                            <h6>Leave A Comment</h6>
                                        </div>
                                        <div class="reviews-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Fast name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <div class="rate-wrapper">
                                                                <div class="rate-label">Your Rating:</div>
                                                                <div class="rate">
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <textarea placeholder="Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <button type="button" class="main-btn">Post Comment</button>
                                                        </div>
                                                    </div>
                                                </div> <!-- row -->
                                            </form>
                                        </div>
                                    </div> <!-- reviews cont -->
                                </div>
                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>Thông tin khóa học </h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Thời lượng : <span><?php echo $course['length_co']; ?></span></li>
                                    <li><i class="fa fa-clone"></i>Số buổi : <span><?php echo $course['num_lecture']; ?></span></li>
                                    <li><i class="fa fa-beer"></i>Bài kiểm tra :  <span><?php echo $course['num_quizzes']; ?></span></li>
                                    <li><i class="fa fa-user-o"></i>Học viên :  <span>100</span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>Giá : <b><?php echo $course['price']; ?></b></span>
                                </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6" >
                            <div class="You-makelike mt-30" >
                                <h4>Option</h4>
                                <div class="singel-makelike mt-20">
                                  <div>
                                      <a href="edit_course.php?id=<?php echo $course['id_co']; ?>&edit=true" class="main-btn" style="width :100%">Edit</a>
                                  </div>
                                </div>
                                <div class="singel-makelike mt-20">
                                  <div>
                                      <a onclick="deleteCourse(<?php echo $course['id_co']; ?>)" class="main-btn" style="width :100%">Delete</a>
                                      <script type="text/javascript">
                                        function deleteCourse(courseId){
                                          if (confirm("Do you want to delete?")){
                                            window.location.href='edit_course.php?id='+courseId+'&delete=true';
                                            return true;
                                          }
                                        }
                                      </script>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($option['edit']) { ?>
                  <div class="col-lg-8">
                      <div class="contact-from mt-30">
                          <div class="section-title">
                              <h5>Course Management</h5>
                              <h2>Edit course</h2>
                          </div> <!-- section title -->
                          <div class="main-form pt-45">
                              <form id="add-course-form" action="edit_course.php" method="post" data-toggle="validator">
                                  <div class="row">
                                      <input type="hidden" name="id_co" value="<?php echo $course['id_co']; ?>">
                                      <div class="col-md-12">
                                          <div class="singel-form form-group">
                                              <h6>Name:</h6>
                                              <input name="name_co" type="text" placeholder="Course name" value="<?php echo $course['name_co']; ?>" data-error="Name is required." required="required">
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <div class="col-md-12">
                                        <div  class="singel-form form-group">
                                          <h6>Category :</h6>
                                          <select name="id_ca" class="col-md-12">
                                            <?php while ($category = mysqli_fetch_assoc($categories_set)) {?>
                                              <option value="<?php echo $category['id_ca']; ?>" <?php if ($category['id_ca']==$course['id_ca']) echo 'selected="selected"'; ?>><?php echo $category['name_ca']; ?></option>
                                            <? } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="singel-form form-group">
                                            <h6>Course length</h6>
                                              <input name="length_co" type="text" value="<?php echo $course['length_co']; ?>" placeholder="Course length" data-error="Valid number is required." required="required">
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <div class="col-md-4">
                                        <div class="singel-form form-group">
                                          <h6>Number lecture</h6>
                                            <input name="num_lecture" type="text" value="<?php echo $course['num_lecture']; ?>" placeholder="Number lecture" data-error="Valid number is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div>  <!-- singel form -->
                                      </div>
                                      <div class="col-md-4">
                                        <div class="singel-form form-group">
                                          <h6>Number quizz</h6>
                                            <input name="num_quizzes" type="text" value="<?php echo $course['num_quizzes']; ?>" placeholder="Number lecture" data-error="Valid number is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div>  <!-- singel form -->
                                      </div>
                                      <div class="col-md-12">
                                          <div class="singel-form form-group">
                                            <h6>Price</h6>
                                              <input name="price" type="text" value="<?php echo $course['price']; ?>" placeholder="Price" data-error="Price is required." required="required">
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <div class="col-md-12">
                                        <div  class="singel-form form-group">
                                          <h6>Teacher :</h6>
                                          <select name="id_te" class="col-md-12">
                                            <?php while ($teacher = mysqli_fetch_assoc($teachers_set)) {?>
                                              <option value="<?php echo $teacher['id_te']; ?>" <?php if ($teacher['id_te']==$course['id_te']) echo 'selected="selected"'; ?>><?php echo $teacher['name_te']; ?></option>
                                            <? } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="singel-form form-group">
                                            <h6>Picture</h6>
                                              <input name="path_pic" type="text" value="<?php echo $course['path_pic']; ?>" placeholder="Picture">
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <div class="col-md-12">
                                          <div class="singel-form form-group">
                                              <h6>Overview</h6>
                                              <textarea name="overview_co" placeholder="Overview" data-error="Please,write a overview about course." required="required"><?php echo $course['overview_co']; ?></textarea>
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <div class="col-md-12">
                                          <div class="singel-form form-group">
                                              <h6>Requirement</h6>
                                              <textarea name="requirement_co" placeholder="Requirement" data-error="Please,write a requirement about course." required="required"><?php echo $course['requirement_co']; ?></textarea>
                                              <div class="help-block with-errors"></div>
                                          </div> <!-- singel form -->
                                      </div>
                                      <p class="form-message"></p>
                                      <div class="col-md-12">
                                          <div class="singel-form">
                                              <button type="submit" class="main-btn">Submit</button>
                                          </div> <!-- singel form -->
                                      </div>
                                  </div> <!-- row -->
                              </form>
                          </div> <!-- main form -->
                      </div> <!--  contact from -->
                  </div>

                <?php }?>
            </div> <!-- row -->


        </div> <!-- container -->
    </section>

    <!--====== COURSES SINGEl PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="../#"><img src="../images/logo-2.png" alt="Logo"></a>
                            </div>
                            <p>Gravida nibh vel velit auctor aliquetn quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate.</p>
                            <ul class="mt-20">
                                <li><a href="../#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="../#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="../#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="../#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="../index-2.html"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="../about.html"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="../courses.php"><i class="fa fa-angle-right"></i>Courses</a></li>
                                <li><a href="../blog.html"><i class="fa fa-angle-right"></i>News</a></li>
                                <li><a href="../events.html"><i class="fa fa-angle-right"></i>Event</a></li>
                            </ul>
                            <ul>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                <li><a href="../shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                <li><a href="../teachers.php"><i class="fa fa-angle-right"></i>Teachers</a></li>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="../contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="../#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>143 castle road 517 district, kiyev port south Canada</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@yourmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a href="../https://www.templatespoint.net" target="_blank">Templates Point</a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="../#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








    <!--====== jquery js ======-->
    <script src="../js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="../js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="../js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="../js/jquery.magnific-popup.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>

    <!--====== Nice Select js ======-->
    <script src="../js/jquery.nice-select.min.js"></script>

    <!--====== Nice Number js ======-->
    <script src="../js/jquery.nice-number.min.js"></script>

    <!--====== Count Down js ======-->
    <script src="../js/jquery.countdown.min.js"></script>

    <!--====== Validator js ======-->
    <script src="../js/validator.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="../js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="../js/main.js"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="../js/map-script.js"></script>

</body>
</html>
