<?php
 function closed($user_type, $user_id){
	global $db, $closed;
	if ($user_type==1) {
		$query="SELECT * FROM closed WHERE student_id='$user_id' ";
	}elseif ($user_type==2) {
		$query="SELECT * FROM closed WHERE tutor_id='$user_id' ";
	}
	$results=$db->get_results($query);
	$closed= $db->num_rows;
}
closed($_POST['user_type'], $_POST['user_id']);
 ?>