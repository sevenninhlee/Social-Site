<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->

    <!-- start main sections -->
    <section class="main_section" id="profile_user">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Book Reviews Admin Area</h2>                
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
                            <a href="<?=vendor_app_util::url(array('ctl'=>'books', 'act' => 'add')); ?>" class="f700 pull-right">Create a new Book view</a></p>
                            <?php else:?>
                            <?php friends_controller::helpFriend($this->checkfriend); ?></p>
                            <?php endif;?>
                            <?php foreach($this->records['data'] as $key => $record) { ?>
                              <div class="row title-part title-part-<?php echo $record['id'];  if($key >= 1) echo " space30" ; if($record['owner_status'] == 0) echo " opacity4" ;?>">
                                <div class="col-sm-3">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>">
                                      <?php if (strpos($record['featured_image'], "http://books.google.com/books/") !== false) { ?>
                                        <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } else { ?>
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } ?>
                                    </a>
                                  </div>
                                </div>
                                <div class="col-sm-9">
                                  <p class="cate_txt">
                                   <span>Category:</span>
                                      <a>
                                      <?php 
                                        if($record['ListCate'] == null){
                                          echo 'Unkown category';
                                        }else {
                                          $cat_str = "";
                                          foreach ($record['ListCate'] as $key => $value) {
                                            $cat_str.=$value['name']." | ";
                                          }
                                          echo rtrim($cat_str," | ");
                                        }
                                      ?>
                                      </a>
                                  | <span>Author: </span><?php echo $record['author'] ?>
          
                                  <h3><a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                  <p><?php if(strlen($record['description']) > 300)  echo substr($record['description'], 0, 300).'...'; else echo $record['description'] ; ?></p>

                                  <div class="grey_box gray1">
                                    <?php if($this->isUserLogged):?>
                                    <span class="f400"><a href="<?=vendor_app_util::url(array('ctl'=>'books', 'act' => 'edit/'.$record['id'])); ?>" class="color3c6db5 edit-btn">Edit</a> 
                                    <span class="hidden-xs">|</span> <a id="hide_<?php echo $record['id'] ?>" class="color3c6db5 hide-text" data="<?php echo $record['id'] ?>"><?php if($record['owner_status'] == 1) echo "Hide"; else echo "Unhide";?></a> 
                                    <span class="hidden-xs">|</span> <button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteBookArticle">Delete</button> </span>
                                    <?php endif;?>
                                    <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" class="pull-right"> <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>                        
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
          url:rootUrl+'user/books/changeOwnerStatus',
          data:{
              book_article: ItemObjectID,
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