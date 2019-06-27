<?php require_once('../../controller/initialize.php'); ?>

<?php $categories_set = get_categories(); ?>

<?php
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $category_chosen = get_category_by_id($id);
    $courses_set = get_courses_by_id_category($id);
  }

?>

<?php require_once(SHARED_PATH . '/staff_header.php'); ?>


    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== SLIDER PART START ======-->

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

    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->

    <section id="category-2-part" class="pt-105 pb-170 bg_cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-2-items pt-10">
                      <h2>Categories</h2>
                        <div class="row">
                            <?php while ($category =  mysqli_fetch_assoc($categories_set)) {?>
                              <div class="col-md-3">
                                  <div class="singel-items text-center mt-30">
                                      <div class="items-image">
                                          <img src="../images/category/ctg-1.jpg" alt="Category">
                                      </div>
                                      <div class="items-cont">
                                          <a href="courses_management.php?id=<?php echo $category['id_ca']; ?>">
                                              <h5><?php echo $category['name_ca']; ?> </h5>
                                              <span><?php echo count_course_category($category['id_ca']); ?> courses</span>
                                          </a>
                                      </div>
                                  </div> <!-- singel items -->
                              </div>
                            <?php } ?>

                        </div> <!-- row -->
                    </div> <!-- category -->
                </div>

            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->

    <!--====== COURSE PART START ======-->

    <?php if (isset($courses_set)) {?>
      <section id="course-part" class="pt-10 pb-115">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="section-title pb-45">
                          <h5>Our course</h5>
                          <h2><?php echo $category_chosen['name_ca']; ?> courses </h2>
                      </div> <!-- section title -->
                  </div>
              </div> <!-- row -->
              <div class="row">
                  <?php while ($course = mysqli_fetch_assoc($courses_set)) {?>
                    <div class="col-lg-4">
                        <div class="singel-course-2">
                            <div class="thum">
                                <div class="image">
                                    <img src="../<?php if($course['path_pic']!='') echo $course['path_pic']; else echo "images/course/unknow.png";?>" alt="Course">
                                </div>
                                <div class="price">
                                    <span><?php echo $course['price']; ?></span>
                                </div>
                                <div class="course-teacher">
                                    <div class="thum">
                                        <a href="../courses-singel.php"><img src="../images/course/teacher/t-1.jpg" alt="teacher"></a>
                                    </div>
                                    <div class="name">
                                        <a href="#"><h6><?php echo get_teacher_by_id($course['id_te'])['name_te']; ?></h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <a href="edit_course.php?id=<?php echo $course['id_co']; ?>"><h4><?php echo $course['name_co']; ?></h4></a>
                            </div>
                        </div> <!-- singel course -->
                    </div>
                  <?php } ?>
                  <div class="col-lg-4">
                      <div class="singel-course-2">
                          <div class="thum">
                              <a href="add_course.php">
                                <div class="image">
                                    <img src="../images/course/new_course.png" alt="Course">
                                </div>
                              </a>
                          </div>
                      </div> <!-- singel course -->
                  </div>
              </div> <!-- course slied -->
          </div> <!-- container -->
      </section>
    <?php } ?>

    <!--====== COURSE PART ENDS ======-->

    <!--====== COUNTER PART START ======-->



    <!--====== PATNAR LOGO PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <?php require_once(SHARED_PATH . '/staff_footer.php'); ?>
