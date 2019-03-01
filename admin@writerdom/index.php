<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
$page="dashboard";
require_once("./inc/leftnav.php");
 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <h1 class="headingTertiary text-light text-center text-uppercase">Dashboard </h1>
        <div class="row">

          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
             <div class="card">
            <div class="card-header text-uppercase">account activities summary</div><!--card header-->
            <div class="card-body">

                       <div class="dashboard__content mb-5">
                        <a href="available"  class="dashboard__content--items"> <button >Available <br><span id="available"></span></button> </a>
                        <a href="progress"  class="dashboard__content--items"> <button>Progress <br><span  id="progress"></span></button> </a> </div>
                       <div class="dashboard__content mb-5">
                          <a href="delivered"  class="dashboard__content--items"> <button >Delivered <br><span id="delivered"></span></button> </a>
                        <a href="revision"  class="dashboard__content--items"> <button>Revisions <br><span id="revision"></span></button> </a>
                         </div>
                       <div class="dashboard__content mb-5">
                        <a href="closed"  class="dashboard__content--items"> <button>Closed <br><span id="closed"></span></button> </a>
                        <a href="disputed"  class="dashboard__content--items"> <button>Disputed <br>60</button> </a>
                         </div>
                       <div class="dashboard__content mb-5">
                        <a href="tutors"  class="dashboard__content--items"> <button>Tutors <br><span id="tutors"></span></button> </a>

                        <a href="students"  class="dashboard__content--items"> <button>Students <br><span id="students"></span></button> </a>
                        </div>
            </div><!--card body-->
            </div><!--card-->
  </div> <!--col 1-->

   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
             <div class="card">
            <div class="card-header text-uppercase">Notifications</div><!--card header-->
            <div class="card-body" id="cbody">
            </div><!--card body-->
            </div><!--card-->
          </div> <!--col2-->


        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php") ?>
<script>
	$(function(){
		setInterval(function(){
			$("#available").load('dashboard_counters', {
				type:'available',
				submit: 'submit'
			});
			$("#progress").load('dashboard_counters', {
				type:'progress',
				submit: 'submit'
			});
			$("#delivered").load('dashboard_counters', {
				type:'delivered',
				submit: 'submit'
			});
			$("#revision").load('dashboard_counters', {
				type:'revision',
				submit: 'submit'
			});
			$("#closed").load('dashboard_counters', {
				type:'closed',
				submit: 'submit'
			});
			$("#students").load('dashboard_counters', {
				type:'students',
				submit: 'submit'
			});
			$("#tutors").load('dashboard_counters', {
				type:'tutors',
				submit: 'submit'
			});
      $("#cbody").load("notifications.php", {limit:14});
		}, 300);
	});
</script>
