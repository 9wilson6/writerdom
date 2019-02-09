<?php 
if (isset($_POST['assing'])) {
	require_once("../dbconfig/dbconnect.php");
	$project_id=$_POST['project_id'];
	$user_id=$_POST['user_id'];
	$tutor_id=$_POST['tutor_id'];
	$cost=$_POST['cost'];
	$charges=$_POST['charged'];
$query="INSERT INTO on_progress(project_id, student_id, tutor_id) VALUES ('$project_id', '$user_id', '$tutor_id')";
if ($db->query($query)) {
	$query="UPDATE projects SET status=1, cost=$cost, charges=$charges WHERE project_id='$project_id'";
	if ($db->query($query)) {

		$query="DELETE FROM bids WHERE project_id='$project_id'";
		if ($db->query($query)) {
			?>
		<script>
			let x="<?php echo $tutor_id ?>"
			alert("project successfully assigned to tutor id: " +x );
			  window.location.assign("in-progress");
		</script>
	<?php
		}
	 }
}
}
 ?>



  