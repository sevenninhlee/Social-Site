<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>News Page</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-blogs-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search New" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
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
                <?php foreach($this->records['data'] as $key => $record) { ?>
                      <div class="white_box">
                        <div class="row <?php if($key >= 1) echo "space30" ;?>">
                          <?php if($record['featured_image']){ ?>
                          <div class="col-sm-5">
                            <div class="img-box">
                              <a href="<?php echo RootURL."news/".$record['slug'] ?>" style="color: #333">
                              <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'news/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="news-<?=$record['id']?>" style="max-height:177px;">
                              </a>
                            </div>
                          </div>
                          <div class="col-sm-7">
                          <?php } else { ?>
                            <div class="col-sm-12">
                            <?php } ?>
                            <h3><a href="<?php echo RootURL."news/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>

                            <p class="cate_txt"> <span>Category:</span>
                            <?php 
                              if($record['ListCate'] == null){
                                echo '<span>Unkown category</span>';
                              }else {
                                $cat_str = "";
                                foreach ($record['ListCate'] as $key => $value) {
                                  $cat_str.=$value['name']." | ";
                                }
                                echo '<span>'.rtrim($cat_str," | ").'</span>';
                              }
                            ?>

                            <div class="txt_des"><?php if(strlen($record['description']) > 300)  echo substr($record['description'], 0, 300).'...'; else echo $record['description'] ; ?></div>

                            <div class="grey_box">
                            <a href="<?php echo RootURL."news/".$record['slug'] ?>" > <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php } ?>
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
        <div class="space30"></div>
        <?php if(count($this->newNews)){?>
        <h3 class="f700">New News</h3>
        <?php } ?>
        <?php foreach($this->newNews as $key => $newNew) { ?>
        <div class="white_box no-padding">
          <?php if($newNew['featured_image']){ ?>
            <div class="img-box">
            <a href="<?php echo RootURL."news/".$newNew['slug'] ?>"><img style="max-height: 255px;" src="<?php echo RootREL; ?>media/upload/<?= ($newNew['featured_image']) ? 'news/'.$newNew['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
            </div>
          <?php } ?>
            <div class="img-desc">
            <h4 class="f700"><a style="color: #333" href="<?php echo RootURL."news/".$newNew['slug'] ?>"><?= $newNew['title'] ?></a></h4>
            <p>Category: 
              <span class="f400">
                <?php 
                  if($newNew['ListCate'] == null){
                    echo '<span>Unkown category</span>';
                  }else {
                    $cat_str = "";
                    foreach ($newNew['ListCate'] as $key => $value) {
                      $cat_str.=$value['name']." | ";
                    }
                    echo '<span>'.rtrim($cat_str," | ").'</span>';
                  }
								?>                
              </span>
            </p>
            </div>              
        </div>
        <?php } ?>        
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
