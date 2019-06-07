<?php
 function messages($user_id, $user_type){
	global $db;
	if ($user_type==1) {

		$query="SELECT * FROM chats WHERE student_id='$user_id' AND status=0 AND user_type=2";
	}elseif ($user_type==2) {
		$query="SELECT * FROM chats WHERE tutor_id='$user_id' AND status=0 AND user_type=1";
	}

	$results=$db->get_results($query);
	return $db->num_rows;
}

 ?>