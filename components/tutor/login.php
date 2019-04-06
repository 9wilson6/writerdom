<section class="fom">
	

	<div class="main">
    <section class="form-header">
      <div class="home"><a href="index">Home</a></div>
      <div style="clear: both"></div>
      <div class="image">
        <div class="cover"></div> <img src="./assets/user.png">
      </div>
      <div class="company">PerfectGrader</div>
      <div class="heading">Login to your account</div>
    </section>
    <form action="" method="POST" id="form-box">

     <?php if (!empty($error)) { ?>
      
       <div class="text-danger text-uppercase  text-center"><strong><?php  echo $error; ?></strong></div>
     <?php  } ?>
     <?php if (!empty($success)) { ?>
      
       <div class="text-success text-uppercase text-center"><strong><?php  echo $success; ?></strong></div>
     <?php  } ?>
     <!-- //////////////////////////////////// -->
     <div class="icon"><span class="fa fa-envelope"></span></div>
     <div class="input">
      <input type="email" name="email" id="email" class="inp" placeholder="E-mail" <?php if (isset($_SESSION['email'])): ?>
      value="<?php echo $_SESSION['email'] ?>"
      <?php endif ?> required>
      <input type="hidden" name="user_type" value="2">
    </div>
    <!-- //////////////////////////////////// -->
    <div class="icon"><span class="fa fa-lock"></span></div>
    <div class="input">
      <input type="password" name="password" id="password" class="inp"  <?php if (isset($_SESSION['password'])): ?>
      value="<?php echo $_SESSION['password'] ?>"
      <?php
      session_destroy();
      endif ?> placeholder="Password" required>
      <input type="hidden" name="user" value="tutor">
    </div>
    <!-- //////////////////////////////////// -->
    <input type="submit" value="LOGIN NOW" name="submit" class="sub-btn">
  </form>
  <section class="form-footer">
    <p>Don't have account? &nbsp; <a href="tutor_register">Register</a></p>
    <div class="home"><a href="tutor_pass_reset">forgot password?</a></div>
  </section>
</div>
</section>