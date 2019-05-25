<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$page="students";
$mainpage="";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM users WHERE type =1";
$results=$db->get_results($query);

 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <div class="headingTertiary text-uppercase">Registered Students</div>

                <div class="card">
                   	<div class="card-header text-uppercase">Students</div>
                   	<div class="card-body">
                  <?php if ($db->num_rows<1): ?>
                        <div class="headingTertiary">There is Nothing To show Yet</div>
                        <?php elseif($db->num_rows>0): ?>
                             <div class="table-responsive" style="overflow-y: hidden;">
                        <table class="table table-bordered">
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
                                    <td class="smalll">
                                        <?php
                                           if ($result->status==0) {?>
                                              <span class="alert alert-danger text-uppercase btn-block" role="alert">suspended</span>
                                         <?php  }elseif ($result->status==1) { ?>
                                         <span class="alert alert-success text-uppercase btn-block" role="alert">Active</span>
                                          <?php } ?>
                                      
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