<?php
ob_start();
require_once "../inc/header_links.php";
$page = "messages";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
$student_id=$_SESSION['info']->user_id;
ob_flush();
$query = "SELECT chats.user_type, chats.message, chats.date_sent, chats.project_id, chats.student_id, chats.tutor_id,projects.status, chats.status as me FROM chats LEFT JOIN projects on chats.project_id=projects.project_id where chats.user_type=2 and chats.student_id='$student_id' ORDER BY date_sent DESC LIMIT 10";
$results = $db->get_results($query);
?>
<div class="display">
<div class="display__content">
<?php require_once "../components/stud_leftnav.php"?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<h1 class="headingTertiary text-light">Messages</h1>
<div class="card">
<div class="card-header">Your recent messages</div>
<div class="card-body">
<?php if ($db->num_rows > 0): ?>
<div class="table-responsive" id="meso">
<table class="table">
<table class="table table-bordered">
<thead>
<tr>
<th class="smalll">Order id</th>
<th class="smalll">From(tutor id)</th>
<th class="medium">Message</th>
<th class="smalll">Date</th>
<th class="wide">Action</th>
</tr>
</thead><tbody>
<?php foreach ($results as $result): ?>
<?php if ($result->me == 0): ?>
<tr style="background: #9B8889">
<td><?php echo $result->project_id; ?></td>
<td><?php echo $result->tutor_id; ?></td>
<td>
<?php $project_id = $result->project_id;?>
<p style="max-height: 30px; overflow: auto;"><?php echo $result->message; ?></p>
</td>
<td><?php echo $result->date_sent; ?></td>
<?php if ($result->status == 1): ?>
<td>
<a href="in-progress-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status == 2): ?>
<td>
<a href="delivered-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status == 3): ?>
<td>
<a href="editing-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status > 3): ?>
<td>
<a href="complited_details?id=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php endif?>
</tr>
<?php else: ?>
<tr>
<td><?php echo $result->project_id; ?></td>
<td><?php echo $result->tutor_id; ?></td>
<td>
<?php $project_id = $result->project_id;?>
<p style="max-height: 30px; overflow: auto;"><?php echo $result->message; ?></p>
</td>
<td><?php echo $result->date_sent; ?></td>
<?php if ($result->status == 1): ?>
<td>
<a href="in-progress-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status == 2): ?>
<td>
<a href="delivered-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status == 3): ?>
<td>
<a href="editing-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php elseif ($result->status > 3): ?>
<td>
<a href="complited_details?id=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block" style="background: #00897b; color:white;">view</a>
</td>
<?php endif?>
</tr>
<?php endif?>
<?php endforeach?>
<script>let project_id="<?php echo $project_id; ?>";
let user_type="<?php echo $_SESSION['user_type'] ?>";
</script>
</tbody>
</table>
</table>
</div>
<?php else: ?>
<div class="headingSecondary">No Messages Yet</div>
<?php endif?>
</div>
<?php if ($db->num_rows > 9): ?>
<div class="card-footer">
<select name="select" class="custom-select mb-2 ml-0 mr-sm-2 mb-sm-0" id="select">
<option value="20">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="100">250</option>
<option value="100">500</option>
</select></div>
<?php endif?>
</div>
</div>
<?php require_once "section_notes.php"?>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>
<script>
$("#key").click(function(){
$("#data").toggle();
});
</script>
<script>
$( document ).ready(function() {
$.post("../chat", {
project_id: project_id,
user_type: user_type,
event: "keylistener"
});
$("#select").change(function() {
let limit = $("#select").val();
let submit="submit";
let student_id="<?php echo $student_id; ?>"
$("#meso").load("messages_.php", {
limit: limit,
student_id:student_id,
submit:submit
})
});
// setTimeout('window.location.href=window.location.href;', 120000);
});
</script>
