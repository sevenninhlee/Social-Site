<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <section class="main_section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
                <h2 class="f700 ffmily">Contact us</h2>
          <?php if(!isset($this->msg)) {?>
          <form id="addcontact" method="post" action="<?=vendor_app_util::url(array('ctl'=>'contact'))?>">
            <div class="form-group space30">
              <div class="row">
                <div class="col-sm-3">
                  <label>First Name<span>*</span></label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="contact[firstname]" class="form-control" required>
                  <?php if( isset($this->errors['firstname'])) { ?>
                    <p class="text-danger"><?=$this->errors['firstname']; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label>Last Name</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="contact[lastname]" class="form-control" required>
                  <?php if( isset($this->errors['lastname'])) { ?>
                    <p class="text-danger"><?=$this->errors['lastname']; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Email<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                    <input type="email" name="contact[email]" class="form-control" required>
                    <?php if( isset($this->errors['email'])) { ?>
                      <p class="text-danger"><?=$this->errors['email']; ?></p>
                    <?php } ?>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label>Content<span>*</span></label>
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <textarea cols="84" rows="7" class="form-control" name="contact[content]" required></textarea>
                      <?php if( isset($this->errors['content'])) { ?>
                        <p class="text-danger"><?=$this->errors['content']; ?></p>
                      <?php } ?>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 space20">
                  <ul class="list-inline">
                    <li class="pull-right"><button type="submit" class="btn btn_review" name="btn_submit">Send</button></li>
                  </ul>
                </div>
            </div>
          </form>
          <?php }else{?>
            <p class="text-danger"><?=$this->msg; ?></p>
          <?php } ?>
          </div>
        <?php include_once 'views/layout/'.$this->layout.'right-bar.php'; ?>
        </div>
        </div>
      </div>
    </section>
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>

