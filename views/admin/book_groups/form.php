<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form">		   
			    <div class="box-body body_form">
			    	<fieldset>
					    <div id="legend">
					      <legend class=""><?php echo ucwords(str_replace("_", " ", $app['ctl'])); ?></legend>
					    </div>
					    <?php if($app['act'] != 'view') { ?>
					    	<form id="form-adduser" action="<?php echo vendor_app_util::url(["ctl"=>"book_groups", "act"=>$app['act'] == 'edit' ? $app['act']."/".$this->record['id'] : $app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					    <?php } ?>
					    	<?php //if(property_exists(get_class($this),'errors')) { ?>
					    	<?php if(isset($this->errors['database'])) { ?>
					    		<div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
					    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
					    			<h4>Oh snap! You got an error!</h4> 
					    			<p><?=$this->errors['database'];?></p> 
					    		</div>
					    	<?php } ?>

							    <div class="form-group row">
							      <!-- Title -->
							      <label class="control-label col-md-3" for="title">Title</label>
							      <div class="controls col-md-7">
							        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="book_groups_form_name" name="book_group[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
							        <?php if( isset($this->errors['title'])) { ?>
							        	<p class="text-danger"><?=$this->errors['title']; ?></p>
							        <?php } ?>
							      </div>
									</div>
									
									<div class="form-group row">
							      <!-- Slug -->
							      <label class="control-label col-md-3" for="slug">Slug</label>
							      <div class="controls col-md-7">
							        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="book_groups_form_slug" name="book_group[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>">
							        <?php if( isset($this->errors['slug'])) { ?>
							        	<p class="text-danger"><?=$this->errors['slug']; ?></p>
							        <?php } ?>
							      </div>
							    </div>

							    <div class="form-group row">
							      <!-- Category -->
							      <label class="control-label col-md-3" for="categories">Category</label>
							      <div class="controls col-md-7">
								  <?php if($app['act'] =='add'){ ?>
										<?php	
											if(isset($this->record['categories_arr'])){
												$list_str = $this->record['categories_arr'];
												$list_str = rtrim($list_str, ",");
												$list_str = ltrim($list_str, ",");
												$array_select = explode(',', $list_str);
											}
										?>
										<select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
											<?php foreach ($this->categories as $record) { ?>
											<?php if(in_array($record['id'],$array_select)){ ?>
												<option value="<?php echo $record['id']?>" selected='selected'>
													<?php echo $record['name']?>
												</option>
											<?php }else{?>
												<option value="<?php echo $record['id']?>">
													<?php echo $record['name']?>
												</option>										
											<?php }} ?>
										</select>										
										<?php } else  if($app['act'] =='edit'){ ?>
											<select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
												<?php echo vendor_app_util::displayCategory($this->categories,$this->category);?>
											</select>										
										<?php }else{?>
											<?php if(!empty($this->category['name'])) : ?>
												<a href="#"><?php echo $this->category['name'] ?></a>
											<?php else: ?>
												<a href="#">Unkown category</a>
											<?php endif; ?>
										<?php } ?>
										<?php if( isset($this->errors['categories_arr'])) { ?>
											<p class="text-danger"><?=$this->errors['categories_arr']; ?></p>
										<?php } ?>
							      </div>
							    </div>
							 
									<div class="form-group row">
							      <!--  Featured Image -->
							      <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
							      <div class="controls col-md-7">
							      	<?php if($app['act'] !='add'){ ?>
							      		<?php if(isset($this->record['featured_image'])) { ?>
							      			<img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
							      		<?php } ?>
							      	<?php } ?>
							      	<?php if($app['act'] !='view'){ ?>
							        	<input type="file" id="featured_image" name="image" placeholder="" class="form-control">
							        <?php } ?>
							        <?php if( isset($this->errors['featured_image'])) { ?>
							        	<p class="text-danger"><?=$this->errors['featured_image']; ?></p>
							        <?php } ?>
							      </div>
								</div>
								
								<div class="form-group row">
								<!-- Featured my book_group -->
								<label class="control-label col-md-3" for="add_homepage">Add Homepage</label>
								<div class="controls col-md-7">
										<input type="radio" name="book_group[add_homepage]" value="1" <?php if(isset($this->record['add_homepage']) && $this->record['add_homepage'] == 1) echo 'checked';?> >Yes 
										<input type="radio" name="book_group[add_homepage]" value="0" <?php if($app['act'] =='add') echo 'checked'; ?> <?php if(isset($this->record['add_homepage']) && $this->record['add_homepage'] == 0) echo 'checked';?> >No<br>
								</div>
								</div>

								<div class="form-group row">
							      <!-- new Description -->
							      <label class="control-label col-md-3" for="short_description">Short Description</label>
							      <div class="controls col-md-7">
											<?php if($app['act'] !='view'){ ?>
												<textarea rows="7" required cols="50" <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="short_description" name="book_group[short_description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['short_description'])) echo($this->record['short_description']); ?></textarea>
												<?php if( isset($this->errors['short_description'])) { ?>
													<p class="text-danger"><?=$this->errors['short_description']; ?></p>
												<?php } ?>
											<?php } else {?>
												<?php if(isset($this->record['short_description'])) echo($this->record['short_description']); ?>
											<?php } ?>
							      </div>
								</div>


								<div class="form-group row">
								<!-- Book Group Description -->
								<label class="control-label col-md-3" for="description">Book Group Description</label>
								<div class="controls col-md-7">
											<?php if($app['act'] !='view'){ ?>
												<textarea rows="30" cols="50" <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="description" name="book_group[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
												<?php if( isset($this->errors['description'])) { ?>
													<p class="text-danger"><?=$this->errors['description']; ?></p>
												<?php } ?>
											<?php } else {?>
												<?php if(isset($this->record['description'])) echo($this->record['description']); ?>
											<?php } ?>
								</div>
									</div>
								


							    <?php if($app['act'] !='view'){ ?>
								    <div class="form-group row">
								      <div class="controls col-md-10">
								        <input class="btn btn-primary pull-right" type="submit" name="btn_submit" value="Save">
								      </div>
								    </div>
					    	</form>
					    	<?php } ?>

						</fieldset>
						<div class="col-md-12 css_border">	
								<?php if($app['act']=='edit'): ?>
									<div class="form-group form-group-list">
										<!-- List Member -->
										<legend class="">List Current Read</legend>
										<div class="col-md-12 col-sm-12">
											<div class="row">
												<table id="list_current" class="table table-striped table-bordered data_table_list" style="width:100%">
										        <thead>
										            <tr>
										                <th>Title</th>
										                <th>Author</th>
										                <th>ISBN</th>
										                <th>Featured Image</th>
										                <th>Action</th>
										            </tr>
										        </thead>
										        <tbody class="records">
										            <?php foreach ($this->books as $book) { 
														if ($book['current_read_status'] == 1) {
														?>
											            <tr>
											                <td><?php echo $book['title']; ?></td>
											                <td><?php if(!empty($book['author'])) echo $book['author']; else echo 'Null'; ?></td>
											                <td><?php if(!empty($book['ISBN'])) echo $book['ISBN']; else echo 'Null'; ?></td>
											                <td style="width: 15%">
																<?php if (strpos($book['featured_image'], "https://books.google.com/books/") !== false) { ?>
												                    <img style="width:65%" src="<?php echo $book['featured_image']?>" class="img-responsive">
												                  <?php } else { ?>
												                    <img style="width:65%" src="<?=UploadURI.'books'.'/'.(($book['featured_image'])? $book['featured_image']: 'no_picture.png'); ?>" class="img-responsive">
												                  <?php } ?>
											                </td>
											                <td style="width: 15%" class="btn-act text-center">
											                	<button type="button" class="btn btn-info change_status_blogs" >
											                		<a  href="<?php echo RootURL."books/".$book['slug']?>"  >View
																	</a>
											                	</button>
											                	<button id="delItem<?php echo $book['book_group_id']; ?>" type="button" class="btn btn-danger delItem-record" alt="<?php echo $book['book_group_id']; ?>,deleteBookGroupArticleBook" data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
											                </td>
											            </tr>
											        <?php }} ?>
										        </tbody>
										        <tfoot>
										            <tr>
										                <th>Title</th>
										                <th>Author</th>
										                <th>ISBN</th>
										                <th>Featured Image</th>
										                <th>Action</th>
										            </tr>
										        </tfoot>
										    </table>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group form-group-list">
										<!-- List Member -->
										<legend class="">List Books</legend>
										<div class="col-md-12 col-sm-12">
											<div class="row">
												<table id="list_books" class="table table-striped table-bordered data_table_list" style="width:100%">
										        <thead>
										            <tr>
										                <th>Title</th>
										                <th>Author</th>
										                <th>ISBN</th>
										                <th>Featured Image</th>
										                <th>Action</th>
										            </tr>
										        </thead>
										        <tbody class="records">
														<?php foreach ($this->books as $book) { ?>
												            <tr>
												                <td><?php echo $book['title']; ?></td>
												                <td><?php if(!empty($book['author'])) echo $book['author']; else echo 'Null'; ?></td>
												                <td><?php if(!empty($book['ISBN'])) echo $book['ISBN']; else echo 'Null'; ?></td>
												                <td style="width: 15%">
																	<?php if (strpos($book['featured_image'], "https://books.google.com/books/") !== false) { ?>
												                    <img style="width:65%" src="<?php echo $book['featured_image']?>" class="img-responsive">
												                  <?php } else { ?>
												                    <img style="width:65%" src="<?=UploadURI.'books'.'/'.(($book['featured_image'])? $book['featured_image']: 'no_picture.png'); ?>" class="img-responsive">
												                  <?php } ?>
												                </td>
												                <td style="width: 15%" class="btn-act text-center">
												                	<button type="button" class="btn btn-info change_status_blogs" >
												                		<a   href="<?php echo RootURL."books/".$book['slug']?>" >View
																		</a>
												                	</button>
												                	<button type="button" class="btn btn-danger delItem-record" alt="<?php echo $book['book_group_id']; ?>,deleteBookGroupArticleBook" data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
												                </td>
												            </tr>
												        <?php }?>
										        </tbody>
										        <tfoot>
										            <tr>
										                <th>Title</th>
										                <th>Author</th>
										                <th>ISBN</th>
										                <th>Featured Image</th>
										                <th>Action</th>
										            </tr>
										        </tfoot>
										    </table>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group form-group-list">
										<!-- List Member -->
										<legend class="">List Members</legend>
										<div class="col-md-12 col-sm-12">
											<div class="row">
												<table id="list_members" class="table table-striped table-bordered data_table_list" style="width:100%">
										        <thead>
										            <tr>
										                <th>Full name</th>
														<th>Email</th>
														<th>Gender</th>
														<th>Country</th>
														<th>Avatar</th>
														<th>Action</th>
										            </tr>
										        </thead>
										        <tbody class="records">
													<?php foreach ($this->members as $member) { ?>
											            <tr>
											                <td><?php echo $member['firstname']." ".$member['lastname']; ?></td>
											                <td><?php echo $member['email']; ?></td>
											                <td><?php if($member['gender'] == 1) echo "Male"; else echo "Female"; ?></td>
											                <td><?php echo $member['country']; ?></td>
											                <td style="width: 15%">
																<img style="width:65%" src="<?=UploadURI.'users'.'/'.(($member['avata'])? $member['avata']: 'no_picture.png'); ?>">
											                </td>
											                <td style="width: 15%" class="btn-act text-center">
											                	<button type="button" class="btn btn-info change_status_blogs" >
											                		<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$member['user_id']])) ?>">View
																	</a>
											                	</button>
											                	<button id="delItem<?php echo $member['book_group_id']; ?>" type="button" class="btn btn-danger delItem-record" alt="<?php echo $member['book_group_id']; ?>,deleteBookGroupArticleUser" data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
											                </td>
											            </tr>
											        <?php } ?>
										        </tbody>
										        <tfoot>
										            <tr>
										                <th>Full name</th>
														<th>Email</th>
														<th>Gender</th>
														<th>Country</th>
														<th>Avatar</th>
														<th>Action</th>
										            </tr>
										        </tfoot>
										    </table>
											</div>
										</div>
									</div>
								<?php endif ?>
						</div>
			    </div>
			</div>
		</div>
	</div>
</div>