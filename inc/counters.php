<?php
$available=0;
$closed=0;
$delivered=0;
$messages=0;
$progress=0;
$revision=0;
require_once("../dbconfig/dbconnect.php");
require_once("counters/progress.php");
require_once("counters/available.php");
require_once("counters/closed.php");
require_once("counters/revision.php");
require_once("counters/delivered.php");
require_once("counters/messages.php");

//////////////////////////IN PROGRESS//////////////////////////////////////////////
///
///
///
//////////////////////////IN PROGRESS//////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
if ($_POST['target']=="in_progress") {
	if ($progress>0) {
		echo "<div class='mypill1'>".$progress."</div>";
	}else{
		echo "<div class='pill'>".$progress."</div>";
	}

}

//////////////////////////IN PROGRESS//////////////////////////////////////////////
///
///
///
//////////////////////////IN PROGRESS//////////////////////////////////////////////
///



//////////////////////////CLOSED//////////////////////////////////////////////
///
///
///
//////////////////////////CLOSED//////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
if ($_POST['target']=="closed") {
	if ($closed>0) {
		echo "<div class='mypill1'>".$closed."</div>";
	}else{
		echo "<div class='pill'>".$closed."</div>";
	}

}

//////////////////////////CLOSED//////////////////////////////////////////////
///
///
///
//////////////////////////CLOSED//////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
if ($_POST['target']=="on_revision") {

	if ($revision>0) {
		echo "<div class='mypill1'>".$revision."</div>";
	}else{
		echo "<div class='pill'>".$revision."</div>";
	}
}
function assigned(){

}

//////////////////////////DELIVERED//////////////////////////////////////////////
///
///
///
//////////////////////////DELIVERED//////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
if ($_POST['target']=="delivered") {

	if ($delivered>0) {
		echo "<div class='mypill1'>".$delivered."</div>";
	}else{
		echo "<div class='pill'>".$delivered."</div>";
	}
}
//////////////////////////DELIVERED//////////////////////////////////////////////
///
///
///
//////////////////////////DELIVERED//////////////////////////////////////////////

//////////////////////////AVAILABLE//////////////////////////////////////////////
///
///
///
//////////////////////////AVAILABLE//////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////
if ($_POST['target']=="available") {

	if ($available>0) {
		echo "<div class='mypill1'>".$available."</div>";
	}else{
		echo "<div class='pill'>".$available."</div>";
	}
}

//////////////////////////AVAILABLE//////////////////////////////////////////////
///
///
///
//////////////////////////AVAILABLE//////////////////////////////////////////////

//////////////////////////MESSAGES//////////////////////////////////////////////
///
///
///
//////////////////////////MESSAGES//////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////
if ($_POST['target']=="messages") {

	if ($messages>0) {
		echo "<div class='my_pill'>".$messages."</div>";
	}else{
		echo "<div class='pill'>".$messages."</div>";
	}
}
//////////////////////////MESSAGES//////////////////////////////////////////////
///
///
///
//////////////////////////MESSAGES//////////////////////////////////////////////

?>
