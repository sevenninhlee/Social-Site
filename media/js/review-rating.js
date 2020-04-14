
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

    function showUserName(user) {
      if(user.show_name == '0'){
          return `${user.firstname} ${user.lastname}`;
      }else{
          return user.username;
      }
    }

    function strpos (haystack, needle, offset) {
      //  discuss at: https://locutus.io/php/strpos/
      // original by: Kevin van Zonneveld (https://kvz.io)
      // improved by: Onno Marsman (https://twitter.com/onnomarsman)
      // improved by: Brett Zamir (https://brett-zamir.me)
      // bugfixed by: Daniel Esteban
      //   example 1: strpos('Kevin van Zonneveld', 'e', 5)
      //   returns 1: 14
    
      var i = (haystack + '')
        .indexOf(needle, (offset || 0))
      return i === -1 ? false : i
    }

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
                    location.replace(rootUrl+'books/'+slugObject);
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


    $('body').on('click', '.forreply_hidden', function() {
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

                   
                    let name = showUserName(resObject.data.user)

                    if( resObject.succsess == 1) {
                        $(`.forreply_at.`+reviewID+` .replayParent`).append(`
                        <div class="media heightclass">
                        <div class="media-left">
                          <img src="${RootREL}media/upload/`+ (resObject.data.user.avata ? 'users/'+ resObject.data.user.avata : "no_picture.png") +`" width=50; height=50;>
                        </div>
                        <div class="media-right" style="width:100%;"> 
                        <h5 style="display: inline-block;">
                            <a href="${rootUrl}user/profile/index?user=${resObject.data.user.id}" style="float: left; font-weight: 700;margin-right: 20px;font-size: 20px;">${name}</a> 
                            <span class="text-date-comment"> ` + month + ' ' + d.getDate() + ', ' +  d.getFullYear() + ' ' + time + ` </span> 
                        </h5>

                        <div class="edit-delete-comment">
                            <div class="edit-delete-comment-act"><span class="CommentItemAction" typeAct="edit" data="${resObject.data.id}">Edit</span> <span typeAct="delete" class="CommentItemAction" data="${resObject.data.id}">Delete</span></div>
                                <div class="edit-delete-comment-content" id="CommentItemAction-${resObject.data.id}">
                                    <textarea class="form-control replay" id="CommentItemActionContent-${resObject.data.id}" rows="4" placeholder="Add Reply">${resObject.data.text}</textarea>
                                    <div class="text-right">
                                        <button class="btn btn-review space20 btn-cancle CommentItemAction" type="button" typeAct="cancel" data="${resObject.data.id}">Cancel</button>
                                        <button 
                                            class="btn btn-review space20 CommentItemAction" 
                                            type="button"
                                            typeAct="submit" 
                                            data="${resObject.data.id}"
                                            RootREL = "${RootREL}"
                                            checkUser="true"
                                        >
                                            Edit
                                        </button>                              
                                    </div> 
                                </div>
                            </div>

                        <div class="review-txt" review-txt-${resObject.data.id}">
                            ${resObject.data.text}
                        </div>
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

      $('.LoadmoreReview').on('click', function(){
        let data = $(this).attr('data');
        data = JSON.parse(data)
        $.ajax({
          type:"POST",
          url:rootUrl+data.ctl+'/loadmore',
          data,
          success: function(res){
            let data = JSON.parse(res)
            let html = '';
            user_logged = data.user_logged;
            data.data.forEach(item=>{
              let RootREL = data.RootREL

              let review = item.review;
              let reviewHtml = ''
              if(review.length>300){

                let stringCut = review.substring(0,300);// substr($review['review'], 0, 300);
                let endPoint = strpos(stringCut, ' ', 0);//   strrpos($stringCut, ' ');

                reviewHtml = `
                  ${review.substring(0, endPoint)}
                  <span class="read-more-show "><span style="color: black;">...</span>Read more <i class="fa fa-angle-down"></i></span>
                  <span class="read-more-content"> ${review.substring(endPoint, -1)}
                  <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span> </span>
                `
              }else{
                reviewHtml = review
              }

              let repliesHtml = '';
              data.replies.forEach(reply=>{
                let commentHtml = '';

                let review1 = item.review;
                let replyHtml = ''
                if(review1.length>200){
  
                  let stringCut = review1.substring(0,200);// substr($review1['review1'], 0, 200);
                  let endPoint = strpos(stringCut, ' ', 0);//   strrpos($stringCut, ' ');
  
                  replyHtml = `
                    ${review1.substring(0, endPoint)}
                    <span class="read-more-show "><span style="color: black;">...</span>Read more <i class="fa fa-angle-down"></i></span>
                    <span class="read-more-content"> ${review1.substring(endPoint, -1)}
                    <span class="read-more-hide ">Less <i class="fa fa-angle-up"></i></span> </span>
                  `
                }else{
                  replyHtml = review1
                }

                if(reply.user_id == user_logged){
                  commentHtml = 
                  `
                  <div class="edit-delete-comment">
                    <div class="edit-delete-comment-act"><span class="CommentItemAction" typeAct="edit" data="${reply.id}">Edit</span> <span typeAct="delete" class="CommentItemAction" data="${reply.id}">Delete</span></div>
                    <div class="edit-delete-comment-content" id="CommentItemAction-${reply.id}">
                      <textarea class="form-control replay" id="CommentItemActionContent-${reply.id}" rows="4" placeholder="Add Reply">${reply.review.trim()}</textarea>
                      <div class="text-right">
                        <button class="btn btn-rp space20 btn-cancle CommentItemAction" type="button" typeAct="cancel" data="${reply.id}">Cancel</button>
                        <button 
                            class="btn btn-rp space20 CommentItemAction" 
                            type="button"
                            typeAct="submit" 
                            data="${reply.id}"
                            RootREL = "${RootREL}"
                            checkUser="${user_logged?true:false}"
                        >
                            Edit
                        </button>                              
                      </div> 
                    </div>
                  </div>
                  `
                }
                if(item.id == reply.review_parent_id){
                  repliesHtml +=
                  `
                  <div class="media heightclass reply_rating">
                    <div class="media-left">
                      <img src="${RootREL}media/upload/${reply.avata?'users/'+reply.avata:'no_picture.png'}" width=50; height=50;>
                    </div>
                    <div class="media-right" style="width:100%;"> 
                      <h5 style="display: inline-block;">
                        <a href="user/profile/index?user=${reply.users_id}" style="float: left; font-weight: 700;margin-right: 20px;font-size: 20px;">${showUserName(reply)}</a> 
                        <span class="text-date-comment"> ${reply.created} </span> 
                      </h5>
                      ${commentHtml}
                      <div class="review-txt review-txt-${reply.id}">
                        ${replyHtml}
                      </div>
                    </div>
                  </div>
                  `
                }
              })

              html += 
              `
              <div class="media heightclass">
                <div class="media-left">
                  <img src="${RootREL}media/upload/`+ (item.users_avata ? 'users/'+ item.users_avata : "no_picture.png") +`" width=150; height=150;>
                </div>
                <div class="media-right" style="width:100%;"> 
                  <h5 style="display: inline-block;width:100%;">
                    <a href="user/profile/index?user=${item.user_id}" style="font-weight: 700;margin-right: 10px;font-size: 20px; float: left;">${showUserName({
                      firstname: item.users_firstname,
                      lastname: item.users_lastname,
                      username: item.users_username,
                      show_name: item.users_show_name
                    })}</a>
                  </h5>
                  ${
                    item.user_id == user_logged ?
                    `
                    <div class="edit-delete-comment">
                      <div class="edit-delete-comment-act"><span class="CommentItemAction" typeAct="edit" data="${item.id}">Edit</span> <span typeAct="delete" class="CommentItemAction" data="${item.id}">Delete</span></div>
                      <div class="edit-delete-comment-content" id="CommentItemAction-${item.id}">
                        <textarea class="form-control replay" id="CommentItemActionContent-${item.id}" rows="4" placeholder="Add Reply">${review.review && review.review.trim()}</textarea>
                        <div class="text-right">
                          <button class="btn btn-review space20 btn-cancle CommentItemAction" type="button" typeAct="cancel" data="${item.id}">Cancel</button>
                          <button 
                              class="btn btn-review space20 CommentItemAction" 
                              type="button"
                              typeAct="submit" 
                              data="${item.id}"
                              RootREL = "${RootREL}"
                              checkUser="${user_logged?true:false}"
                          >
                              Edit
                          </button>                              
                        </div> 
                      </div>
                    </div>
                    
                    ` : ``
                  }
                  <div class="review-txt review-txt-${item.id}">
                  ${reviewHtml}
                  </div>

                  <ul class="list-inline">
                    <li><p></p></li>
                    <li class="pull-right" ><p><a class="reply-btn" onclick="showRelyComment(${item.id})"><span class="fa fa-comment" style="font-size:16px;margin-right: 5px;">Add Reply</span></a></p></li>
                    <li class="pull-right forreply_hidden ${item.id}" id="" data_id="${item.id}" data="0"><p><a class="reply-btn disp-btn-${item.id}"><span class="fa fa-refresh" style="font-size:16px;margin-right: 5px;">Hidden Reply</span></a></p></li>
                  </ul>
                            
                  <div class="forreply_at ${item.id}" data="${item.id}">
                    <div class="replayParent ${item.id}">
                    ${repliesHtml}
                    </div>
                    <div class="forreply ${item.id}">
                      <textarea class="form-control replay" id="reply_${item.id}" rows="4" placeholder="Add Reply"></textarea>
                      <div class="text-right">
                        <button class="btn btn-review space20 btn-cancle" type="button">Cancel</button>
                        <button 
                            class="btn btn-review space20 btn_reply" 
                            type="button"
                            RootREL = "${RootREL}"
                            checkUser="${user_logged?true:false}"
                            data="${item.id},${item.object_article_id},blog_article_model"
                        >
                            Add reply
                        </button>                              
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
              
              `
            })
            $('.reviewRating').append(html)
            if(data.data.length>0)
              $('.LoadmoreReview').attr('data', JSON.stringify(data.loadmoreData))
            else $('.LoadmoreReview').remove();
          }
        });
      })

      $('.btn_add_comment').click(function(e) {
        var data = $(this).attr('data');
        var groupBookId = $(this).attr('groupBookId');
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
                  pathname,
                  groupBookId
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


        $('body').on('click', '.CommentItemAction', function(){
            console.log('id=', $(this).attr('data') );
            let id = $(this).attr('data');
            let typeact = $(this).attr('typeact');
            switch (typeact) {
                case "edit":
                    $('#CommentItemAction-'+id).css('display', 'block');
                    $('.review-txt-'+id).css('display', 'none');
                    break;
                case "cancel":
                    $('#CommentItemAction-'+id).css('display', 'none');
                    $('.review-txt-'+id).css('display', 'block');
                    break;
                case "submit":
                    let review = $('#CommentItemActionContent-'+id).val();
                    console.log('submit' , review);
                    $.ajax({
                        type:"POST",
                        url:rootUrl+'review_rating/editComment',
                        data:{
                            review,
                            id
                        },
                        success: function(res){
                          var resObject = JSON.parse(res);
                          console.log('resObject', resObject);
                          if( resObject.status == 1) {
                              location.reload();
                            } else {
                                confirm(resObject.message);
                            }
                        }
                    });
                    break;
                case "delete":
                    console.log('delete' );
                    let isDelete = confirm("Are you sure to delete this comment ?");
                    if(isDelete){
                        $.ajax({
                            type:"POST",
                            url:rootUrl+'review_rating/deleteComment',
                            data:{
                                id
                            },
                            success: function(res){
                              var resObject = JSON.parse(res);
                              console.log('resObject', resObject);
                              if( resObject.status == 1) {
                                  location.reload();
                                } else {
                                    confirm(resObject.message);
                                }
                            }
                        });
                    }
                    break;
                default:
                    break;
            }

        })