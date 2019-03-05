<?php
require_once("./payment.php");
require_once("../inc/header_links.php");
require_once("./inc/topnav.php");
$mainpage="dashboard";
$page="dashboard";
require_once("./inc/leftnav.php");
require_once("../dbconfig/dbconnect.php");
$result=$db->get_var("SELECT payment_date FROM others");
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
  <marquee class="bg-dark text-light">Next funds disbursement date: <?php echo date('Y-m-d H:i:s', $result); ?> (. ❛ ᴗ ❛.)</marquee>
                       <div class="dashboard__content mb-5">
                       <div class="row">

              <div class="col-sm-4">
                 <div class="card-header">Order Summary</div>
                 <ul class="list-group">
               <a href="available"  class="dashboard__content--items"> <li class="list-group-item"> Available <span id="available"></span> </li></a>
               <a href="progress"  class="dashboard__content--items"> <li class="list-group-item">Progress<span  id="progress"></span></li> </a>
               <a href="delivered"  class="dashboard__content--items"> <li class="list-group-item">Delivered <span id="delivered"></span></li> </a>
               <a href="revision"  class="dashboard__content--items"> <li class="list-group-item">Revisions <span id="revision"></span></li></a>
               <a href="closed"  class="dashboard__content--items"> <li class="list-group-item">Closed <span id="closed"></span></li> </a>
                <!-- <a href="disputed"  class="dashboard__content--items"> <li class="list-group-item">Disputed <span id="disputed"></span></li></a> -->
              
              </ul>
    </div><!--col-1-->
               <div class="col-sm-4">
                 <div class="card-header">Accounts Summary</div>
                 <ul class="list-group">
                   <a href="tutors"  class="dashboard__content--items"> <li class="list-group-item">Tutors <span id="tutors"></span></li></a>  
                  <a href="students"  class="dashboard__content--items">  <li class="list-group-item">Students <span              id="students"></span></li> </a>
              
               <a href="applications"  class="dashboard__content--items"> <li class="list-group-item">Applications <span id="applications"></span></li> </a>
               <a href="suspended"  class="dashboard__content--items"> <li class="list-group-item">Suspended <span id="suspended"></span></li></a>
               <!-- <a href="closed"  class="dashboard__content--items"> <li class="list-group-item">Closed <span id="closed"></span></li> </a>
 -->
              </ul>
               </div><!--col-2-->
                <div class="col-sm-4">
                  <div class="card-header">Account status</div>
                  <ul class="list-group">
                   
               <a href="dues"  class="dashboard__content--items"> <li class="list-group-item">Dues<span  id="dues"></span></li> </a>
               <a href="acc_balance"  class="dashboard__content--items"> <li class="list-group-item"> Balance <span id="balance"></span> </li></a>
             </ul>
                </div><!--col-3-->
             </div>
             <!-- row end -->
              </div>
            </div><!--card body-->
            </div><!--card-->
  </div> <!--col 1-->
            
   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
             <div class="card">
            <div class="card-header text-uppercase">Notifications</div><!--card header-->
            <div class="card-body" id="cbody">
            </div><!--card body-->
            <div class="card-footer"><a href="notes" class="btn btn-info btn-block">VIEW ALL</a></div>
            </div><!--card-->
          </div> <!--col2-->


        </div>
    </div>
</div>
<?php require_once("../inc/footer_links.php");
 ?>
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
      $("#suspended").load('dashboard_counters', {
        type:'suspended',
        submit: 'submit'
      });
      $("#applications").load('dashboard_counters', {
        type:'applications',
        submit: 'submit'
      });
      $("#dues").load('dashboard_counters', {
        type:'dues',
        submit: 'submit'
      });

       $("#balance").load('dashboard_counters', {
        type:'balance',
        submit: 'submit'
      });
      $("#cbody").load("notifications.php", {limit:10});
		}, 300);
	});
</script>

