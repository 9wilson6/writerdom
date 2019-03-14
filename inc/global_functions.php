<?php 
function Register(){
	global $error, $success, $date_global;
	if (isset($_POST['submit'])) {
		require_once("dbconfig/dbconnect.php");

		/////////////////////////////////RECEIVE FORM DATA/////////////////////////////////////////
		$username=$db->escape($_POST['username']);
		$user_type=$db->escape($_POST['user_type']);
		$email=$db->escape($_POST['email']);
		$password=$db->escape($_POST['password']);
		$C_password=$db->escape($_POST['C_password']);

		////////////////////////CHECK FOR EMPTY FIELDS///////////////////////////////////////////////
		if ( !empty($username) && !empty($user_type) && !empty($email) &&  !empty($password) &&  !empty($C_password)) {
			//////////////////////////CHECK EMAIL VALIDITY///////////////////////////////////////////
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				//////////////////////////////CHECK IF PASSWORDS MATCH///////////////////////////////
				if ($password===$C_password) {
					///////////////CHECK PASSWORD LENGTH////////////////////////////////////////////
					if (strlen($password)>5) {
					 	//////CHECK IF THE EMAIL ALREADY EXISTS IN THE DATABASE//////////
					 	$query="SELECT * FROM users WHERE email='$email'";

					 	$results=$db->get_results($query);
					 	if($db->num_rows == 0){
					 		$password_=password_hash($password, PASSWORD_DEFAULT);
					 		$date=date("Y-m-d H:i:sa");
					 			$verif_key=str_shuffle(substr(password_hash($date, PASSWORD_DEFAULT), 30,90));
					 			
					 			$query="INSERT INTO users(username, email, password, type, created_on,verif_key, status) VALUES('$username','$email','$password_', '$user_type','$date','$verif_key', 1)";
					 			$results=$db->query($query);
					 		
					 			
					 			if ($results==1) {
					 				$success= "Regration was successful";
					 				// session_start();
					 				$_SESSION['email']=$email;
					 				$_SESSION['password']=$password;
					 				if ($user_type==1) {
					 					header("Refresh:0; url=student_login");
											}elseif ($user_type==2) {
												header("Refresh:0; url=tutor_login");
											}
					 				
					 			}else{
					 				$error= "Regration was unsuccessful";
					 			}
					 			
					 		
					 	}else{
					 		///////ALREADY REGISTERED/////////
					 		$error="email is already in use";
					 	}
					 } else {
					 	///////SHORT PASSWORD/////////
					 	$error="Passwords should be at least 6 characters in length";
					 }
					  
				} else {
					////////PASSWORD MISATCH ERROR////////
					$error="Passwords didn't match";
					
				}
				
				
			}else{
				//////////INVALID EMAIL///////////////
				$error="Invalid Email Supplied...";
			}
		}else{
			/////////////EMPTY FIELDS////////////////
			$error="Empty Fileds Detected....";
		

		}
		
		// die();
	}
}
 ?>

<?php 
function Login(){
	if (isset($_POST['submit'])) {
		global $error;
		global $db;
		$email=$db->escape($_POST['email']);
		$user_type=$db->escape(trim($_POST['user_type']));
		$password=$db->escape($_POST['password']);
		$query="SELECT * FROM users WHERE email='$email' AND type='$user_type'";
		$results=$db->get_row($query);
		if ($db->num_rows>0) {
			if (password_verify($password, $results->password)) {
				$_SESSION['username']=$results->username;
				$_SESSION['user_id']=$results->user_id;
				if ($user_type==1) {
					if ($results->status==1) {
						$_SESSION['user_type']=1;
					header("location:student/createpost");
					}else{
						$error="Sorry your account is under suspension. <br> contact admin for further details";
					}
					
				}elseif($user_type==2){
					if ($results->status==1) {
						if ($results->verified==1) {
						$_SESSION['user_type']=2;
					header("location:tutor/dashboard");
					}else{
					header("location:tutor/not_active");
					}
					}else{
						$error="Sorry your account is under suspension. <br> contact admin for further details";
					}
				}elseif ($user_type==3) {
					$_SESSION['user_type']=3;
					header("location:./index");
				}
			}else{
				$error="Invalid credentials";
			}
		}else{
			$error="Invalid credentials";

		}

	}
}
 ?>

<?php function getDateTimeDiff($current_date, $other_date){
	$now_timeStamp=strtotime($current_date);

	if ($now_timeStamp<$other_date) {
		$diff_timestmp=$other_date- $now_timeStamp;
		/////////////////////////////////seconds/////////////////////////////////////////////////////
	if ($diff_timestmp<60) {
		if ($diff_timestmp==1) {
			return $diff_timestmp . ' sec';
		}else{
			return $diff_timestmp . ' secs';
		}
	
	//////////////////////////////////////minutes/////////////////////////////////////////////////////////
	} elseif($diff_timestmp>=60 && $diff_timestmp<3600) {
		if (round(($diff_timestmp/60))==1) {
			return round(($diff_timestmp/60)). ' min ';
		}else{
			return round(($diff_timestmp/60)). ' mins ';
		}
		//////////////////////////////////////hours/////////////////////////////////////////////////////////	
	}elseif($diff_timestmp>=3600 && $diff_timestmp<86400) {

		if (floor(($diff_timestmp/3600))==1) {

			$time_remaining=floor(($diff_timestmp/3600)). ' hour';

			if (floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 )==1) {

				$time_remaining.=floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 ). ' min';

			}elseif(floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 )>1){
				$time_remaining.=floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 ). ' mins';

			}
			 return $time_remaining;
		}else{
			$time_remaining = floor(($diff_timestmp/3600)). ' hours ';
			if (floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 )==1) {

				$time_remaining.=floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 ). ' min';

			}elseif(floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 )>1){
				$time_remaining.=floor((($diff_timestmp/3600)-floor($diff_timestmp/3600))*60 ). ' mins';

			}
			return $time_remaining;
			
		}
			//////////////////////////////////////days/////////////////////////////////////////////////////////
	}elseif($diff_timestmp>=86400 && $diff_timestmp<86400 * 30) {
		
		if (floor(($diff_timestmp/86400))==1) {

			$time_remaining=floor(($diff_timestmp/86400)). ' day ';

			if (floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24)==1) {

				$time_remaining.=floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24 ). ' hour';

			} elseif(floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*60 )>1) {

				$time_remaining.=floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24 ). ' hours';

			}
			
			return $time_remaining;
		}else{
			$time_remaining=floor(($diff_timestmp/86400)). ' days ';

			if (floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24 )==1) {

				$time_remaining.=floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24 ). ' hour';

			} elseif(floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*60 )>1) {

				$time_remaining.=floor((($diff_timestmp/86400)-floor($diff_timestmp/86400))*24 ). ' hours';

			}

			return $time_remaining;
		}
		
// if need be////////////////////////////////////////////////////////////////////////////////////////////
	}elseif($diff_timestmp>=86400 * 30 && $diff_timestmp<86400 * 365) {
		if (round(($diff_timestmp/(86400 * 30)))==1) {
			return round(($diff_timestmp/(86400 * 30))). ' month';
		}else{
			return round(($diff_timestmp/(86400 * 30))). ' months';
		}
		
	}else{
		if (round(($diff_timestmp/(86400 * 365)))==1) {
			return round(($diff_timestmp/(86400 * 365))). ' year';
		}
		return round(($diff_timestmp/(86400 * 365))). ' years';
	}

	}else{
		$diff_timestmp=$now_timeStamp - $other_date;
	if ($diff_timestmp<60) {
		return $diff_timestmp . ' sec ago';
	} elseif($diff_timestmp>=60 && $diff_timestmp<3600) {
		return round(($diff_timestmp/60)). ' mins ago';
	}elseif($diff_timestmp>=3600 && $diff_timestmp<86400) {
		return round(($diff_timestmp/3600)). ' hours ago';
	}elseif($diff_timestmp>=86400 && $diff_timestmp<86400 * 30) {
		return round(($diff_timestmp/86400)). ' days ago';
	}elseif($diff_timestmp>=86400 * 30 && $diff_timestmp<86400 * 365) {
		return round(($diff_timestmp/(86400 * 30))). ' months ago';
	}else{
		return round(($diff_timestmp/(86400 * 365))). ' years ago';
	}
	}
	


} ?>

<?php  
# ////////////////////////////FILES////////////////////////////////////////// -->
function filesDownload($student_id, $project_id){
$dir="../FILES/{$student_id}/{$project_id}/";
$dir_="FILES/{$student_id}/{$project_id}/";
 if (!file_exists($dir)) {
					echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($dir);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			echo "No Files Attached";
		}else{
			// $files = array('readme.txt', 'test.html', 'image.gif');\
		$zipname =$dir."Order_". $project_id."_.zip";
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		echo '<ul class="list-group">';
		foreach ($files as  $file) {
			if (!file_exists($zipname)) {
				 $zip->addFile($dir."/".$file, $file);
			} 
		} ?>
<li class="list-group-item text-center "><a href="<?php echo $zipname ?>" class="text-success">Download as a zip</a><i
	 class="far fa-file-archive icon-r ml-3"></i></li>
<?php $zip->close();
			$files=array_diff($allFiles, array('.', '..', "Order_". $project_id."_.zip"));
		foreach ($files as  $file) {
			 ?>
<li class="list-group-item">
	<?php echo "<a href='../download?file=".urlencode($file)."&dir=".$dir_."'>".$file."</a><i class='fa fa-download ml-3 icon-r'></i><br/>";	 ?>
</li>


<?php }
					
					}

					 ?>

</ul>
<?php
}

}

/////////////////////SHOW RESULTS///////////////////////////
function resultsDownload($student_id, $project_id){

$dir="../RESULTS/{$student_id}/{$project_id}/DRAFT";
$dir_="RESULTS/{$student_id}/{$project_id}/DRAFT";
 if (!file_exists($dir)) {
					echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($dir);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			// echo "No Files Attached";
		}else{
			// $files = array('readme.txt', 'test.html', 'image.gif');\
		$zipname =$dir."Order_". $project_id."_.zip";
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		echo '<ul class="list-group">';
		echo "<h2 class='text-center'>drafts</h2>";
		foreach ($files as  $file) {
			if (!file_exists($zipname)) {
				 $zip->addFile($dir."/".$file, $file);
			} 
		} ?>
<li class="list-group-item text-center "><a href="<?php echo $zipname ?>" class="text-success">Download as a zip</a><i
	 class="far fa-file-archive icon-r ml-3"></i></li>
<?php $zip->close();
			$files=array_diff($allFiles, array('.', '..', "Order_". $project_id."_.zip"));
		foreach ($files as  $file) {
			 ?>
			 <!-- <h1>drafts</h1> -->
<li class="list-group-item">
	<?php echo "<a href='../download?file=".urlencode($file)."&dir=".$dir_."'>".$file."</a><i class='fa fa-download ml-3 icon-r'></i><br/>";	 ?>
</li>


<?php }
					
					}

					 ?>

</ul>
<?php
}
/////////////////////////Final////////////////////////
$dir="../RESULTS/{$student_id}/{$project_id}/FINAL";
$dir_="RESULTS/{$student_id}/{$project_id}/FINAL";
 if (!file_exists($dir)) {
					// echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($dir);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			// echo "No Files Attached";
		}else{
			// $files = array('readme.txt', 'test.html', 'image.gif');\
		$zipname =$dir."Order_". $project_id."_.zip";
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);
		echo '<ul class="list-group">';
		echo "<h2 class='text-center'>final</h2>";
		foreach ($files as  $file) {
			if (!file_exists($zipname)) {
				 $zip->addFile($dir."/".$file, $file);
			} 
		} ?>
<li class="list-group-item text-center "><a href="<?php echo $zipname ?>" class="text-success">Download as a zip</a><i
	 class="far fa-file-archive icon-r ml-3"></i></li>
<?php $zip->close();
			$files=array_diff($allFiles, array('.', '..', "Order_". $project_id."_.zip"));
		foreach ($files as  $file) {
			 ?>
			 <!-- <h1>drafts</h1> -->
<li class="list-group-item">
	<?php echo "<a href='../download?file=".urlencode($file)."&dir=".$dir_."'>".$file."</a><i class='fa fa-download ml-3 icon-r'></i><br/>";	 ?>
</li>


<?php }
					
					}

					 ?>

</ul>
<?php
}
/////////////////////////FINAL///////////////////////
}

/////////////////////SHOW RESULTS///////////////////////////



function manageFiles($student_id, $project_id){
	$dir="../FILES/{$student_id}/{$project_id}/";
$dir_="FILES/{$student_id}/{$project_id}/";
 if (!file_exists($dir)) {
					echo "No Files Attached"; 
					}else{
						
		$allFiles=scandir($dir);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			echo "No Files Attached";
		}else{
			// $files = array('readme.txt', 'test.html', 'image.gif');\
		$zipname =$dir."Order_". $project_id."_.zip";
		echo '<ul class="list-group">';
		 ?>

<?php
			$files=array_diff($allFiles, array('.', '..', "Order_". $project_id."_.zip"));
		foreach ($files as  $file) {
			 ?>
<li class="list-group-item">
	<?php echo "<a href='../delete_file?id={$project_id}&&file=".urlencode($file)."&dir=".$dir_."'>".$file." <i class='far fa-trash-alt text-danger ml-3'></i></a><br/>";	 ?>
</li>

<?php
}
}
}
}
////////////////////Show Files Without download////////


////////////////////Show Files Without download////////
function deleteFiles($student_id, $project_id){
	$dir="../FILES/{$student_id}/{$project_id}/";
$dir_="FILES/{$student_id}/{$project_id}/";

 if (!file_exists($dir)) {
	// rmdir("../FILES/{$student_id}/{$project_id}");
					}else{
						
		$allFiles=scandir($dir);
		$files=array_diff($allFiles, array('.', '..'));
		
		if(empty($files)) {
			rmdir("../FILES/{$student_id}/{$project_id}");
		}else{
			// $files = array('readme.txt', 'test.html', 'image.gif');\
		$zipname =$dir."Order_". $project_id."_.zip";
		foreach ($files as  $file) {
			unlink("../FILES/{$student_id}/{$project_id}/".$file);
}
if (file_exists($zipname)) {
		unlink($zipname);

}
rmdir("../FILES/{$student_id}/{$project_id}");

}

}
// Directory
$directory = "../FILES/{$student_id}/";

// Returns array of files
$files = scandir($directory);

// Count number of files and store them to variable..
$num_files = count($files)-2;
 if ($num_files==0) {
 	rmdir("../FILES/{$student_id}");
 }
}
?>

