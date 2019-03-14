<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
$page="";
$mainpage="";
require_once("./inc/leftnav.php");
 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <h1 class="headingTertiary text-light text-center text-uppercase">notifications </h1>
        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10">
             <div class="card">
            <div class="card-header text-uppercase">account activities summary</div><!--card header-->
            <div class="card-body">
            <?php

                  require_once("../dbconfig/dbconnect.php");

                  $query="SELECT * FROM notifications ORDER BY note_num desc";
                  $results=$db->get_results($query);
                  if ($db->num_rows>0) {
                    foreach ($results as $result) {
                      if ($result->user_type==1) { ?>
                        <div class="alert alert-primary" role="alert">
                          <?php echo $result->note; ?>
                        </div>
                      <?php }elseif ($result->user_type==2) { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $result->note; ?>
                        </div>
                      <?php }else{ ?>
                        <div class="alert alert-info" role="alert">
                          <?php echo $result->note; ?>
                        </div>
                      <?php }
                    }
                  }else{
                    echo "there is nothing to show yet";
                  }
 ?>

                      
            </div><!--card body-->
            </div><!--card-->
  </div> <!--col 1-->


        </div>
    </div>
</div>