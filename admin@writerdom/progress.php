<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$page="";
$mainpage="orders";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM on_progress LEFT JOIN projects ON on_progress.project_id=projects.project_id";
$results=$db->get_results($query);

 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <h1 class="headingTertiary text-light text-uppercase">Orders Onprogress</h1>

                <div class="card">
                   	<div class="card-header text-uppercase">On progress</div>
                   	<div class="card-body">
                  <?php if ($db->num_rows<1): ?>
                        <h1 class="classHeadingSecondary">There is Nothing To show Yet</h1>
                        <?php elseif($db->num_rows>0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="wide">Title</th>
                                    <th data-toggle="tooltip" title="Price $" data-placement="right">Price</th>
                                    <th data-toggle="tooltip" title="pages" data-placement="right">Pg</th>
                                    <th data-toggle="tooltip" title="Slides" data-placement="right">Sl</th>
                                    <th data-toggle="tooltip" title="Problems" data-placement="right">Pr</th>
                                    <th class="smalll">Subject</th>
                                    <th class="medium">Deadline</th>
                                </tr>
                            </thead>

                            <tbody id="display">
                                       <?php foreach ($results as $result): ?>
                                <tr>
                                    <td class="smalll"><a
                                            href="progress-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
                                                class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
                                    <td class="wide">
                                        <?php echo (strlen($result->title) >35 )? substr($result->title, 0, 35).'...':$result->title; ?>
                                    </td>
                                    <td><?php echo $result->budget; ?></td>
                                    <td><?php echo $result->pages; ?></td>
                                    <td><?php echo $result->slides; ?></td>
                                    <td><?php echo $result->problems; ?></td>
                                    <td class="smalll"><?php echo $result->subject; ?></td>
                                    <td><?php $time=getDateTimeDiff($date_global, $result->deadline );
                                     $period= explode(" ", $time); ?>
                                        <?php if ($period[1]=="days"): ?>
                                        <span class="text-dark"><?php echo "{$time}"; ?></span>
                                        <?php elseif($period[1]=="day"): ?>
                                        <span class="text-success"><?php echo "{$time}"; ?></span>
                                        <?php elseif($period[1]=="hours" || $period[1]=="hour"): ?>
                                        <span class="text-warning"><?php echo "{$time}"; ?></span>
                                        <?php elseif($period[1]=="mins" || $period[1]=="min"): ?>
                                        <span class="text-danger"><?php echo "{$time}"; ?></span>
                                        <?php elseif($period[1]=="secs" || $period[1]=="sec"): ?>
                                        <span class="text-danger"><?php echo "{$time}"; ?></span>
                                        <?php endif ?>
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