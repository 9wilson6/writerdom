<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$page="";
$mainpage="";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM users WHERE type =2 ORDER BY verified DESC";
$results=$db->get_results($query);

 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <div class="headingTertiary text-light text-uppercase">Registered Tutors</div>

                <div class="card">
                   	<div class="card-header text-uppercase">Registered Tutors</div>
                   	<div class="card-body">
                  <?php if ($db->num_rows<1): ?>
                        <div class="headingTertiary">There is Nothing To show Yet</div>
                        <?php elseif($db->num_rows>0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th >Tutor Id</th>
                                    <th >Tutor Name</th>
                                    <th >Email</th>
                                    <th class="smalll">Date Registered</th>
                                    <th class="smalll">Status</th>
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
                                    <td class="smalll">
                                        <?php if ($result->verified==0) {?>
                                          <span class="alert alert-warning text-uppercase btn-block" role="alert">unverified</span>
                                      <?php  }elseif ($result->verified==1) {
                                           if ($result->status==0) {?>
                                              <span class="alert alert-danger text-uppercase btn-block" role="alert">suspended</span>
                                         <?php  }elseif ($result->status==1) { ?>
                                         <span class="alert alert-success text-uppercase btn-block" role="alert">Active</span>
                                          <?php }
                                        } ?>
                                    </td>


                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>

                        </table>
                        <?php endif ?>
                   	</div>
                   	<div class="card-footer"></div>
                   </div>   
            </div>
        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php") ?>