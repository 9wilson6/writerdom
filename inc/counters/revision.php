<?php
 function on_revision($user_type,$user_id ){
	global $db, $revision;
	if ($user_type==1) {
		$query="SELECT * FROM revisions WHERE student_id='$user_id'";
	}elseif($user_type==2){
		$query="SELECT * FROM revisions WHERE tutor_id='$user_id'";
	}
	$results=$db->get_results($query);
	$revision= $db->num_rows;
}
on_revision($_POST['user_type'], $_POST['user_id']);
 ?>