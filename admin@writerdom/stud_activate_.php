<?php if (isset($_POST['submit'])) {
	require_once("../dbconfig/dbconnect.php");
	$user_id=$_POST['user_id'];
	$query="UPDATE users SET status=1 WHERE user_id='$user_id'";
	if ($db->query($query)) { ?>
		<script>
			alert("Student ID: <?php echo $user_id ?> activated successfully");
			window.location.assign("stud_activate");
		</script>
	<?php }
} ?>