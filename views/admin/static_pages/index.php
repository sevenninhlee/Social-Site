<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/instruction_faq.css">
<?php 
global $app;
if(isset($app['prs']['status'])) {
	if($app['prs']['status'])
		$checkboxVal = 1;
	else
		$checkboxVal = NULL;
} else 	$checkboxVal = 0;
?>
<script type="text/javascript">	
	var norecords 	= parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp 		= parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp 		= parseInt(<?php echo $this->records['curp']; ?>);
	var nopp 		= parseInt(<?php echo $this->records['nopp']; ?>);

	var getDisable  = <?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>
</script>

<div class="col-md-10 col-sm-9 pad0">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane tabpane_blogs active" id="queries">
			<div class="row content">
				<div class="col-xs-12 col-lg-12">
					<div class="box">
						<div class="box-header">
							<div class="row" id="records-header">
								<div class="col-sm-8 col-xs-6">
									<h2 class="box-title">Static page</h2>
								</div>
								<div class="col-sm-4 col-xs-6">
									<a href="<?php echo vendor_app_util::url(['ctl'=>'static_pages','act'=>'add']); ?>" id="add-record">
										<button class="btn btn-primary pull-right ml-1 mb-1">
										<i class="fa fa-plus"></i>
										</button>
									</a>	
								</div>
								<div class="col-sm-8 col-xs-6">
								</div>
							</div>
						</div>
						
						<div class="box-body">
							<ul class="sidebar-menu height400" data-widget="tree">
								<?php $count = 1; foreach ($this->records['data'] as $record) { ?>
								<li class="treeview static-page-item">
								
									<a href="#" class='title'>
										<i class="icon-info"></i><?php echo 20*($this->records['curp']-1)+$count.'. ';$count++;?>
										<span><?= $record['title'] ?></span>
										<span class="pull-right-container">
										<i class="fa fa-trash pull-right"  
										onclick="{
											var isConfirm = confirm('Are you sure to move to trash this record?');
											if(isConfirm){
											$(location).attr('href',window.location.origin+'<?php echo vendor_app_util::url(['ctl'=>'static_pages','act'=>'del']).'/'.$record['id']; ?>');}}" 
										style="margin-left:15px;"></i>&emsp;
										<i class="fa fa-edit pull-right" onclick="{
				
											$(location).attr('href',window.location.origin+'<?php echo vendor_app_util::url(['ctl'=>'static_pages','act'=>'edit']).'/'.$record['id']; ?>');}
											" style="margin-left:15px;"></i>&emsp;
										<i class="fa fa-angle-right pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu content_ul" style="background:white;margin-bottom:20px; margin-top:20px;padding:20px;">
										<li style="white-space:normal;"><div><?= $record['content'] ?></div></li>
									</ul>
								</li>
								<?php } ?>
							</ul>
							<div class="row text-right">
								<?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script src="<?php echo RootREL; ?>media/libs/bootstrap/js/checkbox-x.min.js"></script>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
