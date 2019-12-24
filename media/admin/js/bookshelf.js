var data = document.getElementById("records_tables").src.split("ctl=")[1];
console.log(data);
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();

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
            "<img src='img/left-arrow.png'>",
            "<img src='img/right-arrow.png'>"
        ],
        pagination:false,
    });

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
            "<img src='img/left-arrow.png'>",
            "<img src='img/right-arrow.png'>"
        ],
        pagination:false,
    });

    $('.recomand-txt').click(function(){
        $(this).parents('.recomend').find('.recomand-txt1').hide();
        $(this).parents('.recomend').find('.edit-book').show();
    });

    $('.recomand-txt1').click(function(){
        $(this).hide();
        $(this).parents('.recomend').find('.edit-book').show();
    });

    $('.search-btn').click(function(){
        $(this).parents('.recomend').find('.book-found').show();
    });

    $('.search1').click(function(){
        $(this).parents('.recomend').find('.book-found').hide();
        $(this).parents('.recomend').find('.book-notfound').show();
    });

    $(".inlineRadio").on("click", function () {
        if ($(".inlineRadio").is(":checked")) {
            $(this).parents('.recomend').addClass('btn-change');
        }
        else{
            $(this).parents('.recomend').removeClass('btn-change');
        }
    });

    $("#Radio18").on("click", function () {
        if ($("#Radio18").is(":checked")) {
            check = $("#Radio18").prop("checked");
            if (check) {
                $(this).parents('.recomend').addClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });


    $("#inlineRadio18").on("click", function () {
        if ($("#inlineRadio18").is(":checked")) {
            check = $("#inlineRadio18").prop("checked");
            if (check) {
                $(this).parents('.recomend').addClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });

    $("#Radio17").on("click", function () {
        if ($("#Radio17").is(":checked")) {
            check = $("#Radio17").prop("checked");
            if (check) {
                $(this).parents('.recomend').removeClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });

    $("#inlineRadio17").on("click", function () {
        if ($("#inlineRadio17").is(":checked")) {
            check = $("#inlineRadio17").prop("checked");
            if (check) {
                $(this).parents('.recomend').removeClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });

    $("#Radio3").on("click", function () {
        if ($("#Radio3").is(":checked")) {
            check = $("#Radio3").prop("checked");
            if (check) {
                $(this).parents('.recomend').addClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });

    $("#Radio2").on("click", function () {
        if ($("#Radio2").is(":checked")) {
            check = $("#Radio2").prop("checked");
            if (check) {
                $(this).parents('.recomend').removeClass('btn-change');
            } else {
                $(this).parents('.recomend').removeClass('btn-change');
            }
        }
    });

    $('.hide-text').click(function() {
        $(this).parents('li').find('span.title-part').toggleClass('opacity4');
        $(this).text(function(i, text){
            return text === "Hide" ? "Unhide" : "Hide";
        });
    });

    $('.dlt-text').click(function() {
        $(this).parents('li').toggleClass('remove-line');        
    });

    $('a.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
   }); 


    // var options = {
    //     data: [
    //         {
    //             "name": "Declan Haley",
    //             "email": "Cras.lorem.lorem@nonquam.ca"
    //         },
    //         {
    //             "name": "Francis Marsh",
    //             "email": "neque@arcu.edu"
    //         },
    //         {
    //             "name": "Gage Figueroa",
    //             "email": "Sed.auctor.odio@magnis.ca"
    //         },
    //         {
    //             "name": "Asher Gay",
    //             "email": "Phasellus@nonsapien.ca"
    //         }
    //     ],

    //     getValue: "name",

    //     template: {
    //         type: "description",
    //         fields: {
    //             description: "email"
    //         }
    //     },

    //     list: {
    //         match: {
    //             enabled: true
    //         },
    //         onSelectItemEvent: function() {
    //           var value = $("#example-mail").getSelectedItemData().email;
    //           $("#example-mail").attr('getItemID',value).trigger("change");
    //         }
    //     },

    //     theme: "plate-dark"
    // };
    
    $("#getValue").click(function(){
        var value = $("#example-mail").val();
        var attr = $("#example-mail").attr('getItemID');
        console.log(value,attr);
    })

});

searchAutomatic('favorite_title');
function searchAutomatic(IdInput, data = null, getValue = "name")
{
    var options = {
        data: [
            {
                "name": "Declan Haley",
                "email": "Cras.lorem.lorem@nonquam.ca"
            },
            {
                "name": "Francis Marsh",
                "email": "neque@arcu.edu"
            },
            {
                "name": "Gage Figueroa",
                "email": "Sed.auctor.odio@magnis.ca"
            },
            {
                "name": "Asher Gay",
                "email": "Phasellus@nonsapien.ca"
            }
        ],

        getValue: getValue,

        template: {
            type: "description",
            fields: {
                description: "email"
            }
        },

        list: {
            match: {
                enabled: true
            },
            onSelectItemEvent: function() {
              var value = $("#"+IdInput).getSelectedItemData().email;
              $("#"+IdInput).attr('getItemID',value).trigger("change");
            }
        },

        theme: "plate-dark"
    };

    $("#"+IdInput).easyAutocomplete(options);
}