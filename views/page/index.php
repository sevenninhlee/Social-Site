<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- start main sections -->
    <section class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h2><?=$this->record['title']?></h2>
            
            <div class="white_box">
              <div class="space30"><?=$this->record['content']?></div>
            </div>
          </div>
          <?php include_once 'views/layout/'.$this->layout.'right_barPublic.php'; ?>
        </div>
      </div>
    </section>
    <!-- End main sections -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>