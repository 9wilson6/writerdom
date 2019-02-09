<?php 
if (isset($_POST['id'])) {
	require_once("../dbconfig/dbconnect.php");
	require_once("../inc/global_functions.php");
	$project_id=$_POST['id'];
	$user_id=$_POST['user'];

	$query="DELETE FROM projects WHERE project_id=$project_id";
	if ($db->query($query)) {
		deleteFiles($user_id, $project_id);
		$query="DELETE FROM bids WHERE project_id='$project_id'";
		$db->query($query);
		echo "deleted Successfully";
	}else{
		echo "Failed to delete";
	}
	
}
 ?>