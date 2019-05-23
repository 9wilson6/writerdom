<!DOCTYPE html>
<html lang="en">

<head>
  <title>online Professional Tutoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </link>
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
<style>
  .blog-image {
   
    height: 300px;
}
.image{
  width: 100%;
  height: 100%;
}
.blog-title {
  font-size: 20px;
  text-align: center;
  margin-bottom: 13px;
  color: #000;
  font-weight: bolder;
}
.blog-details {
}

</style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">


          <div class="site-logo">
            <a href="index.html" class="text-black"><span style="color: #D9A440"><b>PerfectGrader</b></span></a>
          </div>

          <div class="col-12">
            <nav class="site-navigation text-center " role="navigation">

              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li><a href="https://www.perfectgrader.com/index#services-section" class="nav-link">Getting Started</a></li>
                <li><a href="https://www.perfectgrader.com/index#about-section" class="nav-link">About Us</a></li>
                <li><a href="https://www.perfectgrader.com/index#testimonials-section" class="nav-link">Testimonials</a></li>
                <li><a href="#" class="nav-link">FAQ</a></li>
                 <li><a href="https://www.perfectgrader.com/blog" class="nav-link" style="border-bottom: 2px solid #D9A440;" >Blog</a></li>
                <li><a href="https://www.perfectgrader.com/index#site-footer" class="nav-link">Terms of Use</a></li>
                <li><a href="https://www.perfectgrader.com/student_login" class="nav-link">Log in</a></li>
              </ul>
            </nav>

          </div>

          <div class="toggle-button d-inline-block d-lg-none"><a href="#"
              class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>


    <div class="site-blog">

      <div class="container">
       <!-- //////////////////////////////////////////////////////// -->
       <div class="row">
        <?php 
        require_once("dbconfig/dbconnect.php");
       require_once("inc/global_functions.php");
        $query="SELECT * FROM posts where status=1 order by post_id desc";
        $results=$db->get_results($query);
        
         ?>
         <?php if ($db->num_rows==0): ?>
          <h1>No posts</h1>
            <?php else: ?>
    <?php foreach ($results as $result):
       $file_name="./POSTS/default.jpg";
        ImagePath($result->post_id, 1);
     ?>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="blog-image"><img class="image" src="<?php echo $file_name ?>" alt="blog image"></div>
          <div class="blog-title"><?php echo $result->title; ?></div>
          <div class="blog-details"><?php echo  substr($result->details, 0, 215)."....." ?>
          <a href="post-details?token=<?php echo urlencode(convert_uuencode($result->post_id)) ?>">Read more</a> </div>
        </div>
    <?php endforeach ?>
         <?php endif ?>

        </div>
       <!-- ////////////////////////////////////////////////////////////// -->
      </div>
      <!-- <div class="img-absolute">
        <img src="images/person-transparent-2.png" alt="Image" class="img-fluid">
      </div> -->
    </div>



  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>