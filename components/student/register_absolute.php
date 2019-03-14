<section class="forms">

  <div class="container">

    <div class="forms__content">
       <span class="float-right"><a href="index"><small>home</small></a></span>
       <br>
      <h1 class="headingSecondary">Create Account to Start Chat With Scholars Right Now!</h1>
      <form action="" class="forms__form" method="POST">
        
        <?php if (!empty($error)) { ?>
        
         <div class="mb-4 text-danger text-uppercase bg-warning"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      <?php if (!empty($success)) { ?>
        
         <div class="mb-4 text-light text-uppercase bg-success"><strong><?php  echo $success; ?></strong></div>
      <?php  } ?>
        <div class="form__group">
          <!-- user name -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="username" class="form__label">Username:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="text" id="username" name="username" class="form-control error form__input" placeholder="username"
                required>
            </div>
          </div>
          <!-- user name -->
        </div>
        <div class="form__group">
          <!-- user email -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="email" class="form__label">Email:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="email" id="email" name="email" id="email" class="form-control error form__input" placeholder="email"
                required>
                <input type="hidden" name="user_type" value="1">
            </div>
          </div>
          <!-- user email -->
        </div>
        <div class="form__group">
          <!-- user password -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="password" class="form__label">Password:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="password" class="form-control form__input" name="password" placeholder="password" id="password"
                required minlength="6"></div>
          </div>
          <!-- user password -->
        </div>
        <div class="form__group">

          <!-- Conform Password -->
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="C_password" class="form__label">Conform Password:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="password" class="form-control form__input" name="C_password" placeholder="Confirm password"
                id="C_password" required minlength="6">
            </div>

          </div>
          <!-- Conform Password -->
        </div>
        <div class="form__group">
          <div class="form-row">
             <!-- Login Register -->
            <div class="col-4">
              <input type="hidden" name="user" value="student">
              <!-- register -->
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <button type="submit" name="submit" class="form__buttons">Register</button>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <a href="student_login" class=" form__buttons" id="Login_button">Login</a>
            </div>
             <!-- Login Register -->
          </div>
        
    </div>
</div>
    </form>
  </div>
  </div>
</section>