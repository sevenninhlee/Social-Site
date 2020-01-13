var util = {};
var dataSearch = { "id":"83","title":"By Ro-Ro To The Baltic (2nd Edition)","categories_id":"38","user_id":"3","featured_image":"http://books.google.com/books/content?id=v9Z5DgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api","featured_my_book":"0","book_rating":null,"author":"Barry Mitchell","ISBN":"9781326454289","year":"2016","description":"<p>The 1970s heralded the universal arrival of the dedicated roll-on roll-off freight ferry, or the ro-ro as it became more economically known. During the early years of the ro-ro several owners continued to carry a limited number of passengers in the same style and comfort as expected aboard their former conventional &#39;short-sea&#39; freighters. &#39;By Ro-Ro to the Baltic&#39; takes the reader aboard a bygone class-leading vessel for a &#39;fly on the wall&#39; look at its operation on an intriguing near three-thousand mile voyage of several decades past.</p>\r\n","slug":"by-ro-ro-to-the-baltic-2nd-edition","categories_arr":",0,","owner_status":"1","owner_group_status":"0","admin_status":"1","created":"2019-03-21 01:43:02","updated":"2019-03-21 01:43:02","name":"Chrau (Vietnamese people)","book_categories_id":"38","book_categories_name":"Chrau (Vietnamese people)","book_categories_slug":"chrau-vietnamese-people","book_categories_status":"1","book_categories_created":"2019-03-21 01:43:02","book_categories_updated":"2019-03-21 01:43:02","AvrRating":"0.00" };
localStorage.setItem('dataSearch',JSON.stringify(dataSearch) );  

var ctl_page = document.getElementById("main_page").src.split("ctl=")[1];
util.post = function(url, fields) {
    var $form = $('<form>', {
        action: url,
        method: 'post'
    });
    $.each(fields, function(key, val) {
         $('<input>').attr({
             type: "hidden",
             name: key,
             value: val
         }).appendTo($form);
    });
    $form.appendTo('body').submit();
}

function converDate(d) {
  var dar = d.toLocaleDateString().split('/');
  return dar[2]+"-"+((dar[0]<10)?"0":"")+dar[0]+"-"+((dar[1]<10)?"0":"")+dar[1];
}


$("#formClient-"+ctl_page+"-search").submit(function(e) {
    e.preventDefault(); 
    var content = $("#formClient-"+ctl_page+"-search").find('input[name="search"]').val();
    if(content === ''){
        window.location.replace(rootUrl+ctl_page);
    }else{
        var url = rootUrl + ctl_page + "/index?search="+content;
        window.location.replace(url);
    }
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function () {
    (function($) {
        $('.thumbs-like').click(function(){
            var data = $(this).attr('data');
            var data = data.split(',');
            var ItemObjectID = parseInt(data[0]);
            var ItemModel = data[1].trim();
            var checkUser = $(this).attr('checkUser');
            var act = $(this).attr('alt');
            if(!checkUser) {
                confirm("Please login to continue...");
            } else {
                $.ajax({
                    type:"POST",
                    url:rootUrl+'likes/getLike',
                    data:{
                        object_article_id: ItemObjectID,
                        table_model: ItemModel,
                        status: (act == 1) ? 1 : 0
                    },
                    success: function(res){
                        var resObject = JSON.parse(res);
                        if( resObject.succsess == 1) {
                            let el = document.getElementById('likeItem_'+ItemObjectID);
                            if(resObject.message === "addLike") {
                                el.classList.add("like-btn");
                                el.setAttribute('alt', '0');
                                $( "#totalLike_"+ItemObjectID ).text(resObject.total_like);
                            }
                            if(resObject.message === "disLike") {
                                el.classList.remove("like-btn");
                                el.setAttribute('alt', '1');
                                $( "#totalLike_"+ItemObjectID ).text(resObject.total_like);
                            }
                        } else {
                            confirm(resObject.message);
                        }
                    }
                });
            } 
        });

        $('.catagory_data').click(function (e) {
            e.preventDefault();
            if($(this).attr('disabled')){
            }else{
                var ItemObjectID = $(this).attr('itemid');
                $.ajax({
                    type:"GET",
                    url:rootUrl+ctl_page+'/index',
                    data:{
                        category_id: ItemObjectID,
                    },
                    success: function (data) {
                        $('body').html(data);
                    },
                    error:function(err){
                        
                    }
                });
            }
        });

        $('.archives_data').click(function (e) {
            e.preventDefault();
            if($(this).attr('disabled')){
            }else{
                var month = $(this).attr('month');
                var year = $(this).attr('year');
                $.ajax({
                    type:"GET",
                    url:rootUrl+ctl_page+'/index',
                    data:{
                        month: month,
                        year: year,
                    },
                    success: function (data) {
                        $('body').html(data);
                    },
                    error:function(err){
                        
                    }
                });
            }
        });

        $('#btn_cancel').click( function() {
            window.location.reload();
        });


        $('.btn_join').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data');
            var checkUser = $(this).attr('checkUser');
            if (!checkUser) {
                confirm("Please login to continue...");
            } else {
                    $.ajax({
                    type:"POST",
                    url:rootUrl+'book_groups/joinGroup',
                    data:{
                    book_group_article_id : id,
                    },
                    success: function(res){
                    console.log(res);
                    var resObject = JSON.parse(res);
                    if( resObject.succsess == 1) {
                        location.reload();
                        } else {
                            confirm(resObject.message);
                    }
                    }
                });
            }
        });


        $('.btn_compose').click( function () {
            if($(this).attr('isCheckUser') === "no") {
                confirm("Please, login to continue!");
            } else {
                switch (ctl_page) 
                { 
                    case 'books':
                        window.location.href = rootUrl+"user/books/add";
                        break;
                    case 'book_groups':
                        window.location.href = rootUrl+"user/book_groups/add";
                        break;
                    case 'blogs':
                        window.location.href = rootUrl+"user/blogs/add";
                        break;
                    case 'films':
                        window.location.href = rootUrl+"films/add";
                        break;
                    case 'opinions_debates':
                        window.location.href = rootUrl+"user/opinions_debates/add";
                        break;
                    default:
                        window.location.reload();
                }
            }
        });

        $('#search_isbn, .search_isbn').click(function () {
            var value = $(this).parents('.recomend').find('#books_isbn').val().trim();
            var altAction = $(this).parents('.recomend').find('#books_isbn').attr('alt');
            if(value.length == 10 || value.length == 13) {
                $(this).parents('.recomend').find('.search_book_isbn .error_search').hide();
                searchBook('isbn', value, altAction)
            } else {
                $(this).parents('.recomend').find('.search_book_isbn .error_search').show();
                $(this).parents('.recomend').find('.search_book_isbn .error_search').html('Please enter right 10 or 13 characters');
            }            
        });

        $('#search_title_author, .search_title_author').click( function()
        {
            var altAction = $(this).parents('.recomend').find('#books_title').attr('alt');
            var v_title = $(this).parents('.recomend').find('#books_title').val().trim();
            var v_author = $(this).parents('.recomend').find('#books_author').val().trim();
            if(v_title.length < 3 && v_author.length < 3) {
                $(this).parents('.recomend').find('.search_book_title .error_search').show();
                $(this).parents('.recomend').find('.search_book_title .error_search').html('Please use at least 3 characters');
                $(this).parents('.recomend').find('.search_book_author .error_search').show();
                $(this).parents('.recomend').find('.search_book_author .error_search').html('Please use at least 3 characters');
            } else {
                $(this).parents('.recomend').find('.error_search').hide();
                if(v_title.length >= 3 && v_author.length >= 3){
                    searchBook('intitle_inauthor',{v_title, v_author}, altAction)
                }else if(v_title.length >= 3 && v_author.length <3){
                    searchBook('intitle', v_title, altAction)
                }else{
                    searchBook('inauthor', v_author, altAction)
                }
            }
        })       

    })(jQuery);

  $('.read_more').readmore({speed: 500});
});

