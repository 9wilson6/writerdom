<?php 
function session_student(){
if ($_SESSION['user_type'] !=1) {
	header("LOCATION:../index");
}

}



function session_tutor(){
if ($_SESSION['user_type'] !=2) {
	header("LOCATION:../index");
}
}



function session_gen (){
if (!isset($_SESSION['username'])) {
	header("LOCATION:../index");
}
}
 ?>