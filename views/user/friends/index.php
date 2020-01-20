<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->

    <!-- start main sections -->
    <section class="main_section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Friends</h2>                
              </div>
              <div class="col-sm-5 col-xs-5">
                <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
              </div>
            </div>            

            <div class="row space30">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <?php include_once 'views/layout/'.$this->layout.'top-bar.php'; ?>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="friend">         
                        <div class="white_box">

                          <!-- admin view admin -->
                          <?php if($this->isUserLogged && isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'] == $_SESSION['user']['id']):?>
                            <ul class="list-inline">
                              <li><h5><span class="NumFriend"><?=($this->records['numFriend'])?></span> - Approved Friends</h5></li>
                              <li class="pull-right"><button type="button" class="btn btn_review" data-toggle="modal" data-target="#myModal">Invite Friends</button></li>
                            </ul>
                          <!-- admin view other -->
                          <?php elseif($this->isUserLogged && isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'] != $_SESSION['user']['id']):?>
                            <ul class="list-inline">
                              <li><h5><?php if ($this->user['show_name'] == 0) { echo $this->user['firstname'].' '.$this->user['lastname']; } else { echo $this->user['username']; } ?>(s) friends (<?=count($this->records['data'])?>)</h5></li>
                              <li class="pull-right"><?php friends_controller::helpFriend($this->checkfriend); ?></li>
                            </ul>
                          <!-- no-login -->
                          <?php else:?>
                            <ul class="list-inline">
                              <li><h5><?php if ($this->user['show_name'] == 0) { echo $this->user['firstname'].' '.$this->user['lastname']; } else { echo $this->user['username']; } ?>(s) friends (<?=count($this->records['data'])?>)</h5></li>
                              <li class="pull-right"><a class="f700 create-btn">Search more</a></li>
                            </ul>
                          <?php endif;?>

                          <!-- admin view admin -->
                          <?php if($this->isUserLogged && isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'] == $_SESSION['user']['id']):?>
                              <?php if(!empty($this->records['data'])): ?>
                                    <ul class="list-inline book-list ListFriend">
                                    <?php foreach($this->records['data'] as $key => $record) { ?>
                                      <?php if( $record['approved'] == 1 ): ?>
                                          <li  style="max-width:148px" class="text-center <?php echo ($record['status_user_admin'] == 1)?"":"opa6";?>">
                                            <img src="<?php echo RootREL; ?>media/upload/users/<?php echo $record['user_avatar'] ?>"  style="max-width:140px">
                                            <a href="<?=vendor_app_util::url(array('ctl'=>'profile', 'act' => 'index?user='.$record['user_id_friend'])); ?>" class="text-center f700 space10 edit-btn"><?=$record['username']?></a><br/>
                                            <?php if($this->isUserLogged):?>
                                            <span><a href="<?=vendor_app_util::url(array('ctl'=>'profile', 'act' => 'index?user='.$record['user_id_friend'])); ?>">View</a> | <a class="hide-text FriendAction" act="<?php echo ($record['status_user_admin'] == 1)?"Hide":"Unhide";?>" user="<?=$record['user_id_friend']?>"><?php echo ($record['status_user_admin'] == 1)?"Hide":"Unhide";?></a> | <a class="dlt-text danger-txt FriendAction" act="unFriend" user="<?=$record['user_id_friend']?>"> Delete</a></span>
                                            <?php endif;?>
                                          </li>
                                      <?php endif;?>
                                    <?php } ?>
                                    </ul>
                              <?php else:?>
                                    <div class="row white_box">
                                      <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
                                    </div>
                              <?php endif;?>
                          <!-- admin view other -->
                          <?php elseif($this->isUserLogged && isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'] != $_SESSION['user']['id']):?>
                                <?php if(!empty($this->records['data'])): ?>
                                      <ul class="list-inline book-list">
                                      <?php foreach($this->records['data'] as $key => $record) { ?>

                                          <?php if( $record['approved'] == 1 && $record['status_user'] == 1 && $record['status_user_friend'] == 1 ): ?>
                                              <li  style="max-width:148px" class="text-center">
                                                <img src="<?php echo RootREL; ?>media/upload/users/<?php echo $record['user_avatar'] ?>"  style="max-width:140px">
                                                <a href="<?=vendor_app_util::url(array('ctl'=>'profile', 'act' => 'index?user='.$record['user_id_friend'])); ?>" class="text-center f700 space10 edit-btn"><?=$record['username']?></a><br/>
                                              </li>
                                          <?php endif;?>
                                      <?php } ?>
                                      </ul>
                                <?php else:?>
                                  <div class="row white_box">
                                    <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
                                  </div>
                                <?php endif;?>
                          <!-- no-login -->
                          <?php else:?>
                                <?php if(!empty($this->records['data'])): ?>
                                      <ul class="list-inline book-list">
                                      <?php foreach($this->records['data'] as $key => $record) { ?>

                                          <?php if($record['approved'] == 1 && $record['status_user'] == 1 && $record['status_user_friend'] == 1 ): ?>
                                              <li  style="max-width:148px" class="text-center">
                                                <img src="<?php echo RootREL; ?>media/upload/users/<?php echo $record['user_avatar'] ?>"  style="max-width:140px">
                                                <a href="<?=vendor_app_util::url(array('ctl'=>'profile', 'act' => 'index?user='.$record['user_id_friend'])); ?>" class="text-center f700 space10 edit-btn"><?=$record['username']?></a><br/>
                                              </li>
                                          <?php endif;?>

                                      <?php } ?>
                                      </ul>
                                <?php else:?>
                                      <div class="row white_box">
                                        <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
                                      </div>
                                <?php endif;?>

                          <?php endif;?>

                          <!-- admin view admin -->
                          <?php if($this->isUserLogged && isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'] == $_SESSION['user']['id']):?>

                            <ul class="list-inline space30">
                              <li><h5><span class="NumApprove"><?=$this->records['numNotApprove']?></span> - Pending Friends Requests</h5></li>
                            </ul>

                            <?php if(!empty($this->records['data'])): ?>
                            
                                  <ul class="list-inline book-list">
                                  <?php foreach($this->records['data'] as $key => $record) { ?>
                                      <?php if( $record['approved'] == 0 && ($record['user_id'] != $_SESSION['user']['id'])): ?>
                                          <li  style="max-width:148px" class="text-center <?php echo ($record['status_user_admin'] == 1)?"":"opa6";?>">
                                            <img src="<?php echo RootREL; ?>media/upload/users/<?php echo $record['user_avatar'] ?>"  style="max-width:140px">
                                            <a href="<?=vendor_app_util::url(array('ctl'=>'profile', 'act' => 'index?user='.$record['user_id_friend'])); ?>" class="text-center f700 space10 edit-btn"><?=$record['username']?></a><br/>
                                            <?php if($this->isUserLogged):?>
                                            <span><a class="FriendAction" href="javascript:void(0);" act="approve" user="<?=$record['user_id_friend']?>">Approve</a> | <a class="dlt-text danger-txt FriendAction" act="unFriend" user="<?=$record['user_id_friend']?>" key='approve'> Delete</a></span>
                                            <?php endif;?>
                                          </li>
                                      <?php endif;?>
                                  <?php } ?>
                                  </ul>
                            <?php else:?>
                                  <div class="row white_box">
                                    <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
                                  </div>
                            <?php endif;?>
                          <?php endif;?>
                        </div>

                      </div>
                      
                      <div class="tab-pane fade" id="blogs">
                        
                      </div> 
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade" id="bookshelf">
                       
                      </div>  
                      <div class="tab-pane fade" id="friends">
                        
                      </div>                            
                    </div>
                  </div>
                </div> 
                
              </div>
            </div>            
    			</div>
          <?php include_once 'views/layout/'.$this->layout.'right-bar.php'; ?>
    		</div>
    	</div>
    </section>

    <!-- End main sections -->

    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form >
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter the email you want to invite" required>
              <small id="emailHelp" class="form-text text-success"></small>
              <small id="errorInvite" class="form-text text-danger"></small>
            </div>
            <button type="button" id="sb_invite" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal error -->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModalSearchErrData">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" style="overflow: hidden;">
          <h4 style="margin-bottom: 25px">Invited successfully!</h4>
          <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>



    <!-- start footer -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script type="text/javascript">
  var rootUrl   = "<?=RootURL;?>";
</script>   
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>
<script src="<?php echo RootREL; ?>media/js/profile.js"></script>
<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });
</script>