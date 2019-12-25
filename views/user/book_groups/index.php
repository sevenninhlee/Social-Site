<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->
    <!-- start main sections -->
    <section class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Book Groups Admin Area</h2>                
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
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
                      </div>
                      <div class="tab-pane fade" id="blogs">
                                              
                      </div> 
                      <div class="tab-pane fade in active" id="book">
                        <div class="page1">
                          <div class="white_box">
                            <ul class="list-inline">
                                <li><h5>Book Group Organizer:</h5></li>
                                <li class="pull-right">
                                  <?php if($this->isUserLogged): ?>

                                  <a href="<?=vendor_app_util::url(array('ctl'=>'book-groups', 'act' => 'add')); ?>" class="f700" data-toggle="popover" data-placement="bottom" >Create  Book Group</a>
                                  <?php else: ?>
                                  <?php friends_controller::helpFriend($this->checkfriend); ?>
                                  <?php endif; ?>
                                </li>
                            </ul>
                            <div class="row book-group1">
                              <?php foreach ($this->getIsOrganizer['data'] as $key => $record) { ?>
                                <div class="col-md-6 col-sm-6 title-part title-part-<?php echo $record['id']; if($record['owner_status'] == 0) echo " opa6" ;?>">
                                  <div class="white_box white_bx">
                                    <div class="img-box">
                                      <a href="<?php echo RootURL."book-groups/review/". $record['slug'] ?>">
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important;" >
                                      </a>                 
                                    </div>
                                    <div class="img-desc">
                                      <h3 class="f700"><a href="<?php echo RootURL."book-groups/review/". $record['slug'] ?>" style="color: #333"><?php echo $record['title'];?></a></h3>
                                      <p>By: <span class="f400"><?php echo $record['users_firstname'].' '.$record['users_lastname'];?></span></p>
                                      <p>Category: <span class="f400"> 
                                      <?php 
                                        if($record['ListCate'] == null){
                                          echo '<span>Unkown category</span>';
                                        }else {
                                          $cat_str = "";
                                          foreach ($record['ListCate'] as $key => $value) {
                                            $cat_str.=$value['name']." | ";
                                          }
                                        $cat_str = rtrim($cat_str," | ");
                                        if(strlen($cat_str) > 25) echo '<span>'.substr($cat_str, 0, 25).'...</span>'; else  echo '<span>'.$cat_str.'</span>';
                                        }
                                      ?> 
                                    </span></p>
                                      <p>Users: <span class="f400"><?php echo $record['userNum'];?></span></p>
                                    </div>
                                    <div class="grey_box">
                                        <?php if($this->isUserLogged):?>
                                          <a class="fsize14 color3c6db5 edit-btn" href="<?php echo RootURL."user/book-groups/edit/".$record['id'] ?>">Edit</a>
                                          <a><span class="color3c6db5">| </span>
                                          <span class="fsize14 color3c6db5 hide-text padright20" id="hide_<?php echo $record['id'] ?>" alt="Organizer" data="<?php echo $record['id'] ?>"><?php if($record['owner_status'] == 1) echo "Hide"; else echo "Unhide";?></span>
                                        <?php else:?>
                                          <!-- <?php if (!$record['checkUser']): ?>
                                          <a href="#"><span class="padright20 danger-txt f400">Join</span></a>
                                          <?php endif;?> -->
                                        <?php endif;?>
                                          <a href="<?php echo RootURL."book-groups/review/".$record['slug']  ?>"><span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                    </div>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                            <ul class="list-inline">
                              <li><h5>Book Group Member:</h5></li>
                            </ul>
                            <div class="row">
                              <?php foreach ($this->getIsMember as $key => $record) { ?>
                                <div class="col-md-6 col-sm-6 title-part title-part-<?php echo $record['book_group_article_user_id']; if($record['book_group_owner_status'] == 0) echo " opa6" ;?>">
                                  <div class="white_box white_bx">
                                    <div class="img-box">
                                      <a href="<?php echo RootURL."book-groups/review/".$record['slug'] ?>">
                                      <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important;" >
                                      </a>               
                                    </div>
                                    <div class="img-desc">
                                      <h3 class="f700"><a href="<?php echo RootURL."book-groups/review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'];?></a></h3>
                                      <p>By: <span class="f400"><?php echo $record['firstname'].' '.$record['lastname'];?></span></p>
                                      <p>Category: <span class="f400"><?php echo $record['title'];?></span></p>
                                      <p>Users: <span class="f400"><?php echo $record['userNum'];?></span></p>
                                    </div>
                                    <div class="grey_box">
                                      <?php if($this->isUserLogged):?>
                                          <a>
                                            <span class="fsize14 color3c6db5 hide-text" id="hide_<?php echo $record['book_group_article_user_id'] ?>" alt="Member" data="<?php echo $record['book_group_article_user_id'] ?>"><?php if($record['book_group_owner_status'] == 1) echo "Hide"; else echo "Unhide";?></span>
                                            <span class="padright20 color3c6db5 fsize14 dlt-text leave_group" itemID="<?=$record['id']?>"> | Leave</span>
                                          </a>
                                        <?php else:?>
                                          <?php if (!$record['checkUser']): ?>
                                          <a href="#"><span class="padright20 danger-txt f400">Join</span></a>
                                          <?php endif;?>
                                        <?php endif;?>
                                          <a href="<?php echo RootURL."book-groups/review/".$record['slug'] ?>"><span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                    </div>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>              
                          </div>
                        </div>
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



    <!-- start footer -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>

<script type="text/javascript">
   $('a.back-to-top').click(function() {
     $('html, body').animate({
       scrollTop: 0
     }, 700);
     return false;
   });      
</script>

<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });

  $('.hide-text').click(function() {
    var ItemObjectID = $(this).attr('data');
    var nameGroup = $(this).attr('alt');
    $(this).text(function(i, text){
      $.ajax({
          type:"POST",
          url:rootUrl+'user/book_groups/changeOwnerStatus',
          data:{
              book_group_article: ItemObjectID,
              owner_status: (text === "Hide" ) ? 0 : 1,
              nameGroup: nameGroup
          },
          success: function(res){
              var resObject = JSON.parse(res);
              if( resObject.status == 1) {
                if ( text === "Hide" ) {
                  console.log('msg')
                  $('.title-part-'+ItemObjectID).addClass('opa6');
                  $('#hide_'+ItemObjectID).text("Unhide");
                } else {
                  $('.title-part-'+ItemObjectID).removeClass('opa6');
                  $('#hide_'+ItemObjectID).text("Hide");
                }
              } else {
                  confirm(resObject.message);
              }
          }
      });
      
    });
  });

  $('.leave_group').click(function() {
    var ItemObjectID = $(this).attr('itemID');
    var isDel = confirm("Are you sure to leave this group?");
    if(isDel) {
      $.ajax({
          type:"GET",
          url:rootUrl+'user/book_groups/leaveGroup',
          data:{
              book_group_article_id: ItemObjectID
          },
          success: function(res){
            var resObject = JSON.parse(res);
              if( resObject.status == 1) {
                window.location.reload();
              } else {
                  confirm(resObject.message);
              }
          }
      });
    }
  });
</script>
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>

  </body>
</html>