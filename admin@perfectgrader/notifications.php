<?php
if (isset($_POST['limit'])) {
	$limit=$_POST['limit'];
	require_once("../dbconfig/dbconnect.php");
	$query="SELECT * FROM notifications ORDER BY note_num desc LIMIT  $limit ";}
	$results=$db->get_results($query);
	if ($db->num_rows>0) {
		foreach ($results as $result) {
			if ($result->user_type==1) { ?>
				<div class="alert alert-primary" role="alert">
				  <?php echo $result->note; ?>
				</div>
			<?php }elseif ($result->user_type==2) { ?>
				<div class="alert alert-danger" role="alert">
				  <?php echo $result->note; ?>
				</div>
			<?php }else{ ?>
				<div class="alert alert-info" role="alert">
				  <?php echo $result->note; ?>
				</div>
			<?php }
		}
	}else{
		echo "there is nothing to show yet";
	}
 ?>
