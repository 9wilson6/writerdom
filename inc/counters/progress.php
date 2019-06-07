<?php 

function in_progress($user_type, $user_id){
	global $db;
	if ($user_type==1) {
		$query="SELECT * FROM on_progress WHERE student_id='$user_id' ";
	}elseif ($user_type==2) {
		$query="SELECT * FROM on_progress WHERE tutor_id='$user_id' ";
	}
	$results=$db->get_results($query);
	return $db->num_rows;
}
 ?>