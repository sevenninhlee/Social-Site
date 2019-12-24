<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="A comunity website filled with all your news">
        <title>Enlight 21</title>
        <link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/css/AdminLTE.min.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&amp;subset=latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/admin/css/custom-style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/css/owl.carousel.css">
        <!-- CSS file -->
        <link rel="stylesheet" href="<?php echo RootREL; ?>media/css/easy-autocomplete.min.css">
        
        <link rel="stylesheet" type="text/css" href="<?php echo RootREL; ?>media/shieldui/css/light-glow/all.min.css" />

        <!-- Additional CSS Themes file - not required-->
        <link rel="stylesheet" href="<?php echo RootREL; ?>media/css/easy-autocomplete.themes.min.css">
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
    <style type="text/css">
        .read-more-show{
        cursor:pointer;
        color: #337ab7;
        }
        .read-more-hide{
        cursor:pointer;
        color: #337ab7;
        }

        .hide_content{
        display: none;
        }
    </style>
    <body>
       
        <?php include_once 'views/layout/outside/'.$this->layout.'header.php'; ?>
