<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; global $app;?>
    <!-- End header -->

    <!-- start main sections -->
    <section class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Profile Admin Area</h2>                
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
                      <div class="tab-pane fade in active" id="profile" value="<?=$this->user['id']?>">
                        <div class="page1">
                          <div class="white_box">                                          
                            <div class="media heightclass">
                              <div class="media-left">
                                <img style='max-width:200px;height:auto;' src="<?php echo UploadURI.'users/'.$this->user['avata']; ?>">
                              </div>
                              <div class="media-right width100">
                                <ul class="list-unstyled edit-list">
                                <?php if($this->isLogged){ ?>

                                  <li><span class="f700 title-part">First Name:</span><span class="deatil-part edit-firstname"><?=$this->user['firstname']?></span><a href="javascript:void(0)" class='Edit' act='firstname' value='<?=$this->user['firstname']?>'><?='Edit'?></a></li>

                                  <li><span class="f700 title-part">Last Name:</span><span class="deatil-part edit-lastname"><?=$this->user['lastname']?></span><a href="javascript:void(0)" class='Edit' act='lastname' value='<?=$this->user['lastname']?>'><?='Edit'?></a></li>
                                 
                                  <li><span class="f700 title-part">Username:</span><span class="deatil-part edit-username"><?=$this->user['username']?></span><a href="javascript:void(0)" class='Edit' act='username' value='<?=$this->user['username']?>'><?='Edit'?></a></li>

                                  <li>
                                    <div >
                                      <div class="row">
                                        <div class="col-sm-3" style="padding: 3px 15px 0;">
                                          <label class="f700 title-part">Show Name:</label>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="radio radio-info radio-inline radio-show-name">
                                              <input type="radio" id="showName1" value="0" name="show_name" <?= ($this->user['show_name'] == 0) ? 'checked' : '' ?> >
                                              <label for="showName1"> First Name, Last Name </label>
                                          </div>
                                          <div class="radio radio-inline radio-show-name">
                                              <input type="radio" id="showName2" value="1" name="show_name" <?= ($this->user['show_name'] == 1) ? 'checked' : '' ?>>
                                              <label for="showName2"> Username </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </li>

                                  <li><span class="f700 title-part">Gender:</span><span class="deatil-part edit-gender"><?=$app['gender'][$this->user['gender']]?></span><a href="javascript:void(0)" class='Edit' act='gender' value='<?=$this->user['gender']?>'><?='Edit'?></a></li>

                                  <li><span class="f700 title-part">Country:</span><span class="deatil-part edit-country"><?=$this->user['country']?></span><a href="javascript:void(0)" class='Edit' act='country' value='<?=$this->user['country']?>'><?='Edit'?></a></li>

                                <?php }else{ ?>
                                  <li>
                                    <span class="f700 title-part"><?php  echo vendor_html_helper::showUserName($this->user) ?></span>
                                    <span class="deatil-part"></span><?php friends_controller::helpFriend($this->checkfriend); ?>
                                  </li>
                                  <li>
                                    <span class="f700 title-part">Details:</span>
                                    <span class="deatil-part"><?=$app['gender'][$this->user['gender']].', '.$this->user['country'] ?></span>
                                  </li>

                                <?php } ?>
                                  <li><span class="f700 title-part">Website:</span><span class="deatil-part edit-website"><?=$this->user['website']?></span><a href="javascript:void(0)"  class='Edit' act='website' value='<?=$this->user['website']?>'><?=($this->isLogged)?'Edit':''?></a></li>
                                  <li class="Add_box pad0">
                                  <?php if($this->isLogged){ ?>
                                    <div class="row">
                                      <div class="col-sm-3" style="padding: 6px 15px 0;">
                                        <label>Featured image:</label>
                                      </div>
                                      <div class="col-sm-7">
                                        <div class="input-group">
                                          <input style='padding-top:5px' type="file" class="form-control user-avata-name" name="user[avata]">
                                          <span class="input-group-addon"> <label class='Edit-avata'> Upload</label> </span>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  </li>

                                  <li><span class="space10 f700 title-part">Interest:</span><span class="deatil-part edit-interest"><?=$this->user['interest']?></span><a href="javascript:void(0)" class='Edit' act='interest' value='<?=$this->user['interest']?>'><?php if($this->isLogged){ echo 'Edit';}?></a></li>

                                  <li> 
                                    <span class="f700 title-part">Favorite Book:<?php if(isset($this->book_favorites))foreach($this->book_favorites as $item){ echo '<br />';}?></span>
                                    <span style="margin-left:-6px;" class="deatil-part"><?php if(isset($this->book_favorites))foreach($this->book_favorites as $item){ echo   "<a href='".vendor_app_util::url(array('ctl'=>'../books/'.$item['slug']))."'>".(strlen($item['title'])>30?substr($item['title'],0,30).'...':$item['title']).'</a><br />';}?></span>
                                    <a style="margin-left:-2px;"  href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'index')); ?>" act='favorite_book' value='<?=$this->user['favorite_book']?>'><?php if($this->isLogged){ echo 'Edit';}?></a>
                                  </li>

                                  <li><span class=" f700 title-part">My Latest Blog:</span><span class="deatil-part edit-latest-blog"><?=(isset($this->latest_blog))?$this->latest_blog:'None'?></span><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'index')); ?>"  act='latest-blog' value='<?=(isset($this->user['latest_blog']))?$this->user['latest_blog']:'None'?>'><?php if($this->isLogged){ echo 'Edit';}?></a></li>

                                </ul>
                              </div>
                            </div>
                            <div class="row edit-sec">
                              <div class="col-md-4 col-sm-4">
                                <p>My Book Reviews: <a href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'index')); ?>"><?php if($this->isLogged){ echo 'Edit';}?></a></p>
                                <p class="f400">
                                  <?php if(isset($this->book_reviews))foreach($this->book_reviews as $item){
                                    echo "<a style='padding-left:0' href='".vendor_app_util::url(array('ctl'=>'../books/'.$item['slug']))."'>".(strlen($item['title'])>30?substr($item['title'],0,30).'...':$item['title']).'</a><br />';
                                  }?>
                                  
                                </p>
                              </div>
                              <div class="col-md-4 col-sm-4">
                                <p>Recommended reads: <a href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'index')); ?>"><?php if($this->isLogged){ echo 'Edit';}?></a></p>
                                <p class="f400">
                                  <?php if(isset($this->book_recommendeds))foreach($this->book_recommendeds as $item){
                                    echo "<a style='padding-left:0' href='".vendor_app_util::url(array('ctl'=>'../books/'.$item['slug']))."'>".(strlen($item['title'])>30?substr($item['title'],0,30).'...':$item['title']).'</a><br />';
                                  }?>
                                  <!-- 10 Day’s in paradise <br>This is the best shark <br>Trip to El Dorado -->
                                </p>
                              </div>
                              <div class="col-md-4 col-sm-4">
                                <p>My Current Reads: <a href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'index')); ?>"><?php if($this->isLogged){ echo 'Edit';}?></a></p>
                                <p class="f400">
                                  <?php if(isset($this->book_currents))foreach($this->book_currents as $item){
                                    echo "<a style='padding-left:0' href='".vendor_app_util::url(array('ctl'=>'../books/'.$item['slug']))."'>".(strlen($item['title'])>30?substr($item['title'],0,30).'...':$item['title']).'</a><br />';
                                  }?>
                                  <!-- 10 Day’s in paradise <br>This is the best shark <br>Trip to El Dorado -->
                                </p>
                              </div>
                            </div>

                            <h5 >Bulletin <a href="<?=vendor_app_util::url(array('ctl'=>'bulletins', 'act' => 'index')); ?>" class='Edit' act='bulletin' value='<?=$this->user['bulletin']?>'><?php if($this->isLogged){ echo 'Edit';}?></a></h5>    
                            <p class="f400  edit-bulletin"><?=isset($this->bulletin)?$this->bulletin:'None'?></p>

                            <?php if($this->isLogged){?>
                            <h5 class="space30">Notify me when:</h5>
                            <form class="radio-form" action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"profile", "act"=>"index"]) ?>" method="post" enctype="multipart/form-data">                
                              <div class="row">
                                <div class="col-md-8" style="padding: 0 25px; font-size: 15px;">
                                  <?php foreach ($app['notify_actions'] as $key => $notify) { 
                                    if(!empty($this->notiActions)) {
                                      foreach ($this->notiActions as $value) {
                                        if((int)$key == (int)$value['action']) { ?>
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-7">
                                                <label><?= $notify['value'] ?></label>
                                              </div>
                                              <div class="col-sm-5">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="inlineRadio<?= $key ?>" value="1" name="action[<?= $key ?>]" <?= ($value['status'] == 1) ? 'checked' : '' ?> >
                                                    <label for="inlineRadio<?= $key ?>"> Yes </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="inlineRadio<?= $key+10 ?>" value="0" name="action[<?= $key ?>]" <?= ($value['status'] == 0) ? 'checked' : '' ?>>
                                                    <label for="inlineRadio<?= $key+10 ?>"> No </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                  <?php 
                                        }
                                      }
                                    } else { ?>
                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-7">
                                            <label><?= $notify['value'] ?></label>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio<?= $key ?>" value="1" name="action[<?= $key ?>]" <?= ($notify['status'] == 1) ? 'checked' : '' ?>>
                                                <label for="inlineRadio<?= $key ?>"> Yes </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="inlineRadio<?= $key+10 ?>" value="0" name="action[<?= $key ?>]" <?= ($notify['status'] == 0) ? 'checked' : '' ?> >
                                                <label for="inlineRadio<?= $key+10 ?>"> No </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  <?php }} ?>
                                </div>
                              </div>
                              <h5 class="space30">Email me when:</h5>

                              <div class="row">
                                <div class="col-md-8" style="padding: 0 25px; font-size: 15px;">
                                  <?php foreach ($app['email_actions'] as $key => $email) { 
                                    if(!empty($this->emailActions)) {
                                      foreach ($this->emailActions as $value) {
                                        if((int)$key == (int)$value['action']) { ?>
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-7">
                                                <label><?= $email['value'] ?></label>
                                              </div>
                                              <div class="col-sm-5">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="inlineRadio<?= $key ?>" value="1" name="action[<?= $key ?>]" <?= ($value['status'] == 1) ? 'checked' : '' ?> >
                                                    <label for="inlineRadio<?= $key ?>"> Yes </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="inlineRadio<?= $key+10 ?>" value="0" name="action[<?= $key ?>]" <?= ($value['status'] == 0) ? 'checked' : '' ?>>
                                                    <label for="inlineRadio<?= $key+10 ?>"> No </label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                  <?php 
                                        }
                                      }
                                    } else { 
                                      ?>
                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-sm-7">
                                            <label><?= $email['value'] ?></label>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio<?= $key ?>" value="1" name="action[<?= $key ?>]" <?= ($email['status'] == 1) ? 'checked' : '' ?>>
                                                <label for="inlineRadio<?= $key ?>"> Yes </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="inlineRadio<?= $key+10 ?>" value="0" name="action[<?= $key ?>]" <?= ($email['status'] == 0) ? 'checked' : '' ?> >
                                                <label for="inlineRadio<?= $key+10 ?>"> No </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  <?php }} ?>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group text-right space100">
                                    <button type="button" class="btn btn_review" id="invite" data-toggle="modal" data-target="#myModal">Invite Friends</button>
                                    <button class="btn btn_review btn-sub1 btn-save1" name="btn_save_submit" type="submit">Save</button>
                                  </div>                  
                                </div>
                              </div>
                            </form>  
                            <?php } ?>

                          </div>
                        </div>                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
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
      </div>
    </section>

    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form >
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter and submit just one email at a time." required>
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
    <!-- End main sections -->



    <!-- start footer -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script type="text/javascript">
  var rootUrl   = "<?=RootURL;?>";

  
  // $(".radio-show-name").on("click", function () {
  //   let show_name = $('input:radio[name=show_name]:checked').val();
  //   console.log("show_name", show_name);
  // });

  changeShowName = (value) => {
    $.ajax({
          url: rootUrl+"user/profile/changeShowName",
          data: {
              status: value
          },
          type: "POST",
          success: function (data) {
             
          },
          error: function (err) {
              alert('Error');
          }
      })
  }

  $("#showName1").on("click", function () {
      let show_name = $('input:radio[name=show_name]:checked').val();
      changeShowName(show_name);
  });

  $("#showName2").on("click", function () {
      let show_name = $('input:radio[name=show_name]:checked').val();
      changeShowName(show_name);
  });


</script>   
<script src="<?php echo RootREL; ?>media/js/profile.js"></script>
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>
