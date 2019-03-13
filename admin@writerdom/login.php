<?php 
require_once"../inc/header_links.php";
require_once("../dbconfig/dbconnect.php");
require_once"../inc/global_functions.php";
$error="";
 Login();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
</head>
<body>
<section class="fom">

  <div class="main">
        <section class="form-header">
            <div class="home"><a href="index">Home</a></div>
            <div style="clear: both"></div>
            <div class="image">
                <div class="cover"></div> <img src="./../assets/user.png">
            </div>
            <div class="company">WriterDom</div>
            <div class="heading">Admin Login</div>
        </section>
        <form action="" method="POST" id="form-box">

          <?php if (!empty($error)) { ?>
        
         <div class="text-danger text-uppercase  text-center"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      
            <!-- //////////////////////////////////// -->
            <div class="icon"><span class="fa fa-envelope"></span></div>
            <div class="input">
                <input type="email" name="email" id="email" class="inp" placeholder="E-mail" required>
              <input type="hidden" name="user_type" value="3">
            </div>
            <!-- //////////////////////////////////// -->
            <div class="icon"><span class="fa fa-lock"></span></div>
            <div class="input">
                <input type="password" name="password" id="password" class="inp" placeholder="Password" required>
                  <input type="hidden" name="user" value="admin">
            </div>
            <!-- //////////////////////////////////// -->
            <input type="submit" value="LOGIN NOW" name="submit" class="sub-btn">
        </form>
    </div>
</section>
</body>
</html>