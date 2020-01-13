<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<div class="col-md-10 col-sm-9 pad0">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane tabpane_blogs active" id="queries" style='min-height:550px;'>
			<p class="blog_head">Dashboard</p>
            <span class="posts">Blogs</span>
			<ul class="list-inline btn-list_ul">
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'index')); ?>"><button class="btn-custom-apply btn-categories">All Posts</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'add')); ?>"><button class="btn-custom-apply btn-categories">Add New</button></a></li>
				<li><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'categories')); ?>"><button class="btn-custom-apply btn-categories">Categories</button></a></li>
			</ul>
			<div class="space20"></div>
			<div class="row">
		</div>
	</div>
</div>

<script src="<?php echo RootREL; ?>media/admin/js/dashboard.js"></script>
<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
