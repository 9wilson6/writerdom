<?php 

require_once("../dbconfig/dbconnect.php");
require_once("../inc/utilities.php");
$query="SELECT payment_date FROM others";
$result=$db->get_var($query);
if ($result<=strtotime($date_global)) {
	header("location:excel");
}

 ?>
