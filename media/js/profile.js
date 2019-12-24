$( document ).ready(function() {
    $('.Edit').on('click', function(){
        $(this).html('Save');
        let act = $(this).attr('act');
        let value = $(this).attr('value');
        let action = $(this).attr('action');
        if (action == 'Edit'){
            url = rootUrl+"user/profile/edit";
            let formData = {
                id: $('#profile').attr('value'),
                [act]: $('input[name="'+act+'"]').val() || $('textarea[name="'+act+'"]').val() || $('select[name="'+act+'"]').val()
            }
			$.ajax({
			    url: url,
			    data: formData,
			    type: "POST",
			    success: function (data) {
					location.reload();
			    },
			    error: function (err) {
                    alert('Error');
			    }
			})
        }else{
            let html='';
            switch(act){
                case 'datebirth': {
                    html = `<input type='date' name="${act}" value='${value}' />`;
                    break;
                }
                case 'gender': {
                    html = `<select name='${act}'>
                                <option value='1' ${value==0?'':'selected'}>Male</option>
                                <option value='0' ${value==1?'':'selected'}>Female</option>
                            </select>`
                    break;
                }
                case 'datebirth': {
                    html = `<input type='date' name="${act}" value='${value}' />`;
                    break;
                }
                case 'bulletin': {
                    html = `<textarea name="${act}" style='width:100%' rows='5'>${$('.edit-bulletin').html()}</textarea>`;
                    break;
                }
                default: {
                    html = `<input name="${act}" type='text' value='${value}' />`;
                }
            }
            $('.edit-'+act).html(html);
            $(this).after(`
                <a href="javascript:void(0)" class='Cancel' act='${act}' value="${value}">Cancel</a>
            `);
            $(this).attr('action','Edit');
        }
    })
    $('li').on('click','.Cancel', function(){
        $('.Edit').html('Edit');
        $('.Edit').attr('action','');
        let act = $(this).attr('act');
        let value = $(this).attr('value');
        let html='';
        switch(act){
            case 'gender': {
                html = `${value==0?'Female':'Male'}`
                break;
            }
            default: {
                html = `${value}`;
            }
        }
        $('.edit-'+act).html(html)
        $(this).remove();
    })

    $('.Save-notifies').on('click', function(){
        let arr = [
            $('input[name="Notify-1"]:checked').val(),
            $('input[name="Notify-2"]:checked').val(),
            $('input[name="Notify-3"]:checked').val(),
            $('input[name="Notify-4"]:checked').val(),
            $('input[name="Notify-5"]:checked').val(),
        ]
        url = rootUrl+"user/profile/edit";
        let formData = {
            notifies: arr.join('|')
        }
        $.ajax({
            url: url,
            data: formData,
            type: "POST",
            success: function (data) {
                location.reload();
            },
            error: function (err) {
                alert('Error');
            }
        })
        
        
    })
    var avata;
	$('input[name="user[avata]"]').change(function(){
		name = $(this).val().split('\\');
		nameTmp = name.split(',');
		$('.user-avata-name').attr('value',nameTmp[nameTmp.length-1]);
		var file = this.files[0];
		var reader = new FileReader();
		reader.onloadend = function() {
            avata=reader.result;
		}
		reader.readAsDataURL(file);
    });
    $('.Edit-avata').on('click', function(){
        url = rootUrl+"user/profile/editAvatar";
        $.ajax({
            url: url,
            data: {avata: avata},
            type: "POST",
            success: function (data) {
                location.reload();
            },
            error: function (err) {
               alert('Error');
            }
        })
    })

    $('#myModal').on('hidden.bs.modal', function () {
        $('#InputEmail1').val('');
        $('#emailHelp').html('');
        $('#errorInvite').html('');
    })

    $('#sb_invite').on('click', function () {
        url = rootUrl+"user/profile/invite";
        var val =  $('#InputEmail1').val();
        $.ajax({
            url: url,
            data: {email: val},
            type: "POST",
            success: function (data) {
                var resObject = JSON.parse(data);
                if( resObject.status == 1) {
                    // $('#errorInvite').html('');
                    // $('#InputEmail1').val('');
                    // $('#emailHelp').html('Invited successfully!');
                    $('#myModal').modal('hide');
                    $('#myModalSearchErrData').modal('show');
                } else {
                    $('#emailHelp').html('');
                    $('#errorInvite').html(resObject.message);
                }
            },
            
        })
        
    });
});
