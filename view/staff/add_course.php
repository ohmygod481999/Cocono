  <?php require_once('../../controller/initialize.php'); ?>
  <?php $categories_set = get_categories(); ?>
  <?php $teachers_set = get_teachers(); ?>
  <?php
    if (is_post_request()){
      $course = [];
      $course['id_ca'] = $_POST['id_ca'];
      $course['name_co'] = $_POST['name_co'];
      $course['length_co'] = $_POST['length_co'];
      $course['num_lecture'] = $_POST['num_lecture'];
      $course['num_quizzes'] = $_POST['num_quizzes'];
      $course['path_pic'] = $_POST['path_pic'];
      $course['price'] = $_POST['price'];
      $course['id_te'] = $_POST['id_te'];
      $course['overview_co'] = $_POST['overview_co'];
      $course['requirement_co'] = $_POST['requirement_co'];

      $result = insert_course($course);

      if ($result == true){
       redirect_to('courses_management.php');
      }
      else {
        $errors = $result;
      }


    }
  ?>

  <?php require_once(SHARED_PATH . '/staff_header.php'); ?>

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(../images/page-banner-6.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Courses Management</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Staff</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses Management</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Course Management</h5>
                            <h2>Add course</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="add-course-form" action="add_course.php" method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <h6>Name:</h6>
                                            <input name="name_co" type="text" placeholder="Course name" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                      <div  class="singel-form form-group">
                                        <h6>Category :</h6>
                                        <select name="id_ca" class="col-md-12">
                                          <?php while ($category = mysqli_fetch_assoc($categories_set)) {?>
                                            <option value="<?php echo $category['id_ca']; ?>"><?php echo $category['name_ca']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                          <h6>Course length</h6>
                                            <input name="length_co" type="text" placeholder="Course length" data-error="Valid number is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                      <div class="singel-form form-group">
                                        <h6>Number lecture</h6>
                                          <input name="num_lecture" type="text" placeholder="Number lecture" data-error="Valid number is required." required="required">
                                          <div class="help-block with-errors"></div>
                                      </div>  <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                      <div class="singel-form form-group">
                                        <h6>Number quizz</h6>
                                          <input name="num_quizzes" type="text" placeholder="Number lecture" data-error="Valid number is required." required="required">
                                          <div class="help-block with-errors"></div>
                                      </div>  <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                          <h6>Price</h6>
                                            <input name="price" type="text" placeholder="Price" data-error="Price is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                      <div  class="singel-form form-group">
                                        <h6>Teacher :</h6>
                                        <select name="id_te" class="col-md-12">
                                          <?php while ($teacher = mysqli_fetch_assoc($teachers_set)) {?>
                                            <option value="<?php echo $teacher['id_te']; ?>"><?php echo $teacher['name_te']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                          <h6>Picture</h6>
                                            <input name="path_pic" type="text" placeholder="Picture">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <h6>Overview</h6>
                                            <textarea name="overview_co" placeholder="Overview" data-error="Please,write a overview about course." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <h6>Requirement</h6>
                                            <textarea name="requirement_co" placeholder="Requirement" data-error="Please,write a requirement about course." required="required"></textarea>
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
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                        <ul>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <a href="#">143 castle road 517 district, kiyev port south Canada</a>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                        <p>+1 222 345 342</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@yourmail.com</p>
                                        <p>info@yourmail.com</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== PATNAR LOGO PART START ======-->



    <!--====== PATNAR LOGO PART ENDS ======-->

    <?php require_once(SHARED_PATH . '/staff_footer.php'); ?>
