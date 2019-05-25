<?php
require_once "../inc/header_links.php";
require_once"../inc/utilities.php";
#//////////////////////////////////////////////////////////////////////////////////// -->
require_once("../dbconfig/dbconnect.php");

# //////////////////////////////////////////////////////////////////////////////////// -->
$tutor_id=$_SESSION['user_id'];
if (isset($_REQUEST['pid'])) {
	$project_id=convert_uudecode($_REQUEST['pid']);

}

$page="" ;
$mainpage="orders";
require_once "./inc/topnav.php";
?>

<div class="display">
    <div class="display__content">
        <?php require_once "./inc/leftnav.php";



		?>
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <div class="headingTertiary text-light">Project # <?php echo $project_id. " Details"; ?></div>
                <ul class="d_table_1 mb-5">
                    <?php  $query=("SELECT * FROM revisions left join projects on revisions.project_id=projects.project_id WHERE revisions.project_id='$project_id'");
     $results=$db->get_row($query);
     if ($db->num_rows<1) {?>

                    <div class="card-body">
                        <div class="headingTertiary text-uppercase">
                            This project Is no longer Available
                        </div>
                    </div>

                    <?php  }else{ ?>
                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Deadline</th>
                                <th class="text-center">Price($)</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center mt-5">
                                    <?php echo $results->project_id ; ?>
                                </th>
                                <td class="text-center mt-5">
                                    <?php $time=getDateTimeDiff($date_global, $results->revision_deadline );
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
                                    <?php endif ?>
                                </td>
                                <td class="text-center mt-5">
                                    <?php echo $results->charges; ?>

                                </td>
                                <td class="text-center">
                                 Assigned to tutor id <?php echo $results->tutor_id; ?>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </ul>

                <div class="card bg-light mb-5">
                    <div class="card-header">Order Info</div>
                    <div class="card-body d_table_1__c ">
                        <ul class="d_table_1 d_table_1__b mb-5 mt-3">

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-5">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                                        <thead class="table-light ml-5">
                                            <tr>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Paper Format</th>
                                                <th class="text-center">Acadamic level</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <?php $Status=$results->status;
                        if ($Status==0) {
                          echo "In Progress";
                        }else{
                          "Not Available";
                        }
                       ?>
                                                </td>
                                                <td class="text-center"><?php echo $results->style; ?></td>
                                                <td class="text-center"><?php echo $results->academic_level; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">Slides</th>
                                                <th class="text-center">Problems</th>
                                                <th class="text-center">Pages</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $results->slides; ?></td>
                                                <td class="text-center"><?php echo $results->problems; ?></td>
                                                <td class="text-center"><?php echo $results->pages; ?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">

                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">Type of paper</th>
                                                <th class="text-center">Sources</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td class="text-center"><?php echo $results->type_of_paper; ?></td>
                                                <td class="text-center">
                                                    <?php  $sources=$results->sources;
                                                    if ($sources==0) {
                                                      echo "At least 1";
                                                    }else{
                                                      echo "{$sources}";
                                                    }
                                                   ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                </div>

                            </div>

                            </table>
                        </ul>
                        <div class="instrcution text-left">
                            <p>
                                <STRONG>Subject:<br></STRONG>
                                <?php echo $results->subject; ?></p>
                            <p>
                                <STRONG>Topic: <br></STRONG>
                                <?php echo $results->title; ?>
                            </p>
                            <p>
                                <STRONG>Instructions:<br></STRONG>
                                <div class="pl-5"><?php echo $results->instructions; ?></div>

                            </p>
                             <div class="bg-dark text-warning">
                                <STRONG>Revision Instructions:<br></STRONG>
                                <div class="pl-5 bg-dark text-warning"><?php echo $results->revision_instructions; ?></div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Files:</strong></div>
                                        <div class="card-body files" id="files">
                                            <h3><strong>Project Files</strong></h3>
                                            <p class="assign">
                                            <?php filesDownload($results->student_id,$results->project_id) ?>
                                            </p>
                                            <hr>
                                            <h3><STRONG>Results Files</STRONG></h3>
                                            <hr>
                                            <p class="results">
                                            	<?php resultsDownload($results->student_id,$results->project_id) ?>
                                            </p>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Messages:</strong></div>
                                        <div class="card-body messages">
                                            <script>
                                                    let project_id="<?php echo $results->project_id; ?>";
                                                   let user_type=1;
                                                </script>
                                            <div class="messages__view " id="messageBox">


                                            </div>

                                           

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>
</div>

<?php
require_once"../inc/footer_links.php";
 ?>
 <script src="../js/chat.js"></script>
<script src="../js/files.js"></script>