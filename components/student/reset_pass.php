<section class="fom">
	

	<div class="main">
    <section class="form-header">
      <div class="home"><a href="https://www.perfectgrader.com/student_login">Login</a></div>
      <div style="clear: both"></div>
     <!--  <div class="image">
        <div class="cover"></div> <img src="./assets/user.png">
      </div> -->
      <!-- <div class="company">PerfectGrader</div> -->
      <div class="heading">Reset Your Account Password</div>
    </section>
    <form action="" method="POST" id="form-box">

     <?php if (!empty($error)) { ?>

      <div class="text-danger text-uppercase  text-center" style="font-size: 14px"><strong><?php  echo $error; ?></strong></div>
    <?php  } ?>
    <?php if (!empty($success)) { ?>

      <div class="text-success text-uppercase text-center" style="font-size: 14px"><strong><?php  echo $success; ?></strong></div>
    <?php  } ?>
    <!-- //////////////////////////////////// -->
    <div class="icon"><span class="fa fa-envelope"></span></div>
    <div class="input">
      <input type="email" name="email" id="email" class="inp" placeholder="E-mail" required>
      <input type="hidden" name="user_type" value="1">
    </div>
    <!-- //////////////////////////////////// -->
    <input type="submit" value="RESET NOW" name="reset" class="sub-btn">
  </form>
  
</div>
</section>