
<?php include_once 'views/layout/'.$this->layout.'headerLogin.php';
  global $app;
?>
    <section id="form" class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h2 class="f700 ffmily">Log In </h2>
            <?php if($this->errors) { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> <?php echo $this->errors['message'];?>
            </div>
            <?php } ?>
            <form method="post" action="<?php echo vendor_app_util::url(array('ctl'=>'login','act'=>$this->action )); ?>">
              <div class="form-group space20">
                <label>Email:</label>
                <input type="email" class="form-control" name="user[email]" placeholder="Email" id="email" value="<?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'users') echo $_COOKIE['remember_user']?>">
              </div>
              <div class="form-group space20">
                <label>Password:</label>
                <input type="password" class="form-control" name="user[password]" placeholder="Password" id="password" value="<?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'users') echo $_COOKIE['remember_password'];?>">
              </div>
              <div class="checkbox">
               <input id="check1" type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'users'){?> checked <?php } ?>>
               <label for="check1">Remember Me</label>
             </div>
              <a href="<?php echo vendor_app_util::url(array('ctl'=>'login','act'=> 'forgotPassWord' )); ?>">Forgot Password? Click Here</a>
                  <?php if (!empty($this->errors['input'])): ?>
                  <p class="warning-txt txt1">Wrong Email or Password.</p>
                <?php endif; ?>
              <div class="form-group ">
                <a class="btn btn_review btn-sub1 space20" href="<?php echo vendor_app_util::url(array('ctl'=>'register')); ?>">Sign Up</a>
                <button class="btn btn_review btn-sub1 pull-right space20" type="submit" name="btn_submit">Log In</button>
              </div>
            </form>
          </div>
          <div class="col-md-7">
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'views/layout/'.$this->layout.'footerLogin.php'; ?>
    <script src="<?php echo RootREL; ?>media/admin/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/bootstrap.min.js"></script>
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