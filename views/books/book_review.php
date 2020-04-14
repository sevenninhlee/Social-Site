<?php 
  include_once 'views/layout/outside/'.$this->layout.'headerOutside.php';
?>

<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7 col-xs-7">
            <h2>Book Review </h2>                
          </div>
          <div class="col-sm-5 col-xs-5">
            <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
          </div>
        </div>            

        <div class="row space30">
          <div class="col-md-12">
            <div class="white_box">                  
              <div class="media heightclass">
                <div class="media-left" style="width: 160px;">
                  <?php if (strpos($this->record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                    <img src="<?php echo $this->record['featured_image']?>" class="img-responsive" width=150; height=200;>
                  <?php } else { ?>
                    <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['featured_image']) ? 'books/'.$this->record['featured_image'] : "no_picture.png" ?>" class="img-responsive" width=150; height=200;>
                  <?php } ?>
                      <div class="rating" style=" padding: 5px; width: 100%; text-align: center;" id="rate3" value="<?= ($this->getAveRating) ? $this->getAveRating : 0 ?>" enabled="true"></div>
                </div>
                <div class="media-right">
                  <h5 class="f700 m0 color555554"><?= ($this->record['title']) ?></h5>
                  <p class="f700 by-txt color555554">By: <span class="f400"><a><?= ($this->record['author']) ? $this->record['author'] : "unknown" ?></a></span> | 
                  Category: 
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
                  
                  | Year: <span class="f400"><a><?= ($this->record['year']) ?></a></span> ISBN: <span class="f400"><a><?= ($this->record['ISBN']) ?></a></span></p>
                  <!-- <p> <?= ($this->record['description']) ?> </p> -->

                  <div class="read_more1">
                    <?php  echo $this->record['description'] ; ?>
                  </div>
                </div>
              </div>                                    
            </div>
            
            <!-- <div>
                <?php html_helper::like(1,'review_rating_model',$this->checkUserLike, $this->totalLike)?>
            </div> -->
            <div class="white_box2 space30">
              <h3>SHARE THIS BOOK REVIEW</h3>

              <a class="btn btn_fb" type="button">Facebook</a>

              <a class="btn btn_tweet" type="button">Twitter</a>

              <a class="btn btn_google" type="button">Google+</a>
            </div>

            <div class="white_box space30 commnet_css_ct">
              <h5>Review:</h5>
              <hr>
              <div class="reviewRating">
               <?php foreach ($this->records['data'] as $review) {  ?>
                <div class="media heightclass">
                <div class="media-left">
                  <img src="<?php echo RootREL; ?>media/upload/<?= ($review['users_avata']) ? 'users/'.$review['users_avata'] : "no_picture.png" ?>" width=150; height=150;>
                </div>
                <div class="media-right" style="width:100%;"> 
                  <h5 style="display: inline-block;width:100%;">
                      <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$review['users_id']])) ?>" style="font-weight: 700;margin-right: 10px;font-size: 20px; float: left;"><?= vendor_html_helper::showUserName($review, true) ?></a>
                     <div style="float: left ;margin-right: 10px;">rated it <div class="rating"  id="rate3" value="<?= $review['value'] ?>" enabled="true">
                     </div></div><span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($review['created']));?> </span>
                  </h5>
                  <div class="review-txt">
                  <?php if(strlen($review['review']) > 300) { ?>
                    <?php echo substr($review['review'], 0, 300) ?><span class="read-more-show-dot">...</span>
                    <div class="read-more-show">Read more</i></div>
                    <div class="read-more-content"> <?php echo substr($review['review'], 300, -1) ?>
                    <div class="read-more-hide ">Less <i class="fa fa-angle-up"></i></div> </div>
                  <?php } else echo $review['review'] ; ?>
                  </div>
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
                        <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$rp['users_id']])) ?>" style="float: left; font-weight: 700;margin-right: 20px;font-size: 20px;"><?=vendor_html_helper::showUserName($rp, true) ?></a> 
                        <span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($rp['created'])); ?> </span> 
                      </h5>
                        <div class="review-txt">
                        <?php if(strlen($rp['review']) > 200) { ?>
                          <?php echo substr($rp['review'], 0, 200) ?><span class="read-more-show-dot">...</span>
                          <div class="read-more-show">Read more</i></div>
                          <div class="read-more-content"> <?php echo substr($rp['review'], 200, -1) ?>
                          <div class="read-more-hide ">Less <i class="fa fa-angle-up"></i></div> </div>
                        <?php } else echo $rp['review'] ; ?>
                        </div>
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
                          data="<?= $review['id'] ?>,<?= $review['object_article_id'] ?>,book_article_model"
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

              <?php if($this->loadmoreData['is_show_loadmore']){ ?>
                <div class="LoadmoreContent">
                </div>
                <div class="text-center">
                  <button
                    class="btn btn-review space20 LoadmoreReview" data='<?=json_encode($this->loadmoreData)?>'
                  >Showmore</button>
                </div>
              <?php } ?>
              
              <h5>Add Review:</h5>
              <hr>
              <form>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                      <label>Rating:</label>
                    </div>
                    <div class="col-sm-10">
                      <div class="rating"  id="rate3" value="" enabled="1" ></div> 
                      <?php if( isset($this->errors['value'])) { ?>
						          	<p class="text-danger"><?=$this->errors['value']; ?></p>
						          <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                      <label>Review:</label>
                    </div>
                    <div class="col-sm-10">
                      <textarea cols="12" rows="7" id="review" class="form-control review"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group text-right">
                  <button 
                    class="btn btn_review btn_review_rating" 
                    type="button" 
                    checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                    data="<?= $this->record['id'] ?>,book_article_model"
                  >
                      Add Review 
                  </button>                      
                </div>

              </form>
            </div>
          </div>
        </div>            
      </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
        <a href="javascript:void(0)" class="btn btn_compose" type="button" isCheckUser= "<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo 'yes'; else echo 'no' ?>" >Post A Review</a>
        <div class="space30"></div>
        
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>