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
			<p class="blog_head">Users</p>
			<div class="space20"></div>
			<div class="row">
			<div class="col-md-6 col-sm-12">
				<ul class="list-inline list_all">
				<li class='show-num'><a href="#">All</a>(<?php echo $this->records['norecords']; ?>)</li>
				<li class="show-num active"><a href="#">Active</a>(<?php echo $this->noActives; ?>)</li>
				<li class="show-num active"><a href="#">Male</a>(<?php echo $this->noMales; ?>)</li>
				<li class="active"><a href="#">Admin</a>(<?php echo $this->noAdmins; ?>)</li>
				</ul>
				<div class="space10"></div>
				<ul class="list-inline list_all">
					<li>
                        <select class="select_list" id="select_list_users">
                          <option value="add_users">Add user</option>
						  <option value="delete_users" act="deleteUser">Delete</option>
						  <option value="activate_users" act="changeStatusManyUser">Activate</option>
                          <option value="deactivate_users" act="changeStatusManyUser">Deactivate</option>
                        </select>
						<button class="btn btn-apply" id='btn_apply_users_table'>Apply</button>
					</li>
					<li>
						<select class="select_list" id="select_list_users_status">
							<option value="all" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='all') echo 'selected' ?>>All status</option>
							<option value="active" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='active') echo 'selected' ?>>Active</option>
							<option value="disable" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='disable') echo 'selected' ?>>Disable</option>
						</select>
						<select class="select_list" id="select_list_users_type">
							<option value="all" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='all') echo 'selected' ?>>All</option>
							<option value="admin" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='admin') echo 'selected' ?>>Admin</option>
							<option value="user" <?php if(isset($app['prs']['type']) && $app['prs']['type']=='user') echo 'selected' ?>>User</option>
						</select>
						<select class="select_list" id="select_list_users_gender">
							<option value="all" <?php if(isset($app['prs']['gender']) && $app['prs']['gender']=='all') echo 'selected' ?>>All genders</option>
							<option value="male" <?php if(isset($app['prs']['gender']) && $app['prs']['gender']=='male') echo 'selected' ?>>Male</option>
							<option value="female" <?php if(isset($app['prs']['gender']) && $app['prs']['gender']=='female') echo 'selected' ?>>Female</option>
						</select>
						<button class="btn btn-apply" id='btn_filter_users_table'>Filter</button></li>
					</li>
				</ul>
				<div class="space20"></div>
			</div>
			<div class="col-md-6 col-sm-12 text-right">
				<!-- <input type="text" class="txt_box"><button class="btn btn-search">Search users</button> -->
				<form id="form-users-search">
							<label>
								<input type="text" class="search form-control form-control-sm" name='search' placeholder="Search..." aria-controls="example" id='search'>
							</label>
							<button type="submit" class="btn btn-search">Submit</button>
						</form>
				<!-- <nav aria-label="Page navigation"> -->
				<!-- </nav> -->
			</div>
			</div>

			<div class="table-responsive">
			<table class="table table-striped dataTable" id="users_table" controller="users" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
				<tr>
					<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll">
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							Id. Full name
						</label>
						</div>
					</th>
					<th class="text-center">Email - Phone</th>
					<th class="text-center">Avatar</th>
					<th class="text-center">Gender</th>
					<th class="text-center">Country</th>
					<th class="text-center">Role</th>
					<th class="text-center">Status</th>
				</tr>
				<tbody class="tbl_body records">
					<?php if(count($this->records['data'])) { ?>
						<?php foreach ($this->records['data'] as $record) { ?>
						<tr role="row" id="row<?=$record['id'];?>">
								
							<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord btn-act">
								<div class="checkbox">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="<?php echo("checkbox-".$record['id']);?>">
									<label for="<?php echo("checkbox-".$record['id']);?>">
										<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="viewUser<?=$record['id'];?>">
									<?php echo $record['id']; ?>. <?=$record['firstname'].' '.$record['lastname']; ?>	
								</a>	
									</label>
								</div>
								<ul class="list-inline features">
									<li><a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"edit/".$record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" type="button" >Edit</a></li>
									<li><a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="viewUser<?=$record['id'];?>">View</a></li>
									<li><button id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteUser">Delete</button></li>
								</ul>
							</td>

							<td class="tabletShow" id="<?php echo("email".$record['id']);?>">
								<p class="andrew">
									Email: <?php echo $record['email']; ?> 
									<br>
									Phone: <?php echo $record['phone']; ?>
								</p>
							</td>

							<td class="webShow" id="<?php echo("avata".$record['id']);?>">
								<p class="andrew">
									<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['id']])) ?>" id="avataViewUser<?=$record['id'];?>">
										<img style="width:150px" src="<?=UploadURI.$app['ctl'].'/'.(($record['avata'])? $record['avata']: 'no_picture.png'); ?>">
									</a>
								</p>
							</td>
							
							<td class="tabletShow">
								<p class="andrew">
									<?php if($record['gender']) echo "Male"; else echo "Female"; ?>
								</p>
							</td>
							
							<td class="tabletShow">
								<p class="andrew">
									<?php echo $record['country']; ?>
								</p>
							</td>

							<td class="tabletShow" id="<?php echo("role".$record['id']);?>">
								<p class="andrew">
									<?php echo $app['roles'][$record['role']]; ?>
								</p>
							</td>

							<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
								<?php 
									if($record['status'] == 1 ):
								?>
								<button type="button" class="btn btn-primary change_status_users" alt="<?php echo($record['id']);?>,0,changeStatusUser" >Active</button>
								<?php 
									else:
								?>
								<button type="button" class="btn btn-warning change_status_users" alt="<?php echo($record['id']);?>,1,changeStatusUser">Inactive</button>
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
							Id. Full name
						</label>
						</div>
					</th>
					<th class="text-center">Email - Phone</th>
					<th class="text-center">Avatar</th>
					<th class="text-center">Gender</th>
					<th class="text-center">Country</th>
					<th class="text-center">Role</th>
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
<!-- <script src="<?php echo RootREL; ?>media/admin/js/records_table.js"></script> -->
<script src="<?php echo RootREL; ?>media/admin/js/users_table.js"></script>
<script src="<?php echo RootREL; ?>media/bootstrap/js/bootstrap-toggle.min.js"></script>
