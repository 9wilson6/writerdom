<?php 
require_once("../dbconfig/dbconnect.php");
  require_once("../inc/utilities.php");
   $date_global_=strtotime($date_global);
$count_q="SELECT COUNT(project_id) FROM projects WHERE deadline>{$date_global_}";
$result_q=$db->get_var($count_q);
if ($result_q>20) {
 
$query="SELECT * FROM projects WHERE deadline>{$date_global_} AND status=0 ORDER BY project_id desc LIMIT 20 "; 
}else{?>
<!-- <meta http-equiv="refresh" content="30"> -->

<?php 
 $query="SELECT * FROM projects WHERE deadline>{$date_global_} AND status=0 ORDER BY project_id desc";

}

$results=$db->get_results($query);
 ?>
<?php 
require_once "../inc/header_links.php";
 $page="dashboard" ;
require_once "../components/top_nav.php";
?>
<div class="display">
    <div class="display__content">
        <!-- <?php #require_once "../components/tutor_leftnav.php" ?> -->
        <!-- <h1 class="headingTertiary text-left">Available</h1> -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h1 class="headingTertiary text-danger">Your account is pending admins approval</h1>
                <div class="card wide-card">
                    <div class="card-header">Your account is not approved yet....</div>
                    <div class="card-body">
                        <div class="text-center" ><h1>contact admin at <strong><mark>admin@writerdom.com</mark></strong></h1></div>
                    </div>
                    <?php if ($result_q>10): ?>
                    <div class="card-footer">
                        <select name="select" class="custom-select mb-2 ml-0 mr-sm-2 mb-sm-0" id="select">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="100">250</option>
                            <option value="100">500</option>
                        </select></div>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
require_once"../inc/footer_links.php";
 ?>
