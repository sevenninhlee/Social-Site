<?php include_once 'views/layout/headerLogin.php'; ?>
<div class="login-box" style="width: 35%; margin: 50px auto;">
  <div class="login-logo" style="text-align: center;font-size: 32px;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body login-page">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if($this->errors) { ?>
    <div class="alert alert-danger alert-dismissible error-change" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo $this->errors['message']; ?>
    </div>
    <?php } ?>

  </div>
  <!-- /.login-box-body -->
</div>

<script src="<?php echo RootREL; ?>media/js/jquery.min.js"></script>
<script src="<?php echo RootREL; ?>media/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

