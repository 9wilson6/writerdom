<?php
ob_start();
require_once "../inc/header_links.php";
require_once "../inc/utilities.php";
#//////////////////////////////////////////////////////////////////////////////////// -->
require_once "tutor_functions.php";
require_once "../dbconfig/dbconnect.php";
if (isset($_POST['submit'])) {
    require_once "../inc/global_functions.php";
    $result_type = $_POST['result_type'];
    $project_id = $_POST['project_id'];
    $student_id = $_POST['student_id'];
    $tutor_id = $_SESSION['user_id'];
    $query1 = "SELECT email FROM users WHERE user_id='$student_id' and type=1";
    $student_email = $db->get_var($query1);
    resultsUpload($student_id, $project_id, $result_type);
    if ($result_type == "final") {
        $query = "INSERT INTO delivered(project_id, student_id, tutor_id)VALUES('$project_id', '$student_id', '$tutor_id')";
        if ($db->query($query)) {
            $query = "DELETE FROM on_progress WHERE project_id='$project_id'";
            if ($db->query($query)) {
                $query = "UPDATE projects SET status=2 WHERE project_id='$project_id'";
                if ($db->query($query)) {
                    $query = "UPDATE chats SET status=1 WHERE project_id='$project_id'";
                    $db->query($query);
//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                    //
                    //,,,,,,,,,,,,,,,,,,,,,,,,,, //
                    $note = "Tutor: " .$_SESSION['info']->username . " has submited final results for project ID: " . $project_id . " at " . $date_global;
                    $note2 = "You have submited final results for project ID: " . $project_id . " at " . $date_global;
                    $querys = "INSERT INTO notifications(user_type, note) VALUES(2,'$note')";
                    $db->query($querys);
                    $querys = "INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2', '$tutor_id')";
                    $db->query($querys);
// ........,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,
                    //
                    //
                    // ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,//
                    ?>
<script>
alert("Assignment Results Uploaded Successfully");
window.location.assign("delivered");
</script>
<?php
}
            }
        }
        $subject = "Final results for order ID: " . $project_id;
        $details = "Tutor, " .$_SESSION['info']->username . " has submited final results for project ID: " . $project_id;
        sendMail($details, $student_email, $subject);
        sendMail($details, "admin@perfectgrader.com", $subject);
    } else {
//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
        //
        //
        //,,,,,,,,,,,,,,,,,,,,,,,,,, //
        $note = "Tutor, " . $_SESSION['info']->username . " has submited a draft for project ID: " . $project_id . " at " . $date_global;
        $note2 = "You have submited a draft for project ID: " . $project_id . " at " . $date_global;
        $querys = "INSERT INTO notifications(user_type, note) VALUES(2,'$note')";
        $db->query($querys);
        $querys = "INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2', '$tutor_id')";
        $db->query($querys);
// ........,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,
        $subject = "Draft results for order ID: " . $project_id;
        $details = "Tutor,  " . $_SESSION['info']->username . " has submited a draft for project ID: " . $project_id;
        sendMail($details, $student_email, $subject);
        sendMail($details, "admin@perfectgrader.com", $subject);
// ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,//
        ?>
<script>
window.location.assign("#files");
</script>
<?php }
}
# //////////////////////////////////////////////////////////////////////////////////// -->
$tutor_id = $_SESSION['user_id'];
if (isset($_REQUEST['pid'])) {
    $project_id = convert_uudecode($_REQUEST['pid']);
} else {
    header("location:dashboard");
}
$page = "progress";
require_once "../components/top_nav.php";
ob_flush();
?>
<div class="display">
<div class="display__content">
<?php require_once "../components/tutor_leftnav.php";
require_once "../dbconfig/dbconnect.php";
?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<h1 class="headingTertiary text-light">Project # <?php echo $project_id . " Details"; ?></h1>
<ul class="d_table_1 mb-5">
<?php $query = ("SELECT * FROM on_progress left join projects on on_progress.project_id=projects.project_id WHERE on_progress.project_id='$project_id'");
$results = $db->get_row($query);
if ($db->num_rows < 1) {?>
<div class="card-body">
<div class="headingTertiary text-uppercase">
This project Is no longer Available
</div>
</div>
<?php } else {?>
<table class="table table-sm">
<thead class="table-light">
<tr>
<th class="text-center">Order Id</th>
<th class="text-center">Deadline</th>
<th class="text-center">Price($)</th>
<th class="text-center">Status</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row" class="text-center mt-5">
<?php echo $results->project_id; ?>
</th>
<td class="text-center mt-5">
<?php $time = getDateTimeDiff($date_global, $results->deadline);
    $period = explode(" ", $time);?>
<?php if ($period[1] == "days"): ?>
<span class="text-dark">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "day"): ?>
<span class="text-success">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "hours" || $period[1] == "hour"): ?>
<span class="text-warning">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "mins" || $period[1] == "min"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "secs" || $period[1] == "sec"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php else:?>
    <span class="text-secondary"><?php echo "{$time}"; ?></span>
<?php endif?>
</td>
<td class="text-center mt-5">
<?php echo $results->charges; ?>
</td>
<td class="text-center">
Assigned
</td>
</tr>
</tbody>
</table>
</ul>
<div class="card bg-light mb-5">
<div class="card-header ">Order Info</div>
<div class="card-body d_table_1__c ">
<ul class="d_table_1 d_table_1__b mb-5 mt-3">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-5">
<table class="table table-sm">
<thead class="table-light ml-5">
<tr>
<th class="text-center">Status</th>
<th class="text-center">Paper Format</th>
<th class="text-center">Acadamic level</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center">
<?php $Status = $results->status;
    if ($Status == 0) {
        echo "In Progress";
    } else {
        "Not Available";
    }
    ?>
</td>
<td class="text-center"><?php echo $results->style; ?></td>
<td class="text-center"><?php echo $results->academic_level; ?></td>
</tr>
</tbody>
</table>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
<table class="table table-sm">
<thead class="table-light">
<tr>
<th class="text-center">Slides</th>
<th class="text-center">Problems</th>
<th class="text-center">Pages</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center"><?php echo $results->slides; ?></td>
<td class="text-center"><?php echo $results->problems; ?></td>
<td class="text-center"><?php echo $results->pages; ?></td>
</tr>
</tbody>
</table>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
<table class="table table-sm">
<thead class="table-light">
<tr>
<th class="text-center">Type of paper</th>
<th class="text-center">Sources</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center"><?php echo $results->type_of_paper; ?></td>
<td class="text-center">
<?php $sources = $results->sources;
    if ($sources == 0) {
        echo "At least 1";
    } else {
        echo "{$sources}";
    }
    ?>
</td>
</tr>
</tbody>
</div>
</div>
</table>
</ul>
<div class="instrcution text-left">
<p>
<STRONG>Subject:<br></STRONG>
<?php echo $results->subject; ?></p>
<p>
<STRONG>Topic: <br></STRONG>
<?php echo $results->title; ?>
</p>
<p>
<STRONG>Instructions:<br></STRONG>
<div class="pl-5"><?php echo $results->instructions; ?></div>
</p>


</div>

</div>
<div class="card-footer">
</div>
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="card-header"><strong>Files:</strong></div>
<div class="card-body files" id="files">
<h3><strong>Project Files</strong></h3>
<p class="assign">
<?php filesDownload($results->student_id, $results->project_id)?>
</p>
<hr>
<h3><STRONG>Results Files</STRONG></h3>
<hr>
<p class="results">
<?php resultsDownload($results->student_id, $results->project_id)?>
</p>
</div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="card-header"><strong>Messages:</strong></div>
<div class="card-body messages">
<div class="messages__view " id="messageBox">
<script>
let project_id="<?php echo $results->project_id; ?>";
let user_type="<?php echo $_SESSION['user_type'] ?>";
</script>
</div>
<form action="../chat" method="POST" id="chat_form">
<p class="messages__form" >
<textarea name="message" placeholder="type a message here......." required></textarea>
</p>
<input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
<input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type'] ?>">
<input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
<input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
<p class="send">
<input type="submit" value="Send" name="submit" id="submit" class="btn btn-sm btn-info">
</p>
</form>
</div>
</div>
</div>


</div>
<div class="card pb-4">
<div class="card-header text-center ">Upload results</div>
<div class="card-body">
<form action="" enctype="multipart/form-data" method="POST" class="files_edit py-2">
<!-- <div class="my_container"> -->
<div class="row">
<div class="col-3 col-sm-3 col-md-3 mb-3">
<select name="result_type" class="custom-select mb-2 ml-0 mr-sm-2 mb-sm-0 mt-1 ml-5 pt-2" id="select" required >
<option value="final">final</option>
<option value="draft">draft</option>
</select></div>
<div class="col-9 col-sm-9 col-md-6">
    <input type="file" class="files_edit__input" name="file[]" class="form-control-file forms2__files" id="files" style="background: #009432; height: 35px; color: #fff;" required multiple />
<input type="hidden" name="project_id" value="<?php echo $project_id ?>">
<input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
</div>
<div class="col-12 col-sm-4 col-md-3">
    <button type="submit" name="submit" class="btn btn-submit btn-block" style="background: #009432; color: #fff; padding-top: 5px; height: 35px;">Upload Results</button>
</div>
</div>
<!-- </div> -->
</form>
</div>
</div>
</div>
<?php }?>
</div>
<?php require_once "./section_rate.php";?>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>
<script src="../js/chat.js"></script>
<script src="../js/files.js"></script>
