<div class="col-md-2 col-sm-3 pad0 bg_color">
 
   <ul class="sidebar-menu nav-stacked nav-pills" data-widget="tree">

      <li class="">
        <a href="<?=vendor_app_util::url(array('ctl'=>'dashboard')); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <span>Films</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <span>Book Groups</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <span>News</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <span>Opinions & Debates</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <span>Book Reviews</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li> -->

      <li class="treeview <?=($app['ctl']=='films')? 'active menu-open':'';?>">
        <a href="#">
          <span>Films</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='films' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'films', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='films' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'films', 'act' => 'index')); ?>">Films</a></li>
        </ul>
      </li>

      
      <li class="treeview <?=($app['ctl']=='book_groups')? 'active menu-open':'';?>">
        <a href="#">
          <span>Book Groups</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='book_groups' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'book_groups', 'act' => 'index')); ?>">Book Groups</a></li>
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
          <li <?=($app['ctl']=='blogs' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'index')); ?>">Blogs</a></li>
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
        <li <?=($app['ctl']=='news' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'news', 'act' => 'index')); ?>">News</a></li>
        </ul>
      </li>

      <li class="treeview  <?=($app['ctl']=='election_central')? 'active menu-open':'';?>">
        <a href="#">
          <span>Election Centrals</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='election_central' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'election_central', 'act' => 'categories')); ?>">Categories</a></li>
        <li <?=($app['ctl']=='election_central' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'election_central', 'act' => 'index')); ?>">Election Centrals</a></li>
        </ul>
      </li>

      <li class="treeview  <?=($app['ctl']=='must_reads')? 'active menu-open':'';?>">
        <a href="#">
          <span>Must Reads</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='must_reads' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'must_reads', 'act' => 'categories')); ?>">Categories</a></li>
        <li <?=($app['ctl']=='must_reads' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'must_reads', 'act' => 'index')); ?>">Must Reads</a></li>
        </ul>
      </li>

      <li class="treeview  <?=($app['ctl']=='environment')? 'active menu-open':'';?>">
        <a href="#">
          <span>Environment</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='environment' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'environment', 'act' => 'categories')); ?>">Categories</a></li>
        <li <?=($app['ctl']=='environment' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'environment', 'act' => 'index')); ?>">Environment</a></li>
        </ul>
      </li>


      <li class="treeview  <?=($app['ctl']=='opinions_debates')? 'active menu-open':'';?>">
        <a href="#">
          <span>Opinions Debates</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li <?=($app['ctl']=='opinions_debates' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'opinions_debates', 'act' => 'categories')); ?>">Categories</a></li>
        <li <?=($app['ctl']=='opinions_debates' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'opinions_debates', 'act' => 'index')); ?>">Opinions Debates</a></li>
        </ul>
      </li>

      <li class="treeview <?=($app['ctl']=='books')? 'active menu-open':'';?>">
        <a href="#">
          <span>Book Reviews</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='books' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'books', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='books' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'books')); ?>">Book Reviews</a></li>
        </ul>
      </li>

      <li class="treeview <?=($app['ctl']=='queries')? 'active menu-open':'';?>">
        <a href="#">
          <span>Queries</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='queries' && $app['act']=='categories')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'queries', 'act' => 'categories')); ?>">Categories</a></li>
          <li <?=($app['ctl']=='queries' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'queries')); ?>">Queries</a></li>
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

      <li class="treeview  <?=($app['ctl']=='users')? 'active menu-open':'';?>">
        <a href="#">
           <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?=($app['ctl']=='users' && $app['act']=='index')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'users')); ?>"><i class="fa fa-users"></i> List Users</a></li>
          <li <?=($app['ctl']=='users' && $app['act']=='add')? 'class="active"':'';?>><a href="<?=vendor_app_util::url(array('ctl'=>'users', 'act'=>'add')); ?>"><i class="fa fa-user-plus"></i> Add User</a></li>
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