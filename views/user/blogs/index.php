<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->
    <script type="text/javascript">	
	var norecords 	= parseInt(<?php echo $this->records['norecords']; ?>);
	var nocurp 		= parseInt(<?php echo $this->records['nocurp']; ?>);
	var curp 		= parseInt(<?php echo $this->records['curp']; ?>);
	var nopp 		= parseInt(<?php echo $this->records['nopp']; ?>);
	var getDisable  = <?=(isset($app['prs']['status']) && ($app['prs']['status']==='0'))? 1:0;?>
</script>
    <!-- start main sections -->
    <section class="main_section" id="profile_user">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Blogs</h2>                
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
                      <div class="tab-pane fade in active" id="blogs">
                        <div class="page1">
                          <div class="white_box">
                            <?php if($this->isUserLogged):?>
                              <a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'add')); ?>" class="f700 pull-right">Create a new Blog</a>
                              <?php endif;if (!$this->isUserLogged):?>  
                              <?php friends_controller::helpFriend($this->checkfriend); ?>
                            <?php endif;?>

                            <?php foreach($this->records['data'] as $key => $record) { ?>
                              <?php if( ($record['owner_status'] == 0 && $record['user_id'] != $_SESSION['user']['id']) || ($record['owner_status'] == 0 && !$this->isUserLogged)) {} else { ?>
                              <div class="row title-part space30 title-part-<?php echo $record['id'];  if($key >= 1) echo " space30" ; if($record['owner_status'] == 0) echo " opacity4" ;?>">
                              <?php if($record['featured_image']){ ?>
                                <div class="col-sm-5">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."blogs/".$record['slug'] ?>" style="color: #333"><img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'blogs/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="blog-3"></a>
                                  </div>
                                </div>
                                <div class="col-sm-7">
                                <?php } else {  ?>
                                  <div class="col-sm-12">
                                <?php } ?>

                                  <h3><a href="<?php echo RootURL."blogs/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                  <p class="cate_txt"> 
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
                                  | <span>Author: </span><a href="<?php echo (vendor_app_util::url(["ctl"=>"profile", "act"=>"index?user=".$record['user_id']])) ?>"><?= $record['username'] ?></a>
                                 
                                </p>
                                  <div class="txt_des"><?php if(strlen($record['short_description']) > 300)  echo substr($record['short_description'], 0, 300).'...'; else echo $record['short_description'] ; ?></div>
                                  <div class="grey_box gray1">
                                    <?php if($this->isUserLogged):?>
                                      <span class="f400"><a href="<?=vendor_app_util::url(array('ctl'=>'blogs', 'act' => 'edit/'.$record['id'])); ?>" class="color3c6db5 edit-btn">Edit</a> 
                                      <span class="hidden-xs">|</span> <a id="hide_<?php echo $record['id'] ?>" class="color3c6db5 hide-text" data="<?php echo $record['id'] ?>"><?php if($record['featured_my_blog'] == 0) echo "Private"; else echo "Public";?></a> 
                                      <span class="hidden-xs">|</span> <button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="delItem<?php echo $record['id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['id']; ?>,deleteBlogArticle">Delete</button> </span>
                                      <?php endif;?>
                                      <a href="<?php echo RootURL."blogs/".$record['slug'] ?>" class="pull-right"> <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>
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
            <div class="text-right">
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
          url:rootUrl+'user/blogs/changeFeaturedMyBlog',
          data:{
              blog_article: ItemObjectID,
              featured_my_blog: (text === "Private" ) ? 1 : 0
          },
          success: function(res){
              var resObject = JSON.parse(res);
              if( resObject.status == 1) {
                if ( text === "Private" ) {
                  // $('.title-part-'+ItemObjectID).addClass('opacity4');
                  $(that).text("Public");
                } else {
                  // $('.title-part-'+ItemObjectID).removeClass('opacity4');
                  $(that).text("Private");
                }
              } else {
                  confirm(resObject.message);
              }
          }
      });
      
    });
  });
</script>