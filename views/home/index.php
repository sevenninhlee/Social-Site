
<?php include_once 'views/layout/outside/' . $this->layout . 'headerOutside.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <h5 class="block-title"><a href="https://enlight21.com/films">Films & Videos</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->film_articles as $record) { ?>
          <div class="item">
            <a href="<?php echo RootURL . "films/" . $record['slug'] ?>">
              <img class="img-responsive center-block" src="<?= UploadURI . 'films/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" alt="film">
            </a>
            <span class="title"><a style="color: #333;" href="<?php echo RootURL . "films/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php echo $record['title']; ?></a></span>
          </div>
        <?php } ?>
      </div>

    </div>

    <div class="col-md-6" style="border-left: 1px solid #ebebeb;border-right: 1px solid #ebebeb;">
      <h5 class="block-title"><a href="https://enlight21.com/news">News</a></h5>
      <div class="block-wrapper">
      <?php if($this->listNew[0]['featured_image']){ ?> 
        <div style="border-bottom: 1px solid #CCC" class="item">
          <img src="<?= UploadURI . 'news/' . (($this->listNew[0]['featured_image']) ? $this->listNew[0]['featured_image'] : 'no_picture.png'); ?>" class="img-responsive" alt="...">
          <span class="title"><a style="font-size: 32px" href="<?php echo RootURL . "news/" . $this->listNew[0]['slug'] ?>"><?=$this->listNew[0]['title']?></a></span>
          <p class="description"><?=$this->listNew[0]['short_description']?></p>
        </div>
        <?php } else { ?>
            <div class="item clearfix">
              <div class="row">
                <span class="title">
                <a href="<?php echo RootURL . "news/" . $this->listNew[0]['slug'] ?>"><?=$this->listNew[0]['title']?></a></span>
                <p class="description"><?=$this->listNew[0]['short_description']?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="block-wrapper">
        <?php foreach ($this->listNew as $key => $record) : if ($key==0) continue;?>
        <?php if($record['featured_image']){ ?>
          <div class="item-small">
            <div class="left">
              <img src="<?= UploadURI . 'news/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive" alt="...">
            </div>
            <div class="right">
              <span class="title">
                <a href="<?php echo RootURL . "news/" . $record['slug'] ?>">
                  <?=$record['title']?>
                </a>
              </span>
              <div class="description description-collapse">
                <?php echo $record['short_description']; ?>
              </div>
            </div>
          </div>
          <?php } else { ?>
            <div class="item-small">
              <div class="row">
                <span style="font-weight: bold; font-size: 20px;" class="title"><a style="color: #121212;" href="<?php echo RootURL . "news/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                <p class="description"><?=$record['short_description'] ?></p>
            </div>
          </div>
          <?php } ?>
        <?php endforeach ?>
      </div>
    </div>

    <div class="col-md-3">
      <h5 class="block-title"><a href="https://enlight21.com/blogs">Featured Blogs</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->blog_articles as $record) { ?>
          <?php if($record['featured_image']){ ?>
          <div class="item">
            <div class="top">
              <span class="title">
                <a style="color: #333;" href="<?php echo RootURL . "blogs/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php echo $record['title']; ?></a>
                <br/><span style="font-size:15px" class="author"><?= $record['author'] ?></span>
              </span>
              <a href="<?php echo RootURL . "blogs/" . $record['slug'] ?>">
                <img src="<?= UploadURI . 'blogs/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive center-block" alt="film">
              </a>
            </div>
          </div>
          <?php } else { ?>
            <div class="item clearfix">
            <div class="row">
              <span class="title" style="font-weight: 200; color: #333;">
                <a href="<?php echo RootURL . "blogs/" . $record['slug'] ?>"><?=$record['title']?></a>
                <br/><span style="font-size:15px" class="author"><?= $record['author'] ?></span>
              </span>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
      </div>

      <h5 class="block-title"><a href="https://enlight21.com/blogs">Community Blogs</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->community_blog as $record) { ?>
          <?php if($record['featured_image']){ ?>
          <div class="item">
            <div class="top">
              <span class="title">
                <a style="color: #333;" href="<?php echo RootURL . "blogs/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php echo $record['title']; ?></a>
                <br/><span style="font-size:15px" class="author"><?php if ($record['show_name'] == 0) { echo $record['firstname'].' '.$record['lastname']; } else { echo $record['username']; }  ?></span>
              </span>
              <a href="<?php echo RootURL . "blogs/" . $record['slug'] ?>">
                <img src="<?= UploadURI . 'blogs/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive center-block" alt="film">
              </a>
            </div>
          </div>
          <?php } else { ?>
            <div class="item clearfix">
            <div class="row">
              <span class="title" style="font-weight: 200; color: #333;">
                <a href="<?php echo RootURL . "blogs/" . $record['slug'] ?>"><?=$record['title']?></a>
                <br/><span style="font-size:15px" class="author"><?php  if ($record['show_name'] == 0) { echo $record['firstname'].' '.$record['lastname']; } else { echo $record['username']; } ?></span>
              </span>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
      </div>

      <h5 style="margin-top: 50px;" class="block-title"><a href="https://enlight21.com/book-groups">Book Groups</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->book_group_articles as $record) { ?>
          <div class="item">
            <div class="top">
              <span class="title">
                 <a style="color: #333;font-weight:bold;" href="<?php echo RootURL . "book-groups/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a>
                 <br/> <span style="font-size: 14px;"> <?=$record['short_description'] ?></span>
              </span>
              <a href="<?php echo RootURL . "book-groups/" . $record['slug'] ?>" style="color: #333;">
                <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                  <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                <?php } else { ?>
                  <img src="<?php echo RootREL; ?>media/upload/<?= 'book_groups/'.$record['featured_image'] ?>" class="img-responsive" alt="book-3" width=100%;>
                <?php } ?>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
       <?php if(!isset($_SESSION['user'])){ ?>
        <div class="block-signup">
          <p class="text-center">Sign up with Enlight21 and be part of our comunity: <span class="signup-today"><a href="<?php echo RootURL."register" ?>" >Sign Up Today > ></a></span></p>
        </div>
      <?php } else { ?>
          <div style="border-bottom: 0" class="block-signup"></div>
      <?php } ?>
    </div>
  </div>
  <div class="row" style="margin: 30px 0;">
    <div class="col-md-9 block-wrapper" style="border-right: 1px solid #ebebeb;">
      <h5 class="block-title"><a href="https://enlight21.com/election-central">Election Central</a></h5>
      <div class="central_content">
      <?php foreach ($this->listElectionCentralArticle as $key => $record) :?>
        <?php if($record['featured_image']){ ?>
          <div class="row">
            <div class="item clearfix">
              <div class="col-md-4">
                <img src="<?= UploadURI . 'election_central/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive" alt="...">
              </div>
              <div class="col-md-8">
                <span class="title"><a href="<?php echo RootURL . "election-central/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                <p class="description"><?=$record['short_description'] ?></p>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="row">
            <div class="item clearfix">
              <div class="col-md-12">
                <span class="title"><a href="<?php echo RootURL . "election-central/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                <p class="description"><?=$record['short_description'] ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php endforeach ?>
      </div>

      <h5 class="block-title"><a href="https://enlight21.com/must-reads">Must Reads</a></h5>

      <div class="central_content">
      <?php foreach ($this->listMustReadsArticle as $key => $record) :?>
        <?php if($record['featured_image']){ ?>
          <div class="row">
            <div class="item clearfix">
              <div class="col-md-4">
                <img src="<?= UploadURI . 'must_reads/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive" alt="...">
              </div>
              <div class="col-md-8">
                <span class="title"><a href="<?php echo RootURL . "must-reads/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                <p class="description"><?=$record['short_description'] ?></p>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="row">
            <div class="item clearfix">
              <div class="col-md-12">
                <span class="title"><a href="<?php echo RootURL . "must-reads/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                <p class="description"><?=$record['short_description'] ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php endforeach ?>
      </div>

      <h5 class="block-title"><a href="https://enlight21.com/environment">Environment</a></h5>
      <div class="central_content">
      <?php foreach ($this->listEnvironmentArticle as $key => $record) :?>
          <?php if($record['featured_image']){ ?>
            <div class="row">
              <div class="item clearfix">
                <div class="col-md-4">
                  <img src="<?= UploadURI . 'environment/' . (($record['featured_image']) ? $record['featured_image'] : 'no_picture.png'); ?>" class="img-responsive" alt="...">
                </div>
                <div class="col-md-8">
                  <span class="title"><a href="<?php echo RootURL . "environment/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                  <p class="description"><?=$record['short_description'] ?></p>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="row">
              <div class="item clearfix">
                <div class="col-md-12">
                  <span class="title"><a href="<?php echo RootURL . "environment/" . $record['slug'] ?>"><?=$record['title']?></a></span>
                  <p class="description"><?=$record['short_description'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
      <?php endforeach ?>
      </div>
    </div>
    <div class="col-md-3">
    
      <h5 class="block-title"><a href="https://enlight21.com/queries">Queries</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->query as $record) { ?>
          <div class="item">
            <div class="top">
            <?php if($record['featured_image']){ ?>
              <span class="title"><a style="color: #333;" href="<?php echo RootURL . "queries/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
              <a href="<?php echo RootURL . "queries/" . $record['slug'] ?>" style="color: #333;">
                <img src="<?= UploadURI . 'queries/' . $record['featured_image']  ?>" class="img-responsive center-block" alt="film">
              </a>
            <?php } else { ?>
              <span style="width: 100%;" class="title"><a style="color: #333;font-weight:bold;" href="<?php echo RootURL . "queries/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
            <?php } ?>
             
            </div>
          </div>
        <?php } ?>
      </div>
      <h5 style="margin-top: 50px;" class="block-title"><a href="https://enlight21.com/opinions-debates">Opinions</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->opinion as $record) { ?>
          <div class="item">
            <div class="top">
            <?php if($record['featured_image']){ ?>
              <span class="title"><a style="color: #333;font-weight:bold;" href="<?php echo RootURL . "opinions-debates/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
              <a href="<?php echo RootURL . "opinions-debates/" . $record['slug'] ?>" style="color: #333;">
                  <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                    <img src="<?php echo $record['featured_image']?>" class="img-responsive" width=150; height=200;>
                  <?php } else { ?>
                    <img src="<?php echo RootREL; ?>media/upload/<?= 'opinions_debates/'.$record['featured_image'] ?>" class="img-responsive" width=150; height=200;>
                  <?php } ?> 
              </a>
            <?php } else { ?>
              <span style="width: 100%;" class="title"><a style="color: #333;font-weight:bold;" href="<?php echo RootURL . "opinions-debates/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
            <?php } ?>
             
            </div>
          </div>
        <?php } ?>
      </div>
      <h5 style="margin-top: 50px;" class="block-title"><a href="https://enlight21.com/books">Reviews</a></h5>
      <div class="block-wrapper">
        <?php foreach ($this->book as $record) { ?>
          <div class="item">
            <div class="top">
            <?php if($record['featured_image']){ ?>
              <span class="title"><a style="color: #333;font-weight:bold;" href="<?php echo RootURL . "books/" . $record['slug'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
              <a href="<?php echo RootURL . "books/" . $record['slug'] ?>" style="color: #333;">
                <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                  <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                <?php } else { ?>
                  <img src="<?php echo RootREL; ?>media/upload/<?= 'books/'.$record['featured_image'] ?>" class="img-responsive" alt="book-3" width=100%;>
                <?php } ?>
              </a>
            <?php } else { ?>
              <span style="width: 100%;" class="title"><a style="color: #333;" href="<?php echo RootURL . "books/" . $record['id'] ?>" title="<?=$record['title']?>"><?php  echo $record['title']; ?></a></span>
            <?php } ?>
             
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</div>

<?php include_once 'views/layout/' . $this->layout . 'footerPublic.php'; ?>