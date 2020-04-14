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
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/ninja-slider.css">
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/thumbnail-slider.css">
      <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/owl.carousel.css">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo RootREL; ?>media/css/page_error.css" />
		<!-- start main sections -->
  </head>
  <body class="body_1 body_2">
    
    <!-- Start Pre header -->
    <section class="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo vendor_app_util::url(['ctl'=>'home']); ?>"><img src="<?php echo RootREL; ?>media/admin/img/logo.png" class="img-responsive" alt="logo"></a>
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
            <ul class="nav navbar-nav">
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'home'))?>">Home</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'news'))?>">News</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'films'))?>">Films </a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'books'))?>">Book</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'book-groups'))?>">Groups</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs'))?>">Blogs</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'opinions-debates'))?>">Opinions</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['user'])){ ?>
              <li><a href="<?php  echo RootURL."user/profile/index?user=".$_SESSION['user']['id']; ?>"><?=$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']?></a></li>
              <li><a href="<?php echo RootURL."login/logout/"; ?>">Log out</a></li>
            <?php }else{ ?>
              <li><a href="<?php echo vendor_app_util::url(['ctl'=>'login']); ?>">Login</a></li>
              <li><a href="<?php echo vendor_app_util::url(['ctl'=>'register']); ?>" >Signup</a></li>
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>

<section class="main_section">
  <div class="container">
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<div></div>
				<h1>404</h1>
			</div>
			<h2>Page not found</h2>
			<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
			<a href="<?php echo RootREL; ?>home">home page</a>
		</div>
	</div>
  </div>
</section>
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
              <li><a href="<?php echo RootREL; ?>terms-of-use">Terms of Use</a></li>
              <li><a href="<?php echo RootREL; ?>privacy-policy">Privacy Policy</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'contact')); ?>">Contact</a></li>
              <li><a href="<?php echo RootREL; ?>about-us">About Us</a></li>
              <li><a href="#">Sitemap</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-6">
            <h3>Categories</h3>

            <ul class="list-unstyled">
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'films'))?>">Films</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'book-groups'))?>">Book Groups</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs'))?>">Blogs</a></li>
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
    <script type="text/javascript" src="<?php echo RootREL; ?>media/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo RootREL; ?>media/js/bootstrap.min.js"></script>
    <!-- start footer -->
    <script src="<?php echo RootREL; ?>media/shieldui/js/shieldui-all.min.js"></script>
    <script src="<?php echo RootREL; ?>media/js/review-rating.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/records_table.js?ctl=<?php echo $app['ctl'] ?>" id="records_table"></script>
    <script src="<?php echo RootREL; ?>media/js/owl.carousel.min.js"></script>
    <!-- JS file -->
    <script src="<?php echo RootREL; ?>media/js/jquery.easy-autocomplete.min.js"></script>
    <script src="<?php echo RootREL; ?>media/js/readmore.js"></script>
    <script src="<?php echo RootREL; ?>media/js/main.js?ctl=<?php echo $app['ctl'] ?>" id="main_page"></script>
    <script src="<?php echo RootREL; ?>media/js/notifications.js?area=<?php echo $app['area'] ?>" id="notify_scr"></script>
    
    <script type="text/javascript">
       $('a.back-to-top').click(function() {
         $('html, body').animate({
           scrollTop: 0
         }, 700);
         return false;
       });      
    </script>

    <script type="text/javascript">
      $('.reply-btn').click(function(){
        $(this).parents('.media-right').find('.forreply').show();
      });
      $('.btn-cancle').click(function(){
        $(this).parents('.media-right').find('.forreply').hide();
      });
    </script>

    <script type="text/javascript">

            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            $('body').on('click', '.read-more-show', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            $('body').on('click', '.read-more-hide', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); 
              e.preventDefault();
            });
    </script>

  </body>
</html>
