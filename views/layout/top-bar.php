<div class="panel-heading">
    <ul class="nav nav-tabs">
        
        <li class="<?=($app['ctl']=='profile' && $app['act'] == 'index')? 'active':'';?>"><a href="<?php  echo RootURL."user/profile/index?user=".((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id']); ?>">Profile</a></li>
        
        <li class="<?=($app['ctl']=='bulletins' && $app['act'] == 'index')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'bulletins', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id']) ]); ?>">Bulletin</a></li>
        
        <li class="<?=($app['ctl']=='blogs' && $app['act'] == 'index')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'blogs', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] )]); ?>">Blogs</a></li>
        
        <li class="<?=($app['ctl']=='book_groups' && $app['area'] == 'user')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'book-groups?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] )]); ?>">Book Groups</a></li> 
        
        <li class="<?=($app['ctl']=='bookshelf_book')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'bookshelf_book?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] )]); ?>">Bookshelf & Book Reviews</a></li> 
        
        <li class="<?=($app['ctl']=='friends' && $app['act'] == 'index')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'friends', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] )]); ?>">Friends</a></li>
        
        <li class="<?=($app['ctl']=='books' && $app['act'] == 'index' && $app['area'] == 'user')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'books', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] ) ]); ?>">Books</a></li>

        <li class="<?=($app['ctl']=='queries' && $app['act'] == 'index' && $app['area'] == 'user')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'queries', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] ) ]); ?>">Queries</a></li>  
       
       <li class="<?=($app['ctl']=='opinions_debates' && $app['act'] == 'index' && $app['area'] == 'user')? 'active':'';?>"><a href="<?php echo vendor_app_util::url(['area' => 'user','ctl'=>'opinions-debates', 'act' => 'index?user='.((isset($_GET['user']))?$_GET['user']: $_SESSION['user']['id'] ) ]); ?>">Opinions</a></li>  

    </ul>
</div>