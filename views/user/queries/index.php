<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->

    <!-- start main sections -->
    <section class="main_section" id="profile_user">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Queries Admin Area</h2>                
              </div>
              <div class="col-sm-5 col-xs-5">
                <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
              </div>
            </div>            
            <div class="row space30 user-profile">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <?php include_once 'views/layout/'.$this->layout.'top-bar.php'; ?>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
                      </div>
                      <div class="tab-pane fade in active" id="blogs">
                        <div class="page1">
                          <div class="white_box">

                            <?php if($this->isUserLogged):?>
                            <a href="<?=vendor_app_util::url(array('ctl'=>'queries', 'act' => 'add')); ?>" class="f700 pull-right">Create a new Queries view</a></p>
                            <?php else:?>
                            <?php friends_controller::helpFriend($this->checkfriend); ?></p>
                            <?php endif;?>
                            <?php foreach($this->records['data'] as $key => $record) { ?>
                              <div class="row title-part title-part-<?php echo $record['id'];  if($key >= 1) echo " space30" ; if($record['owner_status'] == 0) echo " opacity4" ;?>">
                              <?php if($record['featured_image']){ ?>
                                <div class="col-sm-3">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."queries/view/".$record['slug'] ?>">
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'queries/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="queries-3" width=100%;>
                                    </a>
                                  </div>
                                </div>
                                <div class="col-sm-9">
                                <?php } else {  ?>
                                  <div class="col-sm-12">
                                <?php } ?>
                                  <h3 ><span class="f700">Question:</span><a href="<?php echo RootURL."queries/view/".$record['slug'] ?>"><span class="f400"><?php echo $record['title'] ?> </a> </span></h3>
                                  <p class="cate_txt space5">
                                  <span>Category:</span>
                                  <?php 
                                      if($record['ListCate'] == null){
                                        echo '<a>Unkown category</a>';
                                      }else {
                                        $cat_str = "";
                                        foreach ($record['ListCate'] as $key => $value) {
                                          $cat_str.=$value['name']." | ";
                                        }
                                        echo "<a>".rtrim($cat_str," | ")."</a>";
                                      }
                                  ?>
                                  | <span>Asked By:</span><?php echo $_SESSION['user']['firstname'] ?></p>
                                  <div class="txt_des"><?php if(strlen($record['description']) > 300)  echo substr($record['description'], 0, 300).'...'; else echo $record['description'] ; ?></div>

                                  <div class="grey_box gray1">
                                      <span class="f400">
                                        <span ><?php echo $record['getTotalAll']['total_likes']; ?> Likes</span> 
                                        <span class="hidden-xs">|</span> 
                                        <span ><?php echo $record['getTotalAll']['total_reviews']; ?> Answers</span>
                                      </span> 
                                      <div class="pull-right"> 
                                          <?php if($this->isUserLogged):?>
                                        <span style="margin-right: 20px;" class="f400"><a href="<?=vendor_app_util::url(array('ctl'=>'queries', 'act' => 'edit/'.$record['id'])); ?>" class="color3c6db5 edit-btn">Edit</a> 
                                        <span class="hidden-xs">|</span> <a id="hide_<?php echo $record['id'] ?>" class="color3c6db5 hide-text" data="<?php echo $record['id'] ?>"><?php if($record['owner_status'] == 1) echo "Hide"; else echo "Unhide";?></a> 
                                        <span class="hidden-xs">|</span> <button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteQueriesArticle">Delete</button> </span>
                                        <?php endif;?>
                                        <a href="<?php echo RootURL."queries/view/".$record['slug'] ?>" class="pull-right"> <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>                        
                      </div> 
                      <div class="tab-pane fade" id="queries">
                        
                      </div>
                      <div class="tab-pane fade" id="querieshelf">
                        
                      </div>  
                      <div class="tab-pane fade" id="friends">
                        
                      </div>                            
                    </div>
                  </div>
                </div> 
                
              </div>
            </div>
            <div class="row">
              <nav aria-label="Page navigation" class="pagi_nation">
                <?php html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
              </nav>
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
  var rootUrl   = "<?=RootURL;?>";
</script>   
<script src="<?php echo RootREL; ?>media/js/profile.js"></script>
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>

<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });
  
  $('.dlt-text').click(function() {
    $(this).parents('.title-part').toggleClass('remove-line');        
  });

  $('.hide-text').click(function() {
    // $(this).parents('.title-part').toggleClass('opacity4');
    var ItemObjectID = $(this).attr('data');
    $(this).text(function(i, text){
      // return text === "Hide" ? "Unhide" : "Hide";
      $.ajax({
          type:"POST",
          url:rootUrl+'user/queries/changeOwnerStatus',
          data:{
              queries_article: ItemObjectID,
              owner_status: (text === "Hide" ) ? 0 : 1
          },
          success: function(res){
              var resObject = JSON.parse(res);
              if( resObject.status == 1) {
                if ( text === "Hide" ) {
                  $('.title-part-'+ItemObjectID).addClass('opacity4');
                  $('#hide_'+ItemObjectID).text("Unhide");
                } else {
                  $('.title-part-'+ItemObjectID).removeClass('opacity4');
                  $('#hide_'+ItemObjectID).text("Hide");
                }
              } else {
                  confirm(resObject.message);
              }
          }
      });
      
    });
  });
</script>