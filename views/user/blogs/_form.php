<div class="">
	<div class="col-xs-12">
		<h2>Blog Submission</h2>
		<div class="row">
			<div class="box box_form">
				<div class="box-body body_form">
					<fieldset>


						<div class="Add_box">
							<form id="form-addblog" action="<?php echo vendor_app_util::url(["ctl" => "blogs", "act" => $app['act'] == 'edit' ? $app['act'] . "/" . $this->record['id'] : $app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
								<?php if (isset($this->errors['database'])) { ?>
									<div class="alert alert-danger  alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4>Oh snap! You got an error!</h4>
										<p><?= $this->errors['database']; ?></p>
									</div>
								<?php } ?>

								<div class="form-group row">
									<!-- Title -->
									<label class="control-label col-md-3" for="title">Title</label>
									<div class="controls col-md-6">
										<input type="text" id="blogs_form_name" name="blog[title]" placeholder="" class="form-control" value="<?php if (isset($this->record['title'])) echo $this->record['title']; ?>" required>
										<?php if (isset($this->errors['title'])) { ?>
											<p class="text-danger"><?= $this->errors['title']; ?></p>
										<?php } ?>
									</div>
								</div>

								<div class="form-group row hide">
									<!-- Slug -->
									<label class="control-label col-md-3" for="slug">Slug</label>
									<div class="controls col-md-6">
										<input type="text" id="blogs_form_slug" name="blog[slug]" placeholder="" class="form-control" value="<?php if (isset($this->record['slug'])) echo $this->record['slug']; ?>">
										<?php if (isset($this->errors['slug'])) { ?>
											<p class="text-danger"><?= $this->errors['slug']; ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="form-group row">
									<!-- Category -->
									<label class="control-label col-md-3" for="categories">Category</label>
									<div class="controls col-md-6">
										<?php if ($app['act'] == 'add') { ?>
											<?php
												if (isset($this->record['categories_arr'])) {
													$list_str = $this->record['categories_arr'];
													$list_str = rtrim($list_str, ",");
													$list_str = ltrim($list_str, ",");
													$array_select = explode(',', $list_str);
												}
												?>
											<select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
												<?php foreach ($this->categories as $record) { ?>
													<?php if (in_array($record['id'], $array_select)) { ?>
														<option value="<?php echo $record['id'] ?>" selected='selected'>
															<?php echo $record['name'] ?>
														</option>
													<?php } else { ?>
														<option value="<?php echo $record['id'] ?>">
															<?php echo $record['name'] ?>
														</option>
												<?php }
													} ?>
											</select>
										<?php } else { ?>
											<select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
												<?php echo vendor_app_util::displayCategory($this->categories['data'], $this->category); ?>
											</select>
										<?php } ?>
										<?php if (isset($this->errors['categories_arr'])) { ?>
											<p class="text-danger"><?= $this->errors['categories_arr']; ?></p>
										<?php } ?>
									</div>
								</div>

								<div class="form-group row">
									<!--  Featured Image -->
									<label class="control-label col-md-3" for="featured_image"> Featured Image</label>
									<div class="controls col-md-6">
										<?php if ($app['act'] != 'view') { ?>
											<input type="file" id="featured_image" style="display: block; padding: 5px; margin-bottom: 5px" name="image" placeholder="" class="form-control">
											<?php if ($app['act'] === 'edit') { ?>
												<?php if (isset($this->record['featured_image'])) { ?>
													<img src="<?php echo UploadURI . $app['ctl'] . '/' . $this->record['featured_image']; ?>">
												<?php } else { ?>
													<img src="<?php echo UploadURI . 'no_picture.png' ?>">
											<?php }
												} ?>
										<?php } else { ?>
											<?php if (isset($this->record['featured_image'])) { ?>
												<img src="<?php echo UploadURI . $app['ctl'] . '/' . $this->record['featured_image']; ?>">
											<?php } else { ?>
												<img src="<?php echo UploadURI . 'no_picture.png' ?>">
											<?php } ?>
										<?php } ?>
										<?php if (isset($this->errors['featured_image'])) { ?>
											<p class="text-danger"><?= $this->errors['featured_image']; ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-3" for="featured_my_blog">Public my blog:</label>
									<div class="col-sm-7">
										<div class="radio radio-info radio-inline">
											<input type="radio" id="inlineRadio1" value="1" name="blog[featured_my_blog]" checked>
											<label for="inlineRadio1"> Yes </label>
										</div>
										<div class="radio radio-inline">
											<input type="radio" id="inlineRadio2" value="0" name="blog[featured_my_blog]" <?= (isset($this->record['featured_my_blog']) && $this->record['featured_my_blog'] == 0) ? 'checked' : ''; ?>>
											<label for="inlineRadio2"> No </label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-3" for="short_description">Short Description</label>
									<div class="controls col-md-9">
										<textarea rows="7" cols="50" type="text" id="short_description" name="blog[short_description]" placeholder="" class="form-control" value=""><?php if (isset($this->record['short_description'])) echo ($this->record['short_description']); ?></textarea>
										<?php if (isset($this->errors['short_description'])) { ?>
											<p class="text-danger"><?= $this->errors['short_description']; ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-3" for="description">Blog Description</label>
									<div class="controls col-md-9">
										<textarea rows="30" cols="50" type="text" id="description" name="blog[description]" placeholder="" class="form-control" value=""><?php if (isset($this->record['description'])) echo ($this->record['description']); ?></textarea>
										<?php if (isset($this->errors['description'])) { ?>
											<p class="text-danger"><?= $this->errors['description']; ?></p>
										<?php } ?>
									</div>
								</div>

								<hr>
								<div class="form-group row">
									<div class="controls col-md-12">
										<input class="btn btn-review pull-right" type="submit" name="btn_submit" id="btn_submit" 
										value="<?php if ($app['act'] === "edit") echo "Save";
										else echo ucfirst($app['act']) . " Blog" ?>" <?= ($app['act'] === "edit") ?  'disabled' : '' ?>>
									</div>
								</div>
							</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>