<?php 
require_once "../inc/header_links.php";
$page="delivered";
require_once "../components/top_nav.php";
require_once("../inc/utilities.php");

require_once "../inc/header_links.php";
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM delivered LEFT JOIN projects ON delivered.project_id=projects.project_id WHERE delivered.student_id=".$_SESSION['user_id'];
$results=$db->get_results($query);


?>


<!-- <pre>
    <?php #print_r($results); ?>
</pre> -->
<div class="display">
    <div class="display__content">
        <?php require_once "../components/stud_leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">RESULTS</h1>
                <div class="card"> 
                      <h1 class="headingSecondary text-dark">Your homework results</h1>
                <?php if ($db->num_rows<1) { ?>
                  <div class="card-header">Assignments pending your approval</div> 
               <?php }else{?>
                          
            
       <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order id</th>
                                    <th class="wide">Topic</th>
                                    <th class="smalll">Tutor Id</th>
                                    <th class="medium">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $result): ?>
                                                        <tr>
                                        <?php #$name=base64_encode("wilson")  ?>
                                        <?php #$name=convert_uuencode("wilson") ?>
                                    <td class="smalll"><a href="delivered-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>"><?php echo $result->project_id."<i class='fas fa-external-link-alt icon-r ml-4'></i>"; ?></a></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo $result->tutor_id; ?></td>
                                    <td>
                                        <?php $time=getDateTimeDiff($date_global, $result->deadline );
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

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
               <?php } ?>
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
                                                therefore NOT be held liable
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