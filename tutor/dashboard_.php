<?php if (isset($_POST['limit'])) {
	require_once("../dbconfig/dbconnect.php");
	require_once("../inc/utilities.php");
	$limit=$_POST['limit'];
      $date_global_=strtotime($date_global);
$query="SELECT * FROM projects WHERE deadline>{$date_global_} AND status=0 ORDER BY  project_id desc LIMIT {$limit}";

$results=$db->get_results($query);
if ($db->num_rows>0) {
     foreach ($results as $result){ ?>
<tr>
    <td class="smalll"><a href="d_details?id=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
                class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
    <td class="wide"><?php echo (strlen($result->title) >35 )? substr($result->title, 0, 35).'...':$result->title; ?>
    </td>
    <td><?php echo $result->budget; ?></td>
    <td><?php echo $result->pages; ?></td>
    <td><?php echo $result->slides; ?></td>
    <td><?php echo $result->problems; ?></td>
    <td class="smalll"><?php echo $result->subject; ?></td>
    <td><?php $time=getDateTimeDiff($date_global, $result->deadline );
             $period= explode(" ", $time); ?>
        <?php if ($period[1]=="days"): ?>
        <span class="text-dark"><?php echo "{$time}"; ?></span>
        <?php elseif($period[1]=="day"): ?>
        <span class="text-success"><?php echo "{$time}"; ?></span>
        <?php elseif($period[1]=="hours" || $period[1]=="hour"): ?>
        <span class="text-warning"><?php echo "{$time}"; ?></span>
        <?php elseif($period[1]=="mins" || $period[1]=="min"): ?>
        <span class="text-danger"><?php echo "{$time}"; ?></span>
        <?php elseif($period[1]=="secs" || $period[1]=="sec"): ?>
        <span class="text-danger"><?php echo "{$time}"; ?></span>
        <?php endif ?>
    </td>

</tr>
<?php  }
}else{ ?>
<!-- <center><h5 class="headingTertiary">There is nothing to show yet</h5></center> -->
<?php }
} ?>

<!-- $string=strlen($result->title > 10) ? substr($result->title, 0, 10).'...' : $result->title; -->
<!-- echo $string; -->