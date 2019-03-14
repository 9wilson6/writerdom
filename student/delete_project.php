<?php 
if (isset($_POST['id'])) {
	require_once("../dbconfig/dbconnect.php");
	require_once("../inc/global_functions.php");
	require_once("../inc/utilities.php");
	$project_id=$_POST['id'];
	$user_id=$_POST['user'];
	$user_type=$_POST['user_type'];

	$query="DELETE FROM projects WHERE project_id=$project_id";
	if ($db->query($query)) {
		deleteFiles($user_id, $project_id);
		$query="DELETE FROM bids WHERE project_id='$project_id'";
		$db->query($query);
		/////////////////////////////////notification/////////////////////////////////////////////
		$note="Student Id: ".$user_id." deleted project id: ".$project_id." at ".$date_global;
		$note2="You deleted project id: ".$project_id." at ".$date_global;
		$querys="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
		$db->query($querys);
		$querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
		$db->query($querys);
			/////////////////////////////////notification/////////////////////////////////////////////
		echo "deleted Successfully";
	}else{
		echo "Failed to delete";
	}
	
}
 ?>

 