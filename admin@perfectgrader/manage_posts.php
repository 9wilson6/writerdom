<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="POST";
$page="manage_posts";
$date_global_=strtotime($date_global);
if (isset($_POST['delete'])) { 
$post_id=$_POST['post_id'];

$query="DELETE FROM  posts WHERE post_id='$post_id'";
if ($db->query($query)) { 
  postFilesDelete($post_id);
  ?>
 <script>
   window.location.assign("manage_posts");
 </script>
<?php 
}
}
  function postFilesDelete($post_id){

  if (file_exists('../POSTS/'.$post_id.'/')) {
  $dir="../POSTS/{$post_id}/";
 array_map('unlink', glob("$dir*.*"));
 rmdir($dir);
}

}
?>

<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php" ?>
    <div class="headingTertiary text-light text-uppercase">
   Current blog posts.
    </div>
    <div class="row">
      <div class="col-sm-0 col-md-0 col-lg-2"></div>
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="card-header">List of all you blog posts</div>
          <div class="card-body">
            <?php 
            $query="SELECT * FROM posts order by post_id desc";
            $results=$db->get_results($query);
             ?>
             <?php if ($db->num_rows<1): ?>
               <h3>There are no posts</h3>
                <?php else: ?>
                 <table class="table table-hover">
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
                     <div class="col-6">
                       
                     <form action="post_edit" method="POST">
                      <input type="hidden" name="post_id" value="<?php echo $result->post_id ?>">
                       <input type="submit" class="btn btn-success btn-block" name="edit" value="EDIT">
                     </form>
                 </div>
                  <div class="col-6">
                    <form action="" method="POST">
                       <input type="hidden" name="post_id" value="<?php echo $result->post_id ?>">
                       <input type="submit" class="btn btn-danger btn-block" name="delete" value="DELETE!!">
                     </form>
                 
                    </div>
                  </td>
                   
                  </tr> 
                <?php endforeach ?>
               </tbody>
              </table>
             <?php endif ?>
        </div>
      </div>
    </div>
    <?php require_once("../inc/footer_links.php") ?>
