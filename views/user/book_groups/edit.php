<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php';
?>
    <div class="modal fade" id="myModalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
      </div>
      <!-- Modal google-->
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalCenterTitle">Result Search Google</h4>
          </div>
          <div class="modal-body" id="body_2">
            <div class="form-group">
              <div class="col-sm-4">
                <p>
                  <img src="" alt="">
                </p>
              </div>
              <div class="col-sm-5">
                <p> <strong>Title:</strong> </p>
                <p> <strong>Author:</strong> </p>
              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>      
    </div>

    <!-- start main sections -->
    <section class="main_section body_1">
      <div class="container">
        <?php if(isset($this->record)): ?>
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-9 col-xs-9">
                <h2 class="main-heading">Book Group Edit</h2>                
              </div>
              <!-- <div class="col-sm-3 col-xs-3" style="margin-top: 10px;">
                    <a href="<?=vendor_app_util::url(array("area" => "user",'ctl'=>'book_groups', 'act' => 'add_current_book?group_id='.$this->group_id)); ?>" class="f700" data-toggle="popover" data-placement="bottom" >Create current read</a>
              </div> -->
            </div>            

            <div class="row space30">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <?php include_once 'views/layout/'.$this->layout.'top-bar.php'; ?>
                  <div class="panel-body book-group-edit">
                    <div class="tab-content">
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
                      </div>
                      <div class="tab-pane fade" id="blogs">
                                              
                      </div> 
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade in active" id="book-group-edit">
                        <div class="page1">
                          <div class="Add_box">              
                            <form action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"book_groups", "act"=>"edit/".$this->record['id']]) ?>" method="post" enctype="multipart/form-data" class="">
                              <?php if(isset($this->errors['database'])) { ?>
                                <div class="alert alert-danger  alert-dismissible fade in" role="alert"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
                                  <h4>Oh snap! You got an error!</h4> 
                                  <p><?=$this->errors['database'];?></p> 
                                </div>
                              <?php } ?>
                              <?php if(isset($this->errors['success'])) { ?>
                                <div class="alert alert-success  alert-dismissible fade in" role="alert"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
                                  <h4>Oh snap! You got an error!</h4> 
                                  <p><?=$this->errors['success'];?></p> 
                                </div>
                              <?php } ?>
                              <div class="form-group row">
                                <!-- Title -->
                                <label class="control-label col-md-3" for="title">Group Name:</label>
                                <div class="controls col-md-8" >
                                  <input type="text" id="book_groups_form_name" name="book_group[title]" placeholder="" class="form-control" value="<?php if(isset($this->record['title'])) echo $this->record['title']; ?>" required>
                                  <?php if( isset($this->errors['title'])) { ?>
                                    <p class="text-danger"><?=$this->errors['title']; ?></p>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="form-group row hide">
                                <!-- Slug -->
                                <label class="control-label col-md-3" for="slug">Slug:</label>
                                <div class="controls col-md-8">
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
                                 <?php if($app['act'] =='edit'){ ?>
                                    <select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
                                      <?php echo vendor_app_util::displayCategory($this->categories,$this->category);?>
                                    </select>										
                                  <?php }else{?>
                                    <?php if(!empty($this->category['name'])) : ?>
                                      <a href="#"><?php echo $this->category['name'] ?></a>
                                    <?php else: ?>
                                      <a href="#">Unkown category</a>
                                    <?php endif; ?>
                                  <?php } ?>
                                  <?php if( isset($this->errors['categories_arr'])) { ?>
                                    <p class="text-danger"><?=$this->errors['categories_arr']; ?></p>
                                  <?php } ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <!--  Featured Image -->
                                <label class="control-label col-md-3" for="featured_image"> Featured Image:</label>
                                <div class="controls col-md-8">
                                    <input type="file" id="featured_image" style="display: block; padding: 5px; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    <?php if(isset($this->record['featured_image'])) { ?>
                                      <img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['featured_image']; ?>">
                                    <?php } else {?>
                                      <img src="<?php echo UploadURI.'no_picture.png'?>">
                                  <?php } if( isset($this->errors['featured_image'])) { ?>
                                    <p class="text-danger"><?=$this->errors['featured_image']; ?></p>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                  <!-- new Description -->
                                  <label class="control-label col-md-3" for="short_description">Short description:</label>
                                  <div class="controls col-md-9">
                                      <textarea rows="7" cols="50" type="text" id="short_description" name="book_group[short_description]" placeholder="" class="form-control" value=""><?php if(isset($this->record['short_description'])) echo($this->record['short_description']); ?></textarea>
                                      <?php if( isset($this->errors['short_description'])) { ?>
                                        <p class="text-danger"><?=$this->errors['short_description']; ?></p>
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
                                <button class="btn btn-review" type="submit" id="btn_submit" name="btn_submit" disabled>Save</button>
                              </div>
                            </form>
                            <div class="space50"></div>
                          </div>
                          <div class="Add_box" id="Add_box_data">
                            <h5>Add Current Read</h5>
                            <hr>
                            <div class="recomend">
                              <div class="edit-book">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <label>Search Current Book</label>
                                  </div>
                                </div>
<div class="recomend">
  <div class="form-group row">
    <label class="control-label col-md-3" for="ISBN">ISBN</label>
    <div class="controls col-md-7 search_book_isbn_10">
      <input type="text" class="form-control form-control-input" value="" name="current_isbn" id="current_isbn" getItemID="test" placeholder="" alt="book_found_curr_bgr">
      <p class="text-danger error_search"></p>
    </div>
    <button type="button" class="btn btn-primary" id="getCurrIsbn10">Search</button>
  </div>
  <hr>
  <div class="form-group row fav_title_auth">
    <label class="control-label col-md-3" for="title">Title</label>
    <div class="controls col-md-7 search_book_title">
      <input type="text" class="form-control form-control-input searchName" name="current_title" id="current_title" getItemID="test" data="" placeholder="" alt="book_found_curr_bgr">
      <p class="text-danger error_search"></p>
    </div>
  </div>
  <div class="form-group row fav_title_auth">
    <label class="control-label col-md-3" for="author">Author</label>
    <div class="controls col-md-7 search_book_author">
      <input type="text" id="current_author" name="book[author]" placeholder="" class="form-control" value="" alt="book_found_curr_bgr">
      <p class="text-danger error_search"></p>
    </div>
    <button type="button" class="btn btn-primary" id="getCurrTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
  </div>
</div>
                                <hr>
                              </div>
                              <div class="book-found" id="book_found_curr">
                              </div>
                              <div class="book-notfound">
                              </div>
                              <div class="edit-data-search" id="edit_book_found_curr">
                                <form id="form_found_curr"  class="form-horizontal"action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"book_groups", "act"=>"edit/".$this->record['id']]) ?>" method="post" enctype="multipart/form-data">
                                  <h5 class="space30">Book Found :</h5>
                                  <div class="form-group row">
                                    <!-- Title -->
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-8 search_book_title">
                                      <input type="text" name="book[title]" placeholder="" class="form-control books_form_title" value="" required>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row hide" >
                                    <!-- Slug -->
                                    <label class="control-label col-md-3" for="slug">Slug</label>
                                    <div class="controls col-md-8">
                                      <input  type="text" id="" name="book[slug]" placeholder="" class="form-control books_form_slug" value="" >
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!-- Category -->
                                    <label class="control-label col-md-3" for="categories">Category</label>
                                    <div class="controls col-md-8">
                                      <?php if($app['act'] =='edit'){ ?>
                                      <select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
                                        <?php foreach ($this->categories as $record) { ?>
                                          <option value="<?php echo $record['id']?>">
                                            <?php echo $record['name']?>
                                          </option>										
                                        <?php } ?>
                                      </select>										
                                      <?php } else{?>
                                        <?php if(!empty($this->category['name'])) : ?>
                                          <a href="#"><?php echo $this->category['name'] ?></a>
                                        <?php else: ?>
                                          <a href="#">Unkown category</a>
                                        <?php endif; ?>
                                      <?php } ?>
                                      <?php if( isset($this->errors['categories_arr'])) { ?>
                                        <p class="text-danger"><?=$this->errors['categories_arr']; ?></p>
                                      <?php } ?>

                                      <input type="hidden" name="book[category_search_api]" id="" class="category_search_api">
                                      <input type="hidden" name="book[book_categories_name]" id="" class="book_categories_name">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!--  Featured Image -->
                                    <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
                                    <div class="controls col-md-8">
                                      <input type="hidden" name="book[img_search_api]" class="img_search_api">
                                      <p class="img_search"><img src=""></p>
                                      <input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                      <div class="controls col-md-8 search_book_isbn">
                                        <input type="text" id="" name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="author">Author</label>
                                      <div class="controls col-md-8 search_book_author">
                                        <input type="text" id="" name="book[author]" placeholder="" class="form-control books_form_author" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="year">Year</label>
                                      <div class="controls col-md-8">
                                        <input type="text" id="" name="book[year]" placeholder="" class="form-control books_form_year" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="control-label col-md-3" for="description3">Book Description</label>
                                      <div class="controls col-md-9">
                                        <textarea rows="30" cols="50" type="text" id="description3" name="book[description]" placeholder="" class="form-control description" value=""></textarea>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <div class="controls controls_btn col-md-12 text-right">
                                        <a class="btn btn_review btn-cancel-book ">Cancel</a>
                                        <input type="hidden" name="alt" placeholder="" class="form-control" value="edit-search-google" >
                                        <input type="hidden" name="action" placeholder="" class="form-control" value="current_read_status" >
                                        <input type="hidden" name="book_group_id" placeholder="" class="form-control" value="<?= $this->record['id'] ?>" >
                                        <input class="btn btn-review" type="submit" name="book_btn_submit" id="book_btn_submit" value="Save Current Book">
                                      </div>
                                  </div>
                                  <hr>
                                </form>
                              </div>
                              <ul class="list-unstyled read-list book_found_curr">
                                <?php foreach($this->actionCurrent as $key => $record) { ?>
                                <li>
                                  <span class="f700 title-part title-part-<?php echo $record['book_group_id'] ?> <?php if($record['current_read_status'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                  <span>
                                    <a class="hide-text" data="<?php echo $record['book_group_id'] ?>" id="hide_<?php echo $record['book_group_id'] ?>" act="current_read_status">
                                    <?php if($record['current_read_status'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['book_group_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['book_group_id']; ?>,deleteBookGroupBook">Delete</button> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="moveItem<?php echo $record['book_group_id']; ?>" type="button" class="btn-delete-table moveItem-record" alt="<?php echo $record['book_group_id']; ?>,moveReadBook" act="current_read_status">Move previous read</button>
                                  </span>
                                </li>
                                <?php } ?>
                              </ul>
                              <a href="javascript:void(0)" class="f700 recomand-txt">Add Current Read</a>
                            </div>

                            <h5 class="space30">Previous Reads:</h5>
                            <hr>
                            <div class="recomend">                          
                              <div class="edit-book">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <label>Search Previous Read</label>
                                  </div>
                                </div>

                                <div class="recomend">
                                  <div class="form-group row">
                                    <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                    <div class="controls col-md-7 search_book_isbn_10">
                                      <input type="text" class="form-control form-control-input" value="" name="favorite_isbn" id="favorite_isbn" getItemID="test" placeholder="" alt="book_found_pre_bgr">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getFavIsbn10">Search</button>
                                  </div>
                                  <hr>
                                  <div class="form-group row fav_title_auth">
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-7 search_book_title">
                                      <input type="text" class="form-control form-control-input searchName" name="favorite_title" id="favorite_title" getItemID="test" data="" placeholder="" alt="book_found_pre_bgr">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                  </div>
                                  <div class="form-group row fav_title_auth">
                                    <label class="control-label col-md-3" for="author">Author</label>
                                    <div class="controls col-md-7 search_book_author">
                                      <input type="text" id="favorite_author" name="book[author]" placeholder="" class="form-control" value="" alt="book_found_pre_bgr">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getFavTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                              <div class="book-found" id="book_found_pre">
                              </div>
                              <div class="book-notfound">
                              </div>
                              <div class="edit-data-search" id="edit_book_found_pre">
                                <form id="form_found_pre"  class="form-horizontal"action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"book_groups", "act"=>"edit/".$this->record['id']]) ?>" method="post" enctype="multipart/form-data">
                                  <h5 class="space30">Book Found :</h5>
                                  <div class="form-group row">
                                    <!-- Title -->
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-8 search_book_title">
                                      <input type="text" name="book[title]" placeholder="" class="form-control books_form_title" value="" required>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row hide" >
                                    <!-- Slug -->
                                    <label class="control-label col-md-3" for="slug">Slug</label>
                                    <div class="controls col-md-8">
                                      <input  type="text" id="" name="book[slug]" placeholder="" class="form-control books_form_slug" value="" >
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!-- Category -->
                                    <label class="control-label col-md-3" for="categories">Category</label>
                                    <div class="controls col-md-8">
                                    <?php if($app['act'] =='edit'){ ?>
                                      <select name="categories_arr[]" id="input-categories_id" class="form-control selectpicker" multiple>
                                        <?php foreach ($this->categories as $record) { ?>
                                          <option value="<?php echo $record['id']?>">
                                            <?php echo $record['name']?>
                                          </option>										
                                        <?php } ?>
                                      </select>										
                                      <?php } else{?>
                                        <?php if(!empty($this->category['name'])) : ?>
                                          <a href="#"><?php echo $this->category['name'] ?></a>
                                        <?php else: ?>
                                          <a href="#">Unkown category</a>
                                        <?php endif; ?>
                                      <?php } ?>
                                      <?php if( isset($this->errors['categories_arr'])) { ?>
                                        <p class="text-danger"><?=$this->errors['categories_arr']; ?></p>
                                      <?php } ?>
                                      <input type="hidden" name="book[category_search_api]" id="" class="category_search_api">
                                      <input type="hidden" name="book[book_categories_name]" id="" class="book_categories_name">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!--  Featured Image -->
                                    <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
                                    <div class="controls col-md-8">
                                      <input type="hidden" name="book[img_search_api]" class="img_search_api">
                                      <p class="img_search"><img src=""></p>
                                      <input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                      <div class="controls col-md-8 search_book_isbn">
                                        <input type="text" id="" name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="author">Author</label>
                                      <div class="controls col-md-8 search_book_author">
                                        <input type="text" id="" name="book[author]" placeholder="" class="form-control books_form_author" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="year">Year</label>
                                      <div class="controls col-md-8">
                                        <input type="text" id="" name="book[year]" placeholder="" class="form-control books_form_year" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="control-label col-md-3" for="description2">Book Description</label>
                                      <div class="controls col-md-9">
                                        <textarea rows="30" cols="50" type="text" id="description2" name="book[description]" placeholder="" class="form-control description" value=""></textarea>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <div class="controls controls_btn col-md-12 text-right">
                                        <a class="btn btn_review btn-cancel-book ">Cancel</a>
                                        <input type="hidden" name="alt" placeholder="" class="form-control" value="edit-search-google" >
                                        <input type="hidden" name="action" placeholder="" class="form-control" value="previous_read_status" >
                                        <input type="hidden" name="book_group_id" placeholder="" class="form-control" value="<?= $this->record['id'] ?>" >
                                        <input class="btn btn-review" type="submit" name="book_btn_submit" id="book_btn_submit" value="Save Previous Book">
                                      </div>
                                  </div>
                                  <hr>
                                </form>
                              </div>
                              <ul class="list-unstyled read-list book_found_pre">
                                <?php foreach($this->actionPrevious as $key => $record) { ?>
                                <li>
                                  <span class="f700 title-part title-part-<?php echo $record['book_group_id'] ?> <?php if($record['previous_read_status'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                  <span>
                                    <a class="hide-text" data="<?php echo $record['book_group_id'] ?>" id="hide_<?php echo $record['book_group_id'] ?>" act="previous_read_status"><?php if($record['previous_read_status'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['book_group_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['book_group_id']; ?>,deleteBookGroupBook">Delete</button>|<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="moveItem<?php echo $record['book_group_id']; ?>" type="button" class="btn-delete-table moveItem-record" alt="<?php echo $record['book_group_id']; ?>,moveReadBook" act="previous_read_status">Move current read</button>
                                  </span>
                                </li>
                                <?php } ?>
                              </ul>
                              <a href="javascript:void(0)" class="f700 recomand-txt1 recomand-txt">Add Previous Read</a>
                            </div>

                          <h5 class="space30">Manage Members:</h5>
                            <hr>
                            <form class="radio-form"  action="<?php echo vendor_app_util::url(["area" => "user", "ctl"=>"book_groups", "act"=>"edit/".$this->record['id']]) ?>" method="post" enctype="multipart/form-data">                
                              <div class="row">
                                <div class="col-md-12">

                                    <?php if ($this->users) { ?>
                                    <?php $i = 0;$j =0 ?>
                                  <?php foreach($this->users as $key => $user) { ?>
                                    <?php $i += 1;$j += 1; ?>
                                    <div class="form-group">
                                      <div class="row">  
                                        <div class="col-sm-2">
                                          <label><?php if ($user['show_name'] == 0) { echo $user['firstname'].' '.$user['lastname']; } else { echo $user['username']; } ?></label>
                                        </div>
                                        <div class="col-sm-8">
                                          <div class="radio radio-info radio-inline">
                                              <input type="radio" id="inlineRadio<?= $i ?>" value="0"  name="isApprove[<?=$user['book_group_id'] ?>]"  <?=  $user['bgr_user_status']  == 0 ? 'checked' : "" ?> >
                                              <label for="inlineRadio<?= $i ?>"> Pending </label>
                                          </div>
                                          <div class="radio radio-inline">
                                              <input type="radio" id="inlineRadio<?= $i+1 ?>" value="1"  name="isApprove[<?= $user['book_group_id'] ?>]"  <?= $user['bgr_user_status'] == 1 ? 'checked' : "" ?> >
                                              <label for="inlineRadio<?= $i+=1 ?>"> Approve </label>
                                          </div>
                                          <div class="radio radio-inline">
                                              <input type="radio" id="inlineRadio<?= $i+1 ?>" value="2" name="isApprove[<?= $user['book_group_id'] ?>]"  <?= $user['bgr_user_status'] == 2 ? 'checked' : "" ?> >
                                              <label for="inlineRadio<?= $i+=1 ?>"> Disapprove </label>
                                          </div>
                                          <div class="inline">
                                              <button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $user['book_group_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $user['book_group_id']; ?>,deleteBookGroupUser">Delete</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>          
                                    <?php } ?>
                                    <button class="btn btn_review btn-sub1 btn-save1 space50 pull-right" name="btn_save_submit" type="submit">Save</button>
                                    <?php  } else { ?>
                                        <tr role="row"><td colspan="8"><h3 class="text-danger text-center"> No Member </h3></td></tr>
                                    <?php } ?>
                                    <!-- <a  class="btn btn_review btn-sub1 btn-save1 space50 pull-right" name="btn_submit" type="submit">Save</a>  -->
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="form-group ">
                              <button class="btn btn_review btn-sub1 delete-btn space20 delGroup" type="button" id="delItem<?php echo $this->record['id']; ?>" alt="<?php echo $this->record['id']; ?>,deleteGroup">Delete Book Group</button>
                              <a href="<?php echo RootURL."book-groups/".$this->record['slug']?>" class="btn btn_review btn-sub1 pull-right space20" type="submit">View Book Group Page</a>
                          </div>                        
                        </div>
                      </div>  
                      <div class="tab-pane fade" id="friends">
                        
                      </div>                            
                    </div>
                  </div>
                </div> 
                
              </div>
            </div>            
          </div>
          <?php include_once 'views/layout/'.$this->layout.'right-bar.php'; ?>
        </div>
        <?php else: ?>
          <div class="row">
            <div class="row white_box">
              <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
            </div>
          </div>
        <?php endif ;?>
      </div>
    </section>


    <!-- End main sections -->


<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script src="<?php echo RootREL; ?>media/admin/js/form_slug.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script src="<?php echo RootREL; ?>media/js/encode-character.js"></script>
<script type="text/javascript" src="<?php echo RootREL; ?>media/js/slugify.js"></script>
<script src="<?php echo RootREL; ?>media/js/searchBook.js"></script>
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

  $(document).ready(function() {
    CKEDITOR.replaceClass = 'description';
  });

</script>
<script type="text/javascript">
$(document).ready(function(){

  $('.recomand-txt').click(function(){
      $(this).parents('.recomend').find('.edit-book').toggle();
  });

  $('.dlt-text').click(function() {
      $(this).parents('li').toggleClass('remove-line');        
  });

  $('#book_found_pre').on('click','.inlineRadio', function () {
      if ($(".inlineRadio").is(":checked")) {
          $(this).parents('.recomend').addClass('btn-change');
      }
      else{
          $(this).parents('.recomend').removeClass('btn-change');
      }
  });

  $('#book_found_recom').on('click','.inlineRadio', function () {
      if ($(".inlineRadio").is(":checked")) {
          $(this).parents('.recomend').addClass('btn-change');
      }
      else{
          $(this).parents('.recomend').removeClass('btn-change');
      }
  });

  $('#book_found_curr').on('click','.inlineRadio', function () {
      if ($(".inlineRadio").is(":checked")) {
          $(this).parents('.recomend').addClass('btn-change');
      }
      else{
          $(this).parents('.recomend').removeClass('btn-change');
      }
  });

  var error = "<?php if(isset($this->errors)){ echo $this->errors['message']; }else{ echo null; } ?>";
  if(error.length > 1) {
    confirm(error);
  }
  
});

var data = <?php echo json_encode($this->records); ?>;
var book_group_id = <?php echo $this->record['id']; ?>;

var RootREL = "<?php echo RootREL; ?>";

// Current
// searchAutomatic('current_title', data, 'title');
// searchAutomatic('current_isbn', data, 'ISBN');

getDataSearchAutomatic(data, 'getCurrTitleAuthor', 'current_title_auth');
getDataSearchAutomatic(data, 'getCurrIsbn10', 'current_isbn');

// Favorite
// searchAutomatic('favorite_title', data, 'title');
// searchAutomatic('favorite_isbn', data, 'ISBN');

getDataSearchAutomatic(data, 'getFavTitleAuthor', 'favorite_title_author');
getDataSearchAutomatic(data, 'getFavIsbn10', 'favorite_isbn');

$('#book_found_pre').on('click', '.saveFavBook', function() {
  var alt = $(this).attr('alt');
  saveData('previous_read_status', 'book_found_pre','saveFavBook', alt ? alt : 'null');
});

$('#book_found_curr').on('click', '.saveFavBook', function() {
  var alt = $(this).attr('alt');
  saveData('current_read_status', 'book_found_curr','saveFavBook', alt ? alt : 'null');
});

function saveData(action, idParent, saveBook, alt)
{
  if( alt === 'sg') {
    var dataSearch = JSON.parse(localStorage.getItem('dataSearchGoogle')); 
  }else {
    var dataSearch = JSON.parse(localStorage.getItem('dataSearch')); 
  }

  if(saveBook !== 'null') {
      $.ajax({
        type:"POST",
        url:rootUrl+'user/book_groups/saveData',
        data:{
            book: dataSearch,
            book_group_id: book_group_id,
            action: action,
            alt: alt ? alt : null
        },
        success: function(res){
            var resObject = JSON.parse(res);
            console.log(resObject);
            if( resObject.status == 1) {
                $('#'+idParent).hide();
                $('.recomand-txt').parents('.recomend').find('.edit-book').hide();
                if(action === 'current_read_status') {
                  $('.'+idParent).append(`
                    <li>
                      <span class="f700 title-part title-part-${resObject.newRecord.id}">${dataSearch['title']}</span>
                      <span>
                        <a class="hide-text" data="${resObject.newRecord.id}" id="hide_${resObject.newRecord.id}" act="${action}">Hide</a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem${resObject.newRecord.id}" type="button" class="btn-delete-table delItem-record" alt="${resObject.newRecord.id},deleteBookGroupBook">Delete</button> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="moveItem${resObject.newRecord.id}" type="button" class="btn-delete-table moveItem-record" alt="${resObject.newRecord.id},moveReadBook" act="${action}">Move previous read</button>
                      </span>
                    </li>
                  `);
                }
                if(action === 'previous_read_status') {
                  $('.'+idParent).append(`
                    <li>
                      <span class="f700 title-part title-part-${resObject.newRecord.id}">${dataSearch['title']}</span>
                      <span>
                        <a class="hide-text" data="${resObject.newRecord.id}" id="hide_${resObject.newRecord.id}" act="${action}">Hide</a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem${resObject.newRecord.id}" type="button" class="btn-delete-table delItem-record" alt="${resObject.newRecord.id},deleteBookGroupBook">Delete</button>|<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #337ab7; " id="moveItem${resObject.newRecord.id}" type="button" class="btn-delete-table moveItem-record" alt="${resObject.newRecord.id},moveReadBook" act="${action}">Move current read</button>
                      </span>
                    </li>
                  `);
                }
                
                $('.form-control').val('');
            } else {
             confirm(resObject.message);
            }
        }
      });
  }
}


$('#edit_book_found_curr').on('click', '.btn-cancel-book', function() {
  $('#edit_book_found_curr').hide();
});

$('#edit_book_found_pre').on('click', '.btn-cancel-book', function() {
  $('#edit_book_found_pre').hide();
});
$('.book-group-edit').on('click', '.hide-text', function (){
  var ItemObjectID = $(this).attr('data');
  var action = $(this).attr('act') ? $(this).attr('act') : null;
  console.log('test', action);
  $(this).text(function(i, text){
    $.ajax({
        type:"POST",
        url:rootUrl+'user/book_groups/changeOwnerStatusGroupBook',
        data:{
            id: ItemObjectID,
            status: (text === "Hide" ) ? 2 : 1,
            action: action
        },
        success: function(res){
            var resObject = JSON.parse(res);
            if( resObject.status == 1) {
              if(action === "current_read_status") {
                if ( text === "Hide" ) {
                  $('.book_found_curr .title-part-'+ItemObjectID).addClass('opacity4');
                  $('.book_found_curr #hide_'+ItemObjectID).text("Unhide");
                } else {
                  $('.book_found_curr .title-part-'+ItemObjectID).removeClass('opacity4');
                  $('.book_found_curr #hide_'+ItemObjectID).text("Hide");
                }
              }

              if(action === "previous_read_status") {
                if ( text === "Hide" ) {
                  $('.book_found_pre .title-part-'+ItemObjectID).addClass('opacity4');
                  $('.book_found_pre #hide_'+ItemObjectID).text("Unhide");
                } else {
                  $('.book_found_pre .title-part-'+ItemObjectID).removeClass('opacity4');
                  $('.book_found_pre #hide_'+ItemObjectID).text("Hide");
                }
              }
              
            } else {
                confirm(resObject.message);
            }
        }
    });  
  });
});

$('.book-group-edit').on('click','button.delGroup', function () {
  var isDel = confirm("Are you sure to delete this record?");
  var data = $(this).attr('alt');
  var data = data.split(',');
  var ItemID = parseInt(data[0]);
  var act = data[1].trim();
  if(isDel){
    changeStatusUser(ItemID, null, act);
  }
});

$('.book-group-edit').on('click','button.delItem-record', function () {
  var isDel = confirm("Are you sure to delete this record?");
  var data = $(this).attr('alt');
  var data = data.split(',');
  var ItemID = parseInt(data[0]);
  var act = data[1].trim();
  if(isDel){
    changeStatusUser(ItemID, null, act);
  }
});

$('.book-group-edit').on('click','button.moveItem-record', function () {
  var status = $(this).attr('act') ? $(this).attr('act') : null;
  if(status === "current_read_status") {
    var isDel = confirm("Are you sure to change this data becomes the previous read?");
  }

  if(status === "previous_read_status") {
    var isDel = confirm("Are you sure to change this data becomes the current read?");
  }
  var data = $(this).attr('alt');
  var data = data.split(',');
  var ItemID = parseInt(data[0]);
  var act = data[1].trim();
  if(isDel){
    changeStatusUser(ItemID, status, act);
  }
});

function changeStatusUser(ItemID, ItemStatus, act) {
  urlEdit = rootUrl+'user/'+ctl_page+'/'+act+'/id='+ItemID;
  $.ajax({
    method: "POST",
    url: urlEdit,
    data: { status: ItemStatus }
  })
  .done(function( res ) {
    var resObject = JSON.parse(res);
    if( resObject.status == true ) {
      if(act === "deleteGroup") {
        window.location.href = rootUrl+"user/book_groups";
      }else{
        window.location.href = rootUrl+"user/book_groups/edit/"+book_group_id;
      }
    } else {
      alert(resObject.error);
    }
  });
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>