<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->
    <script type="text/javascript"> 
  var norecords   = parseInt(<?php echo $this->records['norecords']; ?>);
  var nocurp    = parseInt(<?php echo $this->records['nocurp']; ?>);
  var curp    = parseInt(<?php echo $this->records['curp']; ?>);
  var nopp    = parseInt(<?php echo $this->records['nopp']; ?>);
  var getDisable  = <?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>
</script>
<style type="text/css">
  .grey_box a:before{
    content:none;
    right: 105px !important;
  }
</style>
    <!-- start main sections -->
    <section class="main_section" id="profile_user">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Opinions & Debates Admin Area</h2>                
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
                            <a href="<?=vendor_app_util::url(array('ctl'=>'opinions_debates', 'act' => 'add')); ?>" class="f700 pull-right">Create a new opinions view</a></p>
                            <?php else:?>
                            <?php friends_controller::helpFriend($this->checkfriend); ?></p>
                            <?php endif;?>
                            <?php foreach($this->records['data'] as $key => $record) { ?>
                              <div class="row title-part title-part-<?php echo $record['id'];  if($key >= 1) echo " space30" ; if($record['owner_status'] == 0) echo " opacity4" ;?>">
                              <?php if($record['featured_image']){ ?>
                                <div class="col-sm-5">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>">
                                      <?php if (strpos($record['featured_image'], "http://books.google.com/books/") !== false) { ?>
                                        <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="opinions_debates-3" width=100%;>
                                      <?php } else { ?>
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'opinions_debates/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } ?>
                                    </a>
                                  </div>
                                </div>
                                <div class="col-sm-7">
                                <?php } else {  ?>
                                  <div class="col-sm-12">
                                <?php } ?>
                                  <h3 class="m0"><a href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3> 
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
                                  </p>
                                  <div class="txt_des">
                                    <?php if(strlen($record['description']) > 300)  echo substr($record['description'], 0, 300).'...'; else echo $record['description'] ; ?>
                                  </div>
                                  <div class="grey_box gray1">
                                     <span class="f400"><span href="#"><?=$record['number_like']?> Likes</span> <span class="hidden-xs">|</span> <span href="#"><?=$record['number_comment']?> Comment</span></span>
                                    <p href="#" class="pull-right">
                                       <?php if($this->isUserLogged):?>
                                        <a class="fsize14 color3c6db5 edit-btn" href="<?php echo RootURL."user/opinions-debates/edit/".$record['id'] ?>">Edit</a> <span class="color3c6db5">|</span> <a id="hide_<?php echo $record['id'] ?>" class="color3c6db5 hide-text" data="<?php echo $record['id'] ?>"><?php if($record['owner_status'] == 1) echo "Hide"; else echo "Unhide";?></a> <span class="color3c6db5">|</span> <button style="margin-right: 10px !important;float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteOpinionArticle">Delete</button> </span><span class="f700">
                                      <?php endif;?>
                                        <a href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>"><i class="fa fa-file-text-o" aria-hidden="true" style="color: #737374;"></i></span> Read More</a></p>
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
            <div class="row text-right">
            <?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
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
   rootUrl   = "<?=RootURL;?>";
</script>   
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>
<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });
  
  $('.dlt-text').click(function() {
    $(this).parents('.title-part').toggleClass('remove-line');        
  });

  $('.hide-text').click(function() {
    var ItemObjectID = $(this).attr('data');
    let that= this;
    $(this).text(function(i, text){
      $.ajax({
          type:"POST",
          url:rootUrl+'user/opinions_debates/changeOwnerStatus',
          data:{
              opinion_debate_article: ItemObjectID,
              owner_status: (text === "Hide" ) ? 0 : 1
          },
          success: function(res){
              var resObject = JSON.parse(res);
              if( resObject.status == 1) {
                if ( text === "Hide" ) {
                  $('.title-part-'+ItemObjectID).addClass('opacity4');
                  console.log('unhide', '#hide_'+ItemObjectID)
                  $(that).text("Unhide");
                } else {
                  $('.title-part-'+ItemObjectID).removeClass('opacity4');
                  console.log('hide', '#hide_'+ItemObjectID)

                  $(that).text("Hide");
                }
              } else {
                  confirm(resObject.message);
              }
          }
      });
    });
  });
</script>