var are_page = document.getElementById("notify_scr").src.split("area=")[1];
$( document ).ready(function() {
    function load_unseen_notification(view = '')
    {
      var urlGetNotify = rootUrl+"notifications";
      $.ajax({
        url:urlGetNotify,
        method:"POST",
        data:{
            view:view,
            are_page
        },
        dataType:"json",
        success:function(data){
          if(data.status == 1) {
            var temp = ``;
            var url = '';
            jQuery.each( data.notification, function( i, val ) {
              if(val.link.length > 0) url = rootUrl+val.link;
              temp += `<li style="padding: 5px 5px;"><a style="padding: 5px 20px;" href="`+url+`">`+val.description+`</a></li>`
              if(i > 3) {
                $('.dropdown-notifi .dropdown-menu').css("height", "160px");
              }
            });
            $('.dropdown-notifi .dropdown-menu').html(temp);
            if(data.unseen_notification > 0)
            {
              $('.dropdown-notifi .dropdown .count').html(data.unseen_notification);
            }
          }

          if(data.dropdown == 1){
            allowAjaxNoti = true;
          }
        }
      });
    }
     
    load_unseen_notification();
     
    $(document).on('click', '.dropdown-toggle', function(){
      $('.dropdown .count').html('');
      allowAjaxNoti = false;
      load_unseen_notification('yes');
    });
     
    setInterval(function(){ 
      if(allowAjaxNoti) load_unseen_notification();
    }, 5000);

    jQuery(".dropdown-menu").hover(
      function() {
        jQuery(this).addClass("show_cont");
      },
      function() {
        jQuery(this).removeClass("show_cont");
      }
    );
});
