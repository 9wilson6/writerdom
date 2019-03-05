
<?php 
require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
if (isset($_POST['submit'])) {
	function available(){
	global $db;
	$query="SELECT * FROM projects WHERE status=0";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="available") {
	if (available()>0) {
		echo "<div class='my_pill'>".available()."</div>";
	}else{
		echo "<div class='pill'>".available()."</div>";
	}
	
}
function progress(){
	global $db;
	$query="SELECT * FROM on_progress";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="progress") {

	if (progress()>0) {
		echo "<div class='my_pill'>".progress()."</div>";
	}else{
		echo "<div class='pill'>".progress()."</div>";
	}
 
}
function revision(){
	global $db;
	$query="SELECT * FROM revisions";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="revision") {

	if (revision()>0) {
		echo "<div class='my_pill'>".revision()."</div>";
	}else{
		echo "<div class='pill'>".revision()."</div>";
	}
 
}

function delivered(){
	global $db;
	$query="SELECT * FROM delivered";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="delivered") {

	if (delivered()>0) {
		echo "<div class='my_pill'>".delivered()."</div>";
	}else{
		echo "<div class='pill'>".delivered()."</div>";
	}
	
}
function closed(){
	global $db;
	$query="SELECT * FROM closed";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="closed") {
	if ( closed()>0) {
		if (closed()>1000000000) {
			echo "<div class='my_pill'> 1000,000,000+</div>";
		}else{
			echo "<div class='my_pill'>". closed()."</div>";
		}
	}else{
		echo "<div class='pill'>". closed()."</div>";
	}
	
}
function tutors(){
	global $db;
	$query="SELECT * FROM users WHERE type=2";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="tutors") {

	if ( tutors()>0) {
		echo "<div class='my_pill'>".tutors()."</div>";
	}else{
		echo "<div class='pill'>".tutors()."</div>";
	}
	 

}
function students(){
	global $db;
	$query="SELECT * FROM users WHERE type=1";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="students") {

	if (students()>0) {
		echo "<div class='my_pill'>". students()."</div>";
	}else{
		echo "<div class='pill'>". students()."</div>";
	}
	
}

function suspended(){
	global $db;
	$query="SELECT * FROM users WHERE status=0";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="suspended") {

	if (suspended()>0) {
		echo "<div class='my_pill'>". suspended()."</div>";
	}else{
		echo "<div class='pill'>". suspended()."</div>";
	}
	
}


function applications(){
	global $db;
	$query="SELECT * FROM users WHERE type=2 and verified=0";
	$results=$db->get_results($query);
	return $db->num_rows;
}
if ($_POST['type']=="applications") {

	if (applications()>0) {
		echo "<div class='my_pill'>". applications()."</div>";
	}else{
		echo "<div class='pill'>". applications()."</div>";
	}
	
}



function dues(){
	global $db;
	$query="SELECT SUM(charges) AS charges FROM projects WHERE status=4";
	$results=$db->get_row($query);
	return $results->charges;
}
if ($_POST['type']=="dues") {

	if (dues()>0) {
		echo "<div class='my_pill'>". dues()."</div>";
	}else{
		echo "<div class='pill'>0</div>";
	}
	
}

function balance(){
	global $db;
	$query="SELECT SUM(cost) AS cost FROM projects WHERE status=4";
	$results=$db->get_row($query);
	return $results->cost;
}
if ($_POST['type']=="balance") {

	if (balance()>0) {
		echo "<div class='my_pill'>".balance()."</div>";
	}else{
		echo "<div class='pill'>0</div>";
	}
	
}
}
 ?>