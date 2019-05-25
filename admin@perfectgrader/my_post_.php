<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="POST";
$page="manage_posts";
$date_global_=strtotime($date_global);
$post_id = convert_uudecode($_REQUEST['token']);
$file_name="../POSTS/default.jpg";
?>

<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php";

$query="SELECT * FROM posts WHERE post_id='$post_id'";
$results=$db->get_row($query);

     ?>

    <h4 class="text-uppercase">
     This is a preview of the post
     <?php
      ImagePath($post_id);
      // echo $file_name; ?>
    </h4>
    <div class="row">
     <!--  <div class="col-sm-0 col-md-0 col-lg-2"></div> -->
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
         <!--  <div class="card-header">Lorem ipsum dolor sit amet.</div> -->
          <div class="card-body">
          	<?php if ($db->num_rows>0): ?>
          		<div class="blog">
          			<h2 class="blog__heading"><?php echo $results->title; ?></h2>
          			<img class="blog__image" src="<?php echo $file_name;  ?>" alt="">
          			
          		</div>
          		<div class="blog__content text-left">
          				<p class="lead"><?php echo $results->details; ?></p>
          			</div>
          	<?php else: ?>
				<div class="headingTertiary" >This post is no longer available</div>
          	<?php endif ?>
        </div>
      </div>
    </div>
    <?php require_once("../inc/footer_links.php") ?>