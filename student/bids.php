<?php 

if (isset($_POST['project_id'])) {
 	require_once("../dbconfig/dbconnect.php");
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
                                                <form action="assing" method="POST">
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