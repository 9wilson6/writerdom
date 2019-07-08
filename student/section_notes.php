<?php
function events($student_id)
{
    global $db;
    $query = "SELECT * FROM notifications where user_id='$student_id' ORDER BY note_num desc LIMIT 5";
    $results = $db->get_results($query);
    if ($db->num_rows > 0) {?>
<?php foreach ($results as $result): ?>
<div class="alert alert-secondary" role="alert">
<?php echo $result->note; ?>
</div>
<?php endforeach;?>
<?php } else {?>
<div class="text-dark">No Activities</div>
<?php }}?>
<div class="col-sm-12 col-md-12 col-lg-12  col-xl-3">
<div class="headingTertiary text-light">Notes</div>
<div class="card">
<div class="card-header text-uppercase">
Note that
</div>
<div class="card-body">
<table class="table table-hover table-borderless text-left">
<tbody>
<ul>
<tr>
<td>
<li>This service exists to protect your private and personal information,
you shouldn’t therefore communicate with tutors outside the site.</li>
</td>
</tr>
<tr>
<td>
<li>Sharing third party communication methods (including emails, phone
numbers, and Skype address) is against our user guidelines and we shall
therefore NOT be held
liable
failure to observe this. See our T.O.S</li>
</td>
</tr>
</ul>
</tbody>
</table>
</div>
<div class="card-footer">
</div>
</div>
<div class="card mt-5">
<div class="card-header text-uppercase">Recent events</div><!--card header-->
<div class="card-body" id="cbody">
<?php events($_SESSION['user_id'])?>
</div><!--card body-->
<!-- <div class="card-footer"><a href="notes" class="btn btn-info btn-block">VIEW ALL</a></div> -->
</div><!--card-->
</div>