  <div class="header_menu">
    <div class="container">
      <div class="header-menu-flex">
        <div></div>
        <div class="logo">
          <h1 class="text-center logo" style="font-family:Great Vibes, cursive;"><a href="<?php echo RootURL . 'home' ?>">Enlight21</a></h1>
        </div>
        <ul class="header-menu-right menu-hide-mobile dropdown-notifi">
          <?php if (isset($_SESSION['user'])) { ?>
            <li><a href="<?php echo RootURL . "user/profile/index?user=" . $_SESSION['user']['id']; ?>"><?php if ($_SESSION['user']['show_name'] == 0) { echo $_SESSION['user']['firstname']; } else { echo $_SESSION['user']['username']; }  ?></a></li>
            <li><a href="<?php echo RootURL . "login/logout" ?>">Log out</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="label label-pill label-danger count" style="border-radius:10px;position: absolute; top: 4px; right: -3px;"></span>
                <span class="fa fa-bell" style="font-size:18px;"></span>
              </a>
              <ul class="dropdown-menu dropdown-notifi" style="right: 0; left: auto">
                <li style="padding: 0 5px;"><a href="#">Data not found</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li><a href="<?php echo RootURL . "login" ?>">Login</a></li>
            <li><a href="<?php echo RootURL . "register" ?>">Signup</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="menu_main_content menu-hide-mobile">
      <div class="container">
        <div class="row text-center nav-menu ">
          <ul class="text-center">
            <li><a href="<?php echo RootURL . 'home' ?>">Home</a></li>
            <li><a href="<?php echo RootURL . 'news' ?>">News</a></li>
            <li><a href="<?php echo RootURL . 'films' ?>">Films </a></li>
            <li><a href="<?php echo RootURL . 'books' ?>">Book</a></li>
            <li><a href="<?php echo RootURL . 'book-groups' ?>">Groups</a></li>
            <li><a href="<?php echo RootURL . 'blogs' ?>">Blogs</a></li>
            <li><a href="<?php echo RootURL . 'opinions-debates' ?>">Opinions</a></li>
            <li><a href="<?php echo RootURL . 'queries' ?>">Queries</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <header class="menu-collapse">
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
            <li><a href="<?php echo RootURL . 'home' ?>">Home</a></li>
            <li><a href="<?php echo RootURL . 'news' ?>">News</a></li>
            <li><a href="<?php echo RootURL . 'films' ?>">Films </a></li>
            <li><a href="<?php echo RootURL . 'books' ?>">Book</a></li>
            <li><a href="<?php echo RootURL . 'book-groups' ?>">Groups</a></li>
            <li><a href="<?php echo RootURL . 'blogs' ?>">Blogs</a></li>
            <li><a href="<?php echo RootURL . 'opinions-debates' ?>">Opinions</a></li>
            <li><a href="<?php echo RootURL . 'queries' ?>">Queries</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right dropdown-notifi">
            <?php if (isset($_SESSION['user'])) { ?>
              <li><a href="<?php echo RootURL . "user/profile/index?user=" . $_SESSION['user']['id']; ?>"><?php if ($_SESSION['user']['show_name'] == 0) { echo $_SESSION['user']['firstname']; } else { echo $_SESSION['user']['username']; } ?></a></li>
              <li><a href="<?php echo RootURL . "login/logout" ?>">Log out</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="label label-pill label-danger count" style="border-radius:10px;position: absolute; top: 4px; right: -3px;"></span>
                  <span class="fa fa-bell" style="font-size:18px;"></span>
                </a>
                <ul class="dropdown-menu dropdown-notifi" style="right: 0; left: auto;">
                  <li style="padding: 0 5px;"><a href="#">Data not found1</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="<?php echo RootURL . "login" ?>">Login</a></li>
              <li><a href="<?php echo RootURL . "register" ?>">Signup</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="tab-menu">
    <div class="container-fluid">
      <div class="row">