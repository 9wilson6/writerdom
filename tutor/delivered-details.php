<?php
require_once "../inc/header_links.php";
require_once"../inc/utilities.php";
#//////////////////////////////////////////////////////////////////////////////////// -->
require_once("tutor_functions.php");
require_once("../dbconfig/dbconnect.php");

if (isset($_POST['submit'])) {
	$result_type=$_POST['result_type'];
	$project_id=$_POST['project_id'];
	$student_id=$_POST['student_id'];
	$tutor_id=$_SESSION['user_id'];
	resultsUpload($student_id, $project_id, $result_type); ?>

            <script>
                window.location.assign("#files");
            </script>

   <?php }

# //////////////////////////////////////////////////////////////////////////////////// -->
$tutor_id=$_SESSION['user_id'];
if (isset($_REQUEST['pid'])) {
	$project_id=convert_uudecode($_REQUEST['pid']);

}else{
	header("location:dashboard");
}

$page="delivered" ;
require_once "../components/top_nav.php";
?>

<div class="display">
    <div class="display__content">
        <?php require_once "../components/tutor_leftnav.php";
		require_once("../dbconfig/dbconnect.php");


		?>
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-light">Project # <?php echo $project_id. " Details"; ?></h1>
                <ul class="d_table_1 mb-5">
                    <?php  $query=("SELECT * FROM delivered left join projects on delivered.project_id=projects.project_id WHERE delivered.project_id='$project_id'");
     $results=$db->get_row($query);
     if ($db->num_rows<1) {?>

                    <div class="card-body">
                        <h1 class="headingSeconadry text-uppercase">
                            This project Is no longer Available
                        </h1>
                    </div>

                    <?php  }else{ ?>
                    <table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Deadline</th>
                                <th class="text-center">Price($)</th>
                                <th class="text-center">Status</th>
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
                                    <?php echo $results->charges; ?>

                                </td>
                                <td class="text-center">
                                 Assigned

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
                                <div class="col-sm-12 col-md-6 col lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Files:</strong></div>
                                        <div class="card-body files" id="files">
                                            <p class="assign">
                                            <?php filesDownload($results->student_id,$results->project_id) ?>
                                            </p>
                                            <hr>
                                            <h3><STRONG>Results</STRONG></h3>
                                            <hr>
                                            <p class="results">
                                            	<?php resultsDownload($results->student_id,$results->project_id) ?>
                                            </p>


                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Messages:</strong></div>
                                        <div class="card-body messages">
                                            <div class="messages__view " id="messageBox">
                                                <script>
                                                    let project_id="<?php echo $results->project_id; ?>";
                                                   let user_type="<?php echo $_SESSION['user_type'] ?>";
                                                </script>

                                            </div>

                                        <form action="../chat" method="POST" id="chat_form">
                                         <p class="messages__form" >
                                         <textarea name="message" placeholder="Messaging not supported for delivered orders (:" required disabled></textarea>
                                         </p>
                                            <input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
                                            <input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type'] ?>">
                                            <input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
                                            <input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
                                            <p class="send">
                                                 <input type="submit" disabled value="Send" class="btn btn-sm btn-basic">
                                                </p>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


	<div class="card">
		<div class="card-header"></div>
		<div class="card-body">
			<form action="" enctype="multipart/form-data" method="POST" class="files_edit py-2">
                <div class="my_container">
                    <div class="row">
                            <div class="col-3 col-sm-3 col-md-3 pb-5">
                        <select name="result_type" class="custom-select mb-2 ml-0 mr-sm-2 mb-sm-0 mt-1 ml-5 pt-2" id="select" required >
                            <option value="final">final</option>
                            <option value="draft">draft</option>

                        </select></div>
                        <div class="col-6 col-sm-6 col-md-6 pb-5"><input type="file" class="files_edit__input" name="file[]" class="form-control-file forms2__files" id="files" required multiple />
                         <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
                         <input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
                        </div>
                    <div class="col-3 col-sm-3 col-md-3 pb-5"><button type="submit" name="submit" class="btn btn-submit btn-block">Upload Results</button>

                    </div>
                    </div>
                </div>
            </form>
		</div>
	</div>


                        </div>
                    </div>
                    <div class="card-footer">

                    </div>

                </div>
                <?php } ?>
            </div>

<?php require_once("./section_rate.php"); ?>

        </div>

    </div>
</div>

<!-- <!DOCTYPE html>
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
            <h1>Chat</h1>

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

</html> -->

<?php
require_once"../inc/footer_links.php";



 ?>
