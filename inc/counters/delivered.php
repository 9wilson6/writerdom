<?php 

function delivered($user_type, $user_id){
	global $db, $delivered;
	if ($user_type==1) {
		$query="SELECT * FROM delivered WHERE student_id='$user_id'";
	}elseif($user_type==2){
		$query="SELECT * FROM delivered WHERE tutor_id='$user_id'";
	}
	$results=$db->get_results($query);
	$delivered= $db->num_rows;
}
delivered($_POST['user_type'], $_POST['user_id']);
 ?>