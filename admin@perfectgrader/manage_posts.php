<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
require_once("../inc/utilities.php");
require_once("../inc/global_functions.php");
require_once("../dbconfig/dbconnect.php");
$mainpage="POST";
$page="manage_posts";
$date_global_=strtotime($date_global);

?>

<div class="display">
  <div class="display__content">
    <?php require_once "inc/leftnav.php" ?>
    <h1 class="headingTertiary text-light text-uppercase">
     Lorem ipsum dolor sit amet, consectetur.
    </h1>
    <div class="row">
      <div class="col-sm-0 col-md-0 col-lg-2"></div>
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="card-header">Lorem ipsum dolor sit amet.</div>
          <div class="card-body">
        </div>
      </div>
    </div>
    <?php require_once("../inc/footer_links.php") ?>
