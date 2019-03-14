<?php
require_once("../dbconfig/dbconnect.php");
function balance($tutor_id){
global $db;
$query="SELECT SUM(dues) as bal FROM users where user_id='$tutor_id'";
$result=$db->get_var($query);
return $result;
}
  function thirty_rating($tutor_id){
    global $db;
    $query="SELECT SUM(rating) as rate FROM closed where tutor_id='$tutor_id' LIMIT 30";
    $result=$db->get_var($query);
    return round($result/30, 1);
  }
    function account_rating($tutor_id){
      global $db;
      $query="SELECT SUM(rating) as rate FROM closed where tutor_id='$tutor_id'";
      $result=$db->get_var($query);
      $count=$db->get_results("SELECT * FROM closed where tutor_id='$tutor_id'");
      return round($result/$db->num_rows, 1);
    }
    function events($tutor_id){
      global $db;
      $query="SELECT * FROM notifications where user_id='$tutor_id' ORDER BY note_num desc LIMIT 5 ";
      $results=$db->get_results($query);
      if ($db->num_rows>0) { ?>
        <?php foreach ($results as $result): ?>
          <div class="alert alert-secondary" role="alert">
          <?php echo $result->note; ?>
          </div>
        <?php endforeach; ?>
    <?php  }else { ?>
          <div class="text-dark">No Activities</div>
        <?php  }

    }
 ?>
