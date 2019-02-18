
<?php 
require_once("../dbconfig/dbconnect.php");
if (isset($_POST['submit'])) {
	function available(){
	global $db;
	$query="SELECT * FROM projects";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="available") {
	echo available();
}
function progress(){
	global $db;
	$query="SELECT * FROM on_progress";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="progress") {
	echo progress();
}
function revision(){
	global $db;
	$query="SELECT * FROM revisions";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="revision") {
	echo revision();
}

function delivered(){
	global $db;
	$query="SELECT * FROM delivered";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="delivered") {
	echo progress();
}
function closed(){
	global $db;
	$query="SELECT * FROM closed";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="closed") {
	echo closed();
}
function tutors(){
	global $db;
	$query="SELECT * FROM users WHERE type=2";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="tutors") {
	echo tutors();
}
function students(){
	global $db;
	$query="SELECT * FROM users WHERE type=1";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="students") {
	echo students();
}
}
 ?>



