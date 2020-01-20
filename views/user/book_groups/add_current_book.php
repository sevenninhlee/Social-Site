
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
            <div class="Add_box">  
              <h5>Add Current Read</h5>
              <hr>            
              <form method="post" action="<?=vendor_app_util::url(array("area" => "user",'ctl'=>'book_groups', 'act' => 'add_current_book?group_id='.$this->bgr_id)); ?>" id="current_add_sub" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Book Title:</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="book_group[title]" class="form-control">
                      <?php if( isset($this->errors['title'])) { ?>
                        <p class="text-danger"><?=$this->errors['title']; ?></p>
                    <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Author:</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="book_group[author]" class="form-control">
                      <?php if( isset($this->errors['author'])) { ?>
                        <p class="text-danger"><?=$this->errors['author']; ?></p>
                    <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Category:</label>
                    </div>
                    <div class="col-sm-6">
                    <input type="text" disabled name="" value="<?= $this->categories['name'] ?>" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Isbn:</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" name="book_group[ISBN]" class="form-control">
                      <?php if( isset($this->errors['author'])) { ?>
                        <p class="text-danger"><?=$this->errors['author']; ?></p>
                    <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="control-label col-md-3" for="featured_image">
                      <label>Book Image:</label>
                    </div>
                    <div class="controls col-md-6">
                        <input type="file" id="featured_image" name="image" style="display: block; padding: 5px; margin-bottom: 5px;" placeholder="" class="form-control">
                        <?php if( isset($this->errors['featured_image'])) { ?>
                            <p class="text-danger"><?=$this->errors['featured_image']; ?></p>
                        <?php } ?>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Book Description:</label>
                    </div>
                    <div class="col-sm-9">
                    <textarea rows="30" cols="50"  type="text" id="description" name="book_group[description]" placeholder="" class="form-control" value=""></textarea>
                        <?php if( isset($this->errors['description'])) { ?>
                            <p class="text-danger"><?=$this->errors['description']; ?></p>
                        <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-review save_user" name="btn_submit" type="submit">Add Current Read</button>
                </div>
              <h5>Manage Subscribers</h5>
              <hr> 
                <div class="row">
                  <div class="col-md-6">
                    <?php if ($this->users) { ?>
                    <?php $i = 0;$j =0 ?>
                   <?php foreach($this->users as $key => $user) { ?>
                    <?php $i += 1;$j += 1; ?>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-4">
                          <label><?php if ($user['show_name'] == 0) { echo $user['firstname'].' '.$user['lastname']; } else { echo $user['username']; }  ?></label>
                        </div>
                        <div class="col-sm-7">
                          <div class="radio radio-info radio-inline">
                              <input type="radio" id="inlineRadio<?= $i ?>" value="1"  name="isRead[<?= $user['user_id'] ?>]" checked="">
                              <label for="inlineRadio<?= $i ?>"> Yes </label>
                          </div>
                          <div class="radio radio-inline">
                              <input type="radio" id="inlineRadio<?= $i+1 ?>" value="0"  name="isRead[<?= $user['user_id'] ?>]">
                              <label for="inlineRadio<?= $i+=1 ?>"> No </label>
                          </div>
                        </div>
                      </div>
                    </div>          
                     <?php } ?>
                     <?php  } else { ?>
                        <tr role="row"><td colspan="8"><h3 class="text-danger text-center"> No Member </h3></td></tr>
                     <?php } ?>
                  </div>
                </div>
              </form>
            </div>

          </div>
      <div class="col-md-3">
        <?php include_once 'views/layout/'.$this->layout.'find_us_blog_category.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script src="<?php echo RootREL; ?>media/admin/js/form_slug.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>

  CKEDITOR.replace( 'description', {} );
  CKEDITOR.config.baseFloatZIndex = 100001;

</script>

