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

      <!-- css for slider -->
      
      <!--[if IE 9]>
          <link rel="stylesheet" type="text/css" href="css/ie.css" />
          <![endif]-->
          <!--[if IE]>
              <script src="js/html5shiv.min.js"></script>
      <![endif]-->

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
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'books'))?>">Reviews</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'book-groups'))?>">Groups</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs'))?>">Blogs</a></li>
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'opinions-debates'))?>">Opinions</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['user'])){ ?>
              <li><a href="<?php  echo RootURL."user/profile/index?user=".$_SESSION['user']['id']; ?>"><?php  if ($_SESSION['user']['show_name'] == 0) { echo $_SESSION['user']['firstname']; } else { echo $_SESSION['user']['username']; } ?></a></li>
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