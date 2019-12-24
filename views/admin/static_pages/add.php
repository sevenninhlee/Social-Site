<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>
<div class="col-md-10 col-sm-9 pad0">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane tabpane_blogs active" id="queries">
			<div class="row content">
				<div class="col-xs-12 col-lg-12">
					<div class="box">
						<div class="box-header">
							<div class="row" id="records-header">
								<div class="col-sm-8 col-xs-6">
									<h2 class="box-title">Create a new page</h2>
								</div>
								<div class="col-sm-8 col-xs-6">
								</div>
							</div>
						</div>
						
						<div class="box-body">
							<div id="table_wrapper" class="dataTables_wrapper form-inline dt-boostrap">
								<div class="row">
									<div class="col-sm-12">
										<div class="box-body">
											<form id="form-static_pages">
												<h4 class="box-title">Title for static page</h4><br />
												<h6 class="box-title text-danger" id="static_pages-title"></h6>
												<input autofocus type="text" id="title" name="static_page[title]" placeholder="" class="form-control" style="margin-left:0px;margin-bottom:10px;width:100%;">
												<h4 class="box-title">Slug</h4><br />
												<input type='text' style="border-radius:5px;width:100%;" name="static_page[slug]" id='title_slug' class="form-control" value="" />
												<br /><br />
												<h4 class="box-title">Content</h4><br />
												<h6 class="box-title text-danger" id="static_pages-content"></h6>
												<textarea id="editor1"  name="static_page[content]"></textarea><br />
												<button id="notify-records" class="btn btn-success ml-1 mb-1 form-static_pages-submit" data-toggle="modal" data-target="#myModal" type="submit">
													<i class="fa fa-save"></i>
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>

	CKEDITOR.replace( 'editor1', {} );
	CKEDITOR.config.baseFloatZIndex = 100001;

</script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/admin/js/static_pages.js"></script>
