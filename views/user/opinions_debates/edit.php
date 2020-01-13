
<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
<!-- start main sections -->
<section class="main_section">
  <div class="container">
    <div class="row">
<div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2>Opinions &amp; Debates Admin Area</h2>                
              </div>
              <div class="col-sm-5 col-xs-5">
                <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
              </div>
            </div>            

            <div class="row space30">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="blogs">
                        <div class="Add_box">
                          <form id="form-addopinion_debate" action="<?php echo vendor_app_util::url(["area" => "user","ctl"=>"opinions_debates", "act"=>$app['act'] == 'edit'?$app['act']."/".$this->record['id']:$app['act']]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3">
                                  <label>Title:</label>
                                </div>
                                <div class="col-sm-6">
                                  <input id="opinions_debates_form_name" type="text" name="opinion_debate[title]" class="form-control" value="<?=$this->record['title']?>" required>
                                  <?php if( isset($this->errors['title'])) { ?>
                                    <p class="text-danger"><?=$this->errors['title']; ?></p>
                                  <?php } ?>
                                </div>
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
                                <div class="col-sm-6 controls">
                                <select name="categories_arr[]" id="input-categories_id" multiple class="form-control selectpicker">
                                  <?php echo vendor_app_util::displayCategory($this->categories,$this->category);?>
                                </select>
                                </div>
                              </div>
                            </div>

                           <div class="form-group">
                              <div class="row">
                              <div class="col-sm-3">
                                <label>Featured Image</label>
                              </div>
                              <div class="controls col-md-6">
                                <input type="file" id="featured_image" style="display: block; padding: 5px; margin-bottom: 5px" name="image" placeholder="" class="form-control">
                                <?php if($app['act'] ==='edit'){ ?>
                                  <?php if(isset($this->record['featured_image'])) { ?>
                                    <img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
                                  <?php } else { ?>
                                      <img src="<?php echo UploadURI.'no_picture.png'?>">
                                  <?php } } ?>
                                <?php if( isset($this->errors['featured_image'])) { ?>
                                  <p class="text-danger"><?=$this->errors['featured_image']; ?></p>
                                <?php } ?>
                              </div>
                            </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3">
                                  <label>Featured my blog:</label>
                                </div>
                                <div class="col-sm-7">
                                  <div class="radio radio-info radio-inline">
                                    <input  type="radio" id="inlineRadio11" value="1" name="opinion_debate[featured_my_opinion_debate]" <?php if(isset($this->record['featured_my_opinion_debate']) && $this->record['featured_my_opinion_debate'] == 1) echo 'checked';?> >
                                    <label for="inlineRadio11"> Yes </label>
                                  </div>
                                  <div class="radio radio-inline">
                                    <input  type="radio" id="inlineRadio12" value="0" name="opinion_debate[featured_my_opinion_debate]" <?php if(isset($this->record['featured_my_opinion_debate']) && $this->record['featured_my_opinion_debate'] == 0) echo 'checked';?>>
                                    <label for="inlineRadio12"> No </label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-3">
                                  <label>Blog Description:</label>
                                </div>
                                <div class="col-sm-9">
                                <textarea rows="30" cols="50" <?php if($app['act']=='view') echo "disabled"; ?> type="text" id="description" name="opinion_debate[description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['description'])) echo($this->record['description']); ?></textarea>
                                 <?php if( isset($this->errors['description'])) { ?>
                                    <p class="text-danger"><?=$this->errors['description']; ?></p>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <div class="form-group text-right">
                              <button class="btn btn-review" type="submit" id="btn_submit" name="btn_submit" disabled>Save</button>
                              <!-- <button  class="btn btn_review" type="submit">Submit</button> -->
                            </div>
                          </form>
                        </div>
                      </div> 
                    </div>
                  </div>
                </div> 
              </div>
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
  CKEDITOR.replace( 'description', {
    on: {
          change: function() {
            document.getElementById("btn_submit").disabled = false;    
          }
    } 
  });
  CKEDITOR.config.baseFloatZIndex = 100001;
  
  $("form").bind("change keyup", function(event){
    document.getElementById("btn_submit").disabled = false;
  });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>