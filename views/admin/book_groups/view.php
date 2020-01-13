<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/dataTables.bootstrap.min.css">

<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
    <section>
	<?php 
		include_once 'views/admin/book_groups/form.php';
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>