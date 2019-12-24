$( document ).ready(function() {
    
    $('.white_box').on('click', '.FriendAction', function(){
        url = rootUrl+"user/friends/"+$(this).attr('act');
        let user_id_friend = $(this).attr('user');
        let that = this;
        switch($(this).attr('act')){
            case 'acceptRequest': 
            case 'sendRequest': {
                $.ajax({
                    url: url,
                    data: {
                        user_id_friend
                    },
                    type: "POST",
                    success: function (data) {
                        location.reload();
                    },
                    error: function (err) {
                       alert('Error');
                    }
                })
                break;
            }
            case 'Hide': {
                $.ajax({
                    url: rootUrl+"user/friends/changeStatus",
                    data: {
                        user_id_friend,
                        status: 0
                    },
                    type: "POST",
                    success: function (data) {
                        $(that).parents('li').toggleClass('opa6');
                        $(that).text(function(i, text){
                          return text === "Hide" ? "Unhide" : "Hide";
                        });
                    },
                    error: function (err) {
                       alert('Error');
                    }
                })
                break;
            }
            case 'Unhide': {
                $.ajax({
                    url: rootUrl+"user/friends/changeStatus",
                    data: {
                        user_id_friend,
                        status: 1
                    },
                    type: "POST",
                    success: function (data) {
                        $(that).parents('li').toggleClass('opa6');
                        $(that).text(function(i, text){
                          return text === "Hide" ? "Unhide" : "Hide";
                        });
                    },
                    error: function (err) {
                       alert('Error');
                    }
                })
                break;
            }
            case 'unFriend': {
                $.ajax({
                    url: url,
                    data: {
                        user_id_friend,
                        status: 1
                    },
                    type: "POST",
                    success: function (data) {
                        console.log('datatata');
                        $(that).parents('li').remove();
                        console.log('huhuhu', $(that).parents('li').parents('.ListFriend') );
                        let key = $(that).attr('key');
                        if(key == 'approve'){
                            let num = parseInt($('.NumApprove').html());
                            $('.NumApprove').html(num-1);
                        }else{
                            let num = parseInt($('.NumFriend').html());
                            $('.NumFriend').html(num-1);
                        }
                    },
                    error: function (err) {
                       alert('Error');
                    }
                })
                break;
            }
            case 'approve': {

                let img = $(that).parents('li').find('img').attr('src');
                let href = $(that).parents('li').find('a').attr('href');
                let name = $(that).parents('li').find('a').html();
                $.ajax({
                    url: url,
                    data: {
                        user_id_friend,
                        status: 1
                    },
                    type: "POST",
                    success: function (data) {
                        $(that).parents('li').remove();
                        let num = parseInt($('.NumFriend').html());
                        $('.NumFriend').html(num+1);
                        let num2 = parseInt($('.NumApprove').html());
                        $('.NumApprove').html(num2-1);
                        $('.ListFriend').append(`
                            <li  style="max-width:148px" class="text-center">
                                <img src="${img}"  style="max-width:140px">
                                <a href="${href}" class="text-center f700 space10 edit-btn">${name}</a><br/>
                                <span><a href="${href}">View</a> | <a class="hide-text FriendAction" act="Hide" user="${user_id_friend}">Hide</a> | <a class="dlt-text danger-txt FriendAction" act="unFriend" user="${user_id_friend}"> Delete</a></span>
                            </li>
                        `)
                    },
                    error: function (err) {
                       alert('Error');
                    }
                })
                break;
            }
        }
    })
});
