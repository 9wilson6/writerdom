<head>  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"></head>
<?php 

if (isset($_POST['project_id'])) {
 	require_once("../dbconfig/dbconnect.php");
    require_once("../inc/header_links.php");
 					$project_id=$_POST['project_id'];
                  $query="SELECT * FROM bids WHERE project_id=$project_id";
                  $results=$db->get_results($query);
                 if ($db->num_rows<1) {?>
                            <h1 class="headingSecondary">Nothing To Show Yet</h1>
                            <?php }else{ ?>
                            
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
                                                <?php echo $result->tutor_id ?>
                                            </td>
                                            <?php $query="SELECT * FROM users WHERE user_id='$result->tutor_id'";
                                        $results=$db->get_row($query);
                                        
                                         ?>
                                            <td>
                                                <?php echo $results->rating ?>
                                                <?php if ($results->rating==0): ?>
                                                <img class="img-fluid rating" src="../assets/not_rated.PNG" alt="">
                                                <?php elseif($results->rating>0 && $results->rating<=4): ?>
                                                <img class="img-fluid rating" src="../assets/poor.PNG" alt="">
                                                <?php elseif($results->rating>4 && $results->rating<=7): ?>
                                                <img class="img-fluid rating" src="../assets/average.PNG" alt="">
                                                <?php elseif($results->rating>7 && $results->rating<=10): ?>
                                                <img class="img-fluid rating" src="../assets/excelent.PNG" alt="">
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php echo $results->orders_complited ?>
                                            </td>
                                            <td>
                                                <?php echo $result->bid_total_amount?>
                                            </td>
                                            <td>
                                                <form action="assing" method="POST" id="assing">
                                                    <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                                                    <input type="hidden" name="tutor_id" value="<?php echo $result->tutor_id; ?>">
                                                    <input type="hidden" name="cost" value="<?php echo $result->bid_total_amount ?>">
                                                    <input type="hidden" name="charged" value="<?php echo $result->bid_amount ?>">
                                                    <button type="submit" name="assing" class="btn btn-success">Award</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            
                                <?php }

                       ?>

                            </div>
                                <?php }

				  
	
?>

<?php

require_once"../inc/footer_links.php";

 ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
$("#assing").submit(function(){
 // e.preventDefault();
        $("#assing").submit(function(){

     var c = confirm("Note that in order to assigne tutor ID: <?php if (isset($result->tutor_id)) {echo $result->tutor_id;} ?> \n your homework you will need to load $<?php if (isset( $result->bid_total_amount)) {echo $result->bid_total_amount;} ?> \n to your Writedom account. \nThe funds will be held in your account until you release them.\n Press okay to proceed");
    return c; //you can just return c because it will be true or false
      });
      });
</script>