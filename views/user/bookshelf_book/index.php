<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- Modal system-->
    <div class="modal fade" id="myModalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalCenterTitle">Result Search System</h4>
          </div>
          <div class="modal-body" id="body_1">
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
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
          </div>
        </div>
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
    		<div class="row">
    			<div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Bookshelf & Book Reviews Admin</h2>                
              </div>
              <div class="col-sm-5 col-xs-5">
                <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
              </div>
            </div>            

            <div class="row space30">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <?php include_once 'views/layout/'.$this->layout.'top-bar.php'; ?>

                  <?php if($this->isUserLogged):?>

                  <div class="panel-body bookshelf">
                    <div class="tab-content">
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
                      </div>
                      <div class="tab-pane fade" id="blogs">
                                              
                      </div> 
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade in active" id="bookshelf">
                        <div class="page1">
                          <div class="Add_box" id="Add_box_data">
                            <h5>Favorite Book:</h5>
                            <hr>
                            <div class="recomend">                          
                              <div class="edit-book" id="fv_book_bsh">
                                <div class="row">
                                  <div class="col-sm-12 form-group">
                                    <label>Search Favorite Book</label>
                                  </div>
                                </div>
                                <div class="recomend">
                                  <div class="form-group row">
                                    <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                    <div class="controls col-md-7 search_book_isbn_10">
                                      <input type="text" class="form-control form-control-input" value="" name="favorite_isbn" id="favorite_isbn" getItemID="test" placeholder="" alt="book_found_fav_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getFavIsbn10">Search</button>
                                  </div>
                                  <hr>
                                  <div class="form-group row fav_title_auth">
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-7 search_book_title">
                                      <input type="text" class="form-control form-control-input searchName" name="favorite_title" id="favorite_title" getItemID="test" data="" placeholder="" alt="book_found_fav_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                  </div>
                                  <div class="form-group row fav_title_auth">
                                    <label class="control-label col-md-3" for="author">Author</label>
                                    <div class="controls col-md-7 search_book_author">
                                      <input type="text" id="favorite_author" name="book[author]" placeholder="" class="form-control" value="" alt="book_found_fav_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getFavTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                              <div class="book-found" id="book_found_fv">
                              </div>
                              <div class="edit-data-search" id="edit_book_found_fv">
                                <form id="form_found_fv"  class="form-horizontal" action="<?php echo vendor_app_util::url(["ctl"=>"bookshelf_book"]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                  <h5 class="space30">Book Found :</h5>
                                  <div class="form-group row">
                                    <!-- Title -->
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-6 search_book_title">
                                      <input type="text"  name="book[title]" placeholder="" class="form-control books_form_title" value="" required>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row hide" >
                                    <!-- Slug -->
                                    <label class="control-label col-md-3" for="slug">Slug</label>
                                    <div class="controls col-md-6">
                                      <input  type="text" id="books_form_slug" name="book[slug]" placeholder="" class="form-control" value="" >
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!-- Category -->
                                    <label class="control-label col-md-3" for="categories">Category</label>
                                    <div class="controls col-md-6">
                                      <select name="book[categories_id]"  class="form-control input-categories_id">
                                        <option value="0">Unkown category</option>
                                        <?php foreach ($this->categories as $record) { ?>
                                        <option value="<?php echo $record['id']?>">
                                          <?php echo $record['name']?>
                                        </option>
                                        <?php } ?>
                                      </select>
                                      <input type="hidden" name="book[category_search_api]"  class="category_search_api">
                                      <input type="hidden" name="book[book_categories_name]"  class="book_categories_name">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!--  Featured Image -->
                                    <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
                                    <div class="controls col-md-6">
                                      <input type="hidden" name="book[img_search_api]"  class="img_search_api">
                                      <p class="img_search"><img src=""></p>
                                      <input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                      <div class="controls col-md-6 search_book_isbn">
                                        <input type="text"  name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Author -->
                                      <label class="control-label col-md-3" for="author">Author</label>
                                      <div class="controls col-md-6 search_book_author">
                                        <input type="text"  name="book[author]" placeholder="" class="form-control books_form_author" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Year -->
                                      <label class="control-label col-md-3" for="year">Year</label>
                                      <div class="controls col-md-6">
                                        <input type="text"  name="book[year]" placeholder="" class="form-control books_form_year" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label class="control-label col-md-3" for="description1">Book Description</label>
                                      <div class="controls col-md-9">
                                        <textarea rows="30" cols="50" type="text" id="description1" name="book[description]" placeholder="" class="form-control description" value=""></textarea>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <div class="controls controls_btn col-md-12 text-right">
                                        <a class="btn btn_review btn-cancel-book ">Cancel</a>
                                        <!-- <a class="btn btn_review btn-save1 saveFavBook" alt="sg">Save Favorite Book</a> -->
                                        
                                        <input type="hidden" name="alt" placeholder="" class="form-control" value="edit-search-google" >
                                        <input type="hidden" name="action" placeholder="" class="form-control" value="favorite" >
                                        <input class="btn btn-review" type="submit" name="btn_submit" id="btn_submit" value="Save Favorite Book">
                                      </div>
                                  </div>
                                  <hr>
                                </form>
                              </div>
                              <div class="book-notfound">
                              </div>

                              <ul class="list-unstyled read-list book_found_fv">
                                <?php foreach($this->actionFavorite as $key => $record) { ?>
                                <li>
                                  <span class="f700 title-part title-part-<?php echo $record['act_id'] ?> <?php if($record['act_status'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                  <span>
                                    <a class="hide-text" data="<?php echo $record['act_id'] ?>" id="hide_<?php echo $record['act_id'] ?>"><?php if($record['act_status'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['act_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['act_id']; ?>,deleteBookArticle">Delete</button>
                                  </span>
                                </li>
                                <?php } ?>
                              </ul>
                              <a href="javascript:void(0)" class="f700 recomand-txt1 recomand-txt">Add Favorite Book</a>
                            </div>
                            

                            <h5 class="space20">Recomended Reads:</h5>
                            <hr>
                            <div class="recomend">
                              <div class="edit-book">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <label>Search Recomended Book</label>
                                  </div>
                                </div>
                                <div class="recomend">
                                  <div class="form-group row">
                                    <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                    <div class="controls col-md-7 search_book_isbn_10">
                                      <input type="text" class="form-control form-control-input" value="" name="recommanded_isbn" id="recommanded_isbn" getItemID="test" placeholder="" alt="book_found_reco_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getRecomIsbn10">Search</button>
                                  </div>
                                  <hr>
                                  <div class="form-group row recom_title_auth">
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-7 search_book_title">
                                      <input type="text" class="form-control form-control-input searchName" name="recommanded_title" id="recommanded_title" getItemID="test" data="" placeholder="" alt="book_found_reco_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                  </div>
                                  <div class="form-group row recom_title_auth">
                                    <label class="control-label col-md-3" for="author">Author</label>
                                    <div class="controls col-md-7 search_book_author">
                                      <input type="text" id="recommanded_author" name="recommanded_author" placeholder="" class="form-control" value="" alt="book_found_reco_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getRecomTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
                                  </div>
                                </div>
                              </div>
                              <div class="book-found" id="book_found_recom">
                              </div>
                              <div class="book-notfound">
                              </div>
                              <div class="edit-data-search" id="edit_book_found_recom">
                                <form id="form_found_recom"  class="form-horizontal"action="<?php echo vendor_app_util::url(["ctl"=>"bookshelf_book"]); ?>" method="post" enctype="multipart/form-data">
                                  <h5 class="space30">Book Found :</h5>
                                  <div class="form-group row">
                                    <!-- Title -->
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-6 search_book_title">
                                      <input type="text" name="book[title]" placeholder="" class="form-control books_form_title" value="" required>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row hide" >
                                    <!-- Slug -->
                                    <label class="control-label col-md-3" for="slug">Slug</label>
                                    <div class="controls col-md-6">
                                      <input  type="text"  name="book[slug]" placeholder="" class="form-control books_form_slug" value="" >
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!-- Category -->
                                    <label class="control-label col-md-3" for="categories">Category</label>
                                    <div class="controls col-md-6">
                                      <select name="book[categories_id]"  class="form-control input-categories_id">
                                        <option value="0">Unkown category</option>
                                        <?php foreach ($this->categories as $record) { ?>
                                        <option value="<?php echo $record['id']?>">
                                          <?php echo $record['name']?>
                                        </option>
                                        <?php } ?>
                                      </select>
                                      <input type="hidden" name="book[category_search_api]"  class="category_search_api">
                                      <input type="hidden" name="book[book_categories_name]"  class="book_categories_name">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!--  Featured Image -->
                                    <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
                                    <div class="controls col-md-6">
                                      <input type="hidden" name="book[img_search_api]" class="img_search_api">
                                      <p class="img_search"><img src=""></p>
                                      <input type="file" id="featured_image1" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                      <div class="controls col-md-6 search_book_isbn">
                                        <input type="text"  name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="author">Author</label>
                                      <div class="controls col-md-6 search_book_author">
                                        <input type="text"  name="book[author]" placeholder="" class="form-control books_form_author" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="year">Year</label>
                                      <div class="controls col-md-6">
                                        <input type="text"  name="book[year]" placeholder="" class="form-control books_form_year" value="" required>
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
                                        <input type="hidden" name="action" placeholder="" class="form-control" value="recommanded" >
                                        <input class="btn btn-review" type="submit" name="btn_submit" id="btn_submit1" value="Save Recommanded Book">
                                      </div>
                                  </div>
                                  <hr>
                                </form>
                              </div>
                              <ul class="list-unstyled read-list book_found_recom">
                                <?php foreach($this->actionRecommanded as $key => $record) { ?>
                                <li>
                                  <span class="f700 title-part title-part-<?php echo $record['act_id'] ?> <?php if($record['act_status'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                  <span>
                                    <a class="hide-text" data="<?php echo $record['act_id'] ?>" id="hide_<?php echo $record['act_id'] ?>"><?php if($record['act_status'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['act_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['act_id']; ?>,deleteBookArticle">Delete</button>
                                  </span>
                                </li>
                                <?php } ?>
                              </ul>
                              <a href="javascript:void(0)" class="f700 recomand-txt">Add Recomanded Read</a>
                            </div>

                            <h5 class="space30">Current Reads:</h5>
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
                                      <input type="text" class="form-control form-control-input" value="" name="current_isbn" id="current_isbn" getItemID="test" placeholder="" alt="book_found_curr_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getCurrIsbn10">Search</button>
                                  </div>
                                  <hr>
                                  <div class="form-group row current_title_auth">
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-7 search_book_title">
                                      <input type="text" class="form-control form-control-input searchName" name="current_title" id="current_title" getItemID="test" data="" placeholder="" alt="book_found_curr_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                  </div>
                                  <div class="form-group row current_title_auth">
                                    <label class="control-label col-md-3" for="author">Author</label>
                                    <div class="controls col-md-7 search_book_author">
                                      <input type="text" id="current_author" name="current_author" placeholder="" class="form-control" value="" alt="book_found_curr_bsh">
                                      <p class="text-danger error_search"></p>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="getCurrTitleAuthor" data-toggle="tooltip" data-placement="top" title="You should search by title and the author will have the best results for you">Search</button>
                                  </div>
                                </div>
                              </div>
                              <div class="book-found" id="book_found_curr">
                              </div>
                              <div class="book-notfound">
                              </div>
                              <div class="edit-data-search" id="edit_book_found_curr">
                                <form id="form_found_curr"  class="form-horizontal"action="<?php echo vendor_app_util::url(["ctl"=>"bookshelf_book"]); ?>" method="post" enctype="multipart/form-data">
                                  <h5 class="space30">Book Found :</h5>
                                  <div class="form-group row">
                                    <!-- Title -->
                                    <label class="control-label col-md-3" for="title">Title</label>
                                    <div class="controls col-md-6 search_book_title">
                                      <input type="text" name="book[title]" placeholder="" class="form-control books_form_title" value="" required>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row hide" >
                                    <!-- Slug -->
                                    <label class="control-label col-md-3" for="slug">Slug</label>
                                    <div class="controls col-md-6">
                                      <input  type="text"  name="book[slug]" placeholder="" class="form-control books_form_slug" value="" >
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!-- Category -->
                                    <label class="control-label col-md-3" for="categories">Category</label>
                                    <div class="controls col-md-6">
                                      <select name="book[categories_id]"  class="form-control input-categories_id">
                                        <option value="0">Unkown category</option>
                                        <?php foreach ($this->categories as $record) { ?>
                                        <option value="<?php echo $record['id']?>">
                                          <?php echo $record['name']?>
                                        </option>
                                        <?php } ?>
                                      </select>
                                      <input type="hidden" name="book[category_search_api]"  class="category_search_api">
                                      <input type="hidden" name="book[book_categories_name]"  class="book_categories_name">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <!--  Featured Image -->
                                    <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
                                    <div class="controls col-md-6">
                                      <input type="hidden" name="book[img_search_api]" class="img_search_api">
                                      <p class="img_search"><img src=""></p>
                                      <input type="file" id="featured_image3" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="ISBN">ISBN</label>
                                      <div class="controls col-md-6 search_book_isbn">
                                        <input type="text"  name="book[ISBN]" placeholder="" class="form-control books_form_isbn" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="author">Author</label>
                                      <div class="controls col-md-6 search_book_author">
                                        <input type="text"  name="book[author]" placeholder="" class="form-control books_form_author" value="" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <!-- Title -->
                                      <label class="control-label col-md-3" for="year">Year</label>
                                      <div class="controls col-md-6">
                                        <input type="text"  name="book[year]" placeholder="" class="form-control books_form_year" value="" required>
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
                                        <input type="hidden" name="action" placeholder="" class="form-control" value="current" >
                                        <input class="btn btn-review" type="submit" name="btn_submit" id="btn_submit2" value="Save Current Book">
                                      </div>
                                  </div>
                                  <hr>
                                </form>
                              </div>
                              <ul class="list-unstyled read-list book_found_curr">
                                <?php foreach($this->actionCurrent as $key => $record) { ?>
                                <li>
                                  <span class="f700 title-part title-part-<?php echo $record['act_id'] ?> <?php if($record['act_status'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                  <span>
                                    <a class="hide-text" data="<?php echo $record['act_id'] ?>" id="hide_<?php echo $record['act_id'] ?>"><?php if($record['act_status'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['act_id']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['act_id']; ?>,deleteBookArticle">Delete</button>
                                  </span>
                                </li>
                                <?php } ?>
                              </ul>
                              <a href="javascript:void(0)" class="f700 recomand-txt">Add Current Read</a>
                            </div>

                            <h5 class="space30">Book Reviews:</h5>
                            <hr>
                            <ul class="list-unstyled read-list " id="bookshelf_rv">
                              <?php foreach($this->revRecords as $key => $record) { ?>
                              <li>
                                <span class="f700 title-part title-part-<?php echo $record['rvID'] ?> <?php if($record['rvStatus'] == 1) echo ""; else echo "opacity4" ?>"><?php echo $record['title'] ?></span>
                                <span>
                                  <a href="<?php echo RootURL."books/".$record['slug'] ?>">View</a> | 
                                  <a href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'edit_reviewbook/'.$record['id']."/".$record['rvID'])); ?>">Edit</a> |
                                  <a class="hide-text" data="<?php echo $record['rvID'] ?>" title="book_reviews" id="hide_<?php echo $record['rvID'] ?>"><?php if($record['rvStatus'] == 1) echo "Hide"; else echo "Unhide" ?></a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem<?php echo $record['rvID']; ?>" type="button" class="btn-delete-table delItem-record" alt="<?php echo $record['rvID']; ?>,deleteBookShelfRv">Delete</button>
                                </span>
                              </li>
                              <?php } ?>
                            </ul>
                            <div class="text-right space20"><a class="btn btn_review btn-save1 edit-btn" href="<?=vendor_app_util::url(array('ctl'=>'bookshelf-book', 'act' => 'view')); ?>">View Bookshelf & Book Review Page</a></div>
                          </div>                          
                        </div>
                      </div>  
                      <div class="tab-pane fade" id="friends">
                        
                      </div>                            
                    </div>
                  </div>
                  <?php else:?>

                    <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade" id="bulletin">
                        
                      </div>
                      <div class="tab-pane fade" id="blogs">
                                              
                      </div> 
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade in active" id="bookshelf">
                        <div class="page1">

                        <div class="white_box">
                            <ul class="list-inline">
                              <li><h5>Current Reads</h5></li>
                              <?php friends_controller::helpFriend($this->checkfriend); ?>
                              <!-- <li class="pull-right"><a href="#" class="f700" data-toggle="popover" data-placement="bottom" data-content="Please add me as a friend" data-original-title="" title="">Add as a friend</a></li> -->
                            </ul>
                            <?php foreach($this->records as $key => $record) { ?>
                              <div class="row title-part space30" >
                                <div class="col-sm-3">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."books/".$record['slug'] ?>">
                                      <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                                        <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } else { ?>
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } ?>
                                    </a>
                                  </div>
                                </div>
                                <div class="col-sm-9">
                                    <h3><a href="<?php echo RootURL."books/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">By:</span><?php echo $record['author'] ?></p>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">ISBN:</span><?php echo $record['ISBN'] ?></p>
                                    <div class="txt_des"> 
                                      <p><span style="font-weight:900; font-size:15px">Description:</span><?php if(strlen($record['description']) > 400)  echo substr($record['description'], 0, 400).'<span>...</span>'; else echo $record['description'] ; ?></p>
                                    </div>

                                  <div class="grey_box gray1">
                                    <a href="<?php echo RootURL."books/".$record['slug'] ?>" class="pull-right" > <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <ul class="list-inline">
                              <li><h5>Favorite Book</h5></li>
                            </ul>
                            <?php foreach($this->favRecords as $key => $record) { ?>
                              <div class="row title-part space30" >
                                <div class="col-sm-3">
                                  <div class="img-box">
                                    <a href="<?php echo RootURL."books/".$record['slug'] ?>">
                                      <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                                        <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } else { ?>
                                        <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                      <?php } ?>
                                    </a>
                                  </div>
                                </div>
                                <div class="col-sm-9">
                                    <h3><a href="<?php echo RootURL."books/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></h3>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">By: </span><?php echo $record['author'] ?></p>
                                    <p class="cate_txt" style="font-weight:400;"><span style="font-weight:900; font-size:15px">ISBN: </span><?php echo $record['ISBN'] ?></p>
                                    <div class="txt_des"> 
                                      <p><span style="font-weight:900; font-size:15px">Description: </span><?php if(strlen($record['description']) > 400)  echo substr($record['description'], 0, 400).'<span>...</span>'; else echo $record['description'] ; ?></p>
                                    </div>

                                  <div class="grey_box gray1">
                                    <a href="<?php echo RootURL."books/".$record['slug'] ?>" class="pull-right"> <span class="f700"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Read More</a>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <h5 class="space30">Recomended Reads</h5>
                            <div id="owl-demo" class="owl-carousel owl-theme">
                            <?php foreach($this->recRecords as $key => $record) { ?>
                              <div class="item" >
                                <a href="<?php echo RootURL."books/".$record['slug'] ?>">
                                  <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                                    <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } else { ?>
                                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } ?>
                                </a>  
                                <p class="text-center space10"><a href="<?php echo RootURL."books/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></p>  
                              </div>

                            <?php } ?>
                            </div>
                            <h5 class="space30">Book Reviews</h5>
                            <div id="owl-demo1" class="owl-carousel owl-theme">

                             <?php foreach($this->revRecords as $key => $record) { ?>

                              <div class="item" >
                                <a href="<?php echo RootURL."books/".$record['slug'] ?>">
                                  <?php if (strpos($record['featured_image'], "https://books.google.com/books/") !== false) { ?>
                                    <img src="<?php echo $record['featured_image']?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } else { ?>
                                    <img src="<?php echo RootREL; ?>media/upload/<?= ($record['featured_image']) ? 'books/'.$record['featured_image'] : "no_picture.png" ?>" class="img-responsive" alt="book-3" width=100%;>
                                  <?php } ?>
                                </a>
                                <p class="text-center space10"><a href="<?php echo RootURL."books/".$record['slug'] ?>" style="color: #333"><?php echo $record['title'] ?></a></p>  
                              </div>

                            <?php } ?>

                            </div>
                          </div>
                        </div>
                      </div>  
                      <div class="tab-pane fade" id="friends">
                      </div>                            
                    </div>
                  </div>

                  <?php endif;?>


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
<!-- <script src="<?php echo RootREL; ?>media/js/encode-character.js"></script> -->
<script src="<?php echo RootREL; ?>media/js/searchBook.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
           autoPlay: 3000, //Set AutoPlay to 3 seconds
           items : 4,   
           itemsCustom : [
         [0, 1],
         [320, 1],
         [480, 1],
         [768, 2],
         [1200, 4],
         [1400, 4],
         [1600, 4],
         [1920, 4]
        ],
         navigation : true, // Show next and prev buttons
         slideSpeed : 300,
         paginationSpeed : 400,

           navigationText: [
           "<img src='<?php echo RootREL; ?>media/img/left-arrow.png'>",
           "<img src='<?php echo RootREL; ?>media/img/right-arrow.png'>"
           ],
           pagination:false,
         });
      });
  </script>

    <script type="text/javascript">
      $(document).ready(function() {
          $("#owl-demo1").owlCarousel({
             autoPlay: 3000, //Set AutoPlay to 3 seconds
             items : 4,   
             itemsCustom : [
           [0, 1],
           [320, 1],
           [480, 1],
           [768, 2],
           [1200, 4],
           [1400, 4],
           [1600, 4],
           [1920, 4]
          ],
           navigation : true, // Show next and prev buttons
           slideSpeed : 300,
           paginationSpeed : 400,

             navigationText: [
             "<img src='<?php echo RootREL; ?>media/img/left-arrow.png'>",
             "<img src='<?php echo RootREL; ?>media/img/right-arrow.png'>"
             ],
             pagination:false,
           });
        });
    </script>



<script type="text/javascript">
$(document).ready(function(){

  $('.recomand-txt').click(function(){
      console.log("11111111111111");
      $(this).parents('.recomend').find('.edit-book').toggle();
  });

  $('.dlt-text').click(function() {
      $(this).parents('li').toggleClass('remove-line');        
  });

  $('#book_found_fv').on('click','.inlineRadio', function () {
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

var data = <?php echo json_encode($this->records); ?>;
var RootREL = '<?php echo RootREL; ?>';


// Favorite
// searchAutomatic('favorite_title', data, 'title');
// searchAutomatic('favorite_isbn', data, 'ISBN');

getDataSearchAutomatic(data, 'getFavTitleAuthor', 'favorite_title_author');
getDataSearchAutomatic(data, 'getFavIsbn10', 'favorite_isbn');

// Recommanded
// searchAutomatic('recommanded_title', data, 'title');
// searchAutomatic('recommanded_isbn', data, 'ISBN');

getDataSearchAutomatic(data, 'getRecomTitleAuthor', 'recom_title_auth');
getDataSearchAutomatic(data, 'getRecomIsbn10', 'recommanded_isbn');

// Current
// searchAutomatic('current_title', data, 'title');
// searchAutomatic('current_isbn', data, 'ISBN');

getDataSearchAutomatic(data, 'getCurrTitleAuthor', 'current_title_auth');
getDataSearchAutomatic(data, 'getCurrIsbn10', 'current_isbn');

// 
$('#book_found_fv').on('click', '.saveFavBook', function() {
  var alt = $(this).attr('alt');
  saveData('favorite', 'book_found_fv','saveFavBook',  alt ? alt : 'null');
});

$('#book_found_recom').on('click', '.saveFavBook', function() {
  var alt = $(this).attr('alt');
  saveData('recommanded', 'book_found_recom','saveFavBook',  alt ? alt : 'null');
});

$('#book_found_curr').on('click', '.saveFavBook', function() {
  var alt = $(this).attr('alt');
  saveData('current', 'book_found_curr','saveFavBook',  alt ? alt : 'null');
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
        url:rootUrl+'user/bookshelf_book/saveData',
        data:{
            object_article_id: dataSearch['id'],
            book: dataSearch,
            action: action,
            alt: alt ? alt : null
        },
        success: function(res){
            var resObject = JSON.parse(res);
            if( resObject.status == 1) {
                $('#'+idParent).hide();
                $('.recomand-txt').parents('.recomend').find('.edit-book').hide();
                $('.'+idParent).append(`
                  <li>
                    <span class="f700 title-part title-part-${resObject.newRecord.id}">${dataSearch['title']}</span>
                    <span>
                      <a class="hide-text" data="${resObject.newRecord.id}" id="hide_${resObject.newRecord.id}">Hide</a> |<button style="float:none;font-weight: inherit; border: 0; background-color: transparent; font-size: 15px; color: #ee352d; " id="delItem${resObject.newRecord.id}" type="button" class="btn-delete-table delItem-record" alt="${resObject.newRecord.id},deleteBookArticle">Delete</button>
                    </span>
                  </li>
                `);
                $('.form-control').val('');
            } else {
              confirm(resObject.message);
            }
        }
      });
  }   
}

function getDataForm(idFormParent)
{
  title = $('#'+idFormParent).find('input[name="book[title]"]').val();
  categories_id = $('#'+idFormParent).find('input[name="book[categories_id]"]').val();
  img_search_api = $('#'+idFormParent).find('input[name="book[img_search_api]"]').val();
  ISBN = $('#'+idFormParent).find('input[name="book[ISBN]"]').val();
  author = $('#'+idFormParent).find('input[name="book[author]"]').val();
  year = $('#'+idFormParent).find('input[name="book[year]"]').val();
  description1 = $('#'+idFormParent).find('input[name="book[description1]"]').val();
  image = $('#'+idFormParent).find('input[name="image"]').val();

  formData = {
      book: {
        title,
        categories_id,
        img_search_api,
        ISBN,
        author,
        year,
        description1,
        image
      }
  }

  return formData;
}

$('#book_found_fv').on('click', '.btn-cancel-book', function() {
   $('.book-found').hide();
});

$('#book_found_recom').on('click', '.btn-cancel-book', function() {
   $('.book-found').hide();
});

$('#book_found_curr').on('click', '.btn-cancel-book', function() {
   $('.book-found').hide();
});

$('#form_found_fv').on('click', '.btn-cancel-book', function() {
   $('.edit-data-search').hide();
});

$('#form_found_recom').on('click', '.btn-cancel-book', function() {
   $('.edit-data-search').hide();
});

$('#form_found_curr').on('click', '.btn-cancel-book', function() {
   $('.edit-data-search').hide();
});

// 
$('.bookshelf').on('click', '.hide-text', function (){
  var ItemObjectID = $(this).attr('data');
  var title = $(this).attr('title') ? $(this).attr('title') : null;
  $(this).text(function(i, text){
    $.ajax({
        type:"POST",
        url:rootUrl+'user/bookshelf_book/changeOwnerStatus',
        data:{
            id: ItemObjectID,
            status: (text === "Hide" ) ? 0 : 1,
            title: title
        },
        success: function(res){
            var resObject = JSON.parse(res);
            if( resObject.status == 1) {
              if ( text === "Hide" ) {
                $('.title-part-'+ItemObjectID).addClass('opacity4');
                $('#hide_'+ItemObjectID).text("Unhide");
              } else {
                $('.title-part-'+ItemObjectID).removeClass('opacity4');
                $('#hide_'+ItemObjectID).text("Hide");
              }
            } else {
                confirm(resObject.message);
            }
        }
    });  
  });
});
});

</script>

<script type="text/javascript" src="<?php echo RootREL; ?>media/libs/ckeditor_v4_full/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    CKEDITOR.replaceClass = 'description';
  });
  CKEDITOR.config.baseFloatZIndex = 100001;

  var error = "<?php if(isset($this->errors)){ echo $this->errors['message']; }else{ echo null; } ?>";
  if(error.length > 1) {
    confirm(error);
  }
</script>
