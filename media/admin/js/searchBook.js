$( document ).ready(function() {
});

function searchAutomatic(IdInput, data = null, getValue = "name")
{
    var options = {
        data: data,

        getValue: getValue,

        template: {
        },

        list: {
            match: {
                enabled: true
            },
            onClickEvent: function() {
              console.log('test');
              var value = $("#"+IdInput).getSelectedItemData().getValue;
              var dataSearch = $("#"+IdInput).getSelectedItemData();
              if(dataSearch[getValue] === "null") {
                confirm("Invalid data!");
                $("#"+IdInput).val('');
              } else {
                localStorage.setItem('dataSearch', JSON.stringify(dataSearch));
              }
              // $("#"+IdInput).attr('data',value).trigger("change");
            }
        },

        theme: "plate-dark"
    };

    $("#"+IdInput).easyAutocomplete(options);
}

function getDataSearchAutomatic(data, IdSearch, IdInput)
{
  $("#"+IdSearch).click(function(){
      var value = $('#'+IdInput).val();
      var attrName = $('#'+IdInput).attr('name');
      var altAction = $('#'+IdInput).attr('alt');
      var dataSearch = JSON.parse(localStorage.getItem('dataSearch'));
      var getIdSearch = $('.search-btn').attr('id');
      let dataSearchTitle = dataSearch ? decode(dataSearch['title']) : null;
      let dataSearchISBN = dataSearch ? decode(dataSearch['ISBN']) : null;
      switch(attrName) {
        case "favorite_title":
          if(value.length <= 1) {
              $(this).parents('.recomend').find('.search_book_title .error_search').show();
              $(this).parents('.recomend').find('.search_book_title .error_search').html('Please use at least 1 characters');
          } else {
              $(this).parents('.recomend').find('.search_book_title .error_search').hide();
              if(dataSearchTitle && value === dataSearchTitle) {
                let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Favorite');
                $('.book-found').html(html);
                $(this).parents('.recomend').find('.book-notfound').hide();
                $(this).parents('.recomend').find('.book-found').show();

                checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
              }else {
                value = value.allReplace();
                dataSearchSystem = searchFor(data, value);
                if(dataSearchSystem.length > 0) {
                  showModalDataSystem(dataSearchSystem, altAction);
                } else {
                  callModalGetData('intitle', value, altAction);
                }
              }
          }
          break;
        case "favorite_isbn":
          if(value.length == 10 || value.length == 13) {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').hide();
            if(dataSearchISBN && value === dataSearchISBN) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Favorite');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').html('Please enter right 10 or 13 characters');

          }
          break;
        case "favorite_isbn_13":
          if(value.length != 13) {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').html('Please enter right 13 characters');
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').hide();
            if(value === dataSearch['isbn_13']) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Favorite');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          }
          
          break;
        case "recommanded_title":
          if(value.length <= 1) {
              $(this).parents('.recomend').find('.search_book_title .error_search').show();
              $(this).parents('.recomend').find('.search_book_title .error_search').html('Please use at least 1 characters');
          } else {
              $(this).parents('.recomend').find('.search_book_title .error_search').hide();
              if(dataSearchTitle && value === dataSearchTitle) {
                let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Recommanded');
                $('.book-found').html(html);
                $(this).parents('.recomend').find('.book-notfound').hide();
                $(this).parents('.recomend').find('.book-found').show();

                checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
              }else {
                value = value.allReplace();
                dataSearchSystem = searchFor(data, value);
                if(dataSearchSystem.length > 0) {
                  showModalDataSystem(dataSearchSystem, altAction);
                } else {
                  callModalGetData('intitle', value, altAction);
                }
              }
          }
          break;
        case "recommanded_isbn":
          if(value.length == 10 || value.length == 13) {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').hide();
            if(dataSearchISBN && value === dataSearchISBN) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Recommanded');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').html('Please enter right 10 or 13 characters');
          }
          break;
        case "recommanded_isbn_13":
          if(value.length != 13) {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').html('Please enter right 13 characters');
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').hide();
            if(value === dataSearch['isbn_13']) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Recommanded');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          }
          break;
        case "current_title":
          if(value.length <= 1) {
              $(this).parents('.recomend').find('.search_book_title .error_search').show();
              $(this).parents('.recomend').find('.search_book_title .error_search').html('Please use at least 1 characters');
          } else {
              $(this).parents('.recomend').find('.search_book_title .error_search').hide();
              if(dataSearchTitle && value === dataSearchTitle) {
                let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Current');
                $('.book-found').html(html);
                $(this).parents('.recomend').find('.book-notfound').hide();
                $(this).parents('.recomend').find('.book-found').show();

                checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
              }else {
                value = value.allReplace();
                dataSearchSystem = searchFor(data, value);
                if(dataSearchSystem.length > 0) {
                  showModalDataSystem(dataSearchSystem, altAction);
                } else {
                  callModalGetData('intitle', value, altAction);
                }
              }
          }
          break;
        case "current_isbn":
          if(value.length == 10 || value.length == 13) {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').hide();
            if(dataSearchISBN && value === dataSearchISBN) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Current');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_10 .error_search').html('Please enter right 10 or 13 characters');
          }
          break;
        case "current_isbn_13":
          if(value.length != 13) {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').show();
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').html('Please enter right 13 characters');
          } else {
            $(this).parents('.recomend').find('.search_book_isbn_13 .error_search').hide();
            if(value === dataSearch['isbn_13']) {
              let html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Current');
              $('.book-found').html(html);
              $(this).parents('.recomend').find('.book-notfound').hide();
              $(this).parents('.recomend').find('.book-found').show();

              checkRadio('book_found_fv', 'inlineRadio17','inlineRadio18');
            }else {
              callModalGetData('isbn', value, altAction);
            }
          }
          break;
      }
  });
}


function callModalGetData(parameter, value, altAction = null)
{
    $('#myModalSearchErr').modal('show');
    $( "#searchDataGl" ).unbind();
    $('#load').button('loading');
    setTimeout(function() {
      // $('#load').button('reset');
      $('#myModalSearchErr').modal('hide');
      searchBook(parameter, value, altAction);
   }, 5000);
}

function searchBook(parameter, value, altAction = null)
{
    var urlSearch = "https://www.googleapis.com/books/v1/volumes?q=";
    switch (parameter) 
    { 
        case 'intitle':
            urlSearch = "https://www.googleapis.com/books/v1/volumes?q=intitle:"+value;
            break;
        case 'inauthor':
            urlSearch = "https://www.googleapis.com/books/v1/volumes?q=inauthor:"+value;
            break;
        case 'inpublisher':
            urlSearch = "https://www.googleapis.com/books/v1/volumes?q=inpublisher:"+value;
            break;
        case 'isbn':
            urlSearch = "https://www.googleapis.com/books/v1/volumes?q=isbn:"+value;
            break;
        case 'intitle_inauthor':
            urlSearch = "https://www.googleapis.com/books/v1/volumes?q="+value.v_title+"+inauthor:"+value.v_author;
            break;
        default:
            urlSearch
    }

    $.ajax({
        type:"GET",
        url: urlSearch,
        success: function (data) {
            if(data['items'] !== undefined){
                $('#data_found').hide();
                $('.text-danger').hide();
                $("#myModalSearch").on("show.bs.modal", function(e) {
                    var html = ``;
                    $.each(data['items'], function (i) {
                        $.each(data['items'][i], function (key,val) {
                            if(key === "volumeInfo" && val['categories'] && val['imageLinks'] && val['authors'] && val['industryIdentifiers']) {
                                html +=  bookSearchData(val['imageLinks']['thumbnail'], val['title'], val['authors'][0], val['industryIdentifiers'][0]['identifier'], val['publishedDate'], i);
                            }
                        });
                    });

                    if( html.length == 0) {
                      html += `<p style="text-align: center;">The book is found not enough data to display!</p>`
                    }
                    
                    $("#myModalSearch .modal-body").html(html);
                });
                $('#myModalSearch').modal('show');
                $('#myModalSearch').undelegate('#choose_book', 'click');
                $('#myModalSearch').on('click', '#choose_book', function() {
                    $('#search_google').hide();
                    $('#search_google input').val(' ');

                    // book_group_edit
                    if(ctl_page === "book_groups") {
                        if(altAction === 'book_found_curr') {
                            $('#search_google_curr').hide();
                            $('#search_google_curr input').val(' ');
                        }
                        if(altAction === 'book_found_pre') {
                            $('#search_google_pre').hide();
                            $('#search_google_pre input').val(' ');
                        }  
                    }
                    // Bookshelf & Book Reviews Admin
                    if(ctl_page === "bookshelf_book") {
                        if(altAction === 'book_found_fav_bsh') {
                            $('#search_google_fav_bsh').hide();
                            $('#search_google_fav_bsh input').val(' ');
                        }
                        if(altAction === 'book_found_reco_bsh') {
                            $('#search_google_reco_bsh').hide();
                            $('#search_google_reco_bsh input').val(' ');
                        }  
                        if(altAction === 'book_found_curr_bsh') {
                            $('#search_google_curr_bsh').hide();
                            $('#search_google_curr_bsh input').val(' ');
                        } 
                    }


                    var itemBook = $(this).attr('alt');
                    if( data['items'][itemBook]) {
                        var dataResult = data['items'][itemBook]['volumeInfo'];
                    }
                    if( dataResult && ctl_page === "books") {
                        SetInforToForm(dataResult, '#form-addbook');
                    }

                    if( dataResult && ctl_page === "book_groups") {
                        var dataSearch = convertDataDefault(dataResult);
                        localStorage.setItem('dataSearchGoogle', JSON.stringify(dataSearch));

                        if(altAction === 'book_found_curr') {
                            var html = htmlShow(dataSearch, 'saveFavBook', 'addFavBook', 'Current', 'sg');
                            $('#book_found_curr').html(html);
                            $('#book_found_curr').show();
                        }
                        if(altAction === 'book_found_pre') {
                            var html = htmlShow(dataSearch, 'saveFavBook', 'addFavBook', 'Previous Reads', 'sg');
                            $('#book_found_pre').html(html);
                            $('#book_found_pre').show();
                        }
                    }

                    if( dataResult && ctl_page === "bookshelf_book") {
                        var dataSearch = convertDataDefault(dataResult);
                        localStorage.setItem('dataSearchGoogle', JSON.stringify(dataSearch));

                        if(altAction === 'book_found_fav_bsh') {
                          SetInforToForm(dataResult, '#form_found_fv');
                          // var html = htmlShow(dataSearch,'saveFavBook', 'addFavBook', 'Favorite', 'sg');
                          // $('#book_found_fv').html(html);
                          $('#book_found_fv').hide();
                          $('#edit_book_found_recom').hide();
                          $('#edit_book_found_curr').hide();
                          $('#edit_book_found_fv').show();
                        }
                        if(altAction === 'book_found_reco_bsh') {
                          SetInforToForm(dataResult, '#form_found_recom');
                          // var html = htmlShow(dataSearch, 'saveFavBook', 'addFavBook', 'Recommanded', 'sg');
                          // $('#book_found_recom').html(html);
                          $('#book_found_recom').hide();
                          $('#edit_book_found_fv').hide();
                          $('#edit_book_found_curr').hide();
                          $('#edit_book_found_recom').show();

                        }
                        if(altAction === 'book_found_curr_bsh') {
                          SetInforToForm(dataResult, '#form_found_curr');                          
                          // var html = htmlShow(dataSearch, 'saveFavBook', 'addFavBook', 'Current', 'sg');
                          // $('#book_found_curr').html(html);
                          $('#book_found_curr').hide();
                          $('#edit_book_found_fv').hide();
                          $('#edit_book_found_recom').hide();
                          $('#edit_book_found_curr').show();
                        }
                    }
                });
            } else {  
                $('#myModalSearchErrData').modal('show');
                $('#data_found').show();
                $('body').animate({scrollTop:0}, 'slow');
            }
            
        },
        error:function(err){
        }
    });
}

function showModalDataSystem(data, altAction)
{
  $('#data_found').hide();
  $('.text-danger').hide();
  $("#myModalSearch").on("show.bs.modal", function(e) {
      var html = ``;
      $.each(data, function (key,val) {
        html +=  bookSearchData(val['featured_image'], val['title'], val['authors'], val['ISBN'], val['year'], key);
      });

      if( html.length == 0) {
        html += `<p style="text-align: center;">The book is found not enough data to display!</p>`
      }
      
      $("#myModalSearch .modal-body").html(html);
  });
  $('#myModalSearch').modal('show');
  $('#myModalSearch').undelegate('#choose_book', 'click');
  $('#myModalSearch').on('click', '#choose_book', function(event) {
    var itemBook = $(this).attr('alt');
    localStorage.setItem('dataSearch', JSON.stringify(data[itemBook]));
    if( ctl_page === "bookshelf_book") {
      if(altAction === 'book_found_fav_bsh') {
          let html1 = htmlShow(data[itemBook],'saveFavBook', 'addFavBook', 'Favorite');
          $('#book_found_fv').html(html1);
          $('#edit_book_found_fv').hide();
          $('#book_found_fv').show();
          $('#search_google_fav_bsh').hide();
          $('#search_google_fav_bsh input').val(' ');
      }
      if(altAction === 'book_found_reco_bsh') {
          let html2 = htmlShow(data[itemBook], 'saveFavBook', 'addFavBook', 'Recommanded');
          $('#book_found_recom').html(html2);
          $('#book_found_recom').show();
          $('#search_google_reco_bsh').hide();
          $('#search_google_reco_bsh input').val(' ');
      }
      if(altAction === 'book_found_curr_bsh') {
          let html3 = htmlShow(data[itemBook], 'saveFavBook', 'addFavBook', 'Current');
          $('#book_found_curr').html(html3);
          $('#book_found_curr').show();
          $('#search_google_curr_bsh').hide();
          $('#search_google_curr_bsh input').val(' ');
      }
    }
  });

}

function bookSearchData(imgBook, titleBook, authorBook, isbnBook, yearBook, item)
{
  var srcImg = '';
  if(imgBook) {
    var str = imgBook;
    var n = str.indexOf("http://books.google.com/books/");
    if(n != -1) {
      srcImg = imgBook;
    } else {
      srcImg = `${RootREL}media/upload/books/`+ imgBook;
    }
  }else {
    srcImg = `${RootREL}media/upload/no_picture.png`;
  }

  var html  =    `<div class="form-group row">
                    <div class="col-sm-3">
                        <p>
                            <img src="${srcImg}" alt="" class="img-responsive">
                        </p>
                    </div>
                    <div class="col-sm-7">
                        <p> <strong>Title:</strong> ${titleBook}</p>
                        <p> <strong>Author:</strong> ${authorBook}</p>
                        <p> <strong>ISBN:</strong> ${isbnBook}</p>
                        <p> <strong>Year:</strong> ${yearBook}</p>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="choose_book" alt="${item}">Choose</button>
                    </div>
                </div>`;

  return html;
}

function SetInforToForm(dataResult, idFormParent)
{
    if(dataResult['title']) {
        $(idFormParent+' .books_form_title').val(dataResult['title']);
    }

    if(dataResult['categories']) {
        var checkCat = false;
        $(idFormParent+" .input-categories_id > option").each(function() {
            if(this.text === dataResult['categories'][0]) {
                checkCat = true;
                $(this).attr('selected','selected');
            }
        });
        if(checkCat == false) {
            $(idFormParent+" .input-categories_id").append('<option value="" selected >'+dataResult['categories']+'</option>');
            $(idFormParent+' .category_search_api').val(dataResult['categories']);
            $(idFormParent+' .book_categories_name').val(dataResult['categories']);

        }
    }
    

    if(dataResult['imageLinks']) {
        $(idFormParent+' .img_search').show();
        $(idFormParent+' .img_search > img').attr("src",dataResult['imageLinks']['thumbnail']);
        $(idFormParent+' .img_search_api').val(dataResult['imageLinks']['thumbnail']);
    }

    if(dataResult['industryIdentifiers']) {
        $(idFormParent+' .books_form_isbn').val(dataResult['industryIdentifiers'][0]['identifier']);
    }

    if(dataResult['authors']) {
        $(idFormParent+' .books_form_author').val(dataResult['authors'][0]);
    }

    if(dataResult['publishedDate']) {
        $(idFormParent+' .books_form_year').val(dataResult['publishedDate']);
    }

    if(dataResult['description']) {
      if(ctl_page === "bookshelf_book") {
        if(idFormParent === '#form_found_fv') {
          CKEDITOR.instances['description1'].setData(dataResult['description'])
        }
        if(idFormParent === '#form_found_recom') {
          CKEDITOR.instances['description2'].setData(dataResult['description'])
        }
        if(idFormParent === '#form_found_curr') {
          CKEDITOR.instances['description3'].setData(dataResult['description'])
        }  
      }

      if(ctl_page === "books") {    
        CKEDITOR.instances['description'].setData(dataResult['description'])
      }
    }
}

function convertDataDefault(dataResult)
{

    if(dataResult['title']) {
        var title = {
            'title': dataResult['title'] ? dataResult['title'] : 'null'
        }
    }

    if(dataResult['categories']) {
        var categories = {
            'book_categories_name': dataResult['categories'][0]
        }
    }
    

    if(dataResult['imageLinks']) {
        var featured_image = {
            'featured_image': dataResult['imageLinks']['thumbnail'] ? dataResult['imageLinks']['thumbnail'] : 'null'
        }
    }

    if(dataResult['industryIdentifiers']) {
        var isbn = {
            'isbn': dataResult['industryIdentifiers'][0]['identifier'] ? dataResult['industryIdentifiers'][0]['identifier'] : 'null'
        }
    }

    if(dataResult['authors']) {
        var author = {
            'author': dataResult['authors'][0] ? dataResult['authors'][0] : 'null'
        }
    }

    if(dataResult['publishedDate']) {
        var year = {
            'year': dataResult['publishedDate'] ? dataResult['publishedDate'] : 'null'
        };
    }

    if(dataResult['description']) {
        var description = {
            'description': dataResult['description'] ? dataResult['description'] : 'null'
        };
    }

    var previewLink = {
        'previewLink': dataResult['previewLink'] ? dataResult['previewLink'] : 'javascript:void(0)'
    };
    
    data = Object.assign({}, title, categories, featured_image, isbn, author, year, description, previewLink);

    return data;
}

function htmlShow(dataSearch, saveBook, addBook, NameAction, alt='')
{
  var srcImg = '';
  if(dataSearch['featured_image']) {
    var str = dataSearch['featured_image']
    var n = str.indexOf("http://books.google.com/books/");
    if(n != -1) {
      srcImg = dataSearch['featured_image'];
    } else if(str.split(':')[0] === 'http' || str.split(':')[0] === 'https'){
      srcImg = str;
    }else {
      srcImg = `${RootREL}media/upload/books/`+ dataSearch['featured_image'];
    }
  }else {
    srcImg = `${RootREL}media/upload/no_picture.png`;
  }

  var hrefUrl = dataSearch['id'] ? `${RootREL}books/book_review/`+ dataSearch['id'] : dataSearch['previewLink'];

  var html = `<h5 class="space30">Book Found :</h5>
                <div class="media heightclass">
                  <div class="media-left">
                    <img src="${srcImg}" width=150; height=200;>
                  </div>
                  <div class="media-right">
                    <h5 class="f700 m0 color555554">${dataSearch['title']}</h5>
                    <p class="f700 by-txt color555554">By: <a href="#" class="f400">${dataSearch['author']}</a> Category: <a href="#" class="f400">${dataSearch['book_categories_name']}</a> Year: <a href="#" class="f400">${dataSearch['year']}</a></p>
                    <div class="read_more">
                      ${dataSearch['description']}
                    </div>
                    <a href="${hrefUrl}" class="read-txt">Read More</a>
                  </div>
                </div>
                <div class="text-right space20">
                  <a class="btn btn_review btn-cancel-book ">Cancel</a>
                  <a class="btn btn_review btn-save1 ${saveBook}" alt="${alt}">Save ${NameAction} Book</a>
                </div>
                <div class="text-right space20"><a class="btn btn_review btn-add-book ${addBook}">Add The Book</a></div>`;
  return html;
}

function bookNotFound()
{
  var html = `<h5 class="space30">Book Found :</h5>
              <h5 class="notfound-txt">Book not found ...</h5>                              
              <div class="text-right space20"><a href="${RootREL}user/books/add" class="btn btn_review btn-save1">Add The Book</a></div>
              <div class="text-right space20"><a href="${RootREL}user/books/add" class="btn btn_review btn-add-book">Add The Book</a></div>`;

  return html;
}

function htmlForm()
{
  let html = `
    <form id="form-addbook"  class="form-horizontal">
      <h5 class="space30">Book Found :</h5>
      <div class="form-group row">
        <!-- Title -->
        <label class="control-label col-md-3" for="title">Title</label>
        <div class="controls col-md-6 search_book_title">
          <input type="text" id="books_form_title" name="book[title]" placeholder="" class="form-control" value="" required>
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
          <select name="book[categories_id]" id="input-categories_id" class="form-control">
            <option value="0">Unkown category</option>
            <?php foreach ($this->categories as $record) { ?>
            <option value="<?php echo $record['id']?>">
              <?php echo $record['name']?>
            </option>
            <?php } ?>
          </select>
          <input type="hidden" name="book[category_search_api]" id="category_search_api">
        </div>
      </div>

      <div class="form-group row">
        <!--  Featured Image -->
        <label class="control-label col-md-3" for="featured_image"> Featured Image</label>
        <div class="controls col-md-6">
          <input type="hidden" name="book[img_search_api]" id="img_search_api">
          <p class="img_search"><img src=""></p>
          <input type="file" id="featured_image" style="display: block; margin-bottom: 5px;" name="image" placeholder="" class="form-control">
        </div>
      </div>
      
      <div class="form-group row">
          <!-- Title -->
          <label class="control-label col-md-3" for="ISBN">ISBN</label>
          <div class="controls col-md-6 search_book_isbn">
            <input type="text" id="books_form_isbn" name="book[ISBN]" placeholder="" class="form-control" value="" required>
          </div>
      </div>

      <div class="form-group row">
          <!-- Title -->
          <label class="control-label col-md-3" for="author">Author</label>
          <div class="controls col-md-6 search_book_author">
            <input type="text" id="books_form_author" name="book[author]" placeholder="" class="form-control" value="" required>
          </div>
      </div>

      <div class="form-group row">
          <!-- Title -->
          <label class="control-label col-md-3" for="year">Year</label>
          <div class="controls col-md-6">
            <input type="text" id="books_form_year" name="book[year]" placeholder="" class="form-control" value="" required>
          </div>
      </div>

      <div class="form-group row">
          <label class="control-label col-md-3" for="description">Book Description</label>
          <div class="controls col-md-9">
            <textarea rows="30" cols="50" type="text" id="description" name="book[description]" placeholder="" class="form-control" value=""></textarea>
          </div>
      </div>
      
      <div class="form-group row">
          <div class="controls controls_btn col-md-12 text-right">
            <a class="btn btn_review btn-cancel-book ">Cancel</a>
            <a class="btn btn_review btn-save1 saveFavBook" alt="sg">Save Favorite Book</a>
          </div>
      </div>
      <hr>
    </form>
  `
  return html;
}
function checkRadio(idParent, inlineRadioYes, inlineRadioNo)
{
  if(inlineRadioNo !== 'null') {
    $('#'+idParent).on('click','#'+inlineRadioYes, function () {
      if ($('#'+inlineRadioYes).is(":checked")) {
          check = $('#'+inlineRadioYes).prop("checked");
          if (check) {
              $(this).parents('.recomend').addClass('btn-change');
          } else {
              $(this).parents('.recomend').removeClass('btn-change');
          }
      }
    });
  }
  if(inlineRadioYes !== 'null') {
    $('#'+idParent).on('click','#'+inlineRadioYes, function () {
      if ($('#'+inlineRadioYes).is(":checked")) {
          check = $('#'+inlineRadioYes).prop("checked");
          if (check) {
              $(this).parents('.recomend').removeClass('btn-change');
          } else {
              $(this).parents('.recomend').removeClass('btn-change');
          }
      }
    });
  }    
}

function trimString(s) {
  var l=0, r=s.length -1;
  while(l < s.length && s[l] == ' ') l++;
  while(r > l && s[r] == ' ') r-=1;
  return s.substring(l, r+1);
}

function compareObjects(o1, o2) {
  var k = '';
  for(k in o1) if(o1[k] != o2[k]) return false;
  for(k in o2) if(o1[k] != o2[k]) return false;
  return true;
}

function itemExists(haystack, needle) {
  for(var i=0; i<haystack.length; i++) if(compareObjects(haystack[i], needle)) return true;
  return false;
}

function searchFor(data, toSearch) {
  var results = [];
  toSearch = trimString(toSearch).toLowerCase(); // trim it
  for(var i=0; i<data.length; i++) {
      if(data[i]['title'].toLowerCase().indexOf(toSearch)!=-1) {
        if(!itemExists(results, data[i])) results.push(data[i]);
      }
  }
  return results;
}

String.prototype.allReplace = function() {
    var obj = {
      "'": "&#39;",
      "!": "&#33;",
      // "$": "&#36;",s
      "%": "&#37;",
    }
    var retStr = this;
    for (var x in obj) {
        retStr = retStr.replace(new RegExp(x, 'g'), obj[x]);
    }
    return retStr;
};