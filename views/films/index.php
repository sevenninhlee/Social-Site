
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>Films</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-films-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Book Films" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <span class="input-group-btn">
                  <button class="btn btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <?php if(!empty($this->records['data'])): ?>
        <div class="row book-group1" >

          <?php foreach($this->records['data'] as $key => $record) { ?>

             <div class="col-md-6 col-sm-6">
                <div class="white_box">
                  <div class="img-box">
                    <a href="<?php echo RootURL."films/review/".$record['slug'] ?>">
                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'films/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important">
                    </a>
                  </div>
                  <div class="img-desc" style="min-height:170px;">
                    <h3 class="f700"><a href="<?php echo RootURL."films/review/".$record['slug'] ?>" style="color: #333"><?php if(strlen($record['title']) > 30)  echo substr($record['title'], 0, 30).'...'; else echo $record['title'] ; ?></a></h3>
                    <p>Category: 
                      <span class="f400">
                      <?php 
                        if($record['ListCate'] == null){
                          echo '<span>Unkown category</span>';
                        }else {
                          $cat_str = "";
                          foreach ($record['ListCate'] as $key => $value) {
                            $cat_str.=$value['name']." | ";
                          }
                        $cat_str = rtrim($cat_str," | ");
                        if(strlen($cat_str) > 25) echo '<span>'.substr($cat_str, 0, 25).'...</span>'; else  echo '<span>'.$cat_str.'</span>';
                        }
                      ?> 
                      </span> | Year: <span class="f400"><?= $record['year']?></span></p> 
                    <span class="space10 txt_des" style="height: 80px;"><?php if(strlen($record['description']) > 80)  echo substr($record['description'], 0, 80).'...'; else echo $record['description'] ; ?></span>    
                  </div>
                  <div class="grey_box">
                    <a href="<?php echo RootURL."films/review/".$record['slug'] ?>"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                  </div>
                </div>
              </div>
              <?php } ?>
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
        <!-- <?php include_once 'views/layout/'.$this->layout.'rightBar_newGroup.php'; ?> -->
        <div class="space30"></div>
        <?php if(count($this->newFilms)){ ?>
        <h3 class="f700">New Films</h3>
        <?php } ?>
        <?php foreach($this->newFilms as $key => $newFilm) { ?>
        <div class="white_box no-padding">
            <div class="img-box" >
            <a href="<?php echo RootURL."films/review/".$newFilm['slug'] ?>"><img style="max-height: 255x;" src="<?php echo RootREL; ?>media/upload/<?= ($newFilm['featured_image']) ? 'films/'.$newFilm['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
            </div>
            <div class="img-desc">
            <h4 class="f700"><a style="color: #333" href="<?php echo RootURL."films/review/".$newFilm['slug'] ?>"><?= $newFilm['title'] ?></a></h4>
            <p>Category: 
              <span class="f400">
              <?php 
                  if($newFilm['ListCate'] == null){
                    echo '<span>Unkown category</span>';
                  }else {
                    $cat_str = "";
                    foreach ($newFilm['ListCate'] as $key => $value) {
                      $cat_str.=$value['name']." | ";
                    }
                    echo '<span>'.rtrim($cat_str," | ").'</span>';
                  }
								?> 
            </p>
            </span>
            </div>              
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
