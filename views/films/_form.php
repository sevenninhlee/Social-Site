<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form">		   
			    <div class="box-body body_form">
		    	<fieldset>
				    <div id="legend">
				      <legend class=""><?php echo ucwords($app['act'].' '.$app['ctl']); ?></legend>
				    </div>
				    	<form id="form-addbook" action="<?php echo vendor_app_util::url(["ctl"=>"films", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
						      <div class="controls col-md-9">
						        <input type="text" id="books_form_name" name="film[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
						        <?php if( isset($this->errors['title'])) { ?>
						        	<p class="text-danger"><?=$this->errors['title']; ?></p>
						        <?php } ?>
						      </div>
								</div>
								
								<div class="form-group row hide" >
						      <!-- Slug -->
						      <label class="control-label col-md-3" for="slug">Slug</label>
						      <div class="controls col-md-9">
						        <input  type="text" id="books_form_slug" name="film[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>" >
						        <?php if( isset($this->errors['slug'])) { ?>
						        	<p class="text-danger"><?=$this->errors['slug']; ?></p>
						        <?php } ?>
						      </div>
						    </div>

						    <div class="form-group row">
						      <!-- Category -->
						      <label class="control-label col-md-3" for="categories">Category</label>
						      <div class="controls col-md-9">
										<select name="film[categories_id]" id="input-categories_id" class="form-control">
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
						      <div class="controls col-md-9">
						        	<input type="file" id="featured_image" style="display: block;" name="image" placeholder="" class="form-control">
						        <?php if( isset($this->errors['featured_image'])) { ?>
						        	<p class="text-danger"><?=$this->errors['featured_image']; ?></p>
						        <?php } ?>
						      </div>
						    </div>
							

							<div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="link">Video URL</label>
						      <div class="controls col-md-9">
						        <input type="text" id="books_form_name" name="film[link]" placeholder="" class="form-control" value="<?php if(isset($this->record['link'])) echo $this->record['link']; ?>" required>
						        <?php if( isset($this->errors['link'])) { ?>
						        	<p class="text-danger"><?=$this->errors['link']; ?></p>
						        <?php } ?>
						      </div>
							</div>

							<div class="form-group row">
						      <!-- Title -->
						      <label class="control-label col-md-3" for="year">Year</label>
						      <div class="controls col-md-9">
						        <input type="text" id="books_form_name" name="film[year]" placeholder="" class="form-control" value="<?php if(isset($this->record['year'])) echo $this->record['year']; ?>" required>
						        <?php if( isset($this->errors['year'])) { ?>
						        	<p class="text-danger"><?=$this->errors['year']; ?></p>
						        <?php } ?>
						      </div>
							</div>

							<div class="form-group row">
						      <!-- film Description -->
						      <label class="control-label col-md-3" for="description">Film Description</label>
						      <div class="controls col-md-9">
										<textarea rows="30" cols="50" type="text" id="description" name="film[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
										<?php if( isset($this->errors['description'])) { ?>
												<p class="text-danger"><?=$this->errors['description']; ?></p>
										<?php } ?>
						      </div>
							</div>
								<hr>
								<div class="form-group row">
							      <div class="controls col-md-12">
							        <input class="btn btn-review pull-right" type="submit" name="btn_submit" value="<?php echo ucfirst($app['act'])." film" ?>">
							      </div>
							</div>
				    	</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>