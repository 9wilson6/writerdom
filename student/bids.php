<?php
if (isset($_POST['project_id'])) {
    ob_start();
    require_once "../dbconfig/dbconnect.php";
    require_once "../inc/header_links.php";
    ob_flush();
    $project_id = $_POST['project_id'];
    $query = "SELECT * FROM bids WHERE project_id=$project_id";
    $results = $db->get_results($query);
    if ($db->num_rows < 1) {?>
<div class="headingTertiary">Nothing To Show Yet</div>
<?php } else {?>

<table class="table">
<thead>
<th>Tutor Id</th>
<th>Rated</th>
<th>Orders Complited</th>
<th>Bid Amount($)</th>
<th>Action</th>
</thead>
<tbody >

<?php foreach ($results as $result) {?>
<tr>
<td>
<?php 
$username_query="SELECT username from users where user_id='$result->tutor_id'";
     $username_query_results=$db->get_var($username_query);
 echo $username_query_results
 ?>
</td>
<?php $query = "SELECT SUM(rating) as rating, COUNT(comment) as complited FROM closed WHERE tutor_id='$result->tutor_id'";
        $results = $db->get_row($query);
        if ($results->complited>0) {
             $rate = round($results->rating / $results->complited, 0);
        }else{
            $rate=0;
        }
       
        ?>
<td>
<?php echo $rate ?>
<?php if ($rate == 0): ?>
<img class="img-fluid rating" src="../assets/not_rated.PNG" alt="">
<?php elseif ($rate > 0 && $rate <= 4): ?>
<img class="img-fluid rating" src="../assets/poor.PNG" alt="">
<?php elseif ($rate > 4 && $rate <= 7): ?>
<img class="img-fluid rating" src="../assets/average.PNG" alt="">
<?php elseif ($rate > 7 && $rate <= 10): ?>
<img class="img-fluid rating" src="../assets/excelent.PNG" alt="">
<?php endif?>
</td>
<td>
<?php echo $results->complited ?>
</td>
<td>
<?php echo $result->bid_total_amount ?>
</td>
<td>
<form action="assing" method="POST" id="assing">
<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
<input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type']; ?>">
<!-- <?php #echo $_SESSION['user_id']; die; ?> -->
<input type="hidden" name="tutor_id" value="<?php echo $result->tutor_id; ?>">
<input type="hidden" name="cost" value="<?php echo $result->bid_total_amount ?>">
<input type="hidden" name="charged" value="<?php echo $result->bid_amount ?>">
<button type="submit" name="assing" class="btn btn-success">Award</button>
</form>
</td>
</tr>
<?php }?>
</tbody>
</table>
<?php }?>
</div>
<?php }
?>
<!-- <?php #require_once "../inc/footer_links.php";?> -->

<script>
$("#assing").submit(function(){
var c = confirm("Note that in order to assigne  <?php if (isset($username_query_results)) {echo $username_query_results;}?> \n your homework you will need to load $<?php if (isset($result->bid_total_amount)) {echo $result->bid_total_amount;}?> \n to your PerfectGrader account. \nThe funds will be held in your account until you release them.\n Press okay to proceed");
return c; //you can just return c because it will be true or false
});

</script>