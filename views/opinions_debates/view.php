<?php 
  include_once 'views/layout/outside/'.$this->layout.'headerOutside.php';
?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
          <h2 class="f700"><?= ($this->record['title']) ?></h2>
            <div class="white_box">

            <p class="cate_txt"> <span>Author:</span> <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$this->record['user_id']])) ?>"><?= ($this->record['username']) ?></a>  |  
                <span>Category:
                </span> 
                <?php 
                      if($this->category == null){
                        echo '<span>Unkown category</span>';
                      }else {
                        $cat_str = "";
                        foreach ($this->category as $key => $value) {
                          $cat_str.=$value['name']." | ";
                        }
                        echo '<span>'.rtrim($cat_str," | ").'</span>';
                      }
                    ?>
                |  <span>Date:</span> <?php vendor_app_util::formatDate($this->record['created']); ?></p> 

              <?php if($this->record['featured_image']){ ?>
                 <?php if (strpos($this->record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                        <img src="<?php echo $this->record['featured_image']?>" class="img-responsive" width=150; height=200;>
                      <?php } else { ?>
                        <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['featured_image']) ? 'opinions_debates/'.$this->record['featured_image'] : "no_picture.png" ?>" class="img-responsive" width=150; height=200;>
                        <?php } ?> 
              <?php } ?>
                <div class="space30"></div>
              <p><?= ($this->record['description']) ?></p>


              <div class="about_box">
                <div class="media">
                  <div class="col-md-3">
                    <div class="row pull-left">
                      <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['user_avatar']) ? 'users/'.$this->record['user_avatar'] : "no_picture.png" ?>" style="width:100px;height:100px;" class="img-responsive center-block" alt="about-author">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="row media-body">
                      <div class="bio_txt">
                        <p class="profile_txt"><span>About: <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$this->record['user_id']])) ?>"><?= ($this->record['username']) ?></a></span></p>
                        <p><?= ($this->record['user_bulletin']) ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>



            <div class="white_box2 space30">
              <h3>SHARE THIS NEW</h3>
              <a class="btn btn_fb" type="button">Facebook</a>
              <a class="btn btn_tweet" type="button">Twitter</a>
              <a class="btn btn_google" type="button">Google+</a>
            </div>
            <div class="white_box space30 commnet_css_ct">
              <h5>Comment:</h5>
              <?php if(isset($this->records['data']) && count($this->records['data'])>0){ ?>
              <hr class="hidden_size_0">
              <?php }?>
              <div class="reviewRating">
               <?php foreach ($this->records['data'] as $review) {  ?>
                <div class="media heightclass">
                <div class="media-left">
                  <img src="<?php echo RootREL; ?>media/upload/<?= ($review['users_avata']) ? 'users/'.$review['users_avata'] : "no_picture.png" ?>" width=150; height=150;>
                </div>
                <div class="media-right" style="width:100%;"> 
                  <h5 style="display: inline-block;width:100%;">
                      <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$review['users_id']])) ?>" style="font-weight: 700;margin-right: 10px;font-size: 20px; float: left;"><?= $review['users_firstname'] ?></a>
                      <span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($review['created']));?> </span>
                  </h5>
                  <p class="review-txt">
                  <?php if(strlen($review['review']) > 300) { 
                    $stringCut = substr($review['review'], 0 , 300);
                    $endPoint = strrpos($stringCut, ' ');
                  ?>
                    <?php echo substr($review['review'], 0, $endPoint) ?>
                    <span class="read-more-show "><span style="color: black;">...</span>Read more <i class="fa fa-angle-down"></i></span>
                    <span class="read-more-content"> <?php echo substr($review['review'], $endPoint, -1) ?>
                    <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span> </span>
                  <?php } else echo $review['review'] ; ?>
                  </p>
                  <?php html_helper::like($review['id'],'review_rating_model',$review['checkUserLike'], $review['total_like'])?>
                      <li class="pull-right" ><p><a class="reply-btn" onclick="showRelyComment(<?=$review['id'] ?>)"><span class="fa fa-comment" style="font-size:16px;margin-right: 5px;">Add Reply</span></a></p></li>
                      <li class="pull-right forreply_hidden <?= $review['id'] ?>" id="" data_id="<?= $review['id'] ?>" data="0"><p><a class="reply-btn disp-btn-<?= $review['id'] ?>"><span class="fa fa-refresh" style="font-size:16px;margin-right: 5px;">Hidden Reply</span></a></p></li>
                  </ul>                  
                  <div class="forreply_at <?= $review['id'] ?>" data="<?= $review['id'] ?>">
                    <div class="replayParent <?= $review['id'] ?>">
                      <?php foreach ($this->reply as $rp) {  ?>
                      <?php if ($review['id'] == $rp['review_parent_id']) { ?>
                      <div class="media heightclass reply_rating">
                      <div class="media-left">
                        <img src="<?php echo RootREL; ?>media/upload/<?= ($rp['users_avata']) ? 'users/'.$rp['users_avata'] : "no_picture.png" ?>" width=50; height=50;>
                      </div>
                      <div class="media-right" style="width:100%;"> 
                      <h5 style="display: inline-block;">
                        <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$rp['users_id']])) ?>" style="float: left; font-weight: 700;margin-right: 20px;font-size: 20px;"><?= $rp['users_firstname'] ?></a> 
                        <span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($rp['created'])); ?> </span> 
                      </h5>
                        <p class="review-txt">
                        <?php if(strlen($rp['review']) > 200) { 
                          $stringCut = substr($rp['review'], 0, 200);
                          $endPoint = strrpos($stringCut, ' ');
                        ?>
                          <?php echo substr($rp['review'], 0, $endPoint) ?>
                          <span class="read-more-show "><span style="color: black;">...</span>Read more <i class="fa fa-angle-down"></i></span>
                          <span class="read-more-content"> <?php echo substr($rp['review'], $endPoint, -1) ?>
                          <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span> </span>
                        <?php } else echo $rp['review'] ; ?>
                        </p>
                      </div>
                    </div>
                 <?php } ?>
                  <?php } ?>
                  </div>
                    <div class="forreply <?= $review['id'] ?>">
                      <textarea class="form-control replay" id="reply_<?= $review['id'] ?>" rows="4" placeholder="Add Reply"></textarea>
                      <div class="text-right">
                        <button class="btn btn-review space20 btn-cancle" type="button">Cancel</button>
                        <button 
                            class="btn btn-review space20 btn_reply" 
                            type="button"
                            RootREL = "<?php echo RootREL; ?>"
                            checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                            data="<?= $review['id'] ?>,<?= $review['object_article_id'] ?>,opinion_debate_article_model"
                        >
                            Add reply
                        </button>                              
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              </div>
              <hr>
              <form>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                    <h5>Add Comment:</h5>
                    </div>
                    <div class="col-sm-10">
                      <textarea cols="12" rows="7" id="review" class="form-control review"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group text-right">
                  <button 
                    class="btn btn-review space20 btn_add_comment" 
                    type="button"
                    RootREL = "<?php echo RootREL; ?>"
                    checkUser="<?php if($_SESSION && $_SESSION['user'] && $_SESSION['user']['id']) echo true; else echo false; ?>"
                    data="0,<?= ($this->record['id']) ?>,opinion_debate_article_model"
                  >
                      Add Comment 
                  </button>                      
                </div>
              </form>
            </div>
            </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
        <a href="javascript:void(0)" class="btn btn_compose" type="button" isCheckUser= "<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo 'yes'; else echo 'no' ?>" >Compose A Opinions</a>
        <div class="space30"></div>
        <?php if(count($this->newOpinions)){ ?>
        <h3 class="f700">New Opinions</h3>
        <?php } ?>
        <?php foreach($this->newOpinions as $key => $newOpinion) { ?>
        <div class="white_box no-padding">
        <?php if($newOpinion['featured_image']){ ?>
            <div class="img-box">
            <a href="<?php echo RootURL."opinions-debates/".$newOpinion['slug'] ?>"><img style="max-height: 255x;" src="<?php echo RootREL; ?>media/upload/<?= ($newOpinion['featured_image']) ? 'opinions_debates/'.$newOpinion['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
            </div>
            <?php } ?>
            <div class="img-desc">
            <h4 class="f700"><a style="color: #333" href="<?php echo RootURL."opinions-debates/".$newOpinion['slug'] ?>"><?= $newOpinion['title'] ?></a></h4>
            <p>Category: <span class="f400"><?= $newOpinion['opinion_debate_categories_name'] ?></span></p>
            </div>              
        </div>
      <?php } ?>         
      </div>
  </div>
</section>
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
