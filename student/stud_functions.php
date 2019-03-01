<?php 
function create_post(){
  if (isset($_POST['submit'])) {
require_once("../dbconfig/dbconnect.php");
global $success, $error, $date_global;
// echo date("Y-m-d H:i:sa", strtotime($date_global));

  $title=$db->escape($_POST['title']);
  $subject=$db->escape($_POST['subject']);
  $academic_level=$db->escape($_POST['academic_level']);
  $style=$db->escape($_POST['style']);
  $papertype=$db->escape($_POST['papertype']);
  $date=$_POST['date'];
  $time=$_POST['tyme'];
  
  $datetyme= strtotime("+ {$date}days +{$time}hours");
  $pages=$db->escape($_POST['pages']);
  $slides=$db->escape($_POST['slides']);
  $problems=$db->escape($_POST['problems']);
  $sources=$db->escape($_POST['sources']);
  $instructions=$db->escape($_POST['instructions']);
  $budget=$db->escape($_POST['budget']);
  $student_id=$_SESSION['user_id'];
  $date_global=strtotime($date_global);
  if ($date==0 && $time==0) {
    $error="Invalide deadline";
    return;
  }
  if ($pages==0 && $slides==0 && $problems==0) {
    $error="pages/slides/problems cannot all be zero";
    return;
  }
  if ($datetyme<$date_global) {
   $datetyme= $date_global + 21600;
  }
  $sql="INSERT INTO projects(title, subject, academic_level, style, type_of_paper, deadline, pages, slides, problems, sources, instructions, budget, student_id, DATE_CREATED) VALUES('$title', '$subject','$academic_level','$style','$papertype','$datetyme','$pages', '$slides','$problems','$sources', '$instructions', '$budget', '$student_id', '$date_global')";
  $result=$db->query($sql);
  if ($result==1) {
$query="SELECT project_id FROM projects WHERE DATE_CREATED='$date_global' AND student_id='$student_id'";
    $results=$db->get_row($query);

  require_once("../inc/notifications.php");
  $note="User ID: ". $student_id." posted project ID: ".$results->project_id." at ".date("Y-m-d H:i:sa",$date_global);
  $note2="You posted project ID: ".$results->project_id." at ".date("Y-m-d H:i:sa",$date_global);
  //,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
  //
  //
  //
  //,,,,,,,,,,,,,,,,,,,,,,,,,, // 
  $user_type=$_SESSION['user_type'];
 $querys="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
  $db->query($querys);
  $querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
  $db->query($querys);
  // ........,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,
  // 
  // 
  // ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,//
    if(count($_FILES['file']['name'])==0) {
    $success="Homework Posted files Successfully";
}else{
 
    filesUpload($student_id, $results->project_id);
      $success="Homework Posted Successfully";

   }
   // $success="Homework Posted Successfully";
  
  }else{
$error="Was not Successfully Posted try again";
  }
}
}

function edit_post(){
if (isset($_POST['edit'])) {
require_once("../dbconfig/dbconnect.php");
global $success, $error, $date_global;
// echo date("Y-m-d H:i:sa", strtotime($date_global));
  $project_id=$_POST['project_id'];
  $title=$db->escape($_POST['title']);
  $subject=$db->escape($_POST['subject']);
  $academic_level=$db->escape($_POST['academic_level']);
  $style=$db->escape($_POST['style']);
  $papertype=$db->escape($_POST['papertype']);
  $date=$_POST['date'];
  $time=$_POST['tyme'];
  $datetyme= strtotime("+ {$date}days +{$time}hours");
  $pages=$db->escape($_POST['pages']);
  $slides=$db->escape($_POST['slides']);
  $problems=$db->escape($_POST['problems']);
  $sources=$db->escape($_POST['sources']);
  $instructions=$db->escape($_POST['instructions']);
  $budget=$db->escape($_POST['budget']);
  $student_id=$_SESSION['user_id'];
  $date_global=strtotime($date_global);

  if ($date==0 && $time==0) {
    $error="Invalide deadline";
    header("location:homework_edit?id=".$project_id."&error=".$error);
  }
  if ($pages==0 && $slides==0 && $problems==0) {
    $error="pages/slides/problems cannot all be zero";
    header("location:homework_edit?id=".$project_id."&error=".$error);
  }
  if ($datetyme<$date_global) {
   $datetyme= $date_global + 21600;
  }

  $query="UPDATE projects SET title='$title',subject='$subject',academic_level='$academic_level',style='$style', type_of_paper='$papertype',deadline='$datetyme',pages='$pages',slides='$slides',problems='$problems',sources='$sources',instructions='$instructions',budget='$budget',student_id='$student_id' WHERE project_id=".$project_id;


  if ($db->query($query)) {
    /////////////////////////////////notification/////////////////////////////////////////////
    $note="Student Id: ".  $student_id." edited project id: ".$project_id." at ".date("Y-m-d H:i:sa",$date_global);
    $note2="You Edited project id: ".$project_id." at ".date("Y-m-d H:i:sa",$date_global);
    $user_type=$_SESSION['user_type'];
    $querys="INSERT INTO notifications(user_type, note) VALUES('$user_type','$note')";
    $db->query($querys);
    $querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
    $db->query($querys);
      /////////////////////////////////notification/////////////////////////////////////////////
      $success="Homework Updated Successfully";
       header("location:my-homework-details?id=".urlencode(convert_uuencode($project_id)));
  }else{
$error="Was not Successfully Posted try again";
header("location:homework_edit?id=".urlencode(convert_uuencode($project_id))."&error=".$error);
  }
}
}

  function filesUpload($student_id, $project_id){

  if (!file_exists('../FILES/'.$student_id.'/'.$project_id.'/')) {
       mkdir('../FILES/'.$student_id.'/'.$project_id.'/', 0777, true);
       $dir="../FILES/{$student_id}/{$project_id}/";
       }else{
          $dir="../FILES/{$student_id}/{$project_id}/";
       }

        $zipname =$dir."Order_". $project_id."_.zip";
if (file_exists($zipname)) {
    unlink($zipname);

}
   for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
    $name= $_FILES['file']['name'][$i];
    $size=$_FILES['file']['size'][$i];
    $type=$_FILES['file']['type'][$i];
    $tmp_name=$_FILES['file']['tmp_name'][$i];
   move_uploaded_file($tmp_name, $dir."".$name);
}

}
// function bids($order_id){
//   $query="SELECT COUNT(bid)"
// }
 ?>
