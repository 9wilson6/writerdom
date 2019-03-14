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
<section class="forms">

  <div class="container">
    <div class="forms__content">
<!--       <span class="float-right"><a href="index"><small>home</small></a></span> -->
      <br>
      <h1 class="headingSecondary text-center">Admin panel login</h1>
      <form action="" class="forms__form" method="POST">
         <?php if (!empty($error)) { ?>
        
         <div class="mb-4 text-danger text-uppercase bg-warning"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="email" class="form__label">E-mail:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="email" id="email" name="email" class="form-control  form__input" placeholder="email"  required>
               <input type="hidden" name="user_type" value="3">
            </div>

          </div>
        </div>
      
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4"><label for="password" class="form__label">Password:</label></div>
            <div class="col-12 col-md-12 col-lg-8"><input type="password" class="form-control error form__input" name="password"
                placeholder="password" id="password" required></div>
           
          </div>
        </div>

        <div class="form__group">
          <div class="form-row">
            <div class="col-4"><span>
                </span></div>
            <div class="col-12 col-md-12 col-lg-8"><button type="submit" name="submit" class="form__buttons">Login</button></div>
            <!-- <div class="col-12 col-md-12 col-lg-4"><a href="tutor_register" class=" form__buttons" >Register</a></div> -->
           
          </div>
          
        </div>
   
    </form>
    <!-- <a href="tutor_pass_reset" class="float-right mt-5"><small>forgot password?</small></a> -->
  </div>
  </div>
</section>
</body>
</html>



