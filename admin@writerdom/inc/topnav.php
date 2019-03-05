<?php 
require_once"../inc/sessios.php";
session_gen ();
 ?>
<section class="dashboard_nav">
<!-- Navigation -->
 <!-- <button class="btn btn-outline-warning left-toggler">jjj</button> -->
 <label for="check" class="left-toggler"><i class="fas fa-bars icon-m"></i></label>
 <input type="checkbox" name="check" id="check" class="left-toggler">
<nav class="navbar navbar-expand-lg" >
    <!-- {{-- animated zoomIn --}} -->

      <a class="navbar-brand" href="../index"><span class="navbar-brand__start"><img src="../assets/pen.png" alt="" class="navbar__logo"><span class="deco">W</span>riter</span><span class="navbar-brand__end"><span class="deco">D</span>om </span></a>
     <!-- <a class="navbar-brand" href="index.php"><img src="assets/logo.png" alt=""></a> -->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        
  <ul class="navbar-nav ml-auto">
   <!--  <li class="nav-item">
      <a class="nav-link" href="#">Getting started</a>
          </li> -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav-link--excemption" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, 
        <?php $name= explode(" ", $_SESSION['username']);
        echo ucfirst($name[0]);
       ?><i class="far fa-user-circle icon"></i></a>
      <div class="dropdown-menu navbar__toggle" aria-labelledby="navbarDropdown">
        <!-- <a class="dropdown-item"  href="#"><i class="fas fa-user icon-r"></i>Profile</a> -->
        <a class="dropdown-item " href="account_details"><i class="fas fa-sliders-h icon-r"></i>Update account</a>
        <a class="dropdown-item " href="../logout"><i class="fas fa-sign-out-alt icon-r"></i>Logout</a>
      </div>
    </li>
  </ul>
      </div>
    
  </nav>
</section>
<!-- <script src="../js/session_timer.js"></script> -->
