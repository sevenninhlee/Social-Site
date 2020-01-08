<div class="">
	<div class="col-xs-12">
		<div class="row">
			<div class="box box_form add_book">
				<div class="box-body body_form">
					<fieldset>
						<div id="legend">
							<legend class="">
								<?php echo ucwords($app['act'] . ' ' . $app['ctl']); ?>
							</legend>
						</div>
						<?php if ($app['act'] === 'add') { ?>
							<div class="recomend" id="search_google">
								<div class="form-group row">
									<label class="control-label col-md-3" for="ISBN">ISBN</label>
									<div class="controls col-md-7 search_book_isbn_10">
										<input type="text" class="form-control form-control-input" value="" name="favorite_isbn" id="favorite_isbn" getItemID="test" placeholder="" alt="book_found_fav_bsh">
										<p class="text-danger error_search"></p>
									</div>
									<button type="button" class="btn btn-primary" id="getFavIsbn10">Search</button>
								</div>
								<hr>
								<div class="form-group row fav_title_auth">
									<label class="control-label col-md-3" for="title">Title</label>
									<div class="controls col-md-7 search_book_title">
										<input type="text" class="form-control form-control-input searchName" name="favorite_title" id="favorite_title" getItemID="test" data="" placeholder="" alt="book_found_fav_bsh">
										<p class="text-danger error_search"></p>
									</div>
								</div>
								<div class="form-group row fav_title_auth">
									<label class="control-label col-md-3" for="author">Author</label>
									<div class="controls col-md-7 search_book_author">
										<input type="text" id="favorite_author" name="book[author]" placeholder="" class="form-control" value="" alt="book_found_fav_bsh">
										<p class="text-danger error_search"></p>
									</div>
									<button type="button" class="btn btn-primary" id="getFavTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
								</div>
								<hr>
								<!-- Modal system-->
								<div class="modal fade" id="myModalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalCenterTitle">Result Search System</h4>
											</div>
											<div class="modal-body" id="body_1">
												<div class="form-group">
													<div class="col-sm-4">
														<p>
															<img src="" alt="">
														</p>
													</div>
													<div class="col-sm-5">
														<p> <strong>Title:</strong> </p>
														<p> <strong>Author:</strong> </p>
													</div>
													<div class="col-sm-3">

													</div>
												</div>
											</div>
											<div class="modal-footer">
												<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
											</div>
										</div>
									</div>
									<!-- Modal google-->
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalCenterTitle">Result Search Google</h4>
											</div>
											<div class="modal-body" id="body_2">
												<div class="form-group">
													<div class="col-sm-4">
														<p>
															<img src="" alt="">
														</p>
													</div>
													<div class="col-sm-5">
														<p> <strong>Title:</strong> </p>
														<p> <strong>Author:</strong> </p>
													</div>
													<div class="col-sm-3">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal system-->
								<div class="modal fade" id="myModalSearchISBN" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="exampleModalCenterTitle">Result Search:</h4>
											</div>
											<div class="modal-body" id="body_1">
												<div class="form-group">
													<h5 style="font-size:16px;line-height: 30px;">The ISBN had in the system. You can click <a id="link_books" href="#" style="color: red" target="_blank">here</a> to view detail or close mockup to re-enter!</h5>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<form <?php if ($app['act'] === 'add') { ?> id="form-addbook" <?php } ?> action="<?php echo vendor_app_util::url(["ctl" => "books", "act" => $app['act'] == 'edit' ? $app['act'] . "/" . $this->record['id'] : $app['act']]); ?>" method="post" enctype="multipart/form-data" toggle="0" class="form-horizontal">
							<?php if (isset($this->errors['database'])) { ?>
								<div class="alert alert-danger  alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									<h4>Oh snap! You got an error!</h4>
									<p><?= $this->errors['database']; ?></p>
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
								<div class="controls col-md-8 search_book_title">
									<input type="text" id="books_form_title" name="book[title]" placeholder="" class="form-control books_form_title" value="<?php if (isset($this->record['title'])) echo $this->record['title']; ?>" required>
									<?php if (isset($this->errors['title'])) { ?>
										<p class="text-danger"><?= $this->errors['title']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row hide">
								<!-- Slug -->
								<label class="control-label col-md-3" for="slug">Slug</label>
								<div class="controls col-md-8">
									<input type="text" id="books_form_slug" name="book[slug]" placeholder="" class="form-control" value="<?php if (isset($this->record['slug'])) echo $this->record['slug']; ?>">
									<?php if (isset($this->errors['slug'])) { ?>
										<p class="text-danger"><?= $this->errors['slug']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row">
								<!-- Category -->
								<label class="control-label col-md-3" for="categories">Category</label>
								<div class="controls col-md-8">
									<?php if ($app['act'] == 'add') { ?>
										<?php
											if (isset($this->record['categories_arr'])) {
												$list_str = $this->record['categories_arr'];
												$list_str = rtrim($list_str, ",");
												$list_str = ltrim($list_str, ",");
												$array_select = explode(',', $list_str);
											}
											?>
										<select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
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
									<?php } else  if ($app['act'] == 'edit') { ?>
										<select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
											<?php echo vendor_app_util::displayCategory($this->categories, $this->category); ?>
										</select>
									<?php } else { ?>
										<?php if (!empty($this->category['name'])) : ?>
											<a href="#"><?php echo $this->category['name'] ?></a>
										<?php else : ?>
											<a href="#">Unkown category</a>
										<?php endif; ?>
									<?php } ?>
									<?php if (isset($this->errors['categories_arr'])) { ?>
										<p class="text-danger"><?= $this->errors['categories_arr']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row">
								<!--  Featured Image -->
								<label class="control-label col-md-3" for="featured_image"> Featured Image</label>
								<div class="controls col-md-8">
									<input type="hidden" name="book[img_search_api]" id="img_search_api" class="img_search_api" value="<?= (isset($this->record['featured_image'])) ? $this->record['featured_image'] : null ?>">
									<p class="img_search"><img src=""></p>
									<?php if (isset($this->record['featured_image'])) { ?>
										<?php if (strpos($this->record['featured_image'], "https://books.google.com/books/") !== false) { ?>
											<p class="img_data"><img src="<?php echo $this->record['featured_image'] ?>"></p>
										<?php } else { ?>
											<?php if (isset($this->record['featured_image'])) { ?>
												<p class="img_data"><img src="<?php echo UploadURI . $app['ctl'] . '/' . $this->record['featured_image']; ?>"></p>
											<?php } else { ?>
												<p class="img_data"><img src="<?php echo UploadURI . 'no_picture.png' ?>"></p>
									<?php }
										}
									} ?>
									<input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control featured_image">
									<?php if (isset($this->errors['featured_image'])) { ?>
										<p class="text-danger"><?= $this->errors['featured_image']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row">
								<!-- Title -->
								<label class="control-label col-md-3" for="ISBN">ISBN</label>
								<div class="controls col-md-8 search_book_isbn">
									<input type="text" id="books_form_isbn" name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="<?php if (isset($this->record['ISBN'])) echo $this->record['ISBN']; ?>" required>
									<?php if (isset($this->errors['ISBN'])) { ?>
										<p class="text-danger"><?= $this->errors['ISBN']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row">
								<!-- Title -->
								<label class="control-label col-md-3" for="author">Author</label>
								<div class="controls col-md-8 search_book_author">
									<input type="text" id="books_form_author" name="book[author]" placeholder="" class="form-control books_form_author" value="<?php if (isset($this->record['author'])) echo $this->record['author']; ?>" required>
									<?php if (isset($this->errors['author'])) { ?>
										<p class="text-danger"><?= $this->errors['author']; ?></p>
									<?php } ?>
								</div>

							</div>

							<div class="form-group row">
								<!-- Title -->
								<label class="control-label col-md-3" for="year">Year</label>
								<div class="controls col-md-8">
									<input type="text" id="books_form_year" name="book[year]" placeholder="" class="form-control books_form_year" value="<?php if (isset($this->record['year'])) echo $this->record['year']; ?>" required>
									<?php if (isset($this->errors['year'])) { ?>
										<p class="text-danger"><?= $this->errors['year']; ?></p>
									<?php } ?>
								</div>
							</div>

							<div class="form-group row">
								<!-- Book Description -->
								<label class="control-label col-md-3" for="description">Book Description</label>
								<div class="controls col-md-9">
									<textarea rows="30" cols="50" type="text" id="description" name="book[description]" placeholder="" class="form-control" value=""><?php if (isset($this->record['description'])) echo ($this->record['description']); ?></textarea>
									<?php if (isset($this->errors['description'])) { ?>
										<p class="text-danger"><?= $this->errors['description']; ?></p>
									<?php } ?>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<div class="controls controls_btn col-md-12">
									<!-- <button type="button" class="btn btn-review" id="btn_cancel">Cancel</button> -->
									<input class="btn btn-review" type="submit" name="btn_submit" id="btn_submit" value="<?php if ($app['act'] === "edit") echo "Save";
																															else echo ucfirst($app['act']) . " Book" ?>" <?= ($app['act'] === "edit") ?  'disabled' : '' ?>>
								</div>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>