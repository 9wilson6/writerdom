<?php $link=1 ?>
<?php require_once"inc/header_links.php";?>
<?php 
require_once "inc/global_functions.php";
require_once("dbconfig/dbconnect.php");
$error="";

Login();
require_once"components/student/Login.php";
 ?>

<?php require_once"inc/footer_links.php"; ?>