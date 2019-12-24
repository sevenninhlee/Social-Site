<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />

      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="We recording music">
       <!-- title -->
       <title>index</title>
    
      <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&amp;subset=latin-ext" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">  
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/bootstrap.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/style.css">

      <!-- css for slider -->
       <!--[if IE 9]>
          <link rel="stylesheet" type="text/css" href="css/ie.css" />
          <![endif]-->
          <!--[if IE]>
              <script src="js/html5shiv.min.js"></script>
      <![endif]-->
      
  </head>
  <body class="body_1">
    <!-- Start Pre header -->
    <section class="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="#"><img src="<?php echo RootREL; ?>media/admin/img/logo.png" class="img-responsive" alt="logo"></a>
          </div>
        </div>
      </div>
    </section>
    <!-- Ed Pre header -->
    <!-- Start header -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Signup</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>

    <!-- End header -->

<!-- satrt form -->
<section id="form" class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h2 class="f700 ffmily">Log In </h2>

        <form method="post" action="<?php echo vendor_app_util::url(
            array('area'=>'admin',
                'ctl'=>'login',
                'act'=>$this->action
          )); ?>">
          <div class="form-group space20">
            <label>Email:</label>
            <input type="email" class="form-control" name="user[email]" placeholder="Email" id="email" value="<?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'admin') echo $_COOKIE['remember_user']?>">
          </div>
          <div class="form-group space20">
            <label>Password:</label>
            <input type="password" class="form-control" name="user[password]" placeholder="Password" id="password" value="<?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'admin') echo $_COOKIE['remember_password'];?>">
          </div>
          <div class="checkbox">
           <input id="check1" type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_user']) && $_COOKIE['remember_role'] === 'admin'){?> checked <?php } ?>>
           <label for="check1">Remember Me</label>
         </div>
            <a href="#">Forgot Password? Click Here</a>
            <?php if (!empty($this->errors['input'])): ?>
              <p class="warning-txt txt1">Wrong Email or Password.</p>
            <?php endif; ?>
          <div class="form-group ">
            <button class="btn btn_review btn-sub1 space20" type="submit">Sign Up</button>
            <button class="btn btn_review btn-sub1 pull-right space20" type="submit" name="btn_submit">Log In</button>
          </div>
        </form>
      </div>
      <div class="col-md-7">
      </div>

    </div>
  </div>
</section>

<!-- end form -->
    <!-- start footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <h3>About</h3>

            <p>Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Donec a accu msan felis, non eleifend sem. Prae sent sodales tincidunt justo vel  blandit. </p>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-6">
            <h3>Links</h3>

            <ul class="list-unstyled">
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Sitemap</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-6">
            <h3>Categories</h3>

            <ul class="list-unstyled">
              <li><a href="#">Films</a></li>
              <li><a href="#">Book Groups</a></li>
              <li><a href="#">Blogs</a></li>
              <li><a href="#">Book Review</a></li>
              <li><a href="#">Recent Blogs</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-3">
            <h3>Follow Us</h3>
            <ul class="list-inline social_ul">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-play" aria-hidden="true"></i></a></li>
            </ul>

            <h4>Subscribe to our newsletter!</h4>

            <form>
              <div class="form-group">
                <input type="email" class="form-control" name="" placeholder="your@email.com" required>
                <button class="btn btn_sub" type="Submit">Subcribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>

    <section id="post-footer">
      <div class="container">
        <a href="#" class="back-to-top"><i class="fa fa-angle-up arrow-up"></i></a>
        <div class="row">
          <div class="col-md-12">
            <p class="footer_txt m0">© 2019 Enlight 21. All Rights Reserved. Designed by SF Website Design</p>            
          </div>
        </div>
      </div>
    </section>

    <!-- javascript libraries -->
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