<?php $link=1; ?>
<?php ob_start(); ?>
<?php require_once"inc/header_links.php";?>
<?php
require_once "inc/global_functions.php";
require_once("dbconfig/dbconnect.php");
$error="";

Login();

require_once"components/student/login.php";

?>

<?php require_once"inc/footer_links.php"; 

ob_flush();?>
<script type="text/javascript" src="js/twakto.js"></script>
