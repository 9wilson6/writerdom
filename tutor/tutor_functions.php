<?php 
function resultsUpload($student_id, $project_id, $file_type){
  
         
       //check if file is final or draft
       if ($file_type=="final") {

       	if (!file_exists('../RESULTS/'.$student_id.'/'.$project_id.'/FINAL')) {
       mkdir("../RESULTS/{$student_id}/{$project_id}/FINAL", 0777, true);
       $dir="../RESULTS/{$student_id}/{$project_id}/FINAL";
       }else{
       	 $dir="../RESULTS/{$student_id}/{$project_id}/FINAL";
       }
       }

       if($file_type=="draft"){
       	if (!file_exists('../RESULTS/'.$student_id.'/'.$project_id.'/DRAFT')) {
        mkdir("../RESULTS/{$student_id}/{$project_id}/DRAFT", 0777, true);
        $dir="../RESULTS/{$student_id}/{$project_id}/DRAFT";
       }else{
       	 $dir="../RESULTS/{$student_id}/{$project_id}/DRAFT";
       }
       }

   for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
    $name= $_FILES['file']['name'][$i];
    $size=$_FILES['file']['size'][$i];
    $type=$_FILES['file']['type'][$i];
    $tmp_name=$_FILES['file']['tmp_name'][$i];
    // die($_FILES['file']['tmp_name'][0]);
    // die($dir."/".$name);
      move_uploaded_file($tmp_name, $dir."/".$name);

}

}

 ?>