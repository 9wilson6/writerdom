<?php 
require_once("dbconfig/dbconnect.php");
if(isset($_POST['submit'])) {
	require_once("dbconfig/dbconnect.php");

	$chat=77;
		require_once("inc/utilities.php");
	$project_id=$_POST['project_id'];
	$user_type=$_POST['user_type'];
	$student_id=$_POST['student_id'];
	$tutor_id=$_POST['tutor_id'];
	$message=$db->escape($_POST['message']);
	$query="INSERT INTO chats(user_type, project_id, message, date_sent, student_id, tutor_id) VALUES('$user_type', '$project_id', '$message', '$date_global', '$student_id', '$tutor_id')";
	if ($db->query($query)) {
		
	}
}


if (isset($_POST['project_id']) && isset($_POST['user_type'])) {

	$project_id=$_POST['project_id'];
	$user_type=$_POST['user_type'];
		$query="SELECT * FROM chats WHERE project_id='$project_id'";
		$results=$db->get_results($query);

	?>
<?php if ($db->num_rows>0): ?>
		<?php foreach ($results as $result): ?>
		<?php if ($result->user_type==$user_type): ?>
			<div class="received"><?php echo $result->message; ?>
        	<div class="date"><?php echo $result->date_sent; ?></div>
        	</div>
		<?php else: ?>
			<div class="sent"><?php echo $result->message; ?>
         <div class="date"><?php echo $result->date_sent; ?></div> 
         </div>
					
		<?php endif ?>

	 
        
        	<?php endforeach ?>
<?php else: ?>
	<?php echo "No messages" ?>
	<?php endif ?>
<?php }



 ?>
 <!-- ////////UPDATE ON KEY Press///////// -->
<?php 
if (isset($_POST['event'])) {
	$project_id=$_POST['project_id'];
	$user_type=$_POST['user_type'];
	if ($user_type==1) {
		$query="UPDATE chats SET status=1 WHERE project_id='$project_id' and user_type =2";
	}elseif ($user_type==2) {
		$query="UPDATE chats SET status=1 WHERE project_id='$project_id' and user_type =1";
	}
	
	$results=$db->query($query);
}
 ?>
 <!-- ////////UPDATE ON KEY Press///////// -->