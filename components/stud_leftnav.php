<?php require_once "../inc/sessios.php";
session_student();
 ?>
<section class="dashboard_nav_left">
	<div class="dashboard_nav_left__content">
<ul class="list-group">
  <!-- <a href=""><li class="list-group-item"><i class="fas fa-tachometer-alt icon-r"></i>Dashboard</li></a> -->
  <a href="../student/createpost"  <?php if ($page=="create") { ?>
  	class="active"
  <?php } ?>><li class="list-group-item"><i class="fas fa-upload icon-r"></i>Post Homework</li></a>
  <a href="../student/my-homework" <?php if ($page=="my-homework") { ?>
   class="active"
  <?php } ?>><li class="list-group-item"><i class="fas fa-list icon-r"></i>My Homework<span class="pill float-right" id="available">0</span></li></a>
   <a href="../student/in-progress" <?php if ($page=="progress") { ?>
   	class="active"
  <?php } ?>><li class="list-group-item"><i class="fas fa-sync-alt icon-r"></i>In Progress<span class="pill float-right" id="in_progress">0</span></li></a>
  <a href="../student/delivered" <?php if ($page=="delivered") { ?>
  	class="active"
 <?php } ?>><li class="list-group-item"><i class="fas fa-check icon-r"></i>Delivered<span class="pill float-right" id="delivered">0</span></li></a>
 <a href="Editing" <?php if ($page=="revision") { ?>
    class="active"
  <?php } ?>><li class="list-group-item"><i class="fas fa-redo-alt icon-r"></i></i>Under Editing <span class="pill float-right" id="on_revision">0</span></li></a>
   <a href="../student/completed" <?php if ($page=="completed") { ?>
   class="active"
  <?php } ?>><li class="list-group-item"><i class="far fa-thumbs-up icon-r"></i>Closed<span class="pill float-right">90</span></li></a>
    <a href="../student/messages" <?php if ($page=="messages") { ?>
    	class="active"
   <?php } ?>><li class="list-group-item"><i class="far fa-envelope-open icon-r"></i>Messages<span class="pill float-right " id="messages">0</span></li></a>
  <a href="../student/payment" <?php if ($page=="payment") { ?>
  	class="active"
 <?php } ?>><li class="list-group-item"><i class="far fa-credit-card icon-r"></i>Payment</li></a>
  <a href="../logout" <li class="list-group-item"><i class="fas fa-sign-out-alt icon-r"></i>Logout</li></a>
</ul>
	</div>
</section>
<?php #require_once("../inc/footer_links.php") ?>
<!-- Left navigation bar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

  $(function(){
   
   setInterval(function() {
       
       let user_id= "<?php echo $_SESSION['user_id']; ?>";
      let user_type="<?php echo $_SESSION['user_type']; ?>";

        $("#messages").load("../inc/counters", {
            target: "messages",
            user_id: user_id,
            user_type: user_type
           
        });
        $("#available").load("../inc/counters",{
        target: "available",
        user_id: user_id,
        user_type: user_type
      });
         $("#delivered").load("../inc/counters", {
            target: "delivered",
            user_id: user_id,
            user_type: user_type
           
        });

         $("#in_progress").load("../inc/counters",
      {
             target: "in_progress",
            user_id: user_id,
            user_type: user_type
      });

         $("#on_revision").load("../inc/counters",
      {
             target: "on_revision",
            user_id: user_id,
            user_type: user_type
      });
    
    }, 300);



     });
</script>