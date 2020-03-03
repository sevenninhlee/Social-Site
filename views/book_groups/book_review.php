
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
            <h2>Book Discussion </h2>                
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
                  <?php if (strpos($this->record['book_articles_featured_image'], "https://books.google.com/books/") !== false) { ?>
                    <img src="<?php echo $this->record['book_articles_featured_image']?>" class="img-responsive" width=150; height=200;>
                  <?php } else { ?>
                    <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['book_articles_featured_image']) ? 'books/'.$this->record['book_articles_featured_image'] : "no_picture.png" ?>" class="img-responsive" width=150; height=200;>
                  <?php } ?>
                </div>
                <div class="media-right">
                  <h5 class="f700 m0 color555554"><?= ($this->record['book_articles_title']) ?></h5>
                  <p class="f700 by-txt color555554">By: <span class="f400"><a><?= ($this->record['book_articles_author']) ? $this->record['book_articles_author'] : "unknown" ?>
                  </a></span> Category: 
                  <span class="f400"><a>
                  <?php 
										if($this->category == null){
											echo '<a>Unkown category</a>';
										}else {
											$cat_str = "";
											foreach ($this->category as $key => $value) {
												$cat_str.=$value['name']." | ";
											}
											echo '<a>'.rtrim($cat_str," | ").'</a>';
										}
							    ?>
                  </a>
                  </span> Year: <span class="f400"><a><?= ($this->record['book_articles_year']) ?></a>
                  </span> ISBN: <span class="f400"><a><?= ($this->record['ISBN']) ?></a></span></p>
                  <!-- <p> <?= ($this->record['description']) ?> </p> -->

                  <div class="read_more1">
                    <?php  echo $this->record['book_articles_description'] ; ?>
                  </div>
                </div>
              </div>                                    
            </div>
            

            <div class="white_box space30 commnet_css_ct">
              <h5>Discussion:</h5>
              <hr>
              <div class="reviewRating">
               <?php foreach ($this->comments['data'] as $review) {  ?>
                <div class="media heightclass">
                <div class="media-left">
                  <img src="<?php echo RootREL; ?>media/upload/<?= ($review['users_avata']) ? 'users/'.$review['users_avata'] : "no_picture.png" ?>" width=150; height=150;>
                </div>
                <div class="media-right" style="width:100%;"> 
                  <h5 style="display: inline-block;width:100%;">
                      <a href="<?php echo (vendor_app_util::url(["ctl"=>"user", "act"=>"profile/index?user=".$review['users_id']])) ?>" style="font-weight: 700;margin-right: 10px;font-size: 20px; float: left;"><?= $review['users_firstname'] ?></a>
                     <div style="float: left ;margin-right: 10px;"></div><span class="text-date-comment"> <?php echo date("F j, Y g:i a", strtotime($review['created']));?> </span>
                  </h5>

                  <?php if($review['user_id'] == $_SESSION['user']['id']){ ?>
                    <div class="edit-delete-comment">
                        <div class="edit-delete-comment-act"><span class="CommentItemAction" typeAct="edit" data="<?=$review['id']?>">Edit</span> <span typeAct="delete" class="CommentItemAction" data="<?=$review['id']?>">Delete</span></div>
                        <div class="edit-delete-comment-content" id="CommentItemAction-<?=$review['id']?>">
                            <textarea class="form-control replay" id="CommentItemActionContent-<?=$review['id']?>" rows="4" placeholder="Add Reply"><?=trim($review['review'])?></textarea>
                            <div class="text-right">
                                <button class="btn btn-review space20 btn-cancle CommentItemAction" type="button" typeAct="cancel" data="<?=$review['id']?>">Cancel</button>
                                <button 
                                    class="btn btn-review space20 CommentItemAction" 
                                    type="button"
                                    typeAct="submit" 
                                    data="<?=$review['id']?>"
                                    RootREL = "<?php echo RootREL; ?>"
                                    checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                                >
                                    Edit
                                </button>                              
                            </div> 
                        </div>
                    </div>
                <?php } ?>

                  <div class="review-txt review-txt-<?=$review['id']?>">
                  <?php if(strlen($review['review']) > 300) { ?>
                    <?php echo substr($review['review'], 0, 300) ?><span class="read-more-show-dot">...</span>
                    <div class="read-more-show">Read more</i></div>
                    <div class="read-more-content"> <?php echo substr($review['review'], 300, -1) ?>
                    <div class="read-more-hide ">Less <i class="fa fa-angle-up"></i></div> </div>
                  <?php } else echo $review['review'] ; ?>
                  </div>
                  <ul class="list-inline">
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

                      <?php if($rp['user_id'] == $_SESSION['user']['id']){ ?>
                        <div class="edit-delete-comment">
                            <div class="edit-delete-comment-act"><span class="CommentItemAction" typeAct="edit" data="<?=$rp['id']?>">Edit</span> <span typeAct="delete" class="CommentItemAction" data="<?=$rp['id']?>">Delete</span></div>
                            <div class="edit-delete-comment-content" id="CommentItemAction-<?=$rp['id']?>">
                                <textarea class="form-control replay" id="CommentItemActionContent-<?=$rp['id']?>" rows="4" placeholder="Add Reply"><?=trim($rp['review'])?></textarea>
                                <div class="text-right">
                                    <button class="btn btn-rp space20 btn-cancle CommentItemAction" type="button" typeAct="cancel" data="<?=$rp['id']?>">Cancel</button>
                                    <button 
                                        class="btn btn-rp space20 CommentItemAction" 
                                        type="button"
                                        typeAct="submit" 
                                        data="<?=$rp['id']?>"
                                        RootREL = "<?php echo RootREL; ?>"
                                        checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                                    >
                                        Edit
                                    </button>                              
                                </div> 
                            </div>
                        </div>
                      <?php } ?>

                        <div class="review-txt review-txt-<?=$rp['id']?>">
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
              <h5>Add Comment:</h5>
              <hr>
              <form>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                    <label>Comment:</label>
                    </div>
                    <div class="col-sm-10">
                      <textarea cols="12" rows="7" id="review" class="form-control review"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group text-right">

                   <button
                      groupBookId="<?=$app['prs'][1]?>"
                      class="btn btn_review btn_add_comment"
                      type="button" 
                      checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                      data="0,<?= $this->bgr_id ?>,book_article_model"
                    >
                      Add Comment
                    </button>     

                </div>

              </form>
            </div>
          </div>
        </div>            
      </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
        <button class="btn btn_compose" type="button">Create Book Group</button>

        <div class="space30"></div>
        
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
