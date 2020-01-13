 <header>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo RootURL.'home'?>">Home</a></li>
            <li><a href="<?php echo RootURL.'news'?>">News</a></li>
            <li><a href="<?php echo RootURL.'films'?>">Films </a></li>
            <li><a href="<?php echo RootURL.'books'?>">Book</a></li>
            <li><a href="<?php echo RootURL.'book_groups'?>">Groups</a></li>
            <li><a href="<?php echo RootURL.'blogs'?>">Blogs</a></li>
            <li><a href="<?php echo RootURL.'opinions_debates'?>">Opinions</a></li>
            <li><a href="<?php echo RootURL.'queries'?>">Queries</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right dropdown-notifi">
            <li><a href="#"><?=$_SESSION['user']['firstname']?></a></li>
            <li><a href="<?php echo vendor_app_util::url(['ctl'=>'login','act'=>'logout']); ?>">Log out</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="label label-pill label-danger count" style="border-radius:10px;position: absolute; top: 4px; right: -3px;"></span>
                <span class="fa fa-bell" style="font-size:18px;"></span>
              </a>
                <ul class="dropdown-notifi dropdown-menu">
                  <li style="padding: 0 5px;"><a href="#">Data not found</a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="tab-menu">
    <div class="container-fluid">
      <div class="row" style="background-color: #272d33;">