<?php 
if (isset($_POST['submit'])) {
	require_once("../dbconfig/dbconnect.php");
	require_once("../inc/utilities.php");
	$instructions=$db->escape($_POST['instructions']);

	$date=$_POST['date'];
	$tyme=$_POST['tyme'];
	$project_id=$_POST['project_id'];
	$student_id=$_POST['student_id'];
	$tutor_id=$_POST['tutor_id'];
	$datetyme=strtotime("+ {$date}days +{$tyme}hours");
	$pid=urlencode(convert_uuencode($project_id));
	if ($instructions=="") {?>
		<script>
			alert("Please provide instructions");
			window.location.href="delivered-details?id=<?php echo $project_id ?>#chat_form";
		</script>
	<?php }elseif ($date==0 && $tyme==0) {?>
		<script>
			alert("Date or time must have a value");
			window.location.href="delivered-details?id=<?php echo $project_id ?>#chat_form";
		</script>
	<?php }


	$query="INSERT INTO revisions(student_id, tutor_id, project_id, revision_instructions,revision_deadline)VALUES('$student_id','$tutor_id','$project_id','$instructions','$datetyme')";
	if ($db->query($query)) {
			$query="DELETE FROM delivered WHERE project_id='$project_id'";
			if ($db->query($query)) {
				$query="UPDATE projects SET status=3, deadline='$datetyme' WHERE project_id='$project_id'";
				if ($db->query($query)) {

					header("location:editing?pid=$pid");
				}
			}
		}	
}
 ?>



				
				