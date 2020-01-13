<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="A comunity website filled with all your news">
        <title>Elinght 21</title>
        <link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/css/AdminLTE.min.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/custom-style.css">
        <script type="text/javascript">
        var rootUrl   = "<?=RootURL;?>";
        </script>
    </head>
    <body>
        <section class="pre-header">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <a href="#"><img src="<?php echo RootREL; ?>media/admin/img/logo.png" class="img-responsive" alt="logo"></a>
            </div>
            </div>
        </div>
        </section>
        <?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
        <?php include_once 'views/layout/'.$this->layout.'sidebarLeft.php'; ?>
