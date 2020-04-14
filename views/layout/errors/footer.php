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
              <li><a href="<?=vendor_app_util::url(array('ctl'=>'book_groups'))?>">Book Groups</a></li>
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
      $('body').on('click', '.reply-btn', function(){
        $(this).parents('.media-right').find('.forreply').show();
      });
      $('body').on('click', '.btn-cancle', function(){
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