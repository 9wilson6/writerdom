<?php

function notifications($user_type, $note){
	require_once("../dbconfig/dbconnect.php");
	global $db;
	$query="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
	$db->query($query);
}

 ?>

