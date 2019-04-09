<?php
if (isset($_POST['rate'])) {
	require_once("../inc/utilities.php");
	require_once("../dbconfig/dbconnect.php");
	$date=date("d-m-Y h:i:s A",strtotime("now"));
	$comment=$db->escape($_POST['comment']);
	$rating=$_POST['rating'];
	$project_id=$_POST['project_id'];
	$student_id=$_POST['student_id'];
	$tutor_id=$_POST['tutor_id'];
	$charges=ceil($_POST['charges'] * 0.70);

	$query="SELECT dues FROM users WHERE user_id='$tutor_id'";
	$result=$db->get_var($query);
	$dues=($result+$charges);
	$query="UPDATE users SET dues='$dues' WHERE user_id='$tutor_id'";
	$db->query($query);

	$query_="UPDATE chats SET status=1 WHERE project_id='$project_id'";
	$db->query($query_);
	$query="INSERT INTO closed(comment,rating,date_closed,project_id,student_id,tutor_id)VALUES('$comment','$rating','$date','$project_id','$student_id','$tutor_id')";

	if ($db->query($query)) {

		$query="UPDATE projects SET status=4, charges='$charges' WHERE project_id='$project_id'";
		if ($db->query($query)) {
		/////////////////////////////////notification/////////////////////////////////////////////
			$note="Student Id: ".$student_id." approved project id: ".$project_id." on ".$date_global;
			$note2="You approved project id: ".$project_id." on ". $date_global;
			$querys="INSERT INTO notifications(user_type, note) VALUES(1,'$note')";
			$db->query($querys);
			$querys="INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2','$student_id')";
			$db->query($querys);
/////////////////////////////////notification/////////////////////////////////////////////
			$query="DELETE FROM delivered WHERE project_id='$project_id'";

			if ($db->query($query)) { 


				$query1="SELECT email FROM users WHERE user_id='$tutor_id' and type=2";
				$tutor_email=$db->get_var($query1);
				require_once("../inc/global_functions.php");
				$subject="Approval for project ID: ". $project_id;
				$details="Order ID: ".$project_id. " has been accepted by the client. <br> Rating: ".$rating."<br> Comment: ".$comment;
				sendMail($details, $tutor_email, $subject);
				sendMail($details, "admin@perfectgrader.com", $subject);
				?>
				<script>
					alert("We are delighted to have worked with you (. ❛ ᴗ ❛.)");
					window.location.assign("completed");
				</script>

			<?php }
		}
	}
}
?>
