<?php
require_once "../inc/header_links.php";
$page = "finance";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
?>
<div class="display">
<div class="display__content">
<?php require_once "../components/tutor_leftnav.php"?>
<!-- <h1 class="headingTertiary text-left">Available</h1> -->
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<h1 class="headingTertiary text-light">Payment history</h1>
<div class="card">
<div class="card-header">Feedback</div>
<div class="card-body">
<?php $tutor_id = $_SESSION['user_id'];
$query = "SELECT * FROM closed LEFT JOIN projects on closed.project_id=projects.project_id WHERE closed.tutor_id='$tutor_id' and projects.status=5 order by closed.project_id desc LIMIT 100";
$results = $db->get_results($query);
?>
<?php if ($results > 0): ?>
	<div class="table-responsive" style="overflow-y: hidden;">
<table class="table table-bordered">
<thead>
<tr>
<th>Project id</th>
<th>price</th>
<th >Rating</th>
<th>Complition Date</th>
<th>Payment Date</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result): ?>
<tr>
<td><a
href="my-projects-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
<td><?php echo $result->charges; ?></td>
<td><?php echo $result->rating; ?></td>
<td><?php echo $result->date_closed; ?></td>
<td><?php echo $result->DATE_PAID; ?></td>
</tr>
<?php endforeach?>
</tbody>
</table>
</div>
<?php else: ?>
<h1 class="headingTertiary">
Nothing To show yet
</h1>
<?php endif?>
</div>
</div>
</div>
<?php require_once "./section_rate.php";?>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>
