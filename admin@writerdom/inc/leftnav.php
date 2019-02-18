<?php require_once "../inc/sessios.php";
session_admin();
 ?>
<section class="dashboard_nav_left">
	<div class="dashboard_nav_left__content">
<ul class="list-group">
  <a href="#"  <?php if ($page=="dashboard") { ?>
    class="active"
  <?php } ?>><li class="list-group-item">Dashboard <i class="fas fa-tachometer-alt icon-l"></i></li></a>

 <a href="#"  <?php if ($page=="student") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#student"><li class="list-group-item">Students Management
<i class="fas fa-angle-double-down icon-l"></i>
<div id="student" class="collapse">
<ul class="list-group">
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhhh</li>
	<li class="list-group-item">hhhhh</li>
</ul>
</div>
  </li></a>
   <a href="#"  <?php if ($page=="Tutor") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#tutor"><li class="list-group-item">Tutors Management<i class="fas fa-angle-double-down icon-l"></i>

<div id="tutor" class="collapse">
<ul class="list-group">
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhhh</li>
	<li class="list-group-item">hhhhh</li>
</ul>
</div>
  </li></a>

     <a href="#"  <?php if ($page=="orders") { ?>
    class="active" 
  <?php } ?> data-toggle="collapse" data-target="#orders"><li class="list-group-item">Projects Management
  	<i class="fas fa-angle-double-down icon-l"></i>
<div id="orders" class="collapse">
<ul class="list-group">
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhh</li>
	<li class="list-group-item">hhhh</li>
	<li class="list-group-item">hhhhh</li>
</ul>
</div>

  </li></a>

  <a href="../logout"> <li class="list-group-item"><i class="fas fa-sign-out-alt icon-r"></i>Logout</li></a>

</ul>
	</div>
</section>
<?php #require_once("../inc/footer_links.php") ?>
<!-- Left navigation bar -->
 
<script>

  
</script>

