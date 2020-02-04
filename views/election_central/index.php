<?php include_once 'views/layout/outside/' . $this->layout . 'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>Election Central</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-blogs-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Election Central" value="<?php if (isset($_GET['search'])) {
                                                                                                                    echo $_GET['search'];
                                                                                                                  } ?>">
                <span class="input-group-btn">
                  <button class="btn btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div>
        <p>Election Central&rsquo;s goal is to present both data on important elections AND information on candidates and key issues. &nbsp;Moreover, we will also present summaries of thought-provoking election-related analyses.</p>

<p><strong>Election 2020: &nbsp;</strong></p>

<ol>
	<li><a href="https://www.realclearpolitics.com/epolls/latest_polls/democratic_nomination_polls/" target="_blank">Latest Dem 2020 Presidential Primary Polls&nbsp;</a></li>
	<li><a href="https://www.realclearpolitics.com/epolls/latest_polls/national_president/" target="_blank">Latest General Election Presidential Polls</a></li>
	<li><a href="https://projects.fivethirtyeight.com/polls/" target="_blank">Latest Presidential Approval Polls</a></li>
	<li><a href="https://enlight21.com/election-central/candidates-positions-2020-democratic-candidates" >2020 Democratic Party Candidates and Positions</a></li>
</ol></div>
        <?php if (!empty($this->records['data'])) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="space30 visible-xs"></div>
              <?php foreach ($this->records['data'] as $key => $record) { ?>
                <div class="white_box">
                  <div class="row <?php if ($key >= 1) echo "space30"; ?>">
                    <?php if ($record['featured_image']) { ?>
                      <div class="col-sm-5">
                        <div class="img-box">
                          <a href="<?php echo RootURL . "election-central/" . $record['slug'] ?>" style="color: #333">
                            <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'election_central/' . $record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="election_central-<?= $record['id'] ?>" style="max-height:177px;">
                          </a>
                        </div>
                      </div>
                      <div class="col-sm-7">
                      <?php } else { ?>
                        <div class="col-sm-12">
                        <?php } ?>
                        <h3><a href="<?php echo RootURL."election-central/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>

                          <div class="txt_des"><?php if (strlen($record['description']) > 300)  echo substr($record['description'], 0, 300) . '...';
                                                    else echo $record['description']; ?></div>

                          <div class="grey_box">
                            <a href="<?php echo RootURL."election-central/".$record['slug'] ?>"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
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
            <div class="space30"></div>
            <?php if (count($this->newElectionCentrals)) { ?>
              <h3 class="f700">New Election Central</h3>
            <?php } ?>
            <?php foreach ($this->newElectionCentrals as $key => $newElectionCentral) { ?>
              <div class="white_box no-padding">
                <?php if ($newElectionCentral['featured_image']) { ?>
                  <div class="img-box">
                    <a href="<?php echo RootURL . "election-central/" . $newElectionCentral['slug'] ?>"><img style="max-height: 255px;" src="<?php echo RootREL; ?>media/upload/<?= ($newElectionCentral['featured_image']) ? 'election_central/' . $newElectionCentral['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3"></a>
                  </div>
                <?php } ?>
                <div class="img-desc">
                  <h4 class="f700"><a style="color: #333" href="<?php echo RootURL . "election-central/" . $newElectionCentral['slug'] ?>"><?= $newElectionCentral['title'] ?></a></h4>
                </div>
              </div>
            <?php } ?>
          </div>
      </div>
    </div>
</section>

<?php include_once 'views/layout/' . $this->layout . 'footerPublic.php'; ?>