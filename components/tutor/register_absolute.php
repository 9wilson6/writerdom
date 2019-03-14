<section class="forms">

  <div class="container">

    <div class="forms__content">
       <span class="float-right"><a href="index"><small>home</small></a></span>
       <br>
      <h1 class="headingSecondary">Create Account to Start Earning Right Now!</h1>
      <form action="" class="forms__form" method="POST">
         <?php if (!empty($error)) { ?>
        
         <div class="mb-4 text-danger text-uppercase bg-warning"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      <?php if (!empty($success)) { ?>
        
         <div class="mb-4 text-light text-uppercase bg-success"><strong><?php  echo $success; ?></strong></div>
      <?php  } ?>
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="username" class="form__label">Username:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="text" id="username" name="username" id="" class="form-control error form__input" placeholder="username" required>

            </div>
            <!-- <div class="col-12 col-md-12 col-lg-2">
              <td class="text-center error__text">
                 username error 
              </td>
            </div> -->
          </div>
        </div>
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="email" class="form__label">Email:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="email" id="email" name="email" id="email" class="form-control error form__input" placeholder="email" required>
              <input type="hidden" name="user_type" value="2">
            </div>
            <!-- <div class="col-12 col-md-12 col-lg-2">
              <td class="text-center error__text">
                email error
              </td>
            </div> -->
          </div>
        </div>
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4"><label for="password" class="form__label">Password:</label></div>
            <div class="col-12 col-md-12 col-lg-8"><input type="password" class="form-control error form__input" name="password"
                placeholder="password" id="password" minlength="6" required></div>
            <!-- <div class="col-12 col-md-12 col-lg-2">
              password error
            </div> -->
          </div>
        </div>
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="Confirm password" class="form__label">Conform Password:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="password" class="form-control error form__input" name="C_password" placeholder="Confirm password"
                id="Confirm password" minlength="6" required>
            </div>
            <!-- <div class="col-12 col-md-12 col-lg-2">
              Confirm password error
            </div> -->
          </div>
        </div>
        <div class="form__group">
          <div class="form-row">
            <div class="col-4"><span>
                <!-- register --></span></div>
            <div class="col-12 col-md-12 col-lg-4"><button class="form__buttons" name="submit">Register</button></div>
            <div class="col-12 col-md-12 col-lg-4"><a href="tutor_login" class=" form__buttons" id="Login_button">Login</a></div>
            <!-- <div class="col-2"><span> -->
            <!-- login --></span>
          </div>
          <!-- <div class="col-3"><button class="form__buttons">home</button></div> -->
        </div>
    </div>
    </form>
  </div>
  </div>
</section>