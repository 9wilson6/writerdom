<?php if (isset($_POST['limit'])) {
	require_once("../dbconfig/dbconnect.php");
    require_once "../inc/header_links.php";
	require_once("../inc/utilities.php");
	$limit=$_POST['limit'];
      $date_global_=strtotime($date_global);
        $tutor_id=$_SESSION['user_id'];
$query="SELECT * FROM closed LEFT JOIN projects ON closed.project_id=projects.project_id WHERE closed.tutor_id='$tutor_id' ORDER BY closed.project_id desc LIMIT {$limit} "; 

$results=$db->get_results($query);
?>
<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="wide">Title</th>
                                    <th data-toggle="tooltip" title="Price $" data-placement="right">Price($)</th>
                                    <th data-toggle="tooltip" title="pages" data-placement="right">Pg</th>
                                    <th data-toggle="tooltip" title="Slides" data-placement="right">Sl</th>
                                    <th data-toggle="tooltip" title="Problems" data-placement="right">Pr</th>
                                    <th class="smalll">Subject</th>
                                    <th class="medium">Deadline</th>
                                </tr>
                            </thead>

                            <tbody>
                                       <?php foreach ($results as $result): ?>
                                <tr>
                                    <td class="smalll"><a
                                            href="my-projects-details?id=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
                                                class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
                                    <td class="wide">
                                        <?php echo (strlen($result->title) >35 )? substr($result->title, 0, 35).'...':$result->title; ?>
                                    </td>
                                    <td><?php echo $result->charges; ?></td>
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
                                <?php endforeach ?>
                                
                            </tbody>

                        </table>
                        <?php 


                        } ?>

<!-- $string=strlen($result->title > 10) ? substr($result->title, 0, 10).'...' : $result->title; -->
<!-- echo $string; -->