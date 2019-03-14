<section class="forms">

  <div class="container">
    <div class="forms__content">
      <span class="float-right"><a href="index"><small>home</small></a></span>
      <br>
      <h1 class="headingSecondary">Login to Start Earning Right Now!</h1>
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
              <input type="email" id="email" name="email" class="form-control  form__input" <?php if (isset($_SESSION['email'])): ?>
                value="<?php echo $_SESSION['email'] ?>"
              <?php endif ?> placeholder="email"  required>
               <input type="hidden" name="user_type" value="2">
            </div>

          </div>
        </div>
      
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4"><label for="password" class="form__label">Password:</label></div>
            <div class="col-12 col-md-12 col-lg-8"><input type="password" class="form-control error form__input" name="password"
                placeholder="password" id="password" <?php if (isset($_SESSION['password'])): ?>
                  value="<?php echo $_SESSION['password'] ?>"
                <?php
                session_destroy();
                 endif ?> required></div>
           
          </div>
        </div>

        <div class="form__group">
          <div class="form-row">
            <div class="col-4"><span>
                </span></div>
            <div class="col-12 col-md-12 col-lg-4"><button type="submit" name="submit" class="form__buttons">Login</button></div>
            <div class="col-12 col-md-12 col-lg-4"><a href="tutor_register" class=" form__buttons" >Register</a></div>
           
          </div>
          
        </div>
   
    </form>
    <a href="tutor_pass_reset" class="float-right mt-5"><small>forgot password?</small></a>
  </div>
  </div>
</section>