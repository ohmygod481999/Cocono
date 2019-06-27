<?php require_once('../controller/initialize.php'); ?>
<?php $teachers_set = get_teachers(); ?>


<?php include_once(SHARED_PATH . '/public_header.php'); ?>

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
             <?php while($teachers = mysqli_fetch_assoc($teachers_set)){ ?>
               <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo $teachers['pic_path']; ?>" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.php?id=<?php echo $teachers['id_te']; ?>"><h6><?php echo $teachers['name_te']; ?></h6></a>
                            <span><?php echo $teachers['branch']; ?></span>
                        </div>
                    </div> <!-- singel teachers -->
               </div>
             <?php } ?>

           </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEACHERS PART ENDS ======-->

   <?php include_once(SHARED_PATH. '/public_footer.php'); ?>
