<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$page="";
$mainpage="";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$project_id=convert_uudecode($_REQUEST['pid']);
$query="SELECT * FROM closed LEFT JOIN projects ON closed.project_id=projects.project_id WHERE closed.project_id='$project_id'";
$results=$db->get_row($query);

 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <h1 class="headingTertiary text-light">Homework #
                    <?php echo $project_id ; ?>
                </h1>
               

                <div class="card">
                   	<div class="card-header text-uppercase">DETAILS</div>
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

                        <div class="row">
                                     <div class="col-sm-12 col-md-6 col lg-6">
                                             <div class="card">
                                                     <div class="card-header"><strong>Files:</strong></div>
                                                     <div class="card-body files" id="files">
                                                             <p class="assign">
                                                             <?php filesDownload($results->student_id, $project_id) ?>
                                                             </p>
                                                             <hr>
                                                             <h3><STRONG>Results</STRONG></h3>
                                                             <hr>
                                                             <p class="results">
                                                                 <?php resultsDownload($results->student_id, $project_id) ?>
                                                             </p>


                                                     </div>
                                             </div>

                                     </div>
                 <div class="col-sm-12 col-md-6 col lg-6">
                             <div class="card">
                                     <div class="card-header"><strong>Messages:</strong></div>
                                     <div class="card-body messages">
                                             <div class="messages__view" id="messageBox">
                                                     <script>
                                                             let project_id="<?php echo $project_id; ?>";
                                                            let user_type=1;
                                                     </script>

                                             </div>

                                     <form action="../chat" method="POST" id="chat_form">
                                             <p class="messages__form" >
                                             <textarea name="message" placeholder="Messaging not supported for closed orders (:" required disabled></textarea>

                                             </p>
                                             <input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
                                             <input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type'] ?>">
                                             <input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
                                             <input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
                                             <p class="send">
                                                <input type="submit" value="Send" disabled class="btn btn-sm btn-basic" id="send">
                                                     </p>
                                     </form>
                                     </div>
                             </div>
                     </div>
                     </div>
                    </div>
                   	</div>
                   	<div class="card-footer"></div>
                   </div>   
            </div>
        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php") ?>
 <script src="../js/chat.js"></script>
<script src="../js/files.js"></script>