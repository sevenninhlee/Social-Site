
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>Book Reviews</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-books-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Book Reviews" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <span class="input-group-btn">
                  <button class="btn btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
      <?php if(!empty($this->records['data'])): ?>
        <div class="row">
          <div class="col-md-12">
            <div class="space30 visible-xs"></div>
            <div class="white_box">
              
                <?php foreach($this->records['data'] as $key => $record) { ?>
                <div class="row <?php if($key >= 1) echo "space30" ;?>" >
                  <div class="col-sm-3">
                    <div class="img-box">
                      <a href="<?php echo RootURL."books/".$record['slug'] ?>" href="<?php echo RootURL."books/".$record['slug'] ?>">
                        <?php if (strpos($record['featured_image'], "http://books.google.com/books/") !== false) { ?>
                          <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                        <?php } else { ?>
                          <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                        <?php } ?>
                      </a>
                    </div>
                  </div>
                  <div class="col-sm-9">                      
                    <h3><a href="<?php echo RootURL."books/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                    <p class="cate_txt"> <span>By:</span> <a><?php echo $record['author'] ?></a> | 
                    <span>Category:</span>
                      <?php 
                        if(count($record['ListCate']) == 0){
                          echo '<span>Unkown category</span>';
                        }else {
                          $cat_str = "";
                          foreach ($record['ListCate'] as $key => $value) {
                            $cat_str.=$value['name']." | ";
                          }
                          echo '<span>'.rtrim($cat_str," | ").'</span>';
                        }
                      ?> 
                     | <span>Year:</span> <a><?php echo $record['year'] ?></a> | <span>ISBN:</span> <a><?php echo $record['ISBN'] ?></a></p>
                    <h6 class="space30 f700 fsize16">Description:</h6>
                    <p><?php if(strlen($record['description']) > 300)  echo substr($record['description'], 0, 300).'...'; else echo $record['description'] ; ?></p>

                    <div class="grey_box gray1">
                      <span class="f700"><?php echo $record['getTotalAll']['total_likes']; ?> Likes | <?php echo $record['getTotalAll']['total_reviews']; ?> Reviews | Rating <div class="rating" style=" margin: 0 5px;" id="rate3" value="<?= ($record['getTotalAll']['avr_reviews']) ? $record['getTotalAll']['avr_reviews'] : 0 ?>" enabled="true"></div> <?php echo $record['getTotalAll']['avr_reviews']; ?></span> 
                      <a href="<?php echo RootURL."books/".$record['slug'] ?>" class="pull-right"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                    </div>
                  </div>
                </div>
                <?php } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="Page navigation" class="pagi_nation">
              <ul class="pagination">
                <li>
                  <a href="<?php echo $this->records['paging']['first']; ?>" aria-label="First" class="btn btn-primary <?php if(empty($this->records['paging']['first'])) echo 'disabled'; else echo ' ';  ?>">
                    <span aria-hidden="true">First</span>
                  </a>
                </li>
                <?php foreach ($this->records['paging']['pages'] as $key => $page) { ?>
                  <li class="<?php if($page['current_page'] === 'yes') echo 'active'; else echo ' ';?>"><a href="<?php echo $page['url']; ?>"><?php echo $page['page']; ?></a></li> 
                <?php } ?>                 
                                 
                <li>
                  <a href="<?php echo $this->records['paging']['last']; ?>" aria-label="Next" class="btn btn-primary <?php if(empty($this->records['paging']['last'])) echo 'disabled'; else echo ' ';  ?>">
                    <span aria-hidden="true">Last</span>
                  </a>
                </li>
              </ul>
            </nav>  
          </div>
        </div>
        <?php else:?>
          <div class="row white_box">
            <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
          </div>
        <?php endif;?>
      </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
        <a href="javascript:void(0)" class="btn btn_compose" type="button" isCheckUser= "<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo 'yes'; else echo 'no' ?>" >Compose A Book</a>
        <?php include_once 'views/layout/'.$this->layout.'achives.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
