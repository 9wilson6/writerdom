<?php
ob_start();
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";
$page="profile" ;
if (isset($_REQUEST['key'])) {
  $user_id =convert_uudecode($_REQUEST['key']);
  $query="SELECT * FROM users WHERE user_id='$user_id'";
  $results=$db->get_row($query);
 $complited_query="SELECT count(project_id) as complited, sum(rating) as rating from closed where student_id='$user_id'";
  $complited=$db->get_row($complited_query);
   }else{ 
  	header("LOCATION:dashboard"); 
 
}
ob_flush();
  ?>
  <div class="display">
    <div class="display__content">
      <?php require_once "../components/tutor_leftnav.php" ?>
      <!-- <h1 class="headingTertiary text-left">Available</h1> -->
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
          <h1 class="headingTertiary text-light">Student Profile</h1>
          <div class="card wide-card">
            <div class="card-header">Profile</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                <tr>
                	<th>Student Id</th>
                	<td><?php echo $results->user_id; ?></td>
                	 <th>Username</th>
                	 <td><?php echo $results->username; ?></td>
                	 <th>Successful Orders</th>
                	 <td><?php echo $complited->complited ?></td>
                	 <th>Average Tutor Rating</th>
                	 <td> <?php if ($complited->complited==0) {
                	 	0;
                	 }else{
                	 	echo round( $complited->rating/ $complited->complited)."/10";
                	 } ?> </td>
                </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("./section_rate.php"); ?>
      </div>
    </div>
  </div>
  <?php
  require_once"../inc/footer_links.php";
  ?>
