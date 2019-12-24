<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
  <!-- start main sections -->
  <section class="main_section body_1">
    	<div class="container">
    		<div class="row">
    		<div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Bookshelf & Book Reviews</h2>                
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
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade in active" id="bookshelf">
                        <div class="page1">

                        <div class="white_box">
                            <ul class="list-inline">
                              <li><h5>Current Reads</h5></li>
                              <li class="pull-right"><a href="#" class="f700" data-toggle="popover" data-placement="bottom" data-content="Please add me as a friend" data-original-title="" title="">Add as a friend</a></li>
                            </ul>
                            <?php foreach($this->records as $key => $record) { ?>
                              <div class="row title-part space30" >
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
                                    <h3><a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">By:</span><?php echo $record['author'] ?></p>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">ISBN:</span><?php echo $record['ISBN'] ?></p>
                                    <div class="txt_des"> 
                                      <p><span style="font-weight:900; font-size:15px">Description:</span><?php if(strlen($record['description']) > 400)  echo substr($record['description'], 0, 400).'<span>...</span>'; else echo $record['description'] ; ?></p>
                                    </div>

                                  <div class="grey_box gray1">
                                    <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" class="pull-right" > <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <ul class="list-inline">
                              <li><h5>Favorite Book</h5></li>
                            </ul>
                            <?php foreach($this->favRecords as $key => $record) { ?>
                              <div class="row title-part space30" >
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
                                    <h3><a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">By: </span><?php echo $record['author'] ?></p>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">ISBN: </span><?php echo $record['ISBN'] ?></p>
                                    <div class="txt_des"> 
                                      <p><span style="font-weight:900; font-size:15px">Description: </span><?php if(strlen($record['description']) > 400)  echo substr($record['description'], 0, 400).'<span>...</span>'; else echo $record['description'] ; ?></p>
                                    </div>

                                  <div class="grey_box gray1">
                                    <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" class="pull-right"> <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <h5 class="space30">Recomended Reads</h5>
                            <div id="owl-demo" class="owl-carousel owl-theme">
                            <?php foreach($this->recRecords as $key => $record) { ?>

                              <div class="item" >
                                <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>">
                                  <?php if (strpos($record['featured_image'], "http://books.google.com/books/") !== false) { ?>
                                    <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } else { ?>
                                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } ?>
                                </a>  
                                <p class="text-center space10"><a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></p>  
                              </div>

                            <?php } ?>
                            </div>
                            <h5 class="space30">Book Reviews</h5>
                            <div id="owl-demo1" class="owl-carousel owl-theme">

                             <?php foreach($this->revRecords as $key => $record) { ?>

                              <div class="item" >
                                <a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>">
                                  <?php if (strpos($record['featured_image'], "http://books.google.com/books/") !== false) { ?>
                                    <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } else { ?>
                                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } ?>
                                </a>
                                <p class="text-center space10"><a href="<?php echo RootURL."books/book_review/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></p>  
                              </div>

                            <?php } ?>

                            </div>
                          </div>
                        </div>
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


<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>

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

    <script type="text/javascript">
      $(document).ready(function() {
          $("#owl-demo1").owlCarousel({
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
    </script>