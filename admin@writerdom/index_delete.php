<?php
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
$page="dashboard";
require_once("./inc/leftnav.php");
 ?>
 <div class="display">
    <div class="display__content">
        <?php require_once "inc/leftnav.php" ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h1 class="headingTertiary text-light text-uppercase">Dashboard </h1>

                <div class="card">
                   	<div class="card-header text-uppercase">account activities summary</div>
                   	<div class="card-body">
                   		<div class="dashboard__content mb-5">
                   			<!-- <div class="dashboard__content--items"></div> -->
                   		<!-- 	<a href="available"  class="dashboard__content--items"> <button >Available <br><span id="available"></span></button> </a>
                   			<a href="progress"  class="dashboard__content--items"> <button>Progress <br><span  id="progress"></span></button> </a> -->
                   			<!-- <div class="dashboard__content--items"></div> -->
                   		<!-- 	<a href="delivered"  class="dashboard__content--items"> <button >Delivered <br><span id="delivered"></span></button> </a>
                   			 -->

                   		</div>
                   		<hr>
                   		<div class="dashboard__content mt-5">
                   			<!-- <a href="revision"  class="dashboard__content--items"> <button>Revisions <br><span id="revision"></span></button> </a> -->

                   			<!-- <a href="closed"  class="dashboard__content--items"> <button>Closed <br><span id="closed"></span></button> </a> -->
                   			<!-- <a href="disputed"  class="dashboard__content--items"> <button>Disputed <br>60</button> </a> -->
                   		</div>
                   		<hr>
                   		<div class="dashboard__content mt-5">
                   			<!-- <a href="tutors"  class="dashboard__content--items"> <button>Tutors <br><span id="tutors"></span></button> </a>

                   			<a href="students"  class="dashboard__content--items"> <button>Students <br><span id="students"></span></button> </a> -->
                   			<a href="#"  class="dashboard__content--items"> <button>Lorem ipsum. <br>60</button> </a>
                   		</div>
                   	</div>
                   	<div class="card-footer"></div>
                   </div>   
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6"></div>
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
		}, 300);
	});
</script>