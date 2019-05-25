<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$mainpage="tutor";
$page="tutor";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM users WHERE type=2 and verified=0";
$results=$db->get_results($query);

if (isset($_POST['submit'])) {
    $user_id=$_POST['user_id'];
     $query="UPDATE users SET verified=1 WHERE type =2 AND user_id=$user_id";
   if ($db->query($query)) { ?>
      <script>
        alert("Tutor ID: <?php echo $user_id  ?> account has been marked as verified");
        window.location.assign("applications");
  </script>  

   <?php } 
}
 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <div class="headingTertiary text-light text-uppercase">Unverified Tutor Accounts</div>

                <div class="card">
                   	<div class="card-header text-uppercase">Mark accounts as verified</div>
                   	<div class="card-body">
                  <?php if ($db->num_rows<1): ?>
                        <div class="headingTertiary">There is Nothing To show Yet</div>
                        <?php elseif($db->num_rows>0): ?>
                             <div class="table-responsive" style="overflow-y: hidden;">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th >Tutor Id</th>
                                    <th >Username</th>
                                    <th >Email</th>
                                    <th class="wide">Date Registered</th>
                                    <th class="wide">Action</th>
                                </tr>
                            </thead>

                            <tbody id="display">
                                       <?php foreach ($results as $result): ?>
                                <tr>
                                    <td class="smalll"><?php echo $result->user_id; ?></td>
                                    <td>
                                        <?php echo $result->username?>
                                    </td>
                                    <td><?php echo $result->email; ?></td>
                                    <td><?php echo $result->created_on; ?></td>
                                    <td class="wide">
                                        <form action="" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $result->user_id?>">
                                        <input type="submit" name="submit" class="btn btn-block btn-success" value="ACTIVATE">
                                    </form>
                                </td>


                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>

                        </table>
                      </div>
                        <?php endif ?>
                   	</div>
                   	<div class="card-footer"></div>
                   </div>   
            </div>
        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php") ?>