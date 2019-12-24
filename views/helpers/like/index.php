<ul class="list-inline">
	<li><p><span id="totalLike_<?php echo $obJectID; ?>"><?php echo $totalLike; ?></span> likes |
	<?php if($checkUserLike):?>
	  <span id="likeItem_<?php echo $obJectID; ?>" class="fa fa-thumbs-up thumbs-like like-btn" aria-hidden="true" alt="0" data="<?php echo $obJectID; ?>,<?php echo $model; ?>" checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"></span>
	<?php else : ?>
	  <span id="likeItem_<?php echo $obJectID; ?>" class="fa fa-thumbs-up thumbs-like" aria-hidden="true" alt="1" data="<?php echo $obJectID; ?>,<?php echo $model; ?>" checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"></span>
	<?php endif; ?>
	</li>
