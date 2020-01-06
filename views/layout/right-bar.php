<?php global $app;?>
          <div class="col-md-3 side_bar">
            <h2>Find Us</h2>

            <ul class="list-inline top_social_icon">
              <li><a href="#"><img src="<?php echo RootREL; ?>media/img/facebook.jpg" class="img-responsive" alt="facebook"></a></li>
              <li><a href="#"><img src="<?php echo RootREL; ?>media/img/tweet.jpg" class="img-responsive" alt="tweet"></a></li>
              <li><a href="#"><img src="<?php echo RootREL; ?>media/img/youtube.jpg" class="img-responsive" alt="youtube"></a></li>
              <li><a href="#"><img src="<?php echo RootREL; ?>media/img/google.jpg" class="img-responsive" alt="google"></a></li>
              <li><a href="#"><img src="<?php echo RootREL; ?>media/img/pin.jpg" class="img-responsive" alt="pin"></a></li>
            </ul>

            <div class="space30"></div>
            <?php if($app['ctl'] === 'home' or $app['ctl'] === 'profile') {?>
              <h2>Opinions & Debates</h2>
            <?php }else { ?>
              <h3>Opinions & Debates</h3>
            <?php } ?>

            <div class="media">
            <?php if($this->opinion[0]['featured_image']){ ?>
              <div class="pull-left">
                <a href="<?php echo RootURL."opinions-debates/".$this->opinion[0]['slug'] ?>"><img src="<?php echo RootREL; ?>media/upload/<?= ($this->opinion[0]['featured_image']) ? 'opinions_debates/'.$this->opinion[0]['featured_image'] : "no_picture.png" ?>" class="img-responsive width100" alt="side_img"></a>
              </div>
            <?php } ?>
              <div class="media-body">
                <p><a href="<?php echo RootURL."opinions-debates/".$this->opinion[0]['slug'] ?>"><?php echo $this->opinion[0]['title'] ; ?></a></p>

                <p><?php if(strlen($this->opinion[0]['description']) > 20)  echo substr($this->opinion[0]['description'], 0, 20).'...'; else echo $this->opinion[0]['description'] ; ?></p>
              </div>
            </div>

            <div class="space30"></div>
            <?php if($app['ctl'] === 'home' or $app['ctl'] === 'profile') {?>
              <h2>Book Reviews</h2>
            <?php }else { ?>
              <h3>Book Reviews</h3>
            <?php } ?>

            <div class="media">
            <?php if($this->book[0]['featured_image']){ ?>
              <div class="pull-left">
                <a href="<?php echo RootURL."books/".$this->book[0]['slug'] ?>">
                <?php if (strpos($this->book[0]['featured_image'], "http://books.google.com/books/") !== false) { ?>
                  <img src="<?php echo $this->book[0]['featured_image']?>" class="img-responsive width100" alt="book-3" width=100%;>
                <?php } else { ?>
                  <img src="<?php echo RootREL; ?>media/upload/<?= ($this->book[0]['featured_image']) ? 'books/'.$this->book[0]['featured_image'] : "no_picture.png" ?>" class="img-responsive width100" alt="book-3" width=100%;>
                <?php } ?>
                </a>
              </div>
              <?php } ?>
              <div class="media-body">
                <p><a href="<?php echo RootURL."books/".$this->book[0]['slug'] ?>"><?php echo $this->book[0]['title'] ; ?></a></p>

                <p><?php if(strlen($this->book[0]['description']) > 20)  echo substr($this->book[0]['description'], 0, 20).'...'; else echo $this->book[0]['description'] ; ?></p>
              </div>
            </div>

            <div class="space30"></div>
            <?php if($app['ctl'] === 'home' or $app['ctl'] === 'profile') {?>
              <h2>Recent Blogs</h2>
            <?php }else { ?>
              <h3>Recent Blogs</h3>
            <?php } ?>

            <div class="media">
            <?php if($this->blog[0]['featured_image']){ ?>
              <div class="pull-left">
                <a href="<?php echo RootURL."blogs/".$this->blog[0]['slug'] ?>"><img src="<?php echo RootREL; ?>media/upload/<?= ($this->blog[0]['featured_image']) ? 'blogs/'.$this->blog[0]['featured_image'] : "no_picture.png" ?>" class="img-responsive width100" alt="side_img"></a>
              </div>
              <?php } ?>
              <div class="media-body">
                <p><a href="<?php echo RootURL."blogs/".$this->blog[0]['slug'] ?>"><?php  echo $this->blog[0]['title'] ; ?></a></p>

                <p><?php if(strlen($this->blog[0]['description']) > 20)  echo substr($this->blog[0]['description'], 0, 20).'...'; else echo $this->blog[0]['description'] ; ?></p>
              </div>
            </div>

            <div class="space30"></div>
            <br/><br/>

            <?php if($app['ctl'] === 'home' or $app['ctl'] === 'profile') {?>
              <h2>Queries</h2>
            <?php }else { ?>
              <h3>Queries</h3>
            <?php } ?>

            <div class="media">
            <?php if($this->query[0]['featured_image']){ ?>
              <div class="pull-left">
                <a href="<?php echo RootURL."queries/".$this->query[0]['slug'] ?>"><img src="<?php echo RootREL; ?>media/upload/<?= ($this->query[0]['featured_image']) ? 'queries/'.$this->query[0]['featured_image'] : "no_picture.png" ?>" class="img-responsive width100" alt="side_img"></a>
              </div>
              <?php } ?>
              <div class="media-body">
                <p><a href="<?php echo RootURL."queries/".$this->query[0]['slug'] ?>"><?php echo $this->query[0]['title'] ; ?></a></p>

                <p><?php if(strlen($this->query[0]['description']) > 20)  echo substr($this->query[0]['description'], 0, 20).'...'; else echo $this->query[0]['description'] ; ?></p>
              </div>
            </div>