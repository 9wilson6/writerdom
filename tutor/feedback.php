<?php
require_once "../inc/header_links.php";
$page="feedback" ;
require_once "../components/top_nav.php";
require_once"../dbconfig/dbconnect.php";
?>
<div class="display">
    <div class="display__content">
        <?php require_once "../components/tutor_leftnav.php" ?>
        <!-- <h1 class="headingTertiary text-left">Available</h1> -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Clients feedback</h1>
                <div class="card">
                    <div class="card-header">Feedback</div>
                    <div class="card-body">
                        <?php $tutor_id=$_SESSION['user_id'];
                        $query="SELECT * FROM closed WHERE tutor_id='$tutor_id' order by rec_num desc LIMIT 100";
                        $results=$db->get_results($query);
                       ?>
                       <?php if ($results>0): ?>
                           
                       
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Project id</th>
                                    <th class="wide">Comment</th>
                                    <th >Rating</th>
                                    <th>Date closed</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($results as $result): ?>
                                
                                <tr>
                                    <td><a
                                            href="my-projects-details?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
                                                class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
                                    <td class="wide"><?php echo $result->comment; ?></td>
                                    <td><?php echo $result->rating; ?></td>
                                    <td><?php echo $result->date_closed; ?></td>

                                </tr>

                           
                            <?php endforeach ?>
                             </tbody>
                        </table>
                        <?php else: ?>
                            <h1 class="headingTertiary">
                                Nothing To show yet
                            </h1>
                        <?php endif ?>
                    </div>
                </div>
            </div>
<?php require_once("./section_rate.php"); ?>
        </div>
    </div>
</div>


<?php
require_once"../inc/footer_links.php";
 ?>
