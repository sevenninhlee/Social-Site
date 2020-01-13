<div class="col-md-2 col-sm-3 pad0 bg_color">
   <ul class="sidebar-menu nav-stacked nav-pills" data-widget="tree">
      <li class="">
        <a href="<?=vendor_app_util::url(array('ctl'=>'dashboard')); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview <?=($app['ctl']=='book_groups')? 'active menu-open':'';?>">
        <a href="#">
          <span>Book Groups</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='book_groups' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'book_groups', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='book_groups' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'book_groups', 'act' => 'index')); ?>">Articles</a></li>
        </ul>
      </li>

      <li class="treeview <?=($app['ctl']=='blogs')? 'active menu-open':'';?>">
        <a href="#">
          <span>Blogs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='blogs' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='blogs' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'index')); ?>">Articles</a></li>
        </ul>
      </li>

      <li class="treeview  <?=($app['ctl']=='news')? 'active menu-open':'';?>">
        <a href="#">
          <span>News</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='news' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'categories')); ?>">Categories</a></li>
        <li <?=($app['ctl']=='news' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'index')); ?>">Articles</a></li>
        </ul>
      </li>

      <li class="treeview <?=($app['ctl']=='books')? 'active menu-open':'';?>">
        <a href="#">
          <span>Book</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='books' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'books', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='books' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'books', 'act' => 'index')); ?>">Articles</a></li>
        </ul>
      </li>

      <li class="treeview  <?=($app['ctl']=='static_pages')? 'active menu-open':'';?>">
        <a href="#">
          <span>Static pages</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='static_pages' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'static_pages', 'act' => 'index')); ?>"></i>Show pages</a></li>
        </ul>
      </li>

      <li class="treeview <?=($app['ctl']=='users' && $app['act']=='profile')? 'active menu-open':'';?>">
        <a href="#">
          <i class="fa fa-lock"></i>
          <span>Manage</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=vendor_app_util::url(array('ctl'=>'users', 'act'=>'profile/index?user='.$_SESSION['user']['id'])); ?>"><i class="fa fa-male"></i> Profile</a></li>
          <li><a href="#" data-target="#changePassword" data-toggle="modal"><i class="fa fa-key"></i>Change Password</a></li>
          <li><a href="<?=vendor_app_util::url(array('ctl'=>'login', 'act'=>'logout')); ?>"><i class="fa fa-sign-in"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
</div>