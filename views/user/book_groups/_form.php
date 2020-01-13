<?php 
	global $app;
?>
<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form">		   
			    <div class="box-body body_form">
		    	<fieldset>
				    <!-- <div id="legend">
				      <legend class=""><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				    </div> -->
				    	<form id="form-addbook" action="<?php echo vendor_app_util::url(["ctl"=>"books", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						        <input type="text" id="books_form_name" name="book[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
						        <?php if( isset($this->errors['title'])) { ?>
						        	<p class="text-danger"><?=$this->errors['title']; ?></p>
						        <?php } ?>
						      </div>
								</div>
								
								<div class="form-group row hide">
						      <!-- Slug -->
						      <label class="control-label col-md-3" for="slug">Slug</label>
						      <div class="controls col-md-7">
						        <input  type="text" id="books_form_slug" name="book[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>" >
						        <?php if( isset($this->errors['slug'])) { ?>
						        	<p class="text-danger"><?=$this->errors['slug']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

						    <div class="form-group row">
						      <!-- Category -->
						      <label class="control-label col-md-3" for="categories">Category</label>
						      <div class="controls col-md-7">
										<select name="book[categories_id]" id="input-categories_id" class="form-control">
											<option value="0">Unkown category</option>
											<?php foreach ($this->categories['data'] as $record) { ?>
											<option value="<?php echo $record['id']?>" <?php if(isset($this->record['categories_id']) && $this->record['categories_id'] == $record['id']) echo 'selected'; ?>>
												<?php echo $record['name']?>
											</option>
											<?php } ?>
										</select>
									<?php if( isset($this->errors['categories_id'])) { ?>
										<p class="text-danger"><?=$this->errors['categories_id']; ?></p>
									<?php } ?>
						      </div>
						    </div>
						 
								<div class="form-group row">
						      <!--  Featured Image -->
						      <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
						      <div class="controls col-md-7">
						      		
						      	<?php if($app['act'] =='add'){ ?>
						        	<input type="file" id="featured_image" style="display: block;" name="image" placeholder="" class="form-control">
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
						      <!-- Book Description -->
						      <label class="control-label col-md-3" for="description">Book Description</label>
						      <div class="controls col-md-7">
										<textarea rows="7" cols="50" type="text" id="description" name="book[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
										<?php if( isset($this->errors['description'])) { ?>
												<p class="text-danger"><?=$this->errors['description']; ?></p>
										<?php } ?>
						      </div>
							</div>
								<hr>
								<div class="form-group row">
							      <div class="controls col-md-10">
							        <input class="btn btn-success pull-right" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act']) ?>">
							      </div>
							</div>
				    	</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>