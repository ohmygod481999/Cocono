<?php require_once('../controller/initialize.php'); ?>

<?php
  if (is_post_request()){
    $acc = [];
    $acc['username'] = $_POST['username'];
    $acc['password'] = $_POST['password'];
    $acc['privilleage'] = $_POST['privilleage'];
    $acc['name_user'] = $_POST['name_user'];
    $acc['email'] = $_POST['email'];
    $acc['phone_number'] = $_POST['phone_number'];

    $result = insert_acc($acc);

    if ($result == true){
      echo "success";
    }
    else {
      $errors = $result;
    }


  }
?>
  <?php include_once(SHARED_PATH . '/public_header.php'); ?>

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-6.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Đăng Ký</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng Ký</li>
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
                            <h5>Đăng Ký</h5>
                            <h2></h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="signup-form" action="signup.php" method="post" data-toggle="validator">
                              <input type="hidden" name="privilleage" value="user">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input name="name_user" type="text" placeholder="Họ và Tên" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" placeholder="Email" data-error="Valid email is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input name="phone_number" type="text" placeholder="Số Điện Thoại" data-error="Phone is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input name="username" type="text" placeholder="Username" data-error="Username is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <input name="password" type="password" placeholder="Password" data-error="Password is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Gửi</button>
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
                                        <p>RMIT 521 Kim Mã, Đống Đa, Hà Nội</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>0986-472-329</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Phongdh2899@gmail.com</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                    <div class="map mt-30">
                        <div id="contact-map"></div>
                    </div> <!-- map -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== PATNAR LOGO PART START ======-->

    <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
        <div class="container">
            <div class="row patnar-slied">
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-1.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-2.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-3.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-4.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-2.png" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="images/patnar-logo/p-3.png" alt="Logo">
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== PATNAR LOGO PART ENDS ======-->

 <?php include_once(SHARED_PATH . '/public_footer.php'); ?>
