<?php require_once "../inc/sessios.php";
session_admin();
 ?>
<section class="dashboard_nav_left">
	<div class="dashboard_nav_left__content">
<ul class="list-group">
  <a href="index"  <?php if ($page=="dashboard") { ?>
    class="active"
  <?php } ?>><li class="list-group-item">Dashboard <i class="fas fa-tachometer-alt icon-l"></i></li></a>

 <a href="#"  <?php if ($mainpage=="student") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#student">
  <li class="list-group-item">Students Management
<i class="fas fa-angle-double-down icon-l"></i></li></a>
<div id="student" class="collapse">
<ul class="list-group">
	<a href="stud_activate" <?php if ($page=="student_activate") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Activate <i class="fas fa-toggle-on icon-l"></i></li></a>

  <a href="student_suspend" <?php if ($page=="student_suspend") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Suspend <i class="fas fa-power-off icon-l"></i></li></a>

  <a href="stud_message" <?php if ($page=="stud_message") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Message <i class="far fa-comments icon-l"></i></li></a>

  
</ul>
</div>
  
   <a href="#"  <?php if ($mainpage=="tutor") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#tutor"><li class="list-group-item">Tutors Management<i class="fas fa-angle-double-down icon-l"></i> </li></a>

<div id="tutor" class="collapse">

  <ul class="list-group">
   <a href="tut_activate" <?php if ($page=="tutor") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Activate <i class="fas fa-toggle-on icon-l"></i></li></a>

<a href="tutor_suspend" <?php if ($page=="tut_suspend") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Suspend <i class="fas fa-power-off icon-l"></i></li></a>

<a href="tut_message" <?php if ($page=="tut_message") { ?>
    class="active" 
  <?php } ?> ><li class="list-group-item">Message <i class="far fa-comments icon-l"></i></li></a>
  
</ul>
</div>
 

     <a href="#"  <?php if ($mainpage=="orders") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#orders"><li class="list-group-item">Projects Management
  	<i class="fas fa-angle-double-down icon-l"></i></li></a>
<div id="orders" class="collapse">
<ul class="list-group">
	<li class="list-group-item">Delete <i class="far fa-trash-alt icon-l"></i></li>
	<li class="list-group-item">Edit <i class="far fa-edit icon-l"></i></li>
	<li class="list-group-item">hhhh</li>
	<li class="list-group-item">hhhhh</li>
</ul>
</div>

  

  <a href="../logout"> <li class="list-group-item"><i class="fas fa-sign-out-alt icon-r"></i>Logout</li></a>

</ul>
	</div>
</section>
<?php #require_once("../inc/footer_links.php") ?>
<!-- Left navigation bar -->
 
<script>

  
</script>

