<?php 
require_once "../inc/header_links.php";
require_once"../inc/utilities.php";
#//////////////////////////////////////////////////////////////////////////////////// -->

require_once("../dbconfig/dbconnect.php");
if (isset($_POST['submit'])) {
  $student_id=$_POST['student_id'];
  $bid_amount=$_POST['bid_amount'];
  $bid_fee=ceil(($_POST['bid_amount']) * 1.1)-$bid_amount;
  $bid_total_amount=($bid_amount + $bid_fee);
  $project_id=$_POST['project_id'];
  $tutor_id=$_POST['tutor_id'];
  $bids=$_POST['bids']+1;


  $query="INSERT INTO bids(tutor_id, project_id, bid_amount, bid_fee, bid_total_amount, student_id) VALUES('$tutor_id', '$project_id', '$bid_amount','$bid_fee','$bid_total_amount', '$student_id')";

  
  $results=$db->query($query);


$db->query("UPDATE projects SET bids='$bids' WHERE project_id='$project_id'");

       //,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
  //
  //
  //
  //,,,,,,,,,,,,,,,,,,,,,,,,,, //
  $note="Tutor ID: ". $tutor_id." has placed a bid for project ID: ".$project_id." at ".$date_global."bid amnt: ".$bid_total_amount;
  $note2="You have placed a bid for project ID: ".$project_id." at ".$date_global."bid amnt: ".$bid_total_amount;
 $querys="INSERT INTO notifications(user_type, note) VALUES(2,'$note')";
  $db->query($querys);
  $querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
  $db->query($querys);
  // ........,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,
  // 
  // 
  // ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,//

}
if (isset($_POST['delete'])) {
    $project_id=$_POST['project_id'];
    $tutor_id=$_POST['tutor_id'];
    $bids=$_POST['bids']-1;
    $db->query("DELETE FROM bids WHERE tutor_id='$tutor_id' AND project_id='$project_id'");
    $db->query("UPDATE projects SET bids='$bids' WHERE project_id='$project_id'");

       //,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
  //
  //
  //
  //,,,,,,,,,,,,,,,,,,,,,,,,,, //
  $note="Tutor ID: ". $tutor_id." has deleted his bid for project ID: ".$project_id." at ".$date_global;
  $note2="You have deleted your bid for project ID: ".$project_id." at ".$date_global;
 $querys="INSERT INTO notifications(user_type, note) VALUES(2,'$note')";
  $db->query($querys);
  $querys="INSERT INTO notifications(user_type, note) VALUES(3,'$note2')";
  $db->query($querys);
  // ........,,,,,,,,,,,,,,,,,,,,,,,,,,notification,,,,,,,,,,,,,,,,,
  // 
  // 
  // ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,//
    ?>
<script>
// window.location.href="d_details?id=<?php #echo $project_id ?>";
</script>
<?php
}

# //////////////////////////////////////////////////////////////////////////////////// -->
$tutor_id=$_SESSION['user_id'];
if (isset($_REQUEST['id'])) {
	$project_id=convert_uudecode($_REQUEST['id']);
	
}else{
	header("location:dashboard");
}

$page="dashboard" ;
require_once "../components/top_nav.php";
?>

<div class="display">
    <div class="display__content">
        <?php require_once "../components/tutor_leftnav.php";

		
		?>
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Project # <?php echo $project_id. " Details"; ?></h1>
                <ul class="d_table_1 mb-5">
                    <?php  $query=("SELECT * FROM projects WHERE project_id='$project_id' and status=0");
                 $results=$db->get_row($query);
                 if ($db->num_rows<1) {?>

                    <div class="card-body">
                        <h1 class="headingSeconadry text-uppercase">
                            This project Is no longer Available
                        </h1>
                    </div>
                    </div>
                    <?php  }else{ ?>
                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Deadline</th>
                                <th class="text-center">Budget</th>
                                <th class="text-center">Yor Bid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center mt-5">
                                    <?php echo $results->project_id ; ?>
                                </th>
                                <td class="text-center mt-5">
                                    <?php $time=getDateTimeDiff($date_global, $results->deadline );
             $period= explode(" ", $time); ?>
                                    <?php if ($period[1]=="days"): ?>
                                    <span class="text-dark">
                                        <?php echo "{$time}"; ?></span>
                                    <?php elseif($period[1]=="day"): ?>
                                    <span class="text-success">
                                        <?php echo "{$time}"; ?></span>
                                    <?php elseif($period[1]=="hours" || $period[1]=="hour"): ?>
                                    <span class="text-warning">
                                        <?php echo "{$time}"; ?></span>
                                    <?php elseif($period[1]=="mins" || $period[1]=="min"): ?>
                                    <span class="text-danger">
                                        <?php echo "{$time}"; ?></span>
                                    <?php elseif($period[1]=="secs" || $period[1]=="sec"): ?>
                                    <span class="text-danger">
                                        <?php echo "{$time}"; ?></span>
                                    <?php endif ?>
                                </td>
                                <td class="text-center mt-5">
                                    <?php echo $results->budget; ?>

                                </td>
                                <td class="text-center">
                                    <?php 
                  ////////////////////////////CHECK IF USER HAS ALREADY APPLIED FOR THIS ORDER////////////////////////////////////////////
                  $check_q=$db->get_row("SELECT * FROM bids WHERE tutor_id=$tutor_id AND project_id= $project_id");
                  ////////////////////////////CHECK IF USER HAS ALREADY APPLIED FOR THIS ORDER////////////////////////////////////////////
                   ?>
                                    <?php if ($db->num_rows <1): ?>
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-8">
                                                <?php $min= ceil(intval(str_replace("$", "", $results->budget)) * 0.7);
                          
                          // echo $results->bids;
                          // die()
                         ?>

                                                <input type="number" name="bid_amount"
                                                    class="form-control forms2__input" required
                                                    min="<?php echo $min ?>">
                                                <input type="hidden" name="project_id"
                                                    value="<?php echo $project_id ?>">
                                                <input type="hidden" name="tutor_id" value="<?php echo $tutor_id ?>">
                                                <input type="hidden" name="bids" value="<?php echo $results->bids ?>">
                                                <input type="hidden" name="student_id" value="<?php echo $results->student_id?>">

                                                <small class="text-danger">A 10% transaction fee will be added to your
                                                    bid</small>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-info btn-block" name="submit"
                                                    type="submit">Apply</button>
                                            </div>

                                        </div>
                                    </form>

                                    <?php else: ?>

                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-8">
                                                <h3 class="bg-warning forms2__input pt-2 text-light">Your Bid amount is:
                                                    $<?php echo $check_q->bid_amount; ?></h3>
                                                <input type="hidden" name="project_id"
                                                    value="<?php echo $project_id ?>">
                                                <input type="hidden" name="tutor_id" value="<?php echo $tutor_id ?>">
                                                <input type="hidden" name="bids" value="<?php echo $results->bids ?>">
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-danger btn-block btn-sm" name="delete"
                                                    type="submit">DELETE</button>
                                            </div>

                                        </div>
                                    </form>
                                    <?php endif ?>


                                </td>
                            </tr>

                        </tbody>
                    </table>
                </ul>

                <div class="card bg-light mb-5">
                    <div class="card-header bg-transparent ">Order Info</div>
                    <div class="card-body d_table_1__c ">
                        <ul class="d_table_1 d_table_1__b mb-5 mt-3">

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-5">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                                        <thead class="table-light ml-5">
                                            <tr>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Paper Format</th>
                                                <th class="text-center">Acadamic level</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <?php $Status=$results->status;
                        if ($Status==0) {
                          echo "In Progress";
                        }else{
                          "Not Available";
                        }
                       ?>
                                                </td>
                                                <td class="text-center"><?php echo $results->style; ?></td>
                                                <td class="text-center"><?php echo $results->academic_level; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">Slides</th>
                                                <th class="text-center">Problems</th>
                                                <th class="text-center">Pages</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $results->slides; ?></td>
                                                <td class="text-center"><?php echo $results->problems; ?></td>
                                                <td class="text-center"><?php echo $results->pages; ?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">

                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">Type of paper</th>
                                                <th class="text-center">Sources</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td class="text-center"><?php echo $results->type_of_paper; ?></td>
                                                <td class="text-center">
                                                    <?php  $sources=$results->sources;
                      if ($sources==0) {
                        echo "At least 1";
                      }else{
                        echo "{$sources}";
                      }
                     ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                </div>

                            </div>

                            </table>
                        </ul>
                        <div class="instrcution text-left">
                            <p>
                                <STRONG>Subject:<br></STRONG>
                                <?php echo $results->subject; ?></p>
                            <p>
                                <STRONG>Topic: <br></STRONG>
                                <?php echo $results->title; ?>
                            </p>
                            <p>
                                <STRONG>Instructions:<br></STRONG>
                                <div class="pl-5"><?php echo $results->instructions; ?></div>
                                
                            </p>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col lg-5">
                                    <div class="card">
                                        <div class="card-header"><strong>Files:</strong></div>
                                        <div class="card-body files">
                                            <p><?php filesDownload($results->student_id,$results->project_id) ?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-7 col lg-7">
                                    <div class="card">
                                        <div class="card-header"><strong>Messages:</strong></div>
                                        <div class="card-body messages">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <?php } ?>
            <div class="col-sm-12 col-md-12 col-lg-12  col-xl-3">
                <h1 class="headingTertiary text-light">My Account</h1>
                <div class="card">
                    <div class="card-header">My stats</div>
                    <div class="card-body">
                        <table class="table  table-bordered table-hover ">
                            <tbody>
                                <tr>
                                    <td>Account Balance</td>
                                    <td>$0.00</td>

                                </tr>
                                <tr>
                                    <td>Account Status</td>
                                    <td>Regular</td>

                                </tr>
                                <tr>
                                    <td>Account Rating (30)</td>
                                    <td>9</td>

                                </tr>
                                <tr>
                                    <td>Account Rating</td>
                                    <td>4</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 1px;
        right: 15px;
        width: 280px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        height: 60px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
    </style>
</head>

<body>


    <button class="open-button" onclick="openForm()">Contact support</button>

    <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <!-- <h1>Chat</h1>
 -->
            <label for="msg"><b>Message</b></label>
            <textarea placeholder="Type message.." name="msg" required></textarea>

            <button type="submit" class="btn">Send</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>

</body>

</html>

<?php
require_once"../inc/footer_links.php";

 ?>