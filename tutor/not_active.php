<?php
ob_start();
require_once "../inc/header_links.php";
require_once("../dbconfig/dbconnect.php");
$page = "dashboard";
require_once "../components/top_nav.php";
ob_clean();
$user_id=$_SESSION['tutor_id'];

$query="SELECT about_me, skills from users WHERE type=2 and user_id='$user_id'";

$results=$db->get_row($query);
?>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
	<style>
		body{
			background: #FAFAFA;
		}
		.display{
			margin-left: 0px;
			text-align: center;
			position: relative;

		}
		.display__content{
			text-align: center;
			position: absolute;
			top: 50%;
			left: 50%;
			width: 80%;
			transform: translateX(-33%);
		}
		        /* custom checkbox */
        .customCheckbox input[type="checkbox"]{
            display: none;
        }
        .customCheckbox input[type="checkbox"] + label{
            position: relative;
            padding: 3px 0 0 40px;
            cursor: pointer;
        }
        .customCheckbox input[type="checkbox"] + label:before{
            content: '';
            background: #fff;
            border: 2px solid #1cbe9d;
            border-radius: 3px;
            height: 25px;
            width: 25px;
            position: absolute;
            top: 0;
            left: 0;

        }
        .customCheckbox input[type="checkbox"] + label:after{
            content: '';
            border-style: solid;
            border-width: 0 0 2px 2px;
            border-color:transparent transparent #1cbe9d #1cbe9d;
 width: 15px;
 height: 8px;
 position: absolute;
 top: 6px;
 left:5px;
 opacity: 0;
 transform: scale(2) rotate(-45deg);
 transition: transform 0.3s linear, opacity .3s linear;
 }
 .customCheckbox input[type="checkbox"]:checked + label:after{
     opacity: 1;
     transform: scale(1) rotate(-45deg);

 }
	</style>
</head>
<div class="display">
<div class="display__content">	
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<?php 
if ($results->about_me=="") { 

if (isset($_POST['submit'])) {
	$about_me=$db->escape($_POST['about_me']);
	$skills=implode($_POST['skills'], ", ");
	$query="UPDATE users set about_me='$about_me', skills='$skills' WHERE user_id='$user_id'";

	if ($db->query($query)) { ?>
	<script>
		alert("data submited successfully");
		window.location.assign("not_active");
	</script>	
	<?php }
}
	?>
<form action="" class="customCheckbox" method="POST">
	 <div class="form-group">
	 	 <h3 style="width: 90%; position: relative; left: -23px; margin-bottom: 10px; text-transform: uppercase;" >Briefly tells us about yourself (200-300 words)</h3>
    <div class="form-row">
    	<div class="col-md-10">
    		
    <textarea class="form-control" id="instructions" name="about_me" required minlength="500" maxlength="1400" rows="10" style="font-size: 20px"></textarea>
    	</div>
    </div>
  </div>
  <div class="form-group">
  	 <h3 style="width: 90%; position: relative; left: -23px; margin-bottom: 30px;" >SELECT YOUR <span class="text-muted">FIRST</span> CHOICES OF SUBJECTS YOUR MOST CONFIDENT IN WRITING</h3>
  	
	         <div class="form-row">

	         	<div class="col-6 col-md-3">
	         		 <!-- custom checkbox -->
             <div class="hoder">
                   <div class="row">
                       <input type="checkbox" id="Applied" name="skills[]" value="Applied Sciences">
                       <label for="Applied">Applied Sciences</label>
                   </div>
                   <div class="row">
                    <input type="checkbox" id="Design" name="skills[]"  onclick="return myFun()" value="Design">
                    <label for="Design">Design</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Biology" name="skills[]" onclick="return myFun()" value="Biology">
                    <label for="Biology">Biology</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Business" name="skills[]" onclick="return myFun()" value="Business &amp; Finance">
                    <label for="Business">Business &amp; Finance</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Chemistry" name="skills[]" onclick="return myFun()" value="Chemistry">
                    <label for="Chemistry">Chemistry</label>
                </div>
               
            </div>
	         	</div>
	         	<div class="col-6 col-md-3">
	         		 <!-- custom checkbox -->
            <div class="hoder">
                   <div class="row">
                       <input type="checkbox" id="Computer" name="skills[]" onclick="return myFun()" value="Computer Science">
                       <label for="Computer">Computer Science</label>
                   </div>
                   <div class="row">
                    <input type="checkbox" id="Geography" name="skills[]" onclick="return myFun()" value="Geography">
                    <label for="Geography">Geography</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Geology" name="skills[]" onclick="return myFun()" value="Geology">
                    <label for="Geology">Geology</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Education" name="skills[]" onclick="return myFun()" value="Education">
                    <label for="Education">Education</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Engineering" name="skills[]" onclick="return myFun()" value="Engineering">
                    <label for="Engineering">Engineering</label>
                </div>
               
            </div>
	         	</div>
	         	  	<div class="col-6 col-md-3">
	         		 <!-- custom checkbox -->
             <div class="hoder">
                   <div class="row">
                       <input type="checkbox" id="English" name="skills[]" onclick="return myFun()" value="English">
                       <label for="English">English</label>
                   </div>
                   <div class="row">
                    <input type="checkbox" id="Environmental" name="skills[]" onclick="return myFun()" value="Environmental science">
                    <label for="Environmental">Environmental science</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Social" name="skills[]" onclick="return myFun()" value="Social Science">
                    <label for="Social">Social Science</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Psychology" name="skills[]" onclick="return myFun()" value="Psychology">
                    <label for="Psychology">Psychology</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Political" name="skills[]" onclick="return myFun()" value="Political Science">
                    <label for="Political">Political Science</label>
                </div>
               
            </div>
	         	</div>

	         	 	<div class="col-6 col-md-3">
	         		 <!-- custom checkbox -->
             <div class="hoder">
                   <div class="row">
                       <input type="checkbox" id="Physics" name="skills[]"  onclick="return myFun()" value="Physics">
                       <label for="Physics">Physics</label>
                   </div>
                   <div class="row">
                    <input type="checkbox" id="Nursing" name="skills[]" onclick="return myFun()" value="Nursing">
                    <label for="Nursing">Nursing</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Mathematics" name="skills[]" onclick="return myFun()" value="Mathematics">
                    <label for="Mathematics">Mathematics</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Literature" name="skills[]" onclick="return myFun()" value="Literature">
                    <label for="Literature">Literature</label>
                </div>
                <div class="row">
                    <input type="checkbox" id="Law" name="skills[]" onclick="return myFun()" value="Law">
                    <label for="Law">Law</label>
                </div>
               
            </div>
	         	</div>
	         </div>

  </div>
  <h2 style="width: 90%; position: relative; left: -23px;">
	<span id="error" class="text-danger"></span>
</h2>
  <div class="form-row">
 <div class="col-0 col-md-1"></div>
<div class="col-12 col-md-8">
<input type="submit" class="btn btn-info btn-block" style="margin-top: 5px; font-size: 20px;" name="submit" value="submit">
<div class="col-0 col-md-2"></div>
</div>
</div>
</form>	

<script>
	function myFun(){
		var a=document.getElementsByName("skills[]");
		var newvar=0;
		var count;
		
		for (count=0; count<a.length; count++) {
			if (a[count].checked==true) {
				newvar=newvar + 1;
			}
		}
		if (newvar>5) {
			document.getElementById("error").innerHTML="You have reached the maximum number of fields you can select! (5)";
			return false;
		}else{
			document.getElementById("error").innerHTML="";
		}
	}

</script>

<?php }else{ ?>

<div class="headingTertiary text-danger">Your account is pending admins approval</div>
<div class="card wide-card">
<div class="card-header">Your account is not approved yet....</div>
<div class="card-body">
<div class="text-center" ><h1>contact admin at <strong><mark>admin@perfectgrader.com</mark></strong></h1></div>
</div>
</div>


<?php }
?>
</div>
</div>
</div>
</div>

<?php
require_once "../inc/footer_links.php";
?>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
		CKEDITOR.replace('instructions');
	</script>