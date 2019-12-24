<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
            <!-- <h2 class="ffmily">Book Group Edit</h2> -->
            <ul class="list-inline">
                  <li> <h2 class="ffmily">Book Group Edit</h2></li>
                  <li class="pull-right">
                    <a href="<?=vendor_app_util::url(array("area" => "user",'ctl'=>'book_groups', 'act' => 'add_current_book?group_id='.$this->group_id)); ?>" class="f700" data-toggle="popover" data-placement="bottom" >Create current read</a>
                  </li>
              </ul>
            <div class="Add_box">              
              <form action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"book_groups", "act"=>"edit/".$this->record['id']]) ?>" method="post" enctype="multipart/form-data" class="">
                <div class="form-group row">
                  <!-- Title -->
                  <label class="control-label col-md-3" for="title">Group Name:</label>
                  <div class="controls col-md-6" >
                    <input type="text" id="book_groups_form_name" name="book_group[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
                    <?php if( isset($this->errors['title'])) { ?>
                      <p class="text-danger"><?=$this->errors['title']; ?></p>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row hide">
                  <!-- Slug -->
                  <label class="control-label col-md-3" for="slug">Slug:</label>
                  <div class="controls col-md-6">
                      <input type="text" id="book_groups_form_slug" name="book_group[slug]" placeholder="" class="form-control" value="<?php if(isset($this->record['slug'])) echo $this->record['slug']; ?>">
                      <?php if( isset($this->errors['slug'])) { ?>
                        <p class="text-danger"><?=$this->errors['slug']; ?></p>
                      <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Category:</label>
                    </div>
                    <div class="col-sm-6">
                      <select  name="book_group[categories_id]" id="input-categories_id" class="form-control">
                        <option value="0">Unkown category</option>
                        <?php foreach ($this->categories['data'] as $record) { ?>
                        <option value="<?php echo $record['id']?>" <?php if(isset($this->record['categories_id']) && $this->record['categories_id'] == $record['id']) echo 'selected'; ?>>
                          <?php echo $record['name']?>
                        </option>
                        <?php } ?>
                      </select>
                    <?php if( isset($this->errors['categories_id'])) { ?>
                      <p class="text-danger"><?=$this->errors['categories_id']; ?></p>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <!--  Featured Image -->
                  <label class="control-label col-md-3" for="featured_image"> Featured Image:</label>
                  <div class="controls col-md-6">
                      <input type="file" id="featured_image" style="display: block; padding: 5px; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                      <?php if(isset($this->record['featured_image'])) { ?>
                        <img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
                      <?php } ?>
                    <?php if( isset($this->errors['featured_image'])) { ?>
                      <p class="text-danger"><?=$this->errors['featured_image']; ?></p>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row">
                    <!-- new Description -->
                    <label class="control-label col-md-3" for="description">Book group description:</label>
                    <div class="controls col-md-9">
                        <textarea rows="30" cols="50" type="text" id="description" name="book_group[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
                        <?php if( isset($this->errors['description'])) { ?>
                          <p class="text-danger"><?=$this->errors['description']; ?></p>
                        <?php } ?>
                    </div>
                  </div>

                <div class="form-group text-right">
                  <button class="btn btn-review" type="submit" name="btn_submit">Edit Group</button>
                  <!-- <button  class="btn btn_review" type="submit">Submit</button> -->
                </div>
              </form>
              <div class="space50"></div>
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
