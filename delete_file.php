<?php 
    $fileName=basename($_GET['file']);
	$dir=$_GET['dir'];
	$filePath=$dir."/".$fileName;
	$zipPath=$dir."Order_". $_GET['id']."_.zip";
	if (file_exists($zipPath)) {
		unlink($zipPath);
	}
    if(unlink($filePath)){
    	$id=urlencode(convert_uuencode($_GET['id']));
    		header("LOCATION:student/my-homework-details?id=".$id."#files");
    }else{
    	echo "Failed to delete file";
    } 
?>