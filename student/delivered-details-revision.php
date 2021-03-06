<?php
if (isset($_POST['submit'])) {
    ob_start();
    require_once "../dbconfig/dbconnect.php";
    require_once "../inc/utilities.php";
    $instructions = $db->escape($_POST['instructions']);
    $date = $_POST['date'];
    $tyme = $_POST['tyme'];
    $project_id = $_POST['project_id'];
    $student_id = $_POST['student_id'];
    $tutor_id = $_POST['tutor_id'];
    $datetyme = strtotime("+ {$date}days +{$tyme}hours");
    $pid = urlencode(convert_uuencode($project_id));
    if ($instructions == "") {?>
<script>
alert("Please provide instructions");
window.location.href="delivered-details?id=<?php echo $project_id ?>#chat_form";
</script>
<?php } elseif ($date == 0 && $tyme == 0) {?>
<script>
alert("Date or time must have a value");
window.location.href="delivered-details?id=<?php echo $project_id ?>#chat_form";
</script>
<?php } else {
        $query = "INSERT INTO revisions(student_id, tutor_id, project_id, revision_instructions,revision_deadline)VALUES('$student_id','$tutor_id','$project_id','$instructions','$datetyme')";
        if ($db->query($query)) {
/////////////////////////////////notification/////////////////////////////////////////////
            $note = "Student, " . $_SESSION['info']->username . " sent project id: " . $project_id . " back for revision at " . $date_global;
            $note2 = "You sent project id: " . $project_id . " back for revision at " . $date_global;
            $querys = "INSERT INTO notifications(user_type, note) VALUES(1,'$note')";
            $db->query($querys);
            $querys = "INSERT INTO notifications(user_type, note, user_id) VALUES(3,'$note2', '$student_id')";
            $db->query($querys);
/////////////////////////////////notification/////////////////////////////////////////////
            $query = "DELETE FROM delivered WHERE project_id='$project_id'";
            if ($db->query($query)) {
                $query = "UPDATE projects SET status=3, deadline='$datetyme' WHERE project_id='$project_id'";
                if ($db->query($query)) {
                    require_once "../inc/global_functions.php";
                    $student_email = $db->get_var("SELECT email FROM users WHERE user_id='$tutor_id' AND type='2'");
                    $subject = "Revision for Order ID: " . $project_id;
                    $details = "Order ID: " . $project_id . " has been sent back for revision. <br> Please act on it immediately. <br> Instructions: " . $instructions;
                    sendMail($details, $student_email, $subject);
                    sendMail($details, "admin@perfectgrader.com", $subject);
                    exit(header("location:editing?pid=$pid"));
                }
            }
        }
    }
    ob_flush();
}
?>
