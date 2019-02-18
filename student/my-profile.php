<?php 
require_once("../dbconfig/dbconnect.php");
  require_once("../inc/utilities.php");
require_once "../inc/header_links.php";
 $page="profile" ;
require_once "../components/top_nav.php";
if (isset($_REQUEST['key'])) {
   $user_id =convert_uudecode($_REQUEST['key']);
   $query="SELECT * FROM users WHERE user_id='$user_id'";
   $results=$db->get_row($query);
   
   }else{
    header("LOCATION:createpost");
   }
 
?>
<div class="display">
    <div class="display__content">
        <?php require_once "../components/stud_leftnav.php" ?>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">My Profile</h1>
                <div class="card wide-card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        
                   <div class="table-responsive">
                        <table class="table table-striped table-hover text-center">
                         <thead>
                                <tr>
                            <th>User Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            
                                <tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td><?php echo $results->user_id; ?></td>
                                 <td><?php echo $results->username; ?></td>
                                 <td><?php echo $results->email; ?></td>
                                 <td><?php echo $results->created_on; ?></td>
                             </tr>
                         </tbody>
                        </table>
                </div>
                   
                </div>
            </div>
        </div>
            <div class="col-sm-12 col-md-12 col-lg-12  col-xl-3">
                <h1 class="headingTertiary text-light">Notes</h1>
                <div class="card">
                    <div class="card-header text-secondary text-uppercase">
                        Note that
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-borderless text-left">
                            <tbody>
                                <ul>
                                    <tr>

                                        <td>
                                            <li>This service exists to protect your private and personal information,
                                                you shouldn’t therefore communicate with tutors outside the site.</li>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <li>Sharing third party communication methods (including emails, phone
                                                numbers, and Skype address) is against our user guidelines and we shall
                                                therefore NOT be held
                                                liable
                                                failure to observe this. See our T.O.S</li>
                                        </td>
                                    </tr>
                                </ul>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once"../inc/footer_links.php";
 ?>