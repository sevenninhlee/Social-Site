<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/bootstrap/css/bootstrap-toggle.min.css">
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
			<p class="new_head">News</p>
            <span class="posts">Posts</span>
			<ul class="list-inline btn-list_ul">
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'index')); ?>"><button class="btn-custom-apply btn-categories">All Posts</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'add')); ?>"><button class="btn-custom-apply btn-categories">Add New</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'categories')); ?>"><button class="btn-custom-apply btn-categories">Categories</button></a></li>
			</ul>
			<div class="space20"></div>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<ul class="list-inline list_all">
					<li><a href="#">All</a>(<?php echo $this->records['norecords']; ?>)</li>
					<li class="active"><a href="#">Active</a>(<?php echo $this->noActives; ?>)</li>
					</ul>
					<div class="space10"></div>
					<ul class="list-inline list_all">
						<li>
							<select class="select_list" id="select_list_news">
								<option value="">Bulk Actions</option>
								<option value="delete_news" act="deleteNewComment">Delete</option>
								<option value="activate_news" act="changeStatusManyNewComment">Activate</option>
								<option value="deactivate_news" act="changeStatusManyNewComment">Deactivate</option>
							</select>
							<button class="btn-custom btn btn-apply" id='btn_apply_news_table'>Apply</button>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-responsive">
			<table class="table table-striped dataTable" id="new_table" controller="news" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				<tr>
					<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll">
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							No.
						</label>
						</div>
					</th>
					<th class="text-center">User</th>
					<th class="text-center">Content</th>
					<th class="text-center">Commented at</th>
					<th class="text-center">Email</th>
					<th class="text-center">Status</th>
				</tr>
				<tbody class="tbl_body records">
					<?php if(count($this->records['data'])) { ?>
						<?php $i=1+($this->records['curp']-1)*$this->records['nopp']; foreach ($this->records['data'] as $record) { ?>
						<tr role="row" id="row<?=$record['id'];?>">
								
							<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord btn-act">
								<div class="checkbox">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="<?php echo("checkbox-".$record['id']);?>">
									<label for="<?php echo("checkbox-".$record['id']);?>">
										<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="viewUser<?=$record['id'];?>">
									<?php echo $i++; ?>
								</a>	
									</label>
								</div>
								<ul class="list-inline features">
									<li><button id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteNewComment">Delete</button></li>
								</ul>
							</td>

                            <td class="tabletShow">
								<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['user_id']])) ?>" id="viewUser<?=$record['user_id'];?>">
									<p class="andrew text-left" id='name<?=$record['id']?>'>
										<?php echo $record['users_firstname'].' '.$record['users_lastname']; ?>
									</p>
								</a>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php echo $record['content']; ?>
								</p>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php echo $record['created']; ?>
								</p>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php echo $record['users_email']; ?>
								</p>
							</td>

							<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
								<?php 
									if($record['status'] == 1 ):
								?>
								<button type="button" class="btn btn-primary change_status_news" alt="<?php echo($record['id']);?>,0,changeStatusNewComment">Active</button>
								<?php 
									else:
								?>
								<button type="button" class="btn btn-warning change_status_news" alt="<?php echo($record['id']);?>,1,changeStatusNewComment">Inactive</button>
								<?php 
									endif;
								?>
							</td>

						</tr>
						<?php } ?>
					<?php } else { ?>
						<tr role="row"><td colspan="8"><h3 class="text-danger text-center"> No data </h3></td></tr>
					<?php } ?>
				</tbody>
				<tr>
					<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll">
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							No.
						</label>
						</div>
					</th>
					<th class="text-center">User</th>
					<th class="text-center">Content</th>
					<th class="text-center">Commented at</th>
					<th class="text-center">Email</th>
					<th class="text-center">Status</th>
				</tr>
			</table>
			</div>

			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="space10"></div>
					<ul class="list-inline list_all">
					</ul>
				</div>
			</div>
			<div class="row text-right">
				<?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
			</div>
		</div>
		
	</div>
</div>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>

<script src="<?php echo RootREL; ?>media/bootstrap/js/checkbox-x.min.js"></script>
<script src="<?php echo RootREL; ?>media/bootstrap/js/bootstrap-toggle.min.js"></script>
