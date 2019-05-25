<?php
require_once("../inc/header_links.php");
// require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="tutor";
$feedback=null;
$feedback_=null;
$users=$db->get_results("SELECT * FROM users WHERE type=2");

$page="tut_message";
if (isset($_POST['send'])) {
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  $query="SELECT email FROM users WHERE type =2 and status=1";
  $results=$db->get_results($query); 
  if ($db->num_rows>0) {
   foreach ($results as $result) {
    sendMail($message, $result->email, $subject);
  }
  $feedback="Messages sent successfully";
}

}
if (isset($_POST['mail'])) {
 $subject=$_POST['subject'];
 $message=$_POST['message'];
 $email=$_POST['email'];
 sendMail($message, $email, $subject);
 $feedback_="Messages sent successfully";
}
?>
<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php" ?>
    <div class="headingTertiary text-light text-uppercase">
      MESSAGE ALL TUTORS
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header">MESSAGE ALL TUTORS HERE</div>
          <div class="card-body">
            <form action="" method="POST">
              <?php if ($feedback != null ): ?>
                <div class="text-success"> <?php echo $feedback; ?></div>
              <?php endif ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input
                type="text"
                class="form-control forms2__input"
                name="subject"
                id="exampleFormControlInput1"
                placeholder="Enter email subject here"
                />
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1"
                >MESSAGE</label
                >
                <textarea class="form-control forms2__textarea" name="message" placeholder="Enter you message here...." rows="10"></textarea>
              </div>
              <button type="submit" name="send" class="btn btn-primary btn-block">Send</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-header">MESSAGE SINGLE TUTOR</div>
          <div class="card-body">
            <form action="" method="POST">
              <?php if ( $feedback_ != null ): ?>
                <div class="text-success"> <?php echo  $feedback_; ?></div>
              <?php endif ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">Select User to email</label>
                <select name="email" class="form-control forms2__select" required>
                 <?php foreach ($users as $user): ?>
                  <option value="<?php echo $user->email ?>"><?php echo $user->username ?></option>
                  <!-- <input type="hidden" name="name" value="<?php $user->username ?>"> -->
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Subject</label>
              <input type="text" class="form-control forms2__input" name="subject" id="exampleFormControlInput1" placeholder="Enter email subject here"
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1"
              >MESSAGE</label
              >
              <textarea class="form-control forms2__textarea" name="message" placeholder="Enter you message here...." rows="7"></textarea>
            </div>
            <button type="submit" name="mail" class="btn btn-primary btn-block">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php require_once("../inc/footer_links.php") ?>
