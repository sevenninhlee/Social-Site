<!doctype html>
<html class="no-js" lang="en">
  <head>
  	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Your comunity news website">
    <title>Enlight 21</title>
  	<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/css/AdminLTE.min.css">
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

    <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/custom-style.css">

    <script type="text/javascript">
        var rootUrl   = "<?=RootURL;?>";
        var allowAjaxNoti = true;
        var pathname = window.location.pathname;
        if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
            var index = pathname.indexOf("source-code");
            var pathname = pathname.slice(index).replace("source-code","");
        }
    </script>

  </head>
  <body>

    <!-- Start Pre header -->
    <section class="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="http://enlight21.com/"><img src="<?php echo RootREL; ?>media/admin/img/logo.png" class="img-responsive" alt="logo"></a>
          </div>
        </div>
      </div>
    </section>
    <!-- Ed Pre header -->
    <?php include_once 'views/admin/layout/'.$this->layout.'header.php'; ?>
    <?php include_once 'views/admin/layout/'.$this->layout.'left-sidebar.php'; ?>