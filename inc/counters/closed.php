<?php
 function closed($user_type, $user_id){
	global $db;
	if ($user_type==1) {
		$query="SELECT * FROM closed WHERE student_id='$user_id' ";
	}elseif ($user_type==2) {
		$query="SELECT * FROM closed WHERE tutor_id='$user_id' ";
	}
	$results=$db->get_results($query);
	return $db->num_rows;
}

 ?>