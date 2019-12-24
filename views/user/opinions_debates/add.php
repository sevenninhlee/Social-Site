
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
            <h2 class="ffmily">Opinions & Debates Submission</h2>
            <div class="Add_box">              
              <form action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"opinions_debates", "act"=>"add"]) ?>" method="post" enctype="multipart/form-data" class="">
                <div class="form-group row">
                  <!-- Title -->
                  <label class="control-label col-md-3" for="title">Title:</label>
                  <div class="controls col-md-6" >
                    <input type="text" id="opinions_debates_form_name" name="opinion_debate[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
                    <?php if( isset($this->errors['title'])) { ?>
                      <p class="text-danger"><?=$this->errors['title']; ?></p>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row hide">
                  <!-- Slug -->
                  <label class="control-label col-md-3" for="slug">Slug:</label>
                  <div class="controls col-md-6">
                      <input type="text" id="opinions_debates_form_slug" name="opinion_debate[slug]" placeholder="" class="form-control" value="">
                      <?php if( isset($this->errors['slug'])) { ?>
                        <p class="text-danger"><?=$this->errors['slug']; ?></p>
                      <?php } ?>
                    </div>
                </div>
                <?php	
                  if(isset($this->record['categories_arr'])){
                    $list_str = $this->record['categories_arr'];
                    $list_str = rtrim($list_str, ",");
                    $list_str = ltrim($list_str, ",");
                    $array_select = explode(',', $list_str);
                  }
                ?>	
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Category:</label>
                    </div>
                    <div class="col-sm-6">
										<select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
											<?php foreach ($this->categories as $record) { ?>
											<?php if(in_array($record['id'],$array_select)){ ?>
											<option value="<?php echo $record['id']?>" selected='selected'>
												<?php echo $record['name']?>
											</option>
											<?php }else{?>
												<option value="<?php echo $record['id']?>">
													<?php echo $record['name']?>
												</option>
											<?php }} ?>
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
                      <input type="file" id="featured_image" style="display: block; padding: 5px;" name="image" placeholder="" class="form-control">
                    <?php if( isset($this->errors['featured_image'])) { ?>
                      <p class="text-danger"><?=$this->errors['featured_image']; ?></p>
                    <?php } ?>
                  </div>
                </div>

                <div class="form-group row">
                    <!-- new Description -->
                    <label class="control-label col-md-3" for="description">Description:</label>
                    <div class="controls col-md-9">
                        <textarea rows="30" cols="50" type="text" id="description" name="opinion_debate[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
                        <?php if( isset($this->errors['description'])) { ?>
                          <p class="text-danger"><?=$this->errors['description']; ?></p>
                        <?php } ?>
                    </div>
                  </div>

                <div class="form-group text-right">
                  <button class="btn btn-review" type="submit" name="btn_submit">Add Opinions</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>