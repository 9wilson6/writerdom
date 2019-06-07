<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="dashboard";
$page="dashboard";
require_once("./inc/leftnav.php");
$error=null;
$success=null;
if (isset($_POST['submit'])) {
 $email=$_POST['email'];
 $new_pass=$_POST['new_pass'];
 $con_pass=$_POST['con_pass'];
 if ($new_pass==$con_pass) {
  if (strlen($new_pass)>6) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $password=password_hash($new_pass, PASSWORD_DEFAULT);
   $query="UPDATE users SET email='$email', password='$password' WHERE type=3";
   if ($db->query($query)) {
    $success="Account updated successfully";
   }
    }else{
      $error="Email provided is invalid";
    }
  }else{
    $error="make you password longer than six characters";
  }
 }else{
  $error="passwords didn't match";
 }
}
 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="headingTertiary text-light text-center text-uppercase">Update account details </div>
        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
             <div class="card">
            <div class="card-header text-uppercase">change you account details</div><!--card header-->
            <div class="card-body">
                                
                        
                      <div class="table-responsive" style="overflow-y: hidden;">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <?php if (isset($error) & !empty($error)): ?>
                                        <td colspan="2" class="text-danger"><?php echo $error; ?></td>
                                    <?php elseif(isset($success) & !empty($success)): ?>
                                    <td colspan="2" class="text-success"> <?php echo $success; ?></td>
                                <?php endif ?>

                                </tr>
                            </thead>
                         <tbody>
                             <form action="" method="POST">
                                 <tr>
                                     <th><label>New Email</label></td>
                                      <td><input type="email" name="email" class="form-control forms2__input" required></td>
                                 </tr>
                                 <tr>
                                     <th><label>New password</label></td>
                                      <td><input type="password" name="new_pass" class="form-control forms2__input" min="6" required></td>
                                 </tr>
                                 <tr>
                                     <th><label>confirm password</label></td>
                                      <td><input type="password" name="con_pass" class="form-control forms2__input" min="6" required></td>
                                      
                                 </tr>
                                 <tr>
                                     <td>&nbsp;</td>
                                     <td><input type="submit" class="btn btn-block btn-primary" name="submit" value="Submit"></td>
                                 </tr>
                             </form>
                         </tbody>
                        </table>
               
                   
         
            </div>
            </div><!--card body-->
            </div><!--card-->
  </div> <!--col 1-->

            
   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
             <div class="card">
            <div class="card-header text-uppercase">Notifications</div><!--card header-->
            <div class="card-body" id="cbody">
            </div><!--card body-->
            <div class="card-footer"><a href="notes" class="btn btn-info btn-block">VIEW ALL</a></div>
            </div><!--card-->
          </div> <!--col2-->


        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php") ?>
<script>
	$(function(){
		// setInterval(function(){
			$("#available").load('dashboard_counters', {
				type:'available',
				submit: 'submit'
			});
			$("#progress").load('dashboard_counters', {
				type:'progress',
				submit: 'submit'
			});
			$("#delivered").load('dashboard_counters', {
				type:'delivered',
				submit: 'submit'
			});
			$("#revision").load('dashboard_counters', {
				type:'revision',
				submit: 'submit'
			});
			$("#closed").load('dashboard_counters', {
				type:'closed',
				submit: 'submit'
			});
			$("#students").load('dashboard_counters', {
				type:'students',
				submit: 'submit'
			});
			$("#tutors").load('dashboard_counters', {
				type:'tutors',
				submit: 'submit'
			});
      $("#suspended").load('dashboard_counters', {
        type:'suspended',
        submit: 'submit'
      });
      $("#applications").load('dashboard_counters', {
        type:'applications',
        submit: 'submit'
      });
      $("#dues").load('dashboard_counters', {
        type:'dues',
        submit: 'submit'
      });

       $("#balance").load('dashboard_counters', {
        type:'balance',
        submit: 'submit'
      });
      $("#cbody").load("notifications.php", {limit:10});
		// }, 5000);
	});
</script>

