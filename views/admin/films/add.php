<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
    <section>
		<?php 
			include_once 'views/admin/films/_form.php';
		?>
		</section>
	</div>
</div>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>

<script src="<?php echo RootREL; ?>media/admin/js/form_slug.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>

	CKEDITOR.replace( 'description', {} );
	CKEDITOR.config.baseFloatZIndex = 100001;

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
