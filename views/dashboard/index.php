
<?php include_once 'views/layout/'.$this->layout.'headerTop.php'; ?>
<section class="content-header">
</section>
<section class="content dashboard height400">
  <div class="row">
    <div class="col-lg-4 .col-sm-4 ">
      <div class="small-box bg-aqua small-dashboard">
        <div class="inner">
          <h3 class="smallMobileHide"><a class="daily" alt="today" href="<?=vendor_app_util::url(array('ctl'=>'reports', 'act'=>'week')); ?>"> Sample</a></h3>

          <p><a class="daily" alt="yesterday" href="<?=vendor_app_util::url(array('ctl'=>'reports')); ?>">Sample</a></p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo vendor_app_util::url(array('ctl'=>'reports')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 .col-sm-4 ">
      <div class="small-box bg-green small-dashboard">
        <div class="inner">
          <h3 class="smallMobileHide"><a  class="daily" alt="today" href="<?=vendor_app_util::url(['ctl'=>'requests', 'act'=>'week']); ?>">Sample</a></h3>

          <p><a  class="daily" alt="today" href="<?=vendor_app_util::url(['ctl'=>'requests', 'act'=>'week']); ?>">sample</a></p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo vendor_app_util::url(array('ctl'=>'requests')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 .col-sm-4 ">
      <div class="small-box bg-red small-dashboard">
        <div class="inner">
          <h3 class="smallMobileHide"><a  class="daily" alt="today" href="<?=vendor_app_util::url(['ctl'=>'users', 'act'=>'profile']); ?>"></a></h3>
          <p><a class="email" alt="email" href="<?=vendor_app_util::url(['ctl'=>'users', 'act'=>'profile']); ?>"></a></p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo vendor_app_util::url(array('ctl'=>'users', 'act'=>'profile')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</section>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
