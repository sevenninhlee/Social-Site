<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<style>

.btn1 {
    border-radius: 0;
    width: auto;
    padding-right: 20px;
    padding-left: 20px;
    margin-top: 10px;

    background-color: #4f7ec0;
    padding: 10px 10px;
    color: #ffffff;
    font-size: 20px;
    font-weight: 700;
    border: 1px solid #4f7ec0;
}
.btn1:hover{
    background-color: #fff;
    color: #4f7ec0;
}

</style>

<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7 col-xs-7">
            <h2><?php echo $this->record['title'] ?></h2><?php echo $this->record['show_name'] ?>
            <h4 class="organiz f700">Organizer: <span class="f400"><?php if ( $this->record['user_show_name'] == 0) { echo $this->record['user_firstname'].' '.$this->record['user_lastname'];} else { echo $this->record['user_username'];}  ?></span></h4>
          </div>
          <?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])){?>
            <?php
              if($this->checkUser || ($this->record['user_id'] == $_SESSION['user']['id'])) {?>
             <div class="col-sm-5 col-xs-5">
                <button class="btn  btn1 pull-right " disabled style="opacity: 1;" id="btn_joined" type="button">Joined</button>
            </div>
            <?php } elseif($this->checkUserIsApprove) { ?>
              <div class="col-sm-5 col-xs-5">
                <button class="btn  btn1 pull-right " id="btn_joined" disabled style="opacity: 1;" type="button">Request sent </button>
              </div>
            <?php }else { ?>
              <div class="col-sm-5 col-xs-5">
                <button class="btn  btn1 pull-right btn_join" id="btn_join" type="button"
                    checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
                    data="<?= $this->record['id'] ?>"
                >Join</button>
              </div>
              <?php } ?>
              <?php }else {?>
            <div class="col-sm-5 col-xs-5">
              <button class="btn  btn1 pull-right btn_join" id="btn_join" type="button"
                checkUser="<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo true; else echo false; ?>"
              >Join</button>
            </div>
              <?php } ?>
        </div>

        <div class="row book-group1">
          <div class="col-md-4 col-sm-6">
            <div class="white_box">
              <div class="img-box">
                <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['featured_image']) ? 'book_groups/'.$this->record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"  >                    
              </div>                  
            </div>
          </div>
          <div class="col-md-8 col-sm-6">
            <div class="white_box no-padding">                  
              <div class="img-desc">
                <h5 class="f700">Description:</h5>
                <div class="read_more">
                  <div class="txt_des">
                  <?php echo $this->record['description'] ?>
                  </div>
                </div>
              </div>                  
            </div>
          </div>                          
        </div>

        <div class="row space30">
          <div class="col-md-12">
            <div class="white_box">
              <h4 class="organiz">Current Read</h4>
              <?php if($this->currentBooks): ?>
                <?php foreach ($this->currentBooks as $currentBook) {?>
                <div class="media heightclass">
                  <div class="col-sm-3">
                    <a class="read-txt read_more_bgr"
                      style="cursor: pointer;"
                      checkMember = "<?= $this->checkUser ?>"
                      data = "<?= $currentBook['book_group_id'] ?>, <?= $currentBook['user_id_not_read'] ?>">
                      <?php if (strpos($currentBook['featured_image'], "https://books.google.com/books/") !== false) { ?>
                          <img src="<?php echo $currentBook['featured_image']?>" class="img-responsive" alt="book-3">
                        <?php } else { ?>
                          <img src="<?php echo RootREL; ?>media/upload/<?= ($currentBook['featured_image']) ? 'books/'.$currentBook['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" >
                        <?php } ?>
                    </a>
                  </div>
                  <div class="col-sm-9">
                    <a class="read-txt read_more_bgr"
                      style="cursor: pointer;"
                      checkMember = "<?= $this->checkUser ?>"
                      data = "<?= $currentBook['book_group_id'] ?>, <?= $currentBook['user_id_not_read'] ?>"><h5 class="f700 m0 color555554"><?php echo $currentBook['title'] ?></h5></a>
                    <p class="f700 by-txt color555554">By: <?php echo vendor_html_helper::showUserName($currentBook); ?></p>
                    <p class="f700 by-txt color555554">ISBN: <?php echo $currentBook['ISBN'] ?></p>
                    <div class="txt_des">
                    <span class="f700 by-txt color555554">Description: </span>
                    <?php if(strlen($currentBook['description']) > 400)  echo substr($currentBook['description'], 0, 400).'...'; else echo $currentBook['description'] ; ?>
                    </div>
                      <!-- href="<?php echo (vendor_app_util::url(["ctl"=>"book_groups", "act"=>"book-review/".$currentBook['book_group_id']])) ?>"  -->
                    <a 
                      class="read-txt read_more_bgr"
                      style="cursor: pointer;"
                      checkMember = "<?= $this->checkUser ?>"
                      data = "<?= $currentBook['book_group_id'] ?>, <?= $currentBook['user_id_not_read'] ?>"
                    >Read More</a>
                  </div>
                </div>
                <?php } ?>
              <?php else: ?>
                <h4 class="text-center space10">Data not found!</h4>
              <?php endif; ?>
              <h4 class="organiz">Previous Reads</h4>
                <?php if($this->previousBooks): ?>
                <div id="owl-demo" class="owl-carousel owl-theme">
                  <?php foreach($this->previousBooks as $key => $record) { ?>
                    <div style="border-bottom: 0" class="item" >
                      <a class="read-txt read_more_bgr"
                      style="cursor: pointer;"
                      checkMember = "<?= $this->checkUser ?>"
                      data = "<?= $record['book_group_id'] ?>, <?= $record['user_id_not_read'] ?>">
                        <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                          <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                        <?php } else { ?>
                          <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                        <?php } ?>
                      </a>  
                      <p class="text-center space10"><a class="read-txt read_more_bgr"
                      style="cursor: pointer;color: #333"
                      checkMember = "<?= $this->checkUser ?>"
                      data = "<?= $record['book_group_id'] ?>, <?= $record['user_id_not_read'] ?>"><?php echo $record['title'] ?></a></p>  
                    </div>
                  <?php } ?>
                </div>
                <?php else: ?>
                  <h4 class="text-center space10">Data not found!</h4>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
        <button class="btn btn_compose" type="button">Create Book Group</button>
      </div>
    </div>
  </div>
</section>
<!-- End main sections -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>

<script>
    var user_id = "<?= $_SESSION['user']['id'] ?>" ? "<?= $_SESSION['user']['id'] ?>" : null;
    var admin_gr_id = "<?= $this->record['user_id'] ?>" ;
    var checkUserIsAppv = "<?= $this->checkUserIsApprove ?>" ;
    $('.read_more_bgr').click(function (e) {
      e.preventDefault();
      var checkMember = $(this).attr('checkMember');
      var data = $(this).attr('data');
      var data = data.split(',');
      var bgr_id = data[0];
      var isRead_id  = data[1];
      array = isRead_id.split('|');
      
      console.log(checkUserIsAppv);
      
       if (!checkMember && parseInt(admin_gr_id) != parseInt(user_id)) {
         if (checkUserIsAppv) {
            confirm("You need be accept to continue...");
         }else {
            confirm("Please join group to continue...");
         }
       } else {
          array.forEach(element => {
            if (parseInt(element) == parseInt(user_id) ) {
              confirm("You need be licensed to continue...");
            } else {
              window.location.href = (rootUrl+'book-groups/book-review/'+bgr_id);
            }
          });
       }
    })

</script>

<script type="text/javascript">
  $(document).ready(function() {
        $("#owl-demo").owlCarousel({
           autoPlay: 3000, //Set AutoPlay to 3 seconds
           items : 4,   
           itemsCustom : [
         [0, 1],
         [320, 1],
         [480, 1],
         [768, 2],
         [1200, 4],
         [1400, 4],
         [1600, 4],
         [1920, 4]
        ],
         navigation : true, // Show next and prev buttons
         slideSpeed : 300,
         paginationSpeed : 400,

           navigationText: [
           "<img src='<?php echo RootREL; ?>media/img/left-arrow.png'>",
           "<img src='<?php echo RootREL; ?>media/img/right-arrow.png'>"
           ],
           pagination:false,
         });
      });
</script>