<?php ob_start();?>
<meta http-equiv="refresh" content="30000">
<?php
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
$student_id = $_SESSION['user_id'];
$query = "SELECT * FROM projects WHERE student_id='$student_id' AND status=0 order by project_id desc";
$results = $db->get_results($query);
$page = "my-homework";
require_once "../components/top_nav.php";
ob_flush();
?>
<div class="display">
<div class="display__content">
<?php require_once "../components/stud_leftnav.php"?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<h1 class="headingTertiary text-light">My Homeworks</h1>
<div class="card">
<div class="card-header">
<?php if ($db->num_rows > 0): ?>
You can assign this assignments to tutors anytime..
<?php elseif ($db->num_rows <= 0): ?>
You have 0 posted assignments
<?php endif?>
</div>
<div class="card-body">
<?php if ($db->num_rows <= 0): ?>
<h2 class="headingTertiary">Nothing to Show Yet</h2>
<?php elseif ($db->num_rows > 0): ?>
<table class="table table-bordered">
<thead>
<tr>
<th>id</th>
<th class="wide">Topic</th>
<th>Budget</th>
<th class="medium">Deadline</th>
<th class="medium">bids</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result) {?>
<tr>
<td class="smalll"><a
href="my-homework-details?id=<?php echo urlencode(convert_uuencode($result->project_id)); ?>">
<?php echo $result->project_id . "<i class='fas fa-external-link-alt icon-r ml-4'></i>"; ?></a>
</td>
<td class="wide">
<?php echo (strlen($result->title) > 35) ? substr($result->title, 0, 35) . '...' : $result->title; ?>
</td>
<td>
<?php echo $result->budget; ?>
</td>
<td>
<?php $time = getDateTimeDiff($date_global, $result->deadline);
    $period = explode(" ", $time);?>
<?php if ($period[1] == "days"): ?>
<span class="text-dark">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "day"): ?>
<span class="text-success">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "hours" || $period[1] == "hour"): ?>
<span class="text-warning">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "mins" || $period[1] == "min"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "secs" || $period[1] == "sec"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php else: ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php endif?>
</td>
<td class="text-warning">
<?php echo $result->bids ?>
</td>
</tr>
<?php }?>
</tbody>
</table>
<?php endif?>
</div>
</div>
</div>
<?php require_once "section_notes.php"?>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>