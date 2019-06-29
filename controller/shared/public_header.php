<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Cocono</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="css/animate.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="css/responsive.css">


</head>

<body>

   <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <header id="header-part">

        <div class="header-top d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="images/all-icon/call.png" alt="icon"><span>0986-472-329</span></li>
                                <li><img src="images/all-icon/email.png" alt="icon"><span>Phongdh2899@gmail.com</span></li>
                                <li><img src="images/all-icon/map.png" alt="icon"><span>RMIT 521 Kim Mã, Đống Đa, Hà Nội</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-social text-lg-right text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->

        <div class="navigation navigation-2">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="images/cocono.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="active" href="index.php">Trang chủ</a>
                                        <ul class="sub-menu">
                                            <li><a href="index-2.php">Home 01</a></li>
                                            <li><a class="active" href="index-3.php">Home 02</a></li>
                                            <li><a href="index-4.php">Home 03</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.php">Về Cocono</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="courses.php">Khóa học</a>
                                        <ul class="sub-menu">
                                            <li><a href="courses.php">Courses</a></li>
                                            <li><a href="courses-singel.php">Course Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="events.php">Sự kiện</a>
                                        <ul class="sub-menu">
                                            <li><a href="events.php">Sự kiện</a></li>
                                            <li><a href="events-singel.php">Event Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="teachers.php">Giáo viên</a>
                                        <ul class="sub-menu">
                                            <li><a href="teachers.php">Giáo viên</a></li>
                                            <li><a href="teachers-singel.php">teacher Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog.php">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="blog-singel.php">Blog Singel</a></li>
                                        </ul>
                                    </li>
                                    <?php if(!is_logged_in()){?>
                                      <li class="nav-item">
                                          <a href="login.php">Đăng nhập</a>
                                          <ul class="sub-menu">
                                              <li><a href="login.php">Đăng nhập</a></li>
                                              <li><a href="signup.php">Đăng ký</a></li>
                                          </ul>
                                      </li>
                                    <?php } else { ?>
                                      <li class="nav-item">
                                          <a href="#"><?php echo $_SESSION['username']; ?></a>
                                          <ul class="sub-menu">
                                              <li><a href="#">Thông tin cá nhân</a></li>
                                              <li><a href="../controller/logout.php">Đăng xuất</a></li>
                                          </ul>
                                      </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->
