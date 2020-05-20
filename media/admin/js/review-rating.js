
    var raValue=0;
    $('.rating').each(function( i ) {
        	$(this).shieldRating({
		        max: 5,
		        step: 0.5,
		        value: $(this).attr('value'),
		        enabled: Boolean(parseInt($(this).attr('enabled'))),
		        markPreset: false,
                events: {
                change: function (e) { 
                    raValue = e.target.value();
                    document.getElementById(""+btn_submit).disabled = false;
                }
            }
        });
    });


    $('.btn_editrv').click(function(e) {
        var slugObject = $(this).attr('slugObject');
        var idObject = $(this).attr('idObject');
        var id = $(this).attr('id');
        var revID = parseInt(id);
        var rwData = $('#review').val();
      
        $.ajax({
            type:"POST",
            url:rootUrl+'review_rating/editRating',
            data:{
                revID: revID,
                value: raValue,
                review: rwData
            },
            success: function(res){
                var resObject = JSON.parse(res);
                if( resObject.succsess == 1) {
                    location.replace(rootUrl+'books/book_review/'+slugObject);
                } else {
                    confirm(resObject.message);
                }
            }
        });
      })
    
    $('.btn_review_rating').click(function(e) {
      var data = $(this).attr('data');
      var data = data.split(',');
      var ItemObjectID = parseInt(data[0]);
      var ItemModel = data[1].trim();
      var checkUser = $(this).attr('checkUser');
      var rwData = $('#review').val();
      if(!checkUser) {
                confirm("Please login to continue...");
      } else {
          $.ajax({
              type:"POST",
              url:rootUrl+'review_rating/getRating',
              data:{
                  object_article_id: ItemObjectID,
                  table_model: ItemModel,
                  value: raValue,
                  review: rwData,
                  pathname
              },
              success: function(res){
                  var resObject = JSON.parse(res);

                  if( resObject.succsess == 1) {
                    location.reload();
                  } else {
                      confirm(resObject.message);
                  }
              }
          });
      } 
        
    })

    $('.forreply').each(function(){
        var id = $(this).attr('data');
        if ($(`.forreply.`+id+``).find('.reply_rating').length > 0) { 
            $(this).css({"display":"block"});
        }
    })    

    $('.forreply_hidden').each(function(){
        let id = $(this).attr('data_id');
        if ($(`.forreply_at.`+id+``).find('.reply_rating').length == 0) { 
            $(this).css({"display":"none"});
        }
    })

    function showRelyComment(id){
        $('.replayParent.'+id).show();
        $('.forreply.'+id).show();
        let content = "Hidden Reply";
        let data = 0;
        $('.forreply_hidden.'+id).attr('data',data);
        $('.forreply_hidden.'+id).find('span').html(content);
    }    


    $('.forreply_hidden').click( function() {
      let id = $(this).attr('data_id');
      let content = $(this).attr('data')==1?'Hidden Reply':'Show Reply';
      let data = $(this).attr('data')==1?0:1;
      $(this).attr('data',data);
      $(this).find('p > .disp-btn-'+id).find('span').html(content);
      if(data==1){
        $('.replayParent.'+id).hide();
        $('.forreply.'+id).hide();
      }else{
        $('.replayParent.'+id).show();
        $('.forreply.'+id).hide();
      }
    });
    

    $('body').on('click', '.btn_reply', function(e) {
        var data = $(this).attr('data');
        var RootREL = $(this).attr('RootREL');
        var data = data.split(',');
        var reviewID = parseInt(data[0]);
        var ItemObjectID = parseInt(data[1]);
        var ItemModel = data[2].trim();
        var checkUser = $(this).attr('checkUser');
        var rwData = $('#reply_'+ reviewID).val();
        console.log("------" + reviewID );
        
        if(!checkUser) {
                  confirm("Please login to continue...");
        } else {
            $.ajax({
                type:"POST",
                url:rootUrl+'review_rating/getRating',
                data:{
                    review_parent_id: reviewID,
                    object_article_id: ItemObjectID,
                    table_model: ItemModel,
                    value: 0,
                    review: rwData
                },
                success: function(res){
                    var resObject = JSON.parse(res);
                   
                    var d = new Date();
                    var hour = d.getHours() == 0 ? 12 : (d.getHours() > 12 ? d.getHours() - 12 : d.getHours());
                    var min = d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
                    var ampm = d.getHours() < 12 ? 'am' : 'pm';
                    var time = hour + ':' + min + ' ' + ampm;
                    locale = "en-us",
                    month = d.toLocaleString(locale, {
                        month: "long"
                    });

                    if( resObject.succsess == 1) {
                        $(`.forreply_at.`+reviewID+` .replayParent`).append(`
                        <div class="media heightclass">
                        <div class="media-left">
                          <img src="${RootREL}media/upload/`+ (resObject.data.user.avata ? 'users/'+ resObject.data.user.avata : "no_picture.png") +`" width=50; height=50;>
                        </div>
                        <div class="media-right" style="width:100%;"> 
                        <h5 style="display: inline-block;">
                            <a href="${rootUrl}user/profile/index?user=${resObject.data.user.id}"  >${resObject.data.user.firstname}</a> 
                            <span class="text-date-comment"> ` + month + ' ' + d.getDate() + ', ' +  d.getFullYear() + ' ' + time + ` </span> 
                        </h5>
                        <p class="review-txt">
                            ${resObject.data.text}
                        </p>
                        </div>
                        </div>
                        `);
                        $('#reply_'+ reviewID).val('');
                        $('.forreply_hidden.'+reviewID).css({"display":"block"});
                    } else {
                        confirm(resObject.message);
                    }
                }
            });
        } 
          
      })

      $('.btn_add_comment').click(function(e) {
        var data = $(this).attr('data');
        var RootREL = $(this).attr('RootREL');
        var data = data.split(',');
        var reviewID = parseInt(data[0]);
        var ItemObjectID = parseInt(data[1]);
        var ItemModel = data[2].trim();
        var checkUser = $(this).attr('checkUser');
        var rwData = $('.review').val();
        if(!checkUser) {
          confirm("Please login to continue...");
        } else {
          $.ajax({
              type:"POST",
              url:rootUrl+'review_rating/addComment',
              data:{
                  review_parent_id: reviewID,
                  object_article_id: ItemObjectID,
                  table_model: ItemModel,
                  value: 0,
                  review: rwData,
                  pathname
              },
              success: function(res){
                var resObject = JSON.parse(res);
                if( resObject.status == 1) {
                    location.reload();
                  } else {
                      confirm(resObject.message);
                  }
              }
          });
        } 
      })

