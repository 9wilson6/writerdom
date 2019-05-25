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
  body{
    background: #f1f2f6;
  }
	.blog{
  position: relative;
  min-height: 60vh;
	}
	.blog>.blog__image{

	width: 100%;
    height: 80vh;
	}
	.blog>.blog__heading{
	color: #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    text-align: center;
   font-family: montserrat;
    background: rgba(14, 14, 14, 0.5);
    border-radius: 10px;
    padding: 20px 10px;
    font-weight: bolder;
    font-size: 30px;
    display: block;
    transform: translate(-50%, -50%);
    min-width: 70%;
	}
  .card{
background: #dfe6e9;
  }
	 @media (max-width: 768px) {
	 	.blog>.blog__image{

	width: 100%;
    height: 300px;
      }
    .container, .card{
padding: 0px;
margin: 0px;


	}
body{
	padding: 0;
	margin: 0;
}
.blog>.blog__heading{
	font-size: 18px;
	 top: 40%;
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
                <li><a href="https://www.perfectgrader.com/faq" class="nav-link">FAQ</a></li>
                 <li><a href="https://www.perfectgrader.com/blog" class="nav-link" style="border-bottom: 2px solid #D9A440;" >Blog</a></li>
                <li><a href="https://www.perfectgrader.com/terms-of-service" class="nav-link">Terms of Use</a></li>
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
<?php 
require_once("./inc/global_functions.php");
require_once("./dbconfig/dbconnect.php");
$post_id = convert_uudecode($_REQUEST['token']);
$file_name="./POSTS/default.jpg";
 ImagePath($post_id,4);
$query="SELECT * FROM posts WHERE post_id='$post_id' AND status=1";
$results=$db->get_row($query);
?>
  
    <div class="row">
     <!--  <div class="col-sm-0 col-md-0 col-lg-2"></div> -->
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
         <!--  <div class="card-header">Lorem ipsum dolor sit amet.</div> -->
          <div class="card-body">
          	<?php if ($db->num_rows>0):

          		$count=($results->views + 1);
          		$views_update_query="UPDATE posts set views='$count' WHERE post_id='$results->post_id'";
          		$db->query($views_update_query);
          	 ?>
          		<div class="blog">
          			<h2 class="blog__heading"><?php echo $results->title; ?></h2>
          			<img class="blog__image" src="<?php echo $file_name;  ?>" alt="">
          			
          		</div>
          		<div class="blog__content text-dark text-left">
          				<p class="lead"><?php echo $results->details; ?></p>
          			</div>
          	<?php else: ?>
				<h2 >This post is no longer available</h2>
          	<?php endif ?>
        </div>
      </div>
    </div>
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