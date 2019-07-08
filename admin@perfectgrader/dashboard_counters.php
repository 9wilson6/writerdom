<?php 
$available=0;
$applications=0;
$balance=0;
$closed=0;
$delivered=0;
$dues=0;
$progress=0;
$revision=0;
$students=0;
$suspended=0;
$tutors=0;
require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
require_once("./dashboard-counters/applications.php");
require_once("./dashboard-counters/available.php");
require_once("./dashboard-counters/balance.php");
require_once("./dashboard-counters/closed.php");
require_once("./dashboard-counters/delivered.php");
require_once("./dashboard-counters/dues.php");
require_once("./dashboard-counters/progress.php");
require_once("./dashboard-counters/revision.php");
require_once("./dashboard-counters/students.php");
require_once("./dashboard-counters/suspended.php");
require_once("./dashboard-counters/tutors.php");
	if ($_POST['type']=="available") {
		if ($available>0) {
			echo "<div class='mypill1'>".$available."</div>";
		}else{
			echo "<div class='pill'>".$available."</div>";
		}
		
	}
	
	if ($_POST['type']=="progress") {

		if ($progress>0) {
			echo "<div class='mypill1'>".$progress."</div>";
		}else{
			echo "<div class='pill'>".$progress."</div>";
		}
		
	}

	if ($_POST['type']=="revision") {

		if ($revision>0) {
			echo "<div class='mypill1'>".$revision."</div>";
		}else{
			echo "<div class='pill'>".$revision."</div>";
		}
		
	}


	if ($_POST['type']=="delivered") {

		if ($delivered>0) {
			echo "<div class='mypill1'>".$delivered."</div>";
		}else{
			echo "<div class='pill'>".$delivered."</div>";
		}
		
	}

	if ($_POST['type']=="closed") {
		if ($closed >0 ) {
			if ( $closed>1000000000) {
				echo "<div class='mypill1'> 1000,000,000+</div>";
			}else{
				echo "<div class='mypill1'>". $closed."</div>";
			}
		}else{
			echo "<div class='pill'>".$closed."</div>";
		}
		
	}

	if ($_POST['type']=="tutors") {

		if ( $tutors>0) {
			echo "<div class='mypill1'>".$tutors."</div>";
		}else{
			echo "<div class='pill'>".$tutors."</div>";
		}
		

	}

	if ($_POST['type']=="students") {

		if ($students>0) {
			echo "<div class='mypill1'>". $students."</div>";
		}else{
			echo "<div class='pill'>". $students."</div>";
		}
		
	}


	if ($_POST['type']=="suspended") {

		if ($suspended>0) {
			echo "<div class='mypill1'>". $suspended."</div>";
		}else{
			echo "<div class='pill'>". $suspended."</div>";
		}
		
	}



	if ($_POST['type']=="applications") {

		if ($applications>0) {
			echo "<div class='mypill1'>". $applications."</div>";
		}else{
			echo "<div class='pill'>". $applications."</div>";
		}
		
	}



	
	if ($_POST['type']=="dues") {

		if ($dues>0) {
			echo "<div class='mypill1'>". $dues."</div>";
		}else{
			echo "<div class='pill'>0</div>";
		}
		
	}


	if ($_POST['type']=="balance") {

		if ($balance>0) {
			echo "<div class='mypill1'>".$balance."</div>";
		}else{
			echo "<div class='pill'>0</div>";
		}
		
	}

?>