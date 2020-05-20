
<?php 
   include_once 'views/layout/outside/'.$this->layout.'headerOutside.php';
   ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/css/review.css">
<!-- start main sections -->
<section class="main_section">
   <div class="container">
      <div class="row">
         <div class="col-md-9">

            <h2><?= $this->record['title'] ?></h2>

            <div class="row space30">
               <div class="col-md-12">
                  <div class="white_box">
                                 <p><span>Author:</span> <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$this->record['user_id']])) ?>"><?= ($this->record['username']) ?></a> | Category: 
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
                            | Year: <?= $this->record['year'] ?> </p>
                     <iframe width="100%" height="500" src=" <?= $this->record['link'] ?>"></iframe>
                     <div class="space30"></div>
                     <p><?= $this->record['description'] ?></p>
                  </div>
                  <div class="white_box2 space30">
                     <h3>SHARE THIS BOOK REVIEW</h3>

                     <a class="btn btn_fb" type="button">Facebook</a>

                     <a class="btn btn_tweet" type="button">Twitter</a>

                     <a class="btn btn_google" type="button">Google+</a>
                     <ul class="list-inline rating-list">
                        <li><?= $this->getAveRating ? $this->getAveRating : 0 ?></li>
                        <li>
                         <div class="rating" style=" padding: 5px; width: 100%; text-align: center;" id="rate3" value="<?= ($this->getAveRating) ? $this->getAveRating : 0 ?>" enabled="true"></div>
                  <p class="color8a8a8a space5">Ratings: <span class="f700"><?= $this->getAveRating ? $this->getAveRating : 0 ?></span> / 5 from  <span class="f700"><?= $this->count['total_reviews'] ?> <?= $this->count['total_reviews'] == 1 ?  'user' : 'users' ?>  </span></p>
                        </li>
                     </ul>
                  </div>
                  <div class="listReview">
                     <a class="Show">View Review Section</a>
                     <div class="white_box space30 commnet_css_ct showReview hide">
                        <h5>Review:</h5>
                        <hr>
                        <div class="reviewRating reviewReview">
                           <?php foreach ($this->recordsRating['data'] as $review) {  ?>
                           <?php if ($review['value'] != 0) {  ?>
                           <div class="media heightclass">
                              <div class="media-left">
                                 <img src="<?php echo RootREL; ?>media/upload/<?= ($review['users_avata']) ? 'users/'.$review['users_avata'] : "no_picture.png" ?>"
                                    width=150; height=150;>
                              </div>
                              <div class="media-right" style="width:100%;">
                                 <h5 style="display: inline-block;width:100%;">
                                    <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$review['users_id']])) ?>"
                                       class="review-css2"><?= vendor_html_helper::showUserName($review, true) ?></a>
                                    <div style="float: left ;margin-right: 10px;">
                                       rated it 
                                       <div
                                          class="rating" id="rate3" value="<?= $review['value'] ?>"
                                          enabled="true"></div>
                                    </div>
                                    <span class="text-date-comment">
                                    <?php echo date("F j, Y g:i a", strtotime($review['created']));?>
                                    </span>
                                 </h5>
                                 <p class="review-txt">
                                    <?php if(strlen($review['review']) > 300) { 
                                       $stringCut = substr($review['review'], 0, 300);
                                       $endPoint = strrpos($stringCut, ' ');
                                       ?>
                                    <?php echo substr($review['review'], 0, $endPoint) ?>
                                    <span class="read-more-show "><span style="color: black;">...</span>Read more <i class="fa fa-angle-down"></i></i></span>
                                    <span class="read-more-content"> <?php echo substr($review['review'], $endPoint, -1) ?>
                                    <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span> </span>
                                    <?php } else echo $review['review'] ; ?>
                                 </p>
                                 <ul class="list-inline" style="padding: 10px;">
                                    <li><p></p></li>
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
                                              <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$rp['users_id']])) ?>"  class="review-css1"><?=vendor_html_helper::showUserName($rp, true) ?></a> 
                                              <span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($rp['created'])); ?> </span> 
                                             </h5>
                                             <p class="review-txt">
                                                <?php
                                                   if(strlen($rp['review']) > 200) { 
                                                       $stringCut = substr($rp['review'], 0, 200);
                                                       $endPoint = strrpos($stringCut, ' ');
                                                   ?>
                                                <?php echo substr($rp['review'], 0, $endPoint) ?>
                                                <span class="read-more-show "><span
                                                   style="color: black;">...</span> Read more <i
                                                   class="fa fa-angle-down"></i></span>
                                                <span class="read-more-content">
                                                <?php echo substr($rp['review'], $endPoint, -1) ?>
                                                <span class="read-more-hide ">Less <i
                                                   class="fa fa-angle-up"></i></span> </span>
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
                                            data="<?= $review['id'] ?>,<?= $review['object_article_id'] ?>,film_article_model"
                                        >
                                            Add reply
                                        </button>     
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php }?>
                           <?php } ?>
                        </div>
                        <?php if($this->loadmoreDataRating['is_show_loadmore_rating']){ ?>
                        <div class="LoadmoreContent">
                        </div>
                        <div class="text-center">
                           <button class="btn btn-review space20 LoadmoreReview btn-2" type="rating"
                              data='<?=json_encode($this->loadmoreDataRating)?>'>Showmore</button>
                              
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
                                    <label>Add Review:</label>
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
                                data="<?= $this->record['id'] ?>,film_article_model"
                              >
                                  Add Review 
                              </button>   
                           </div>

                        </form>
                     </div>
                  </div>
                  <div class="white_box space30 commnet_css_ct showcomment">
                     <h5>Comment:</h5>
                     <hr>
                     <form>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-sm-2">
                                 <label>Add Comment:</label>
                              </div>
                              <div class="col-sm-10">
                                 <textarea cols="12" rows="7" id="comment"
                                    class="form-control comment"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group text-right">
                           <button class="btn btn_review btn_add_comment_films" type="button"
                              checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                              data="<?= $this->record['id'] ?>,film_article_model">
                           Add Commemt
                           </button>
                        </div>
                     </form>
                     <div class="reviewRating reviewComment">
                        <?php foreach ($this->recordsComment['data'] as $review) {  ?>
                        <?php if($review['value'] == 0){?>
                        <div class="media heightclass">
                           <div class="media-left">
                              <img src="<?php echo RootREL; ?>media/upload/<?= ($review['users_avata']) ? 'users/'.$review['users_avata'] : "no_picture.png" ?>"
                                 width=150; height=150;>
                           </div>
                           <div class="media-right" style="width:100%;">
                              <h5 style="display: inline-block;width:100%;">
                                 <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$review['users_id']])) ?>"
                                    class="review-css2"><?= vendor_html_helper::showUserName($review, true) ?></a>
                                 <span class="text-date-comment">
                                 <?php echo date("F j, Y g:i a", strtotime($review['created']));?>
                                 </span>
                              </h5>
                              <?php if($review['user_id'] == $_SESSION['user']['id']){ ?>
                              <div class="edit-delete-comment">
                                 <div class="edit-delete-comment-act"><span class="CommentItemAction"
                                    typeAct="edit" data="<?=$review['id']?>">Edit</span> <span
                                    typeAct="delete" class="CommentItemAction"
                                    data="<?=$review['id']?>">Delete</span></div>
                                 <div class="edit-delete-comment-content"
                                    id="CommentItemAction-<?=$review['id']?>">
                                    <textarea class="form-control replay"
                                       id="CommentItemActionContent-<?=$review['id']?>" rows="4"
                                       placeholder="Add Reply"><?=trim($review['review'])?></textarea>
                                    <div class="text-right">
                                       <button class="btn btn-review space20 btn-cancle CommentItemAction"
                                          type="button" typeAct="cancel"
                                          data="<?=$review['id']?>">Cancel</button>
                                       <button class="btn btn-review space20 CommentItemAction"
                                          type="button" typeAct="submit" data="<?=$review['id']?>"
                                          RootREL="<?php echo RootREL; ?>"
                                          checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>">
                                       Edit
                                       </button>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <p class="review-txt">
                                 <?php if(strlen($review['review']) > 300) { 
                                    $stringCut = substr($review['review'], 0, 300);
                                    $endPoint = strrpos($stringCut, ' ');
                                    ?>
                                 <?php echo substr($review['review'], 0, $endPoint) ?>
                                 <span class="read-more-show "><span style="color: black;">...</span>Read
                                 more <i class="fa fa-angle-down"></i></i></span>
                                 <span class="read-more-content">
                                 <?php echo substr($review['review'], $endPoint, -1) ?>
                                 <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span>
                                 </span>
                                 <?php } else echo $review['review'] ; ?>
                              </p>
                              <ul class="list-inline" style="padding: 10px;">
                                 <li>
                                    <p></p>
                                 </li>
                                 <li class="pull-right">
                                    <p><a class="reply-btn"
                                       onclick="showRelyComment(<?=$review['id'] ?>)"><span
                                       class="fa fa-comment"
                                       style="font-size:16px;margin-right: 5px;">Add
                                       Reply</span></a>
                                    </p>
                                 </li>
                                 <li class="pull-right forreply_hidden <?= $review['id'] ?>" id=""
                                    data_id="<?= $review['id'] ?>" data="0">
                                    <p><a class="reply-btn disp-btn-<?= $review['id'] ?>"><span
                                       class="fa fa-refresh"
                                       style="font-size:16px;margin-right: 5px;">Hidden
                                       Reply</span></a>
                                    </p>
                                 </li>
                              </ul>
                              <div class="forreply_at <?= $review['id'] ?>" data="<?= $review['id'] ?>">
                                 <div class="replayParent <?= $review['id'] ?>">
                                    <?php foreach ($this->reply as $rp) {  ?>
                                    <?php if ($review['id'] == $rp['review_parent_id']) { ?>
                                    <div class="media heightclass reply_rating">
                                       <div class="media-left">
                                          <img src="<?php echo RootREL; ?>media/upload/<?= ($rp['users_avata']) ? 'users/'.$rp['users_avata'] : "no_picture.png" ?>"
                                             width=50; height=50;>
                                       </div>
                                       <div class="media-right" style="width:100%;">
                                          <h5 style="display: inline-block;">
                                             <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$rp['users_id']])) ?>"
                                                class="review-css1"><?=vendor_html_helper::showUserName($rp, true) ?></a>
                                             <span class="text-date-comment">
                                             <?php echo date("F j, Y g:i a", strtotime($rp['created'])); ?>
                                             </span>
                                          </h5>
                                          <p class="review-txt">
                                             <?php
                                                if(strlen($rp['review']) > 200) { 
                                                  $stringCut = substr($rp['review'], 0, 200);
                                                  $endPoint = strrpos($stringCut, ' ');
                                                ?>
                                             <?php echo substr($rp['review'], 0, $endPoint) ?>
                                             <span class="read-more-show "><span
                                                style="color: black;">...</span> Read more <i
                                                class="fa fa-angle-down"></i></span>
                                             <span class="read-more-content">
                                             <?php echo substr($rp['review'], $endPoint, -1) ?>
                                             <span class="read-more-hide ">Less <i
                                                class="fa fa-angle-up"></i></span> </span>
                                             <?php } else echo $rp['review'] ; ?>
                                          </p>
                                       </div>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                 </div>
                                 <div class="forreply <?= $review['id'] ?>">
                                    <textarea class="form-control replay"
                                       id="reply_comment<?= $review['id'] ?>" rows="4"
                                       placeholder="Add Reply"></textarea>
                                    <div class="text-right">
                                       <button class="btn btn-review space20 btn-cancle"
                                          type="button">Cancel</button>
                                       <button class="btn btn-review space20 btn_reply_comment"
                                          type="button" RootREL="<?php echo RootREL; ?>"
                                          checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                                          data="<?= $review['id'] ?>,<?= $review['object_article_id'] ?>,film_article_model">
                                       Add reply
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php }?>
                        <?php } ?>
                     </div>
                     <?php if($this->loadmoreDataComment['is_show_loadmore_comment']){ ?>
                     <div class="LoadmoreContent">
                     </div>
                     <div class="text-center">
                        <button class="btn btn-review space20 LoadmoreReview btn-1" type="comment"
                           data='<?=json_encode($this->loadmoreDataComment)?>'>Showmore</button>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
            <!-- <?php include_once 'views/layout/'.$this->layout.'rightBar_newGroup.php'; ?> -->
            <div class="space30"></div>
            <?php if(count($this->newFilms)){ ?>
            <h3 class="f700">New Films</h3>
            <?php } ?>
            <?php foreach($this->newFilms as $key => $newFilm) { ?>
            <div class="white_box no-padding">
               <div class="img-box">
                  <a href="<?php echo RootURL."films/".$newFilm['slug'] ?>"><img style="max-height: 255px;" src="<?php echo RootREL; ?>media/upload/<?= ($newFilm['featured_image']) ? 'films/'.$newFilm['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
               </div>
               <div class="img-desc">
                <h4 class="f700"><a style="color: #333" href="<?php echo RootURL."films/".$newFilm['slug'] ?>"><?= $newFilm['title'] ?></a></h4>
                  <p>Category: <span class="f400"><?= $newFilm['film_categories_name'] ?></span></p>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
