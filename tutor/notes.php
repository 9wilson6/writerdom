<?php
require_once "../inc/header_links.php";
$page = "finance";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
?>
<div class="display">
<div class="display__content">
<div class="container adjust_alert-font">
<?php require_once "../components/tutor_leftnav.php"?>
<?php
$tutor_id = $_SESSION['user_id'];
$query = "SELECT * FROM notifications where user_id='$tutor_id' ORDER BY note_num desc limit 300";
$results = $db->get_results($query);
if ($db->num_rows > 0) {?>
<?php foreach ($results as $result): ?>
<div class="alert alert-success" role="alert">
<?php echo $result->note; ?>
</div>
<?php endforeach;?>
<?php } else {?>
<div class="text-dark">No Activities</div>
<?php }
?>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>
