
<?php 
  include_once 'views/layout/outside/'.$this->layout.'headerOutside.php';
?>

<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-sm-7 col-xs-7">
            <h2>Book Review </h2>                
          </div>
          <div class="col-sm-5 col-xs-5">
            <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
          </div>
        </div>            

        <div class="row space30">
          <div class="col-md-12">
            <div class="white_box">                  
              <div class="media heightclass">
                <div class="media-left" style="width: 160px;">
                  <img src="<?php echo RootREL; ?>media/upload/<?= ($this->record['featured_image']) ? 'books/'.$this->record['featured_image'] : "no_picture.png" ?>" width=150; height=200; >
                      <div class="rating" style=" margin-left: 30px;" id="rate3" value="<?= ($this->getAveRating) ? $this->getAveRating : 0 ?>" enabled="true"></div>
                </div>
                <div class="media-right">
                  <h5 class="f700 m0 color555554"><?= ($this->record['title']) ?></h5>
                  <p class="f700 by-txt color555554">By: <span class="f400"><a><?= ($this->record['author']) ? $this->record['author'] : "unknown" ?></a></span> Category: <span class="f400"><a><?= $this->category['name'] ?></a></span> Year: <span class="f400"><?= ($this->record['year']) ?></span></p>
                  <!-- <p> <?= ($this->record['description']) ?> </p> -->

                  <p>
                    <?php if(strlen($this->record['description']) > 300) { ?>

                      <?php echo substr($this->record['description'], 0, 270) ?>
                      <p class="read-more-show ">Read more</i></p>
                      <div class="read-more-content"> <?php echo substr( $this->record['description'], 270, -1) ?>
                      <p class="read-more-hide ">Less <i class="fa fa-angle-up"></i></p> </div>
                    <?php } else echo $this->record['description'] ; ?>
                  </p>
                </div>
              </div>                                    
            </div>
            
            <!-- <div>
                <?php html_helper::like(1,'review_rating_model',$this->checkUserLike, $this->totalLike)?>
            </div> -->
            <div class="white_box2 space30">
              <h3>SHARE THIS BOOK REVIEW</h3>

              <a class="btn btn_fb" type="button">Facebook</a>

              <a class="btn btn_tweet" type="button">Twitter</a>

              <a class="btn btn_google" type="button">Google+</a>

              <span class="counter">718</span>
            </div>

            <div class="white_box space30" id="target">
              <h5>Edit Review:</h5>
              <hr>
              <form>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                      <label>Rating:</label>
                    </div>
                    <div class="col-sm-10">
                      <div class="rating"  id="rate3" value="<?= $this->reviewUser['value'] ?>" enabled="1" ></div> 
                      <?php if( isset($this->errors['value'])) { ?>
                        <p class="text-danger"><?=$this->errors['value']; ?></p>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                      <label>Review:</label>
                    </div>
                    <div class="col-sm-10" >
                      <textarea cols="12" rows="7" id="review" class="form-control review" value=""><?php if(isset($this->reviewUser['review'])) echo $this->reviewUser['review'] ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group text-right">
                  <button 
                    class="btn btn_editrv btn_review" 
                    type="button" 
                    slugObject = "<?=$this->record['slug']?>"
                    disabled="true"
                    idObject="<?= $this->idObject ?>"
                    id="<?= $this->reviewUser['id'] ?>"
                  >
                      Save
                  </button>                      
                </div>

              </form>
              <div class="row">
                <div class="col-md-12">
                  <nav aria-label="Page navigation" class="pagi_nation">
                  </nav>
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
<script>
  $(document).ready(function(){
    $('html, body').animate({
        scrollTop: $('#target').offset().top
    }, 200);
  });
</script>
<script>
  var btn_submit = $('.btn_editrv').attr('id');
  $("form").bind("change keyup", function(event){
    document.getElementById(""+btn_submit).disabled = false;
  });
</script>