<?php 

function in_progress($user_type, $user_id){
	global $db ,$progress;
	if ($user_type==1) {
		$query="SELECT * FROM on_progress WHERE student_id='$user_id' ";
	}elseif ($user_type==2) {
		$query="SELECT * FROM on_progress WHERE tutor_id='$user_id' ";
	}
	$results=$db->get_results($query);
	$progress= $db->num_rows;
}
in_progress($_POST['user_type'], $_POST['user_id']);
 ?>