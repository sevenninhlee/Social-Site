<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form">		   
			    <div class="box-body body_form">
		    	<fieldset>
				    <div id="legend">
				      <legend class="">
				      	<?php echo ucwords($app['act'].' '.$app['ctl']); ?>
				      </legend>
						</div>
				   
				    <form id="form-addqueries" action="<?php echo vendor_app_util::url(["ctl"=>"queries", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
				    	<?php if(isset($this->errors['database'])) { ?>
				    		<div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
				    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
				    			<h4>Oh snap! You got an error!</h4> 
				    			<p><?=$this->errors['database'];?></p> 
				    		</div>
				    	<?php } ?>

				    		<div class="alert alert-danger  alert-dismissible fade in" role="alert" id="data_found"> 
				    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
				    			<h4>Oh snap! You got an error!</h4> 
				    			<p>Data not found!</p> 
				    		</div>

						    <div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="title">Title</label>
						      <div class="controls col-md-6 search_queries_title">
						        <input type="text" id="queries_form_name" name="queries[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
						        <?php if( isset($this->errors['title'])) { ?>
						        	<p class="text-danger"><?=$this->errors['title']; ?></p>
						        <?php } ?>
						      </div>
								</div>
								
								<div class="form-group row hide" >
						      <!-- Slug -->
						      <label class="control-label col-md-3" for="slug">Slug</label>
						      <div class="controls col-md-6">
						        <input  type="text" id="queries_form_slug" name="queries[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>" >
						        <?php if( isset($this->errors['slug'])) { ?>
						        	<p class="text-danger"><?=$this->errors['slug']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

						    <div class="form-group row">
						      <!-- Category -->
						      <label class="control-label col-md-3" for="categories">Category</label>
						      <div class="controls col-md-6">
									<?php if($app['act'] =='add'){ ?>
										<?php	
											if(isset($this->record['categories_arr'])){
												$list_str = $this->record['categories_arr'];
												$list_str = rtrim($list_str, ",");
												$list_str = ltrim($list_str, ",");
												$array_select = explode(',', $list_str);
											}
										?>							
										<select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
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
									<?php }else {?>
										<select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
											<?php echo vendor_app_util::displayCategory($this->categories['data'],$this->category);?>
										</select>
									<?php }?>
									<?php if( isset($this->errors['categories_arr'])) { ?>
										<p class="text-danger"><?=$this->errors['categories_arr']; ?></p>
									<?php } ?>
						      </div>
						    </div>
						 
								<div class="form-group row">
						      <!--  Featured Image -->
						      <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
						      <div class="controls col-md-6">
						      	<p class="img_search"><img src="" alt=""></p>
						      	<?php if($app['act'] !='view'){ ?>
						        	<input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
						        	<?php if($app['act'] ==='edit'){ ?>
                        	<?php if(isset($this->record['featured_image'])) { ?>
														<img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
													<?php } else { ?>
														<img src="<?php echo UploadURI.'no_picture.png'?>">
													<?php }  ?>
                        <?php } ?>
						        <?php } else { ?>
												<?php if(isset($this->record['featured_image'])) { ?>
													<img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
												<?php } else { ?>
														<img src="<?php echo UploadURI.'no_picture.png'?>" width=200; height=200;>
												<?php } ?>
										<?php } ?>
						        <?php if( isset($this->errors['featured_image'])) { ?>
						        	<p class="text-danger"><?=$this->errors['featured_image']; ?></p>
						        <?php } ?>
						      </div>
						    </div>
						

							<div class="form-group row">
						      <!-- Queries Description -->
						      <label class="control-label col-md-3" for="description">Queries Description</label>
						      <div class="controls col-md-9">
										<textarea rows="30" cols="50" type="text" id="description" name="queries[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
										<?php if( isset($this->errors['description'])) { ?>
												<p class="text-danger"><?=$this->errors['description']; ?></p>
										<?php } ?>
						      </div>
							</div>
								<hr>
								<div class="form-group row">
							      <div class="controls controls_btn col-md-12">
							      	<!-- <button type="button" class="btn btn-review" id="btn_cancel">Cancel</button> -->
							        <input class="btn btn-review" type="submit" name="btn_submit" id="btn_submit" value="<?php if($app['act'] === "edit") echo "Save"; else echo ucfirst($app['act'])." Queries" ?>" <?= ($app['act'] === "edit") ?  'disabled' : ''?>>
							      </div>
							</div>
				    	</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>