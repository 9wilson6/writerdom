<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
$mainpage="orders";
$page="";
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$query="SELECT * FROM users WHERE type=2 and dues >0";
$results=$db->get_results($query);
if (isset($_POST['submit'])) {
    $pay= $_POST['pay'];
    $dues= $_POST['dues'];
    $user_id=$_POST['user_id'];
   // die;
    $bal=($dues-$pay);
    $query="UPDATE users SET dues='$bal' WHERE user_id='$user_id'";
    if ($db->query($query)) { ?>
        <script>window.location.assign("balance_update")</script>
    <?php  }
}
?>
<div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-11">
                <div class="headingTertiary text-light text-uppercase"> update payment records</div>

                <div class="card">
                    <div class="card-header text-uppercase">Manage financial records here</div>
                    <div class="card-body">
                        <?php if ($db->num_rows<1): ?>
                            <div class="headingTertiary">There is Nothing To show Yet</div>
                            <?php elseif($db->num_rows>0): ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tutor Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Dues</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="display">
                                        <?php foreach ($results as $result): ?>
                                            <tr>
                                                <td><?php echo $result->user_id; ?></td>
                                                <td><?php echo $result->username; ?></td>
                                                <td><?php echo $result->email; ?></td>
                                                <td><?php echo $result->dues; ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <div class="form-row">
                                                            <div class="col-8">
                                                                <input type="number" name="pay" min="0"
                                                                class="form-control forms2__input" min="0"
                                                                max="<?php echo $result->dues?>"
                                                                value="<?php echo $result->dues?>" required>
                                                                <input type="hidden" name="dues" max="<?php echo $result->dues?>"
                                                                min="" value="<?php echo $result->dues; ?>">
                                                                <input type="hidden" name="user_id"
                                                                value="<?php echo $result->user_id ?>">
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="submit" name="submit" value="UPDATE"
                                                                class="btn btn-block btn-info">
                                                            </div>

                                                        </div>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>

                                </table>
                            <?php endif ?>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../inc/footer_links.php") ?>