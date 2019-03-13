<section class="fom">
	

	<div class="main">
        <section class="form-header">
            <div class="home"><a href="index">Home</a></div>
            <div style="clear: both"></div>
            <div class="image">
                <div class="cover"></div> <img src="./assets/user.png">
            </div>
            <div class="company">WriterDom</div>
            <div class="heading">Create User account</div>
        </section>
        <form action="" method="POST" id="form-box">

        	<?php if (!empty($error)) { ?>
        
         <div class="text-danger text-uppercase  text-center"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      <?php if (!empty($success)) { ?>
        
         <div class="text-success text-uppercase text-center"><strong><?php  echo $success; ?></strong></div>
      <?php  } ?>
            <div class="icon"><span class="fa fa-user"></span></div>
            <div class="input">
                <input type="text" name="username" id="username" class="inp" required placeholder="Username">
            </div>
            <!-- //////////////////////////////////// -->
            <div class="icon"><span class="fa fa-envelope"></span></div>
            <div class="input">
                <input type="email" name="email" id="email" class="inp" placeholder="E-mail" required>
            </div>
            <!-- //////////////////////////////////// -->
            <div class="icon"><span class="fa fa-lock"></span></div>
            <div class="input">
                <input type="password" name="password" id="password" class="inp" required placeholder="Password">
            </div>
            <!-- //////////////////////////////////// -->
            <div class="icon"><span class="fa fa-lock"></span></div>
            <div class="input">
                <input type="password" name="C_password" id="C_password" class="inp" required placeholder="Retype Password">
                 <input type="hidden" name="user" value="student">
                 <input type="hidden" name="user_type" value="2">
            </div>
            <!-- //////////////////////////////////// -->
            <input type="submit" value="REGISTER NOW" name="submit" class="sub-btn">
        </form>
        <section class="form-footer">
            <p>Already have an account? &nbsp; <a href="tutor_login">Login</a></p>
        </section>
    </div>
</section>