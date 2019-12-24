$( document ).ready(function() {
    $('.image-upload input[name="image"]').change( function() {
        readURL(this);
	});

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
	$('.register-form').submit(function(e){
		e.preventDefault();
		
		firstname       = $(this).find('input[name="user[firstname]"]').val();
        lastname        = $(this).find('input[name="user[lastname]"]').val();
        email           = $(this).find('input[name="user[email]"]').val();
        password        = $(this).find('input[name="user[password]"]').val();
        repassword      = $(this).find('input[name="user[repassword]"]').val();
        gender      	= $(this).find('select[name="user[gender]"]').val();

		formData = {
			user: {
				firstname,
				lastname,
				email,
				password,
				avata,
				repassword,
				gender
			},
			'g-recaptcha-response':grecaptcha.getResponse()
		}
		Object.keys(formData.user).map(item=>{
			$('.error-'+item).html("");
		})

		if(repassword != password){
			$('.error-repassword').html('Password confirm does not match !!!');
		}else{
			url = rootUrl+"register/createAccount";
			$.ajax({
			    url: url,
			    data: formData,
			    type: "POST",
			    success: function (resp) {
					data = JSON.parse(resp);
					console.log(data);
					if (data.status) {
						location.replace(rootUrl+'register/success_rg');
					}
			        // $('.register_active').html(data.message);
			        // $('html, body').animate({scrollTop:0}, 'slow');
			        // setInterval(function() {
					    
					// }, 1000);
			    },
			    error: function (err) {
			        data = JSON.parse(err.responseText);
			        Object.keys(data.errors).map(item=>{
			            $('.error-'+item).html(data.errors[item]);
			        })
					
			    }
			})
		}
	});
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$('.image-upload img')
				.attr('src', e.target.result)
				.width(300)
				.height(200);
		};
		reader.readAsDataURL(input.files[0]);
	}
}