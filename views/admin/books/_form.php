<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form">		   
			    <div class="box-body body_form">
		    	<fieldset>
				    <div id="legend">
				      <legend class=""><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				    </div>
				    <?php if($app['act'] != 'view') { ?>
				    	<form id="form-addbook" action="<?php echo vendor_app_util::url(["ctl"=>"books", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['data'][0]['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="books_form_name" name="book[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['title'])) echo $this->record['data'][0]['title']; ?>" required>
						        <?php if( isset($this->errors['title'])) { ?>
						        	<p class="text-danger"><?=$this->errors['title']; ?></p>
						        <?php } ?>
						      </div>
								</div>
								
								<div class="form-group row">
						      <!-- Slug -->
						      <label class="control-label col-md-3" for="slug">Slug a</label>
						      <div class="controls col-md-7">
						        <input <?php if($app['act']=='view') echo "disabled"; ?>  type="text" id="books_form_slug" name="book[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['slug'])) echo $this->record['data'][0]['slug']; ?>" >
						        <?php if( isset($this->errors['slug'])) { ?>
						        	<p class="text-danger"><?=$this->errors['slug']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

							<!-- <div class="form-group row">
							<label class="control-label col-md-3" for="average_rating">Average rating</label>
							<div class="controls col-md-7">
							<input <?php if($app['act']=='view') echo "disabled"; ?> type="number" step="0.1" min='0' max='10'  name="book[average_rating]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['average_rating'])) echo $this->record['data'][0]['average_rating']; ?>" required>
							<?php if( isset($this->errors['average_rating'])) { ?>
								<p class="text-danger"><?=$this->errors['average_rating']; ?></p>
							<?php } ?>
							</div>
							</div> -->

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
						      		<?php if(isset($this->record['data'][0]['featured_image'])) { ?>
						      			<?php if (strpos($this->record['data'][0]['featured_image'], "http://books.google.com/books/") !== false) { ?>
						                    <img src="<?php echo $this->record['data'][0]['featured_image']?>" class="img-responsive">
						                  <?php } else { ?>
						                    <img src="<?=UploadURI.'books'.'/'.(($this->record['data'][0]['featured_image'])? $this->record['data'][0]['featured_image']: 'no_picture.png'); ?>" class="img-responsive">
						                  <?php } ?>
						      		<?php } ?>
						      	<?php } ?>
						      	<?php if($app['act'] !='view'){ ?>
						        	<input type="file" id="featured_image" name="image" <?php if($app['act'] =='add') echo "required" ?>  placeholder="" class="form-control">
						        <?php } ?>
						        <?php if( isset($this->errors['featured_image'])) { ?>
						        	<p class="text-danger"><?=$this->errors['featured_image']; ?></p>
						        <?php } ?>
						      </div>
						    </div>
							
							<div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="ISBN">ISBN</label>
						      <div class="controls col-md-7">
						        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="books_form_name" name="book[ISBN]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['ISBN'])) echo $this->record['data'][0]['ISBN']; ?>" required>
						        <?php if( isset($this->errors['ISBN'])) { ?>
						        	<p class="text-danger"><?=$this->errors['ISBN']; ?></p>
						        <?php } ?>
						      </div>
							</div>

							<div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="author">author</label>
						      <div class="controls col-md-7">
						        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="books_form_name" name="book[author]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['author'])) echo $this->record['data'][0]['author']; ?>" required>
						        <?php if( isset($this->errors['author'])) { ?>
						        	<p class="text-danger"><?=$this->errors['author']; ?></p>
						        <?php } ?>
						      </div>
							</div>

							<div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="year">Year</label>
						      <div class="controls col-md-7">
						        <input <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="books_form_name" name="book[year]" placeholder="" class="form-control" value="<?php if(isset($this->record['data'][0]['year'])) echo $this->record['data'][0]['year']; ?>" required>
						        <?php if( isset($this->errors['year'])) { ?>
						        	<p class="text-danger"><?=$this->errors['year']; ?></p>
						        <?php } ?>
						      </div>
							</div>

							<div class="form-group row">
						      <!-- Featured my book -->
						      <label class="control-label col-md-3" for="add_homepage">Add Homepage</label>
						      <div class="controls col-md-7">
									<input type="radio" name="book[add_homepage]" value="1" <?php if(isset($this->record['data'][0]['add_homepage']) && $this->record['data'][0]['add_homepage'] == 1) echo 'checked';?> >Yes 
  									<input type="radio" name="book[add_homepage]" value="0" <?php if($app['act'] =='add') echo 'checked'; ?> <?php if(isset($this->record['data'][0]['add_homepage']) && $this->record['data'][0]['add_homepage'] == 0) echo 'checked';?> >No<br>
						      </div>
						    </div>

							<div class="form-group row">
						      <!-- Book Description -->
						      <label class="control-label col-md-3" for="description">Book Description</label>
						      <div class="controls col-md-7">
										<?php if($app['act'] !='view'){ ?>
											<textarea rows="30" cols="50" <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="description" name="book[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['data'][0]['description'])) echo($this->record['data'][0]['description']); ?></textarea>
											<?php if( isset($this->errors['description'])) { ?>
												<p class="text-danger"><?=$this->errors['description']; ?></p>
											<?php } ?>
										<?php } else {?>
											<?php if(isset($this->record['data'][0]['description'])) echo($this->record['data'][0]['description']); ?>
										<?php } ?>
						      </div>
							</div>


						    <?php if($app['act'] !='view'){ ?>
							    <div class="form-group row">
							      <div class="controls col-md-10">
							        <input class="btn btn-primary pull-right" type="submit" name="btn_submit" value="Save">
							      </div>
							    </div>
								<?php } ?>
								<?php if($app['act'] != 'view') { ?>
				    	</form>
				    <?php } ?>

					</fieldset>
					<div class="col-md-12 css_border">
					<legend class="">Review</legend>
					<?php if($app['act']=='edit'): ?>
						<div class="form-group row">
							<!-- Like -->
							<label class="control-label col-md-3">Number of likes</label>
							<div class="controls col-md-7">
								<?php echo $this->record['data'][0]['getTotalAll']['total_likes']; ?>
							</div>
						</div>
					<?php endif ?>

					<?php if($app['act']=='edit'): ?>
						<div class="form-group row">
							<!-- Like -->
							<label class="control-label col-md-3">Rating</label>
							<div class="controls col-md-7">
								<?php echo $this->record['data'][0]['getTotalAll']['avr_reviews']; ?>
							</div>
						</div>
					<?php endif ?>

					<?php if($app['act']=='edit'): ?>
					<div class="form-group form-group-list">
							<!-- List Member -->
							<legend class="">Comments</legend>
							<div class="col-md-12 col-sm-12 table-responsive">
								<div class="row ">
										<select class="select_list" id="select_list_books">
											<option value="delete_books" act="deleteBookComment">Delete</option>
											<option value="activate_books" act="changeStatusManyBookComment">Activate</option>
              								<option value="deactivate_books" act="changeStatusManyBookComment">Deactivate</option>
										</select>
									<button class="btn-custom btn btn-apply" id='btn_apply_books_table'>Apply</button>
									<table id="" class="dataTable table table-striped table-bordered data_table_list" style="width:100%" controller='books'>
							        <thead>
							            <tr>
											<th rowspan="1" colspan="1" id="checkAllBottom" class="checkAll" style="width:70px">
													<div class="checkbox">
													<input id="checkbox12" type="checkbox">
													<label for="checkbox12">
														No.
													</label>
													</div>
												</th>
							                <th>User</th>
							                <th style='width:40%'>Content</th>
							                <th>Commented at</th>
							                <th>Status</th>
							                <th>Action</th>
							            </tr>
							        </thead>
							        <tbody class="records">
											<?php if(!empty(($this->comments)) && count($this->comments)) { ?>
												<?php $i=1; foreach ($this->comments as $record) { ?>
												<tr role="row" id="row<?=$record['id'];?>">
														
													<td id="<?php echo("checkbox".$record['id']);?>" class="checkboxRecord btn-act">
														<div class="checkbox">
															<input type="checkbox" name="" alt="<?=$record['id'];?>" id="<?php echo("checkbox-".$record['id']);?>">
															<label for="<?php echo("checkbox-".$record['id']);?>">
																<a href="#" id="viewUser<?=$record['id'];?>">
																	<?php echo $i++; ?>
																</a>	
															</label>
														</div>
													</td>

													<td class="tabletShow">
														<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"view/".$record['user_id']])) ?>" id="viewUser<?=$record['user_id'];?>"><p class="andrew text-center" id='name<?=$record['id']?>'>
															<?php echo $record['users_firstname'].' '.$record['users_lastname']; ?>
														</p></a>
													</td>

													<td class="tabletShow">
														<p class="andrew text-left">
															<?php echo (strlen($record['content'])>40?'<span id="comment-show-'.$record['id'].'" class="text-hidden">'.$record['content'].'</span><span class="show-more" alt="'.$record['id'].'">...More</span>':$record['content'])
															?>
														</p>
													</td>

													<td class="tabletShow">
														<p class="andrew">
															<?php echo $record['created']; ?>
														</p>
													</td>

													<td class="tabletShow" id="<?php echo("admin_status".$record['id']);?>">
														<?php 
															if($record['admin_status'] == 1 ):
														?>
														<button type="button" class="btn btn-primary change_status_books" alt="<?php echo($record['id']);?>,0,changeStatusBookComment">Active</button>
														<?php 
															else:
														?>
														<button type="button" class="btn btn-warning change_status_books" alt="<?php echo($record['id']);?>,1,changeStatusBookComment">Inactive</button>
														<?php 
															endif;
														?>
													</td>

													<td class="tabletShow btn-act">
														<p class="andrew <?php echo ($record['num_replies']>0?'show_replies':''); ?> " id='comment-id-<?=$record['id']?>' alt='off' upper='Book'>
															<?php echo ($record['num_replies']>0?'Show replies':''); ?>
															
															
														</p>
														<button id="delItem<?php echo $record['id']; ?>" type="button" class="btn btn-danger delItem-record" alt="<?php echo $record['id']; ?>,deleteBookComment" data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
													</td>

												</tr>
												<?php } ?>
											<?php } else { ?>
												<tr role="row"><td colspan="8"><h3 class="text-danger text-center"> No data </h3></td></tr>
											<?php } ?>
										</tbody>
							        <tfoot>
							            <tr>
											<th>No. </th>
							                <th>User</th>
							                <th>Content</th>
							                <th>Commented at</th>
							                <th>Status</th>
							                <th>Action</th>
							            </tr>
							        </tfoot>
							    </table>
								</div>
							</div>
						</div>
						<hr>
					<?php endif ?>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>