<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
    <section>
	<?php 
		include_once 'views/admin/users/_form.php';
	?>
</section>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>