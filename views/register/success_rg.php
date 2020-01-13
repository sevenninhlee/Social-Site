
<?php include_once 'views/layout/'.$this->layout.'headerLogin.php'; ?>
    <!-- satrt form -->
<section id="form" class="main_section" style="height: 502px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="" style="text-align: center;font-size: 32px;">
            <p><b>Welcome to Enlight 21</b></p>
        </div>
        <div class="text-success" style="text-align: center">
            <h4>Sign up successfully. Please check your email to activate  your account!</h4>
        </div>
      </div>
    </div>
  </div>
</section>
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