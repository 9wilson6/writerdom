<?php
require_once "../inc/header_links.php";
$page="messages";
require_once "../components/top_nav.php";
require_once("../dbconfig/dbconnect.php");
 $query="SELECT chats.user_type, chats.message, chats.date_sent, chats.project_id, chats.student_id, chats.tutor_id,projects.status FROM chats LEFT JOIN projects on chats.project_id=projects.project_id where chats.user_type=2 ORDER BY date_sent DESC LIMIT 10";
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
                            <div class="table-responsive" id="meso">
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

                                <?php $project_id=$result->project_id; ?>
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
                            <script>let project_id="<?php echo $project_id; ?>";
                           let user_type="<?php echo $_SESSION['user_type'] ?>";
                        </script>
                             </tbody>
                        </table>
                          </table>
                        </div>
                        <?php else: ?>
                            <h2 class="headingSecondary">No Messages Yet</h2>
                        <?php endif ?>

                    </div>
                     <?php if ($db->num_rows>9): ?>
                          <div class="card-footer">
                        <select name="select" class="custom-select mb-2 ml-0 mr-sm-2 mb-sm-0" id="select">
                            <option value="20">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="100">250</option>
                            <option value="100">500</option>
                        </select></div>
                         <?php endif ?>
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
 <script>
    $( document ).ready(function() {
            $.post("../chat", {
           project_id: project_id,
           user_type: user_type,
           event: "keylistener"
        });

              $("#select").change(function() {
        let limit = $("#select").val();
        let submit="submit";
        $("#meso").load("messages_.php", {
            limit: limit,
            submit:submit
        })
    });
   setTimeout('window.location.href=window.location.href;', 120000);
});
 </script>
