<?php 
ob_start();
require_once "../inc/header_links.php";
$page="completed";
require_once "../components/top_nav.php";
require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
ob_flush();
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM closed LEFT JOIN projects ON closed.project_id=projects.project_id  WHERE closed.student_id='$user_id'";
$results=$db->get_results($query);
?>

<div class="display">
    <div class="display__content">
        <?php require_once "../components/stud_leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Closed Projects </h1>
                <div class="card">
                    <div class="card-header">
                        <?php if ($db->num_rows>0): ?>
                            We are happy to have seen seen you through the below assingents
                            <?php elseif($db->num_rows<=0): ?>
                                You have 0 posted assignments
                            <?php endif ?>
                        </div>
                        <div class="card-body">
                            <?php if ($db->num_rows<=0): ?>
                                <h2 class="headingTertiary">Nothing to Show Yet</h2>
                                <?php elseif($db->num_rows>0): ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th class="wide">Topic</th>
                                                <th>Cost($)</th>
                                                <th class="medium">Date Complited</th>
                                                <th class="medium">Tutor Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($results as $result) { ?>


                                                <tr>

                                                    <td class="smalll"><a
                                                        href="complited_details?id=<?php echo urlencode(convert_uuencode($result->project_id)); ?>">
                                                        <?php echo $result->project_id. "<i class='fas fa-external-link-alt icon-r ml-4'></i>"; ?></a>
                                                    </td>
                                                    <!-- <td><?php #echo $result->title; ?></td> -->
                                                    <td class="wide">
                                                        <?php echo (strlen($result->title) >35 )? substr($result->title, 0, 35).'...':$result->title; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result->cost; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result->date_closed; ?>
                                                    </td>
                                                    <td class="text-warning">
                                                        <?php echo $result->tutor_id ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                            </div>
                    <!--  <?php #if (!$result_q<20 ||$result_q>$result_q): ?>
    <div class="card-footer">load more</div>
    <?php #endif ?> -->
</div>
</div>
<?php require_once("section_notes.php") ?>
</div>
</div>
</div>

<?php
require_once"../inc/footer_links.php";
?>