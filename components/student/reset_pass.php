<section class="forms">
  <div class="container">
    <div class="forms__content">
      <div class="text-center"><h1 class="headingSecondary">Reset Password</h1></div>
      <form action="" class="forms__form" method="POST">
        <div class="form__group">
          <div class="form-row">
            <div class="col-12 col-md-12 col-lg-4">
              <label for="email" class="form__label">Email:</label>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <input type="email" id="email" name="email" class="form-control form__input" placeholder="email" required>
            </div>

          </div>
        </div>
        <div class="form__group">
          <input type="hidden" name="user" value="student">
          <div class="form-row">
            <div class="col-4"><span>
               </span></div>
            <div class="col-12 col-md-12 col-lg-4"><button class="form__buttons">Reset</button></div>
            <div class="col-12 col-md-12 col-lg-4"><a href="student_login" class=" form__buttons" >login</a></div>
            
          </div>
        </div>
    </form>
  </div>
  </div>
</section>