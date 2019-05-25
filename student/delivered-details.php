<?php
if (isset($_REQUEST['id'])) {
    $project_id = convert_uudecode(convert_uuencode($_REQUEST['id']));
} else {
    $project_id = convert_uudecode($_REQUEST['pid']);
}
ob_start();
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";
ob_flush();
if (isset($_POST['submit'])) {
    require_once 'stud_functions.php';
    filesUpload($_SESSION['user_id'], $_POST['project_id']);
}
$query = "SELECT * FROM delivered left join projects on delivered.project_id=projects.project_id WHERE delivered.project_id='$project_id'";
$results = $db->get_row($query);
// print_r($results);
?>
<div class="display">
<div class="display__content">
<?php $page = "delivered";?>
<?php require_once "../components/stud_leftnav.php"?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<div class="headingTertiary text-light">ORDER NUMBER
<?php echo $project_id; ?>
</div>
<div class="card">
<div class="card-header text-uppercase">details</div>
<div class="card-body">
<?php
if ($db->num_rows < 1) {
    echo "Order is no longer available";
} else {?>
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
<th scope="row">Deadline</th>
<td>
<?php $time = getDateTimeDiff($date_global, $results->deadline);
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
<div class="card">
<div class="card-header mb-3">
<div class="headingTertiary mb-3">FILES/MESSAGES</div>
</div>
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="card-header"><strong>Files:</strong></div>
<div class="card-body files" id="files">
<p class="assign">
<?php filesDownload($_SESSION['user_id'], $project_id)?>
</p>
<hr>
<h3><STRONG>Results</STRONG></h3>
<hr>
<p class="results">
<?php resultsDownload($_SESSION['user_id'], $project_id)?>
</p>
</div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="card-header"><strong>Messages:</strong></div>
<div class="card-body messages">
<div class="messages__view" id="messageBox">
<script>
let project_id="<?php echo $project_id; ?>";
let user_type="<?php echo $_SESSION['user_type'] ?>";
</script>
</div>
<form action="../chat" method="POST" id="chat_form">
<p class="messages__form" >
<textarea name="message" placeholder="Messaging not supported for delivered orders (:" required disabled></textarea>
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
<div class="card">
<div class="card-header">Action</div>
<div class="card-body action_card">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6 mb-3">
<a class="btn  btn-success btn-block text-uppercase " href="#satisfied" data-toggle="modal" id="Mlauncher">Satisfied</a>
</div>
<div class="col-sm-12 col-md-6 col-lg-6 mb-3">
<a class="btn  btn-danger btn-block text-uppercase " href="#revision" data-toggle="modal" id="Mlauncher">Request Adjustments</a>
</div>
<!-- REVISION DIV -->
<div class="modal fade" id="revision">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title ml-lg-5">Adjustment Instructions/ New deadline</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<p><form action="delivered-details-revision" method="post" id="revision">
<textarea name="instructions" id="instructions"
class="form-control forms2__textarea"
placeholder="instructions" required></textarea>
<div class="form-row">
<div class="col">
<label for="datetime" class="forms2__label">days (<small>to
deadline</small>)</label>
<input type="number" name="date" class="form-control forms2__select"
min="0" max="12" id="datetyme" required>
<input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
<input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
<input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
</div>
<div class="col">
<label for="datetime" class="forms2__label">hours (<small>to
deadline</small>)</label>
<input type="number" name="tyme" id="datetyme"
class="form-control forms2__select" max="24" min="0" required>
</div>
</div>
<button type="submit" id="submit" class="btn btn-primary btn-block mt-5" name="submit">Submit Instruction</button>
</form>
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- REVISION DIV -->
<!-- SATISFIED DIV -->
<div class="modal fade" id="satisfied">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title ml-lg-5">LET'S KNOW HOW YOU FEEL ABOUT THIS TUTOR</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<p><form action="rate" method="post" id="revision">
<div class="form-row">
<div class="col-4">
<input type="number" name="rating" class="form-control forms2__select" max="10" min="0" value="10" placeholder="rate out of 10" required>
<input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
<input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
<input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
<input type="hidden" name="charges" value="<?php echo $results->charges ?>">
</div>
<div class="col-8">
<textarea name="comment"
class="form-control" style="font-size: 18px; height: 35px;"
placeholder="leave a comment.....:)"></textarea>
</div>
</div>
<button type="submit" id="rate" class="btn btn-primary btn-block mt-5" name="rate">OK</button>
</form>
</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- SATISFIED DIV -->
</div>
</div>
</div>
</div>
<?php }
?>
</div>
</div>
</div>
<?php require_once "section_notes.php"?>
</div>
</div>
</div>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<?php
require_once "../inc/footer_links.php";
?>
<script src="../js/chat.js"></script>
<script src="../js/files.js"></script>
<script>
CKEDITOR.replace('instructions');
</script>
