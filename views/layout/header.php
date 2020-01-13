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
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo vendor_app_util::url(['ctl'=>'login','act'=>'logout']); ?>" >Sign out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section class="tab-menu">
      <div class="container-fluid">
        <div class="row" style="background-color: #272d33;">