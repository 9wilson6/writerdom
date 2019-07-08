<?php
if (isset($_POST['submit'])) {
    $limit = $_POST['limit'];
    $student_id = $_POST['student_id'];
    require_once "../dbconfig/dbconnect.php";
   ?>
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
<?php
 $query = "SELECT chats.user_type, chats.message, chats.date_sent, chats.project_id, chats.student_id, chats.tutor_id,projects.status, chats.status as me FROM chats LEFT JOIN projects on chats.project_id=projects.project_id where chats.user_type=2 and chats.student_id='$student_id' ORDER BY date_sent DESC LIMIT " . $limit;
    $results = $db->get_results($query);
 foreach ($results as $result): ?>
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
<script>
let project_id="<?php echo $project_id; ?>";
let user_type="<?php echo $_SESSION['user_type'] ?>";
require_once "../inc/footer_links.php";
</script>
</tbody>
</table>
<?php }

?>
