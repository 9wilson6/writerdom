<meta http-equiv="refresh" content="300">
<?php 
$project_id=convert_uudecode($_GET['id']);
require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";

if (isset($_POST['submit'])) {
	require_once('stud_functions.php');
	filesUpload($_SESSION['user_id'], $_POST['project_id']);
}
$query="SELECT * FROM projects where project_id='$project_id'";
$results=$db->get_row($query);
// print_r($results);

 ?>

<div class="display">
    <div class="display__content">
        <?php $page="completed"; ?>
        <?php require_once "../components/stud_leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Homework #
                    <?php echo $project_id ; ?>
                </h1>
                <div class="card">
                    <div class="card-header text-uppercase">details</div>
                    <div class="card-body">
                        <?php 

					if ($db->num_rows<1) {
            echo "Order is no longer available";
          } else{?>
                        <div class="table-responsive">
                            <table class="table  table-striped table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Subject</th>
                                        <td>
                                            <?php echo $results->subject ?>
                                        </td>
                                        <th scope="row">Academic Level</th>
                                        <td>
                                            <?php echo $results->academic_level; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Style</th>
                                        <td>
                                            <?php echo $results->style; ?>
                                        </td>
                                        <th scope="row">Type Of Paper</th>
                                        <td>
                                            <?php echo $results->type_of_paper ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pages</th>
                                        <td>
                                            <?php echo $results->subject ?>
                                        </td>
                                        <th scope="row">Slides</th>
                                        <td>
                                            <?php echo $results->slides; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Problems</th>
                                        <td>
                                            <?php echo $results->problems; ?>
                                        </td>
                                        <th scope="row">Sources</th>
                                        <td>
                                            <?php echo $results->sources ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Budget</th>
                                        <td>
                                            <?php echo $results->budget; ?>
                                        </td>
                                        <th scope="row">Deadline</th>
                                        <td>
                                            <?php $time=getDateTimeDiff($date_global, $results->deadline );
                                             $period= explode(" ", $time); ?>
                                            <?php if ($period[1]=="days"): ?>
                                            <span class="text-dark">
                                                <?php echo "{$time}"; ?></span>
                                            <?php elseif($period[1]=="day"): ?>
                                            <span class="text-success">
                                                <?php echo "{$time}"; ?></span>
                                            <?php elseif($period[1]=="hours" || $period[1]=="hour"): ?>
                                            <span class="text-warning">
                                                <?php echo "{$time}"; ?></span>
                                            <?php elseif($period[1]=="mins" || $period[1]=="min"): ?>
                                            <span class="text-danger">
                                                <?php echo "{$time}"; ?></span>
                                            <?php elseif($period[1]=="secs" || $period[1]=="sec"): ?>
                                            <span class="text-danger">
                                                <?php echo "{$time}"; ?></span>
                                            <?php else: ?>
                                            <span class="text-danger">
                                                <?php echo "{$time}"; ?></span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td colspan="3">
                                            <?php echo $results->title; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Instructions</th>
                                        <td colspan="3" class="pl-5">

                                            <?php echo $results->instructions; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <?php }

					 ?>
                        <div class="card">
                            <div class="card-header">
                                <h1 class="headingSecondary mb-3">Results</h1>
                            </div>
                            <div class="showFiles" id="files">

                                <?php  filesDownload($_SESSION['user_id'], $project_id) ?>

                                <?php resultsDownload($_SESSION['user_id'], $project_id)  ?>
        
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require_once"../inc/footer_links.php";
 ?>
 <script>
     $(function(){
      setInterval(function(){

            let project_id="<?php echo $project_id; ?>";
            $("#bids").load("bids", {
            project_id: project_id
        });
      }, 30000);
     });
 </script>