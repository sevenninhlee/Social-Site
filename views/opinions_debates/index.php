<?php include_once 'views/layout/outside/' . $this->layout . 'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>Opinions</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-books-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Opinions" value="<?php if (isset($_GET['search'])) {
                                                                                                              echo $_GET['search'];
                                                                                                            } ?>">
                <span class="input-group-btn">
                  <button class="btn btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <?php if (!empty($this->records['data'])) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="space30 visible-xs"></div>
              <div class="white_box">

                <?php foreach ($this->records['data'] as $key => $record) { ?>
                  <div class="row <?php if ($key >= 1) echo "space30"; ?>">
                    <?php if ($record['featured_image']) { ?>
                      <div class="col-sm-5">
                        <div class="img-box">
                          <a href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>" >
                            <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'opinions_debates/' . $record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="opinion_debate-3" width=100%;>
                          </a>
                        </div>
                      </div>
                      <div class="col-sm-7">
                      <?php } else { ?>
                        <div class="col-sm-12">
                        <?php } ?>
                        <h3><a href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>"  style="color: #333"><?php echo $record['title'] ?></a></h3>
                        <span class="txt_des"><?php if (strlen($record['description']) > 300)  echo substr($record['description'], 0, 300) . '...';
                                                  else echo $record['description']; ?></span>

                        <div class="grey_box gray1">
                          <span class="f700"><?php echo $record['getTotalAll']['total_likes']; ?> Likes | <?php echo $record['getTotalAll']['total_reviews']; ?> Reviews
                            <a  href="<?php echo RootURL."opinions-debates/".$record['slug'] ?>" class="pull-right"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
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
                      <a href="<?php echo $this->records['paging']['first']; ?>" aria-label="First" class="btn btn-primary <?php if (empty($this->records['paging']['first'])) echo 'disabled';
                                                                                                                              else echo ' ';  ?>">
                        <span aria-hidden="true">First</span>
                      </a>
                    </li>
                    <?php foreach ($this->records['paging']['pages'] as $key => $page) { ?>
                      <li class="<?php if ($page['current_page'] === 'yes') echo 'active';
                                      else echo ' '; ?>"><a href="<?php echo $page['url']; ?>"><?php echo $page['page']; ?></a></li>
                    <?php } ?>

                    <li>
                      <a href="<?php echo $this->records['paging']['last']; ?>" aria-label="Next" class="btn btn-primary <?php if (empty($this->records['paging']['last'])) echo 'disabled';
                                                                                                                            else echo ' ';  ?>">
                        <span aria-hidden="true">Last</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          <?php else : ?>
            <div class="row white_box">
              <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
            </div>
          <?php endif; ?>
          </div>

          <div class="col-md-3">
            <?php include_once 'views/layout/' . $this->layout . 'find_us_blog_category.php'; ?>
            <a href="javascript:void(0)" class="btn btn_compose" type="button" isCheckUser="<?php if ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo 'yes';
                                                                                            else echo 'no' ?>">Compose A Opinions</a>
            <div class="space30"></div>
            <?php if (count($this->newOpinions)) { ?>
              <h3 class="f700">New Opinions</h3>
            <?php } ?>
            <?php foreach ($this->newOpinions as $key => $newOpinion) { ?>
              <div class="white_box no-padding">

              <?php if($newOpinion['featured_image']){ ?>
                <div class="img-box">
                  <a href="<?php echo RootURL . "opinions-debates/" . $newOpinion['slug'] ?>"><img style="max-height: 255x;" src="<?php echo RootREL; ?>media/upload/<?= ($newOpinion['featured_image']) ? 'opinions_debates/' . $newOpinion['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
                </div>
              <?php } ?>
                <div class="img-desc">
                  <h4 class="f700"><a style="color: #333" href="<?php echo RootURL . "opinions-debates/" . $newOpinion['slug'] ?>"><?= $newOpinion['title'] ?></a></h4>
                  <p>Category:
                    <span class="f400">
                      <?php
                        if ($newOpinion['ListCate'] == null) {
                          echo '<span>Unkown category</span>';
                        } else {
                          $cat_str = "";
                          foreach ($newOpinion['ListCate'] as $key => $value) {
                            $cat_str .= $value['name'] . " | ";
                          }
                          echo '<span>' . rtrim($cat_str, " | ") . '</span>';
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
<?php include_once 'views/layout/' . $this->layout . 'footerPublic.php'; ?>