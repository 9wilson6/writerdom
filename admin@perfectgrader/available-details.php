<?php 
require_once "../inc/header_links.php";
require_once"../inc/utilities.php";
require_once("./inc/topnav.php");
#//////////////////////////////////////////////////////////////////////////////////// -->

require_once("../dbconfig/dbconnect.php");
if (isset($_REQUEST['pid'])) {
    $project_id=convert_uudecode($_REQUEST['pid']);
    
}

$page="" ;
$mainpage="orders";
?>

<div class="display">
    <div class="display__content">
      <?php require_once "inc/leftnav.php" ?>
      <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
            <div class="headingTertiary text-light">Project # <?php echo $project_id. " Details"; ?></div>
            <ul class="d_table_1 mb-5">
                <?php  $query=("SELECT * FROM projects WHERE project_id='$project_id' and status=0");
                $results=$db->get_row($query);
                if ($db->num_rows<1) {?>

                    <div class="card-body">
                        <div class="headingTertiary text-uppercase">
                            This project Is no longer Available
                        </div>
                    </div>
                </div>
            <?php  }else{ ?>
                <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Order Id</th>
                            <th class="text-center">Deadline</th>
                            <th class="text-center">Budget</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center mt-5">
                                <?php echo $results->project_id ; ?>
                            </th>
                            <td class="text-center mt-5 text-danger">
                                <?php $time=getDateTimeDiff($date_global, $results->deadline );
                                echo $time;
                                ?>
                            </td>
                            <td class="text-center mt-5">
                                <?php echo $results->budget; ?>

                            </td>

                        </tr>

                    </tbody>
                </table>
            </ul>

            <div class="card bg-light mb-5">
                <div class="card-header ">Order Info</div>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-5 col-lg-5">
                                <div class="card">
                                    <div class="card-header"><strong>Files:</strong></div>
                                    <div class="card-body files">
                                        <p><?php filesDownload($results->student_id,$results->project_id) ?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-7">
                                <div class="card">
                                    <div class="card-header"><strong>Messages:</strong></div>
                                    <div class="card-body messages">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    <?php } ?>


</div>

</div>
</div>

<?php
require_once"../inc/footer_links.php";

?>