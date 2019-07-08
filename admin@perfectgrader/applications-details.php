<?php 
require_once "../inc/header_links.php";
require_once("./inc/topnav.php");
#//////////////////////////////////////////////////////////////////////////////////// -->

require_once("../dbconfig/dbconnect.php");
if (isset($_REQUEST['pid'])) {
    $user_id=convert_uudecode($_REQUEST['pid']);
    
}
$mainpage="dashboard";
$page="dashboard";
?>

<div class="display">
    <div class="display__content">
      <?php require_once "inc/leftnav.php" ?>
 <?php 
 $info_query="SELECT * FROM users WHERE user_id='$user_id' and type=2"; 
$info_query_results=$db->get_row($info_query);
// print_r($info_query_results);

 ?>
 <div class="table-responsive">
 <table class="table table-striped ">
     <tr>
         <th width="100px">User Id</th>
         <td><?php echo $info_query_results->user_id; ?></td>
         <th>Username</th>
         <td><?php echo $info_query_results->username; ?></td>
         <th>Email</th>
         <td><?php echo $info_query_results->email; ?></td>
         <th>Date Registered</th>
         <td><?php echo $info_query_results->created_on; ?></td>
     </tr>
     <tr>
         <th>About</th>
         <td colspan="7"><?php echo $info_query_results->about_me; ?></td>
     </tr>
     <tr>
         <th>skills</th>
         <td colspan="7"><?php echo $info_query_results->skills; ?></td>
     </tr>
 </table>
 </div>

</div>
</div>

<?php

require_once"../inc/footer_links.php";

?>