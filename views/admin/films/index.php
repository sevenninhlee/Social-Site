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
	var getDisable  = "<?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>"
</script>

<div class="col-md-10 col-sm-9 pad0">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane tabpane_blogs active" id="queries">
			<p class="blog_head">Films</p>
            <span class="posts">Posts</span>
			<ul class="list-inline btn-list_ul">
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'films', 'act' => 'index')); ?>"><button class="btn-custom-apply btn-categories">All Posts</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'films', 'act' => 'add')); ?>"><button class="btn-custom-apply btn-categories">Add New</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'films', 'act' => 'categories')); ?>"><button class="btn-custom-apply btn-categories">Categories</button></a></li>
			</ul>
			<div class="space20"></div>
			<div class="row">
			<div class="col-md-6 col-sm-12">
				<ul class="list-inline list_all">
					<li class='show-num'><a href="#">All</a>(<?php echo $this->records['norecords']; ?>) </li>
					<li class="active"><a href="#">Published</a>(<?php echo $this->noActives; ?>)</li>
				</ul>
				<div class="space10"></div>
				<ul class="list-inline list_all">
					<li>
                        <select class="select_list" id="select_list_films">
							<option value="">Bulk Actions</option>
							<option value="delete_films" act="deleteFilmArticle">Delete</option>
							<option value="activate_films" act="changeStatusManyFilmArticle">Activate</option>
							<option value="deactivate_films" act="changeStatusManyFilmArticle">Deactivate</option>
                        </select>
						<button class="btn-custom btn btn-apply" id='btn_apply_films_table'>Apply</button>
					</li>
					<li>
						<select class="select_list" id="select_list_films_author">
							<option value="all" <?php if(isset($app['prs']['author']) && $app['prs']['author']=='all-author') echo 'selected' ?>>All authors</option>
							<?php foreach($this->users as $user){ ?>
								<option value="<?=$user['id']?>" <?php if(isset($app['prs']['author']) && $app['prs']['author']==$user['id']) echo 'selected' ?>><?=$user['firstname'].' '.$user['lastname']?></option>
							<?php } ?>
						</select>
						<select class="select_list" id="select_list_films_category">
							<option value="all" <?php if(isset($app['prs']['category']) && $app['prs']['category']=='all') echo 'selected' ?>>All categories</option>
							<option value="0" <?php if(isset($app['prs']['category']) && $app['prs']['category']==0) echo 'selected' ?>>Unkown category</option>
							<?php foreach($this->categories as $category){ ?>
								<option value="<?=$category['id']?>" <?php if(isset($app['prs']['category']) && $app['prs']['category']==$category['id']) echo 'selected' ?>><?=$category['name']?></option>
							<?php } ?>
						</select>
						<select class="select_list" id="select_list_films_status">
							<option value="all" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='all') echo 'selected' ?>>All status</option>
							<option value="active" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='active') echo 'selected' ?>>Active</option>
							<option value="disable" <?php if(isset($app['prs']['status']) && $app['prs']['status']=='disable') echo 'selected' ?>>Disable</option>
						</select>
						<button class="btn-custom btn btn-apply" id='btn_filter_films_table'>Filter</button></li>
					</li>
				</ul>
			</div>
			<div class="col-md-6 col-sm-12">
				<form id="form-films-search">
					<div class="form-group row">
					    <div class="col-sm-10 form_search">
					    	<!-- <div class="row"> -->
					    		<input name='search' type="text" class="search form-control form-control-sm" id="search" placeholder="Search...">
					    	<!-- </div> -->
					    </div>
					    <button type="submit" class="btn-custom btn btn-search">Submit</button>
					</div>
                </form>
			</div>
			</div>

			<div class="table-responsive">
			<table class="table dataTable" id="film_table" controller="films" role="grid" aria-describedby="example1_info">
				<tr>
					<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll">
						<div class="checkbox">
						<input id="checkbox12" type="checkbox">
						<label for="checkbox12">
							Title
						</label>
						</div>
					</th>
					<th class="text-center">Author</th>
					<th class="text-center">Categories</th>
					<th class="text-center">Date</th>
					<!-- <th class="text-center">Link</th> -->
					<th class="text-center">Year</th>
					<th class="text-center">Featured Image</th>
					<th class="text-center">Status</th>
				</tr>
				<tbody class="tbl_body records">
					<?php if(count($this->records['data'])) { ?>
						<?php foreach ($this->records['data'] as $record) { ?>
						<tr role="row" id="row<?=$record['id'];?>">
								
							<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord btn-act" style='max-width:250px;'>
								<div class="checkbox">
									<input type="checkbox" name="" alt="<?=$record['id'];?>" id="<?php echo("checkbox-".$record['id']);?>">
									<label for="<?php echo("checkbox-".$record['id']);?>">
										<a target="_blank" href="<?php echo RootURL."films/".$record['slug']?>" id="viewUser<?=$record['id'];?>">
									<?php echo $record['title']; ?>
								</a>	
									</label>
								</div>
								<ul class="list-inline">
									<li>
										<a target="_blank" class='btn-delete-table' href="<?php echo RootURL."films/".$record['slug']?>" id="viewUser<?=$record['id'];?>">
											View
										</a>	
									</li>
									<li><a class='btn-delete-table' href="<?php echo (vendor_app_util::url(["ctl"=>"films", "act"=>"edit/".$record['id']])) ?>" id="<?php echo("edit".$record['id']);?>" type="button" >Edit</a></li>
									<li><button id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteFilmArticle">Delete</button></li>
								</ul>
							</td>

                            <td class="tabletShow">
								<p class="andrew">
									<?php echo vendor_html_helper::showUserName($record, true); ?>
								</p>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php 
										if($record['ListCate'] == null){
											echo 'Unkown category';
										}else {
											$cat_str = "";
											foreach ($record['ListCate'] as $key => $value) {
												$cat_str.=$value['name']." | ";
											}
											echo rtrim($cat_str," | ");
										}
									?>
								</p>
							</td>

							<td class="tabletShow">
								<p class="andrew">
									<?php vendor_app_util::formatDate($record['created']); ?>
								</p>
							</td>

							<!-- <td class="tabletShow">
								<p class="andrew">
									<?php echo $record['link']; ?>
								</p>
							</td> -->

							<td class="tabletShow">
								<p class="andrew">
									<?php echo $record['year']; ?>
								</p>
							</td>

							<td class="webShow" id="<?php echo("featured_image".$record['id']);?>">
								<p class="andrew">
									<a target="_blank" href="<?php echo RootURL."films/".$record['slug']?>" id="featured_imageViewUser<?=$record['id'];?>">
										<img style="width:150px" src="<?=UploadURI.$app['ctl'].'/'.(($record['featured_image'])? $record['featured_image']: 'no_picture.png'); ?>">
									</a>
								</p>
							</td>

							<td class="tabletShow" id="<?php echo("status".$record['id']);?>">
								<?php 
									if($record['admin_status'] == 1 ):
								?>
								<button type="button" class="btn btn-primary change_status_films" alt="<?php echo($record['id']);?>,0,changeStatusFilmArticle" >Active</button>
								<?php 
									else:
								?>
								<button type="button" class="btn btn-warning change_status_films" alt="<?php echo($record['id']);?>,1,changeStatusFilmArticle">Inactive</button>
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
							Title
						</label>
						</div>
					</th>
					<th class="text-center">Author</th>
					<th class="text-center">Categories</th>
					<th class="text-center">Date</th>
					<!-- <th class="text-center">Link</th> -->
					<th class="text-center">Year</th>
					<th class="text-center">Featured Image</th>
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
