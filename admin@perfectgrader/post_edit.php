<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="POST";
$page="manage_posts";
$date_global_=strtotime($date_global);
$error=null;
$success=null;
if (isset($_POST['post_id'])) {
  $post_id=$_POST['post_id'];
  $query="SELECT * FROM posts WHERE post_id='$post_id'";
$result=$db->get_row($query);
$_SESSION['title']=$result->title;
$_SESSION['details']=$result->details;
}else{ ?>
<script>window.location.assign("manage_posts")</script>
<?php }
if (isset($_POST['submit'])) {
  $title=$db->escape(trim($_POST['title']));
  $details=$_POST['blog_details'];
  $post_id=$_POST['post_id'];
  $_SESSION['title']=trim($title);
  $_SESSION['details']=$details;
  
 if($_FILES['image']['name']!="") {

 if (getimagesize($_FILES["image"]["tmp_name"])==FALSE) {
  $error="Please select an image.";

 }else{

//////////////////////////////////////////////

 save_image($details, $title);
 filesUpload($post_id);
//////////////////////////////////////////////
 }
}else{
  save_image($details, $title);
}
}

function save_image($details, $title){
  global $db, $date_global, $success, $error, $post_id;
  $query="UPDATE posts SET title='$title', details='$details' WHERE post_id='$post_id'";
  if ($db->query($query)) {
   $success= "Post was updated successfully";
  unset($_SESSION['title']);
  unset($_SESSION['details']);
  }else{
     $error= "Post was not updated";
  }
}
function filesUpload($post_id){
 global $success, $error;
  if (!file_exists('../POSTS/'.$post_id.'/')) {
   mkdir('../POSTS/'.$post_id.'/', 0777, true);
   $dir="../POSTS/{$post_id}/";
 }else{
  $dir="../POSTS/{$post_id}/";
 array_map('unlink', glob("$dir*.*"));
}

  $name= $_FILES['image']['name'];
  $tmp_name=$_FILES['image']['tmp_name'];
  if (move_uploaded_file($tmp_name, $dir."".$name)) {
   $success="Post Update Successfully";
  }else{
    $error="Post update failed";
  }

}

?>

<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php" ?>
    <div class="headingTertiary text-light text-uppercase">
     CREATE NEW BLOG POST.
    </div>
    <div class="row">
      <div class="col-sm-0 col-md-0 col-lg-2"></div>
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="card-header">Add blog details below</div>
          <div class="card-body">
              <?php if (!empty($success)): ?>
                <div class="bg-success mx-5 px-3 text-center text-light">
                  <strong><?php echo $success; ?></strong> </div>
                  <?php elseif (!empty($error)): ?>
                    <div class="bg-danger mx-5 px-3 text-center text-light">
                      <strong><?php echo $error; ?></strong> </div>
                    <?php endif?>
            <form action="" method="POST" enctype="multipart/form-data" >
            
            <div class="form-group">
              <div class="form-row">
                          <div class="col-12">
                            <label for="instructions" class="forms2__label">Blog title</label>
                           <input type="text" class="form-control forms2__input" maxlength="150" required name="title" value="<?php if (isset($_SESSION['title'])): ?> <?php echo $_SESSION['title']; ?> <?php endif ?>">
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                         </div>
             </div>
            </div>
            
           <div class="form-group">
              <div class="form-row">
              <div class="col">
                <label for="instructions" class="forms2__label">Blog details</label>
                        <textarea name="blog_details" id="instructions"
                        class="form-control forms2__textarea" cols="30" rows="10"
                        placeholder="instructions" required> <?php if (isset($_SESSION['details'])): ?> <?php echo $_SESSION['details']; ?> <?php endif ?>
                         </textarea>
                      </div>
            </div>
           </div>
           <div class="form-group">
              <div class="form-row">
                          <div class="col-7">
                          <input type="file" name="image" class="form-control-file"
                        id="files" />
                      </div>
                <div class="col-5"> 
                 <button class="btn  btn-block forms2__button" type="submit"
                    name="submit">Submit</button>

             </div>
            </div>
          </form>
          <div class="col-sm-0 col-md-0 col-lg-2"></div>
        </div>
      </div>
      <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    </div>
    <?php require_once("../inc/footer_links.php") ?>
  <script>
    CKEDITOR.replace('instructions');
  </script>