<!-- <meta http-equiv="refresh" content="300"> -->
<?php 
$project_id=convert_uudecode($_REQUEST['pid']);
require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";

if (isset($_POST['submit'])) {
	require_once('stud_functions.php');
	filesUpload($_SESSION['user_id'], $_POST['project_id']);
}
$query=("SELECT * FROM revisions left join projects on revisions.project_id=projects.project_id WHERE revisions.project_id='$project_id'");
$results=$db->get_row($query);
// print_r($results);

 ?>

<div class="display">
    <div class="display__content">
        <?php $page="revision"; ?>
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
                                        <th scope="row">Cost</th>
                                        <td>
                                            <?php echo $results->cost; ?>
                                        </td>
                                        <th scope="row" class="text-danger bg-dark">Rivision deadline</th>
                                        <td class="bg-dark">
                                            <?php $time=getDateTimeDiff($date_global, $results->revision_deadline );
                                             $period= explode(" ", $time); ?>
                                            <?php if ($period[1]=="days"): ?>
                                            <span class="text-light">
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

                                    <tr class="bg-dark text-warning">
                                        <th>Rivision Instructions</th>
                                        <td colspan="3" class="pl-5">

                                            <?php echo $results->revision_instructions; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                 
                       <div class="row">
                                <div class="col-sm-12 col-md-6 col lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Files:</strong></div>
                                        <div class="card-body files" id="files">
                                            <p class="assign">
                                            <?php filesDownload($results->student_id,$results->project_id) ?>
                                            </p>
                                            <hr>
                                            <h3><STRONG>Results</STRONG></h3>
                                            <hr>
                                            <p class="results">
                                                <?php resultsDownload($results->student_id, $results->project_id) ?>
                                            </p>
                                            

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Messages:</strong></div>
                                        <div class="card-body messages">
                                                                                        <div class="messages__view " id="messageBox">
                                                <script>
                                                    let project_id="<?php echo $results->project_id; ?>";
                                                   let user_type="<?php echo $_SESSION['user_type'] ?>";
                                                </script>
                                               

                                               <!--  <div class="received">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, debitis.
                                                   <div class="date">01/02/2018</div> 
                                                </div>
                                                 <div class="sent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit id quos, quae voluptate facilis reprehenderit.
                                                    <div class="date">01/02/2018</div>
                                                </div> -->
                                            </div>

                                
                                           <form action="../chat" method="POST" id="chat_form"> 
                                            <p class="messages__form" > 
                                                <textarea name="message" placeholder="type a message here......." required></textarea>
                                                
                                            </p>
                                            <input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
                                            <input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type'] ?>">
                                            <input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
                                            <input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
                                            <p class="send">
                                                 <input type="submit" value="Send" class="btn btn-sm btn-info">
                                                </p>
                                        </form>                                   </div>
                                    </div>
                                </div>

                            </div>
                                <form action="" enctype="multipart/form-data" method="POST" class="files_edit">
                                    <div class="my_container">
                                        <div class="row">
                                            <div class="col-3 col-sm-3 col-md-3"><label for="files" class="forms2__label">Add
                                                    More Files &rarr;</label></div>
                                            <div class="col-6 col-sm-6 col-md-6"><input type="file" class="files_edit__input"
                                                    name="file[]" class="form-control-file forms2__files" id="files"
                                                    required multiple />
                                                <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                                            </div>
                                            <div class="col-3 col-sm-3 col-md-3"><button type="submit" name="submit"
                                                    class="btn btn-submit btn-block">Upload Files</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php }

                     ?>
                       </div>




                </div>

            </div>

  <?php require_once("section_notes.php") ?>


        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require_once"../inc/footer_links.php";
 ?>
 <script src="../js/chat.js"></script>
<script src="../js/files.js"></script>