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

<div class="col-md-10 col-sm-9 pad0" id="page_news">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane tabpane_blogs active" id="queries">
			<p class="blog_head">Book Groups categories</p>
			<div class="space20"></div>
			<div class="row">
			<div class="col-md-6 col-sm-12">
				<ul class="list-inline list_all">
				<li class='show-num'><a href="#">All</a>(<?php echo $this->records['norecords']; ?>)</li>
				<li class="active"><a href="#">Active</a>(<?php echo $this->noActives; ?>)</li>
				</ul>
				<ul class="list-inline list_all">
					<li>
						<select class="select_list" id="select_list_book_groups">
							<option value="">Bulk Actions</option>
							<option value="delete_book_groups" act="deleteBookGroupCategory">Delete</option>
							<option value="activate_book_groups" act="changeStatusManyBookGroupCategory">Activate</option>
							<option value="deactivate_book_groups" act="changeStatusManyBookGroupCategory">Deactivate</option>
						</select>
						<button class="btn-custom btn btn-apply" id='btn_apply_book_groups_table'>Apply</button>
					</li>
					<li>
						<select class="select_list" id="select_list_book_groups_categories_status">
							<option value="all-status" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='all-status') echo 'selected' ?>>All status</option>
							<option value="active" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='active') echo 'selected' ?>>Active</option>
							<option value="disable" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='disable') echo 'selected' ?>>Disable</option>
						</select>
						<button class="btn-custom btn btn-apply" id='btn_filter_book_groups_categories_table'>Filter</button></li>
					</li>
					<li>
                        <form id="form-book_groups-categories-add">
                            <label>
								<input type="text" class="add txt_box txt_box_blog_category" name='add' placeholder="" aria-controls="example" id='add'>
							</label>
                            <button type="submit" class="btn-custom btn btn-apply">Add category</button>
                        </form>
                    </li>
					<li>
						<p id='form-blog-categories-err-name' class='text-danger text-center'></p>
					</li>
				</ul>
			</div>
			<div class="col-md-6 col-sm-12">
				<form id="form-book_groups-categories-search">
                    <div class="form-group row">
					    <div class="col-sm-10 form_search">
					    	<!-- <div class="row"> -->
					    		<input name="search" type="text" class="search form-control form-control-sm" id="search" placeholder="Search...">
					    	<!-- </div> -->
					    </div>
					    <button type="submit" class="btn-custom btn btn-search">Submit</button>
					</div>
                </form>
			</div>
			</div>

			<div class="table-responsive">
			<table class="table table-striped dataTable" id="blog_table" controller="news" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				<tr>
					<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll">
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							No.
						</label>
						</div>
					</th>
					<th class="text-center">Name</th>
					<th class="text-center">Created</th>
					<th class="text-center">Status</th>
				</tr>
				<tbody class="tbl_body records">
					<?php if(count($this->records['data'])) { ?>
						<?php foreach ($this->records['data'] as $key => $record) { ?>
						<tr role="row" id="row<?=$record['id'];?>">
								
							<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord btn-act">
								<div class="checkbox">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="<?php echo("checkbox-".$record['id']);?>">
									<label for="<?php echo("checkbox-".$record['id']);?>">
										<a href="#">
									<?php echo $key+1; ?>
								</a>	
									</label>
								</div>
								<ul class="list-inline features">
									<li><button id="edit-<?php echo $record['id']; ?>" type="button" class="btn-delete-table edit-record-book_groups-category" alt="<?php echo $record['id']; ?>">Edit</button></li>
									<li><button id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteBookGroupCategory">Delete</button></li>
								</ul>
							</td>

                            <td class="tabletShow">
								<p class="andrew text-left" id='name<?=$record['id']?>'>
									<?php echo $record['name']; ?>
								</p>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php vendor_app_util::formatDate($record['created']); ?>
								</p>
							</td>

							<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
								<?php 
									if($record['status'] == 1 ):
								?>
								<button type="button" class="btn btn-primary change_status_book_groups" alt="<?php echo($record['id']);?>,0,changeStatusBookGroupCategory">Active</button>
								<?php 
									else:
								?>
								<button type="button" class="btn btn-warning change_status_book_groups" alt="<?php echo($record['id']);?>,1,changeStatusBookGroupCategory">Inactive</button>
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
					<th>
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							Id
						</label>
						</div>
					</th>
					<th class="text-center">Name</th>
					<th class="text-center">Created</th>
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
