<?php 
require_once "../inc/header_links.php";
$page="messages";
require_once "../components/top_nav.php";
require_once("../dbconfig/dbconnect.php");
?>
<?php $query="SELECT * FROM chats where student_id=". $_SESSION['user_id']." AND user_type=2 ORDER BY date_sent DESC LIMIT 20";
$results=$db->get_results($query);


 ?>
<!--  <pre>
     <?php #print_r($results); ?>
 </pre> -->
<div class="display">
    <div class="display__content">
        <?php require_once "../components/stud_leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Messages</h1>

                <div class="card">
                    <div class="card-header">Your recent messages</div>

                    <div class="card-body">
                        <?php if ($db->num_rows >0): ?>
                            <div class="table-responsive">
                          <table class="table">
                                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="smalll">Order id</th>
                                    <th class="smalll">From</th>
                                    <th class="wide">Message</th>
                                    <th class="smalll">Date</th>
                                </tr>
                            </thead>
                            <?php foreach ($results as $result ): ?>
             <tbody>
                    <tr>
                            <td><?php echo $result->project_id; ?></td>
                            <td><?php echo $result->tutor_id; ?></td>
                            <td>
                                <p style="max-height: 60px; overflow: auto;"><?php echo $result->message; ?></p>
                            </td>
                            <td><?php echo $result->date_sent; ?></td>
                     </tr>
            </tbody>   
                            <?php endforeach ?>
                        </table>
                          </table>
                        </div>
                        <?php else: ?>
                            <h2 class="headingSecondary">No Messages Yet</h2>
                        <?php endif ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12  col-xl-3">
                <h1 class="headingTertiary text-light">Notes</h1>
                <div class="card">
                    <div class="card-header text-secondary text-uppercase">
                        Note that
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-borderless text-left">
                            <tbody>
                                <ul>
                                    <tr>

                                        <td>
                                            <li>This service exists to protect your private and personal information,
                                                you shouldn’t therefore communicate with tutors outside the site.</li>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <li>Sharing third party communication methods (including emails, phone
                                                numbers, and Skype address) is against our user guidelines and we shall
                                                therefore NOT be held liable
                                                failure to observe this. See our T.O.S</li>
                                        </td>
                                    </tr>
                                </ul>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once"../inc/footer_links.php";
 ?>
 <script>
     $("#key").click(function(){
  $("#data").toggle();
});
 </script>