<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="POST";
$page="my_posts";
$date_global_=strtotime($date_global);
if (isset($_POST['enable'])) {
$post_id=$_POST['post_id'];

$query="UPDATE posts SET status=1 WHERE post_id='$post_id'";
if ($db->query($query)) { ?>
 <script>
   window.location.assign("my_posts");
 </script>
<?php 
}
}
if (isset($_POST['disable'])) {
$post_id=$_POST['post_id'];
$query="UPDATE posts SET status=0 WHERE post_id='$post_id'";
if ($db->query($query)) { ?>
 <script>
  
   window.location.assign("my_posts");
 </script>
<?php 
}
}
?>

<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php" ?>
    <div class="headingTertiary text-uppercase">
   Current blog posts.
    </div>
    <div class="row">
      <div class="col-sm-0 col-md-0 col-lg-1"></div>
      <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="jumbotron bg-light">
   
          <div class="card-header">List of all your blog posts</div>
                      <?php 
            $query="SELECT * FROM posts order by post_id desc";
            $results=$db->get_results($query);
             ?>
             <?php if ($db->num_rows<1): ?>
               <div class="headingTertiary">There are no posts</div>
                <?php else: ?>
                  
                     <div class="table-responsive" style="overflow-y: hidden;">
                 <table class="table table-hover table-borderless">
                <thead>
                  <tr>
                    <th scope="col" width="50%">Title</th>
                    <th>Views</th>
                    <th scope="col">Date Created</th>
                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 foreach ($results as $result): ?>
                  <tr>
                    <td><a href="my_post_?token=<?php echo urlencode(convert_uuencode($result->post_id)) ?>"><?php echo $result->title; ?></a></td>
                     <td><?php echo $result->views; ?></td>
                    <td><?php echo $result->datetym; ?></td>

                    <td>
                      <div class="form-row">
                     <div class="col-12">
                        <?php if ($result->status==0) { ?>
                     <form action="" method="POST">
                      <input type="hidden" name="post_id" value="<?php echo $result->post_id ?>">
                       <input type="submit" class="btn btn-success btn-block" name="enable" value="ENABLE">
                     </form>
                   <?php }else{ ?>
                    <form action="" method="POST">
                       <input type="hidden" name="post_id" value="<?php echo $result->post_id ?>">
                       <input type="submit" class="btn btn-danger btn-block" name="disable" value="DISABLE">
                     </form>
                  <?php  } ?></div>
                    </div>
                  </td>
                   
                  </tr> 
                <?php endforeach ?>
               </tbody>
              </table>
            </div>
            
             <?php endif ?>
     
      
    </div>
    </div>
    <?php require_once("../inc/footer_links.php") ?>
