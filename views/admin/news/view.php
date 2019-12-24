<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/custom-style.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
    <section>
	<?php 
		include_once 'views/admin/news/form.php';
	?>
</section>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
<script src="<?php echo RootREL; ?>media/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.data_table_list').DataTable();
} );
</script>