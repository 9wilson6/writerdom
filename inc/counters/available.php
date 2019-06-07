<?php 
require_once("../inc/utilities.php");
$date_global_=strtotime($date_global);
function available($user_type, $user_id){
	global $date_global_, $db;
	if ($user_type==1) {
		$query="SELECT * FROM projects WHERE student_id='$user_id'AND status=0 ";
	}elseif ($user_type==2) {
		$query="SELECT * FROM projects WHERE status=0 AND deadline>$date_global_";
	}
	$results=$db->get_results($query);
	return $db->num_rows;
}
 ?>