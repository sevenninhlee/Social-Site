<?php
	global $app;
	(substr($app['ctl'], -1) === 's') ? $ctl = substr($app['ctl'], 0, -1) : $ctl = $app['clt'];
?>
<div class="space30 visible-xs"></div>
<h2>Find Us</h2>
<ul class="list-inline top_social_icon">
  <li><a href="#"><img src="<?php echo RootREL; ?>media/img/facebook.jpg" class="img-responsive" alt="facebook"></a></li>
  <li><a href="#"><img src="<?php echo RootREL; ?>media/img/tweet.jpg" class="img-responsive" alt="tweet"></a></li>
  <li><a href="#"><img src="<?php echo RootREL; ?>media/img/youtube.jpg" class="img-responsive" alt="youtube"></a></li>
  <li><a href="#"><img src="<?php echo RootREL; ?>media/img/google.jpg" class="img-responsive" alt="google"></a></li>
  <li><a href="#"><img src="<?php echo RootREL; ?>media/img/pin.jpg" class="img-responsive" alt="pin"></a></li>
</ul>
<div class="space30"></div>
<h2><?php if($ctl !== "book_group") echo ucwords(str_replace("_", " ", $ctl)); else echo "Book Groups";?> Categories</h2>

<div class="white_box">
	<?php foreach ($this->dataCategories as $category) { ?>
 	<a href="<?php echo RootURL.$app['ctl'].'/index?cat='.$category['slug']?>" class="btn btn_link" itemID="<?=$category['id']?>" <?php if(isset($app['area']) && $app['area'] === "user") echo "disabled";?> ><?php if(strlen($category['name']) > 12)  echo substr($category['name'], 0, 12).'...'; else echo $category['name'] ; ?></a>	
	<?php } ?>
</div>
