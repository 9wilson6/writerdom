<?php 
require_once "../inc/header_links.php";
$page="projects" ;
require_once "../components/top_nav.php";
?>
<div class="display">
    <div class="display__content">
        <?php require_once "../components/tutor_leftnav.php" ?>
        <!-- <h1 class="headingTertiary text-left">Available</h1> -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <h1 class="headingTertiary text-light">Projects Assigned to you</h1>
                <div class="card">
                    <div class="card-header">My Projects</div>
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th class="wide">Topic</th>
                                    <th>Price</th>
                                    <th class="medium">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td></td>
                                    <td class="wide"></td>
                                    <td></td>
                                    <td class="medium"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12  col-xl-4">
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


<?php
require_once"../inc/footer_links.php";
 ?>