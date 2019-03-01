<?php
if (isset($_POST['rate'])) {
require_once("../inc/utilities.php");
require_once("../dbconfig/dbconnect.php");
$date=date("d-m-Y h:i:s A",strtotime("now"));
$comment=$_POST['comment'];
$rating=$_POST['rating'];
$project_id=$_POST['project_id'];
$student_id=$_POST['student_id'];
$tutor_id=$_POST['tutor_id'];

$query_="UPDATE chats SET status=1 WHERE project_id='$project_id'";
$db->query($query_);
$query="INSERT INTO closed(comment,rating,date_closed,project_id,student_id,tutor_id)VALUES('$comment','$rating','$date','$project_id','$student_id','$tutor_id')";

if ($db->query($query)) {

	$query="UPDATE projects SET status=4 WHERE project_id='$project_id'";
	if ($db->query($query)) {
		/////////////////////////////////notification/////////////////////////////////////////////
$note="Student Id: ".$student_id." approved project id: ".$project_id." on ".$date_global;
$note2="You approved project id: ".$project_id." on ". $date_global;
$querys="INSERT INTO notifications(user_type, note) VALUES(1,'$note')";
$db->query($querys);
$querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
$db->query($querys);
/////////////////////////////////notification/////////////////////////////////////////////
		$query="DELETE FROM delivered WHERE project_id='$project_id'";
		if ($db->query($query)) {?>
			<script>
		alert("We are delighted to have worked with you (. ❛ ᴗ ❛.)");
		 window.location.assign("completed");
		</script>

		<?php }
	}
 }
}
 ?>
