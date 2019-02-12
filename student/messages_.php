<?php 
if (isset($_POST['submit'])) {

	$limit=$_POST['limit'];

			require_once("../dbconfig/dbconnect.php");
	$query="SELECT chats.user_type, chats.message, chats.date_sent, chats.project_id, chats.student_id, chats.tutor_id,projects.status FROM chats LEFT JOIN projects on chats.project_id=projects.project_id where chats.user_type=2 ORDER BY date_sent DESC LIMIT ".$limit;
$results=$db->get_results($query); ?>

                           <table class="table">
                                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="smalll">Order id</th>
                                    <th class="smalll">From(tutor id)</th>
                                    <th class="medium">Message</th>
                                    <th class="smalll">Date</th>
                                    <th class="wide">Action</th>
                                </tr>
                            </thead><tbody>
                            <?php foreach ($results as $result ): ?>
                          
                    <tr>
                            <td><?php echo $result->project_id; ?></td>
                            <td><?php echo $result->tutor_id; ?></td>
                            <td>

                                <script>let project_id="<?php echo $result->project_id ; ?>";
                               let user_type="<?php echo $_SESSION['user_type'] ?>";
                            </script>
                                <p style="max-height: 30px; overflow: auto;"><?php echo $result->message; ?></p>
                            </td>
                            <td><?php echo $result->date_sent; ?></td>
                            <?php if ($result->status==1): ?>
                                <td>
                                <a href="in-progress-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block btn-light">view</a>
                            </td>
                            <?php elseif($result->status==2): ?>
                           
                            <td>
                                <a href="delivered-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block btn-light">view</a>
                            </td>
                            <?php elseif($result->status==3): ?>
                           
                            <td>
                                <a href="editing-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)) ?>#messageBox" class="btn btn-sm btn-block btn-light">view</a>
                            </td>
                            <?php elseif($result->status==4): ?>
                            
                            <td>
                               <a href="" class="btn btn-sm btn-block btn-light">view</a>
                            </td>
                            <?php endif ?>
                            
                     </tr>
           
                            <?php endforeach ?>
                             </tbody>
                        </table>
                      

                     <?php     }

 ?>