<section class="forms">

  <div class="container">

    <div class="forms__content">
       <span class="float-right"><a href="index"><small>home</small></a></span> <br>
      <div class="text-center"><h1 class="headingSecondary">Login to Start Chat With Scholars Right Now!</h1>
      </div>
      <form action="" class="forms__form" method="POST">
         <?php if (!empty($error)) { ?>
        
         <div class="mb-4 text-danger text-uppercase bg-warning"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
        <div class="form__group">
          <!-- Username -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="email" class="form__label">E-mail:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="text" id="email" name="email" id="" class="form-control error form__input" placeholder="email" <?php if (isset($_SESSION['email'])): ?>
                value="<?php echo $_SESSION['email'] ?>"
              <?php endif ?> required>
               <input type="hidden" name="user_type" value="1">
            </div>
          </div>
          <!-- Username -->
        </div>
        <div class="form__group">
          <!-- Password -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4"><label for="password" class="form__label" required>Password:</label></div>
            <div class="col-12 col-md-12 col-lg-8"><input type="password" class="form-control form__input" name="password"
                placeholder="password" <?php if (isset($_SESSION['password'])): ?>
                  value="<?php echo $_SESSION['password'] ?>"
                <?php
                  session_destroy();
                 endif ?> id="password"></div>
          </div>
          <!-- Password -->
        </div>

        <div class="form__group">
          <input type="hidden" name="user" value="student">
          <!-- Login Register -->
          <div class="form-row">
            <div class="col-4"><span>
               </span></div>
            <div class="col-12 col-md-12 col-lg-4">
              <button type="submit" class="form__buttons" name="submit">Login</button>
            </div>
            <div class="col-12 col-md-12 col-lg-4"><a href="student_register" class=" form__buttons" >Register</a></div>
            
          </div>
           <!-- Login Register -->
        </div>
    </form>
    <a href="student_pass_reset" class="float-right mt-5"><small>forgot password?</small></a>
  </div>
  </div>
</section>
