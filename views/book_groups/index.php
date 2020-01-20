
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7">
            <h2>Active Book Groups</h2>
          </div>
          <div class="col-sm-5">
            <form id="formClient-book_groups-search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search Book Group" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <span class="input-group-btn">
                  <button class="btn btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <?php if(!empty($this->records['data'])): ?>
        <div class="row book-group1">

          <?php foreach($this->records['data'] as $key => $record) { ?>

             <div class="col-md-6 col-sm-6">
                <div class="white_box">
                  <div class="img-box">

                  <?php  if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) { ?>
                        <?php if ($record['isDisapprove']) { ?>
                          <a class="isDisapprove" href="<?php echo RootURL."book-groups/".$record['slug'] ?>">
                               <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important;" >
                          </a>
                        <?php  }else { ?>
                          <a href="<?php echo RootURL."book-groups/".$record['slug'] ?>">
                               <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important;" >
                          </a>
                        <?php  } ?>
                    <?php  }else { ?>
                          <a  href="javascript:void(0)" class="DisapproveLg">
                               <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; style="height: 220px !important;" >
                          </a>
                    <?php  } ?>

                    <!-- <a href="<?php echo RootURL."book_groups/".$record['slug'] ?>">
                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'book_groups/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%; >
                    </a> -->
                  </div>
                  <div class="img-desc">


                      <?php  if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) { ?>
                        <?php if ($record['isDisapprove']) { ?>
                          <h3 class="f700"><a href="" class="isDisapprove" style="color: #333"><?php echo $record['title'] ?></a></h3>
                        <?php  }else { ?>
                           <h3 class="f700"><a href="<?php echo RootURL."book-groups/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                        <?php  } ?>
                    <?php  }else { ?>
                        <h3 class="f700"><a href="javascript:void(0)" class="DisapproveLg" style="color: #333"><?php echo $record['title'] ?></a></h3>
                    <?php  } ?>

                    <!-- <h3 class="f700"><a href="<?php echo RootURL."book-groups/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3> -->
                    <p>By: <span class="f400"><?php if ($record['users_show_name'] == 0) { echo $record['users_firstname'].' '.$record['users_lastname']; } else { echo $record['users_username']; }  ?></span></p>
                    <p>Category: <span class="f400">
                    
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
                      </p>
                    <p>Users: <span class="f400"><?php echo $record['userNum'] ?></span></p>
                  </div>
                  <div class="grey_box">
                  <?php  if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) { ?>
                        <?php if ($record['isDisapprove']) { ?>
                            <a href="" class="isDisapprove"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                        <?php  }else { ?>
                            <a href="<?php echo RootURL."book-groups/".$record['slug'] ?>"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                        <?php  } ?>
                    <?php  }else { ?>
                       <a href="javascript:void(0)" class="DisapproveLg"> <span><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                    <?php  } ?>
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
        <a href="javascript:void(0)" class="btn btn_compose" type="button" isCheckUser= "<?php if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) echo 'yes'; else echo 'no' ?>" >Create Book Group</a>
        <?php include_once 'views/layout/'.$this->layout.'rightBar_newGroup.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script>
  $('.isDisapprove').on('click', function(){
    confirm("You need permission to access group!");
  });
  $('.DisapproveLg').on('click', function(){
    confirm("Please, login to continue!");
  });
</script>