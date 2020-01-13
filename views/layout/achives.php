<div class="space30"></div>
<h2>Archives</h2>

<div class="white_box">
 <ul class="list-unstyled archives_ul">
   <?php 
      $month = date('m');
      if ((int)$month > 6) { ?>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=12-'.date("Y")?>" month="12" year="<?php echo date("Y"); ?>"  >December <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=11-'.date("Y")?>" month="11" year="<?php echo date("Y"); ?>" >November <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=10-'.date("Y")?>" month="10" year="<?php echo date("Y"); ?>" >October <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=09-'.date("Y")?>" month="09" year="<?php echo date("Y"); ?>" >September <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=08-'.date("Y")?>" month="08" year="<?php echo date("Y"); ?>" >August <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=07-'.date("Y")?>" month="07" year="<?php echo date("Y"); ?>" >July <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=06-'.date("Y")?>" month="06" year="<?php echo date("Y"); ?>" >June <?php echo date("Y"); ?></a></li>
      <?php } else { ?>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=06-'.date("Y")?>" month="06" year="<?php echo date("Y"); ?>" >June <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=05-'.date("Y")?>" month="05" year="<?php echo date("Y"); ?>" >May <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=04-'.date("Y")?>" month="04" year="<?php echo date("Y"); ?>" >April <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=03-'.date("Y")?>" month="03" year="<?php echo date("Y"); ?>" >March <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=02-'.date("Y")?>" month="02" year="<?php echo date("Y"); ?>" >February <?php echo date("Y"); ?></a></li>
         <li><a href="<?php echo RootURL.$app['ctl'].'/index?archive=01-'.date("Y")?>" month="01" year="<?php echo date("Y"); ?>" >January <?php echo date("Y"); ?></a></li>
   <?php   }
   ?>
 </ul>
</div>