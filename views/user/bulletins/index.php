<?php include_once 'views/layout/outside/'.$this->layout.'headerOutside.php'; ?>
    <!-- End header -->

    <!-- start main sections -->
    <section class="main_section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-9">
            <div class="row">
              <div class="col-sm-7 col-xs-7">
                <h2 class="main-heading">Bulletin</h2>                
              </div>
              <div class="col-sm-5 col-xs-5">
                <!-- <button class="btn btn_compose btn1 pull-right" type="button">Join</button> -->
              </div>
            </div>            

            <div class="row space30">
              <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default pro-panel">
                  <?php include_once 'views/layout/'.$this->layout.'top-bar.php'; ?>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade" id="profile">
                        
                      </div>
                      <div class="tab-pane fade in active" id="bulletin">         
                        
                        <div class="white_box">

                          <?php if($this->isUserLogged):?>
                            <ul class="list-inline">
                              <li><h5>Bulletin Messages:</h5></li>
                              <li class="pull-right"><a class="f700 create-btn">Create Bulletin</a></li>
                            </ul>
                            <div class="title-part content-create">
                              <p class="f700 date12">Date: <?=date_format(date_create(), "d/m/Y")?></p>
                              <textarea class="form-control txtarea1" rows="3"></textarea>
                              <span class="text text-danger err-create"></span>
                              <p class="text-right f400 save-txt1"><a class="btn-donothing" value="create">Save</a> | <a class="danger-txt btn-cancel-create">Cancel</a></p>
                            </div>
                          <?php else:?>

                            <ul class="list-inline">
                              <li><h5>Bulletin Messages:</h5></li>
                              <li class="pull-right"><?php friends_controller::helpFriend($this->checkfriend); ?></li>
                            </ul>
                          <?php endif;?>
                      <?php if(!empty($this->records['data'])): ?>

                          <?php foreach($this->records['data'] as $key => $record) { ?>
                            <?php if( ($record['owner_status'] == 0 && $record['user_id'] != $_SESSION['user']['id']) || ($record['owner_status'] == 0 && !$this->isUserLogged)) {} else { ?>
                              <div class="title-part title-part-<?php echo $record['id']; if($record['owner_status'] == 0) echo " opacity4" ;?>">
                                <p class="f700">Date: <?=date_format(date_create($record['updated']), "d/m/Y")?></p>
                                <textarea type="text" class="form-control" rows="4" name="" disabled=""><?=$record['content']?></textarea>
                                <!-- <p><?=$record['content']?></p> -->
                                <span class="text text-danger err-edit"></span>
                                <?php if($this->isUserLogged):?>
                                  <p class="text-right f400 edit-txt">
                                    <a class="edit-btn">Edit</a> |
                                    <a id="hide_<?php echo $record['id'] ?>" class="color3c6db5 hide-text" data="<?php echo $record['id'] ?>"><?php if($record['owner_status'] == 1) echo "Hide"; else echo "Unhide";?></a>  | 
                                    <a class="danger-txt dlt-text"  value="<?=$record['id']?>">Delete</a>
                                  </p>
                                <?php endif;?>
                                <p class="text-right f400 save-txt"><a class="btn-donothing" value="<?=$record['id']?>">Save</a> | <a class="btn-donothing" class="danger-txt">Cancel</a></p>
                              </div>
                            <?php } ?>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="row text-right">
                        <?php vendor_html_helper::pagination($this->records['norecords'], $this->records['nocurp'], $this->records['curp'], $this->records['nopp']); ?>
                      </div>
                      <?php else:?>
                        <div class="row white_box">
                          <h4 style="text-align: center; padding: 15px"> Data not found!</h4>
                        </div>
                      <?php endif;?>
                      
                      <div class="tab-pane fade" id="blogs">
                        
                      </div> 
                      <div class="tab-pane fade" id="book">
                        
                      </div>
                      <div class="tab-pane fade" id="bookshelf">
                       
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
    	</div>
    </section>

    <!-- End main sections -->



    <!-- start footer -->
<?php include_once 'views/layout/'.$this->layout.'footerPublic.php'; ?>
<script type="text/javascript">
  var rootUrl   = "<?=RootURL;?>";
</script>   
<script src="<?php echo RootREL; ?>media/js/friend.js"></script>

<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });

  $('.hide-text').click(function() {
    var ItemObjectID = $(this).attr('data');
    $(this).text(function(i, text){
      $.ajax({
        type:"POST",
        url:rootUrl+'user/bulletins/changeOwnerStatus',
        data:{
            bulletin: ItemObjectID,
            owner_status: (text === "Hide" ) ? 0 : 1
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
</script>

<script>
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
  });

  $('#profile .btn-save').click(function(){
    $(this).parents('.page1').hide();
    $(this).parents('.page1').siblings('.page2').show();
  });

  $('#profile .btn-save').click(function(){
    $('h2.main-heading').text("Profile");
  });

  $('.edit-btn').click(function(){
    $(this).parents('.page1').hide();
    $(this).parents('.page1').siblings('.page2').show();
  }); 

  $('.dlt-text').click(function() {
    let id = $(this).attr('value');
    $.ajax({
      type:"POST",
      url:rootUrl+'user/bulletins/delete',
      data:{
        id
      },
      success: function(res){
        location.reload();
      },
      error: function(res){
        $('.err-create').html(JSON.parse(res.responseText).data.content)
      }
    });      
  }); 

  $(".edit-btn").click(function(){
    $(this).parents('.title-part').toggleClass('edit-data');
    $(this).parents('.title-part').find('textarea').removeAttr("disabled");
  });

  $(".btn-donothing").click(function(){
    value = $(this).attr('value');
    if(value === 'create'){
      let content = $('.txtarea1').val()
      $('.err-create').html("");
      $.ajax({
        type:"POST",
        url:rootUrl+'user/bulletins/add',
        data:{
          content
        },
        success: function(res){
            $('.txtarea1').html('');
            $('.content-create').hide();
            location.reload();
        },
        error: function(res){
          $('.err-create').html(JSON.parse(res.responseText).data.content)
        }
      });
    }else if(value){
      let content = $(this).parents('.title-part').find('textarea').val();
      let id = $(this).attr('value');
      let that = this;
      $.ajax({
        type:"POST",
        url:rootUrl+'user/bulletins/edit',
        data:{
          content, id
        },
        success: function(res){
          // console.log('test', res);
          location.reload();
        },
        error: function(res){
          $(that).parents('.title-part').find('.err-edit').html(JSON.parse(res.responseText).data.content);
        }
      });
    }else{
      $(this).parents('.title-part').removeClass('edit-data');
      location.reload();
    }
  });  

  $('.create-btn').click(function(){
    $('.content-create').show();
    $(this).parents('.white_box').find('.txtarea1').show();
    $('.txtarea1').html('');
    $(this).parents('.white_box').find('.save-txt1').show();
    $(this).parents('.white_box').find('.date12').show();
  });   

  $('.btn-cancel-create').click(function(){
    $('.txtarea1').html('');
    $('.content-create').hide();
  });   
</script>