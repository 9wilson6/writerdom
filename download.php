<?php
ob_start(); 
// require "functions.php";

$fileName=basename($_GET['file']);
$dir=$_GET['dir'];
$filePath=$dir."/".$fileName;
if (!$filePath) {
	die( "File Not Found");
}else{
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$fileName);
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");
while (ob_get_level()) {
	ob_end_clean();
}
readfile($filePath);
exit;
}


 ?>