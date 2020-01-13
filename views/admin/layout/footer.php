<div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change password</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div id="change-password-status" class="alert alert-dismissible fade in" role="alert"> 
              <button type="button" class="close hide" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
              <p class="message"></p>
          </div>
          <div class="form-group">
            <label for="current_password" class="col-sm-4 control-label">Current Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="current_password" placeholder="Password">
            </div>
          </div>
          <div class="form-group form-group-pass">
            <label for="new_password" class="col-sm-4 control-label">New Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="new_password" placeholder="New Password">
            </div>
          </div>
          <div class="form-group form-group-pass">
            <label for="confirm_password" class="col-sm-4 control-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
              <span id="error-confirm-password" class="help-block"></span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="savePassword">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
 </div>
      </div>
    </section>
    <!-- End tab-menu -->

    <!-- start footer -->
    <section id="post-footer" class='post-footer-admin'>
      <div class="container">
        <a href="#" class="back-to-top"><i class="fa fa-angle-up arrow-up"></i></a>
        <div class="row">
          <div class="col-md-12 text-center">
            <p class="footer_txt m0">© 2019 Enlight 21. All Rights Reserved. Designed by SF Website Design</p>            
          </div>
        </div>
      </div>
    </section>

    <!-- javascript libraries -->
    <script src="<?php echo RootREL; ?>media/admin/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/main.js"></script>

    <script src="<?php echo RootREL; ?>media/admin/js/adminlte.js"></script>
    <script src="<?php echo RootREL; ?>media/admin/js/records_table.js?ctl=<?php echo $app['ctl'] ?>" id="records_table"></script>
    <script src="<?php echo RootREL; ?>media/js/notifications.js?area=<?php echo $app['area'] ?>" id="notify_scr"></script>
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