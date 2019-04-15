<?php
function resultsUpload($student_id, $project_id, $file_type)
{
    if ($file_type == "final") {
        if (!file_exists('../RESULTS/' . $student_id . '/' . $project_id . '/FINAL')) {
            mkdir("../RESULTS/{$student_id}/{$project_id}/FINAL", 0777, true);
            $dir = "../RESULTS/{$student_id}/{$project_id}/FINAL";
            $dir_ = "../RESULTS/{$student_id}/{$project_id}/";
        } else {
            $dir = "../RESULTS/{$student_id}/{$project_id}/FINAL";
            $dir_ = "../RESULTS/{$student_id}/{$project_id}/";
        }
    }
    if ($file_type == "draft") {
        if (!file_exists('../RESULTS/' . $student_id . '/' . $project_id . '/DRAFT')) {
            mkdir("../RESULTS/{$student_id}/{$project_id}/DRAFT", 0777, true);
            $dir = "../RESULTS/{$student_id}/{$project_id}/DRAFT";
            $dir_ = "../RESULTS/{$student_id}/{$project_id}/";
        } else {
            $dir = "../RESULTS/{$student_id}/{$project_id}/DRAFT";
            $dir_ = "../RESULTS/{$student_id}/{$project_id}/";
        }
    }
    $zipname = $dir . "Order_" . $project_id . "_.zip";
    if (file_exists($zipname)) {
        unlink($zipname);
    }
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $name = $_FILES['file']['name'][$i];
        $size = $_FILES['file']['size'][$i];
        $type = $_FILES['file']['type'][$i];
        $tmp_name = $_FILES['file']['tmp_name'][$i];
        move_uploaded_file($tmp_name, $dir . "/" . $name);
    }
}
