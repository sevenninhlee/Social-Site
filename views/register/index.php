
<?php include_once 'views/layout/'.$this->layout.'headerLogin.php'; ?>
    <!-- satrt form -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<section id="form" class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="f700 ffmily">Sign Up</h2>
        <form class='register-form'>
            <strong><p class='text-success register_active'></p></strong>
            <div class="form-group space30">
              <div class="row">
                <div class="col-sm-3">
                  <label>First Name<span>*</span></label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="user[firstname]" class="form-control" required>
                  <p class='text-danger error-firstname'></p>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label>Last Name<span>*</span></label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="user[lastname]" class="form-control" required>
                  <p class='text-danger error-lastname'></p>
                </div>
              </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Email<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                    <input type="email" name="user[email]" class="form-control" required>
                    <p class='text-danger error-email'></p>                  
                  </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Image</label>
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <input type="text" class="form-control user-avata-name" name="" disabled>
                      <span class="input-group-addon"> <label> Upload <input type="file" class="file" name="user[avata]" style='display:none'></label> </span>
                      <p class='text-danger error-avata'></p>
                    </div>
                  </div>
                </div>
              </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Password<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="user[password]" required>
                    <p class='text-danger error-password'></p>
                  </div>
                </div>
            </div>
            

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Password Confirmation<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="user[repassword]" required>
                      <p class='text-danger error-repassword'></p>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label>Phone Number<span>*</span></label>
                </div>
                <div class="col-sm-9">
                  <input type="number" name="user[phone]" class="form-control">
                  <p class='text-danger error-phone'></p>
                </div>
              </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Gender<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                      <select name="user[gender]" id="">
                        <option value="1" selected>Male</option>
                        <option value="0">Female</option>
                      </select>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Capcha<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                    <p class='text-danger error-captcha'></p>
                    <div class="g-recaptcha" data-sitekey="6LeCccUUAAAAABgiivP623D5jG7Tu7z5grZHYOjN"></div>
                  </div>
                </div>
            </div>
  
             <div class="checkbox">
               <input id="check1" type="checkbox" name="user[verify_age]" required>
               <label for="check1">I verify that I’m at least 13 years old.<span>*</span></label>
             </div>
             <div class="checkbox " name="user[verify_term]">
               <input id="check2" type="checkbox" required>
               <label for="check2"> I have read and agreed the terms and condition page.<span>*</span></label>
             </div>

            <div class="row">
                <div class="col-md-12 space20">
                  <ul class="list-inline">
                    <li><p class="clr">Fields with asterix are required</p></li>
                    <li class="pull-right"><button type="submit" class="btn btn_review" name="user[submit]">Sign Up</button></li>
                  </ul>
                </div>
            </div>
        </form>
      </div>
      <div class="col-md-6">
      </div>

    </div>
  </div>
</section>

<!-- end form -->
    <?php include_once 'views/layout/'.$this->layout.'footerLogin.php'; ?>
    <script type="text/javascript">
      var rootUrl   = "<?=RootURL;?>";
    </script> 
    <script src="<?php echo RootREL; ?>media/admin/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo RootREL; ?>media/js/form.js"></script>
    <script type="text/javascript">
       $('a.back-to-top').click(function() {
         $('html, body').animate({
           scrollTop: 0
         }, 700);
         return false;
       });      
    </script>
   
  </body>
</html>