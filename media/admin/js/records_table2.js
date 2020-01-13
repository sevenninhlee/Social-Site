var ctl_page = document.getElementById("records_table").src.split("ctl=")[1];
$(document).ready(function () {
	(function($) {
		var numAllBtn = 0;
		var numBtnActive;
		var listChecked = [];
		var strFil = "";
		var ctl = $("table.dataTable").attr("controller");

		//--------------Change status (user,....) -----------------------------------------------------------------
		$(' input.change-status-'+ctl_page).change(function() {
			var isConfirm = confirm("Are you sure to change status this record?");
			if(isConfirm){
				idAct = $(this).attr('alt');
				idAct = idAct.split('&');
				changeStatus(idAct[0], "trash",idAct[1]);
			}
		});

		//------------------Delete a user--------------------------------------------------------------------
		$('tbody.records').on('click','td.btn-act button.del-record', function () {
			var isDel = confirm("Are you sure to delete this record?");
			if(isDel){
				idAct = $(this).attr('alt');
				delRecord(idAct, 'del');
			}
		});

		//------------------Check all ----------------------------------------------------------------
		$('table.dataTable').on('click', '.checkAll input', function () {
			if($(this).prop('checked')) {
				listChecked = [];
				$('.checkboxRecord input').each(function() {
					listChecked.push($(this).attr('alt'));
					$(this).prop('checked', true);
				});
				$('.checkAll input').prop('checked', true);
			} else {
				$('.checkboxRecord input').each(function() {
					listChecked = [];
					$(this).prop('checked', false);
				});
				$('.checkAll input').prop('checked', false);
			}
		});

		//------------------Check to delete ----------------------------------------------------------------
		$('table.dataTable').on('click', '.checkboxRecord input', function () {
			var idCheckBox = $(this).attr('alt');
			if($(this).prop('checked')) {
				listChecked.push(idCheckBox);
			} else {
				listChecked.splice($.inArray(idCheckBox, listChecked), 1);
				$('.checkAll input').prop('checked', false);
			}
		});


		$('#btn_filter_user_table').on('click', function(){
			filter = {
				status: $('#select_list_user_status').val(),
				type: $('#select_list_user_type').val(),
				gender: $('#select_list_user_gender').val()
			}

			content = 	'status='+$('#select_list_user_status').val()+
						'/type='+$('#select_list_user_type').val()+
						'/gender='+$('#select_list_user_gender').val()
			var url = rootUrl+ 'admin/users/index/'+content;
		    window.location.replace(url);
		});

		// //--------------------------User-search----------------------------------------------------------------
		// $("#form-users-search").submit(function(e) {
		// 	e.preventDefault(); 
		// 	var content = $('#form-users-search').find('input[name="search"]').val();
		// 	console.log('logggg', window);

		// 	if(content === ''){
		// 		window.location.replace(rootUrl+'admin/users');
		// 	}else{
		// 		// if(window.location.search === '')
		// 		var url = rootUrl+ 'admin/users/index/search='+content;
		// 		// else var url = rootUrl+ 'admin/users/index'+window.location.search+'/search='+content;
		// 		window.location.replace(url);
		// 	}
		// });

		//-----------------------------------BLOG-----------------------------------------------------------------------------------
		//------------------Delete a category--------------------------------------------------------------------
		$('tbody.records').on('click','td.btn-act button.del-record-'+ctl_page+'-category', function () {
			var isDel = confirm("Are you sure to delete this record?");
			if(isDel){
				idAct = $(this).attr('alt');
				urlDele = rootUrl+"admin/"+ctl_page+"/category_del/"+ idAct;
				$.ajax({
					url: urlDele,
					success: function (data) {
						if(data != 'error'){
							$('#row'+idAct).remove();
						}
					}
				})
			}
		});

		//------------------Delete a comment--------------------------------------------------------------------
		$('tbody.records').on('click','td.btn-act button.del-record-'+ctl_page+'-comment', function () {
			var isDel = confirm("Are you sure to delete this record?");
			if(isDel){
				idAct = $(this).attr('alt');
				urlDele = rootUrl+"admin/"+ctl_page+"/comment_del/"+ idAct;
				$.ajax({
					url: urlDele,
					success: function (data) {
						if(data != 'error'){
							$('#row'+idAct).remove();
						}
					}
				})
			}
		});

		//------------------Delete a comment reply--------------------------------------------------------------------
		$('tbody.records').on('click','td.btn-act button.del-record-'+ctl_page+'-comment-reply', function () {
			var isDel = confirm("Are you sure to delete this record?");
			if(isDel){
				idAct = $(this).attr('alt');
				urlDele = rootUrl+"admin/"+ctl_page+"/comment_replies_del/"+ idAct;
				$.ajax({
					url: urlDele,
					success: function (data) {
						if(data != 'error'){
							$('#row'+idAct).remove();
						}
					}
				})
			}
		});
		//---------------Filter-------------------------------------------------------------
		$("#btn_filter_"+ctl_page+"_categories_table").on('click', function(){
			filter = {
				status: $("#select_list_"+ctl_page+"_categories_status").val(),
			}
			content = 	'status='+$("#select_list_"+ctl_page+"_categories_status").val();
			var url = rootUrl+ "admin/"+ctl_page+"/categories/"+content;
		    window.location.replace(url);
		});

		//-------------------------Apply in category table------------------------------------------------------
		$("#btn_apply_"+ctl_page+"_categories_table").on('click', function(){
			switch($("#select_list_"+ctl_page+"_categories").val()){
				case "delete_"+ctl_page+"_categories": {
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure delete those records!");
						if(isDel){
							var ids = listChecked.toString(); 
							urlDel = rootUrl+"admin/"+ctl_page+"/category_delmany/ids="+ ids;
							$.ajax({
								url: urlDel,
								success: function (data) {
									if(data != 'error') {
										$.each(listChecked, function (k, v) {
											$('#row'+v).remove();
										});
										listChecked = [];
									}
								}
							})
						}
					} else {
						alert("Nobody to delete!");
					}
					break;
				}
				case "activate_"+ctl_page+"_categories":
		       		if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/category_changeStatusMany/ids="+ ids +"/status=1";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
		           	break; 
		       	case "deactivate_"+ctl_page+"_categories":
		       		if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/category_changeStatusMany/ids="+ ids +"/status=0";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
		       		break;
		       	default:
		       		console.log('default')
			}
		})

		//-------------------------Apply in comment table------------------------------------------------------
		$("#btn_apply_"+ctl_page+"_comments_table").on('click', function(){
			switch($("#select_list_"+ctl_page+"_comments").val()){
				case "delete_"+ctl_page+"_comments": {
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure delete those records!");
						if(isDel){
							var ids = listChecked.toString(); 
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_delmany/ids="+ ids;
							$.ajax({
								url: urlDel,
								success: function (data) {
									if(data != 'error') {
										$.each(listChecked, function (k, v) {
											$('#row'+v).remove();
										});
										listChecked = [];
									}
								}
							})
						}
					} else {
						alert("Nobody to delete!");
					}
					break;
				}
				case "activate_"+ctl_page+"_comments":
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_changeStatusMany/ids="+ ids +"/status=1";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
					break; 
				case "deactivate_"+ctl_page+"_comments":
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_changeStatusMany/ids="+ ids +"/status=0";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
					break;
				default:
					console.log('default')
			}
		})

		//-------------------------Apply in comment reply table------------------------------------------------------
		$("#btn_apply_"+ctl_page+"_comments_replies_table").on('click', function(){
			switch($("#select_list_"+ctl_page+"_comments_replies").val()){
				case "delete_"+ctl_page+"_comments_replies": {
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure delete those records!");
						if(isDel){
							var ids = listChecked.toString(); 
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_replies_delmany/ids="+ ids;
							$.ajax({
								url: urlDel,
								success: function (data) {
									if(data != 'error') {
										$.each(listChecked, function (k, v) {
											$('#row'+v).remove();
										});
										listChecked = [];
									}
								}
							})
						}
					} else {
						alert("Nobody to delete!");
					}
					break;
				}
				case "activate_"+ctl_page+"_comments_replies":
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_replies_changeStatusMany/ids="+ ids +"/status=1";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
					break; 
				case "deactivate_"+ctl_page+"_comments_replies":
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							var ids = listChecked.toString();
							urlDel = rootUrl+"admin/"+ctl_page+"/comment_replies_changeStatusMany/ids="+ ids +"/status=0";
							$.ajax({
								url: urlDel,
								success: function (data) {
									var resObject = JSON.parse(data);
									if( resObject.status == true ) {
										location.reload();
									} else {
										alert(res.error);
									}
								}
							})
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
					break;
				default:
					console.log('default')
			}
		})

		$("#form-"+ctl_page+"-categories-add").submit(function(e) {
			e.preventDefault(); 

			var content = $("#form-"+ctl_page+"-categories-add").find('input[name="add"]').val();
			var slug = string_to_slug(content);
			if(content === ''){
				window.location.replace(rootUrl+"admin/"+ctl_page+"/categories");
			}else{
				var isConfirm = confirm("Are you sure to add this category?");
				if(isConfirm){
					urlDele = rootUrl+"admin/"+ctl_page+"/category_add/name="+ content+'/slug='+slug;
					$.ajax({
						url: urlDele,
						success: function (data) {
							window.location.reload();
						},
						error:function(err){
							$('#form-blog-categories-err-name').html(JSON.parse(err.responseText).name);
						}
					})
				}
			}
		});

		//--------------Change status category-----------------------------------------------------------------
		$(' input.change-status-category').change(function() {
			var isConfirm = confirm("Are you sure to change status this category?");
			if(isConfirm){
				idAct = $(this).attr('alt');
				idAct = idAct.split('&');
				urlTrash = rootUrl+"admin/"+ctl_page+"/category_changestatus/"+ idAct[0];
				$.ajax({
					url: urlTrash,
					type: 'POST',
					data: {status: idAct[1]},
					success: function (data) {
						if(data != 'error') {
						}
					}
				});
			}
		});

		//--------------Change status comment-----------------------------------------------------------------
		$(' input.change-status-'+ctl+'-comment').change(function() {
			var isConfirm = confirm("Are you sure to change status this comment?");
			if(isConfirm){
				idAct = $(this).attr('alt');
				idAct = idAct.split('&');
				urlTrash = rootUrl+"admin/"+ctl_page+"/comment_changestatus/"+ idAct[0];
				$.ajax({
					url: urlTrash,
					type: 'POST',
					data: {status: idAct[1]},
					success: function (data) {
						if(data != 'error') {
						}
					}
				});
			}
		});

		//--------------Change status comment reply-----------------------------------------------------------------
		$(' input.change-status-'+ctl+'-comment-reply').change(function() {
			var isConfirm = confirm("Are you sure to change status this comment?");
			if(isConfirm){
				idAct = $(this).attr('alt');
				idAct = idAct.split('&');
				urlTrash = rootUrl+"admin/"+ctl_page+"/comment_reply_changestatus/"+ idAct[0];
				$.ajax({
					url: urlTrash,
					type: 'POST',
					data: {status: idAct[1]},
					success: function (data) {
						if(data != 'error') {
						}
					}
				});
			}
		});

		//-------------------------Apply in blog table------------------------------------------------------
		$('#btn_apply_blog_table').on('click', function(){
			switch($('#select_list_blog').val()){
				case 'delete_blog': {
					if(listChecked.length > 0) {
						var isDel = confirm("Are you sure delete those posts!");
						if(isDel){
							var ids = listChecked.toString(); 
							urlDel = rootUrl+"admin/"+ctl_page+"/delmany/ids="+ ids;
							$.ajax({
								url: urlDel,
								success: function (data) {
									if(data != 'error') {
										$.each(listChecked, function (k, v) {
											$('#row'+v).remove();
										});
										listChecked = [];
									}
								}
							})
						}
					} else {
						alert("Nobody to delete!");
					}
					break;
				}
			}
		});

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//-------------------------Apply in table------------------------------------------------------
		$("#btn_apply_"+ctl_page+"_table").on('click', function(){
			var sel = document.getElementById('select_list_'+ctl_page)
			var opt = sel.options[sel.selectedIndex];
			var act = opt.getAttribute('act');
			var ids = listChecked.toString();

			switch (sel.value) 
		    { 
				case 'add_'+ctl_page: {
					var url = rootUrl+ 'admin/'+ctl_page+'/add';
					window.location.replace(url);
					break;
				}
				   case "delete_"+ctl_page:
		       		if(listChecked.length > 0) {
						var isDel = confirm("Are you sure delete those posts!");
						if(isDel){
							changeStatus(ids, null, act);
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
		           	break; 
		       	case "activate_"+ctl_page:
		       		if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							changeStatus(ids, 1, act);
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
		           	break; 
		       	case "deactivate_"+ctl_page:
		       		if(listChecked.length > 0) {
						var isDel = confirm("Are you sure change item!");
						if(isDel){
							changeStatus(ids, 0, act);
						}
					} else {
						alert("Please, checkbox item to continue!");
					}
		       		break;
		       	default:
		       		console.log('default')
		    } 
		});

		//-------------------------ChangeStatus in table-----------------------------------------------
		$('.change_status_'+ctl_page).on('click', function() {
			var isConfirm = confirm("Are you sure to change status this record?");
			var data = $(this).attr('alt');
			var data = data.split(',');
			var ItemID = parseInt(data[0]);
			var ItemStatus = parseInt(data[1]);
			var act = data[2].trim();
			if(isConfirm){
				changeStatus(ItemID, ItemStatus, act);
			}
		});
		//-------------------------Delete a item------------------------------------------------------
		$('tbody.records').on('click','td.btn-act button.delItem-record', function () {
			var isDel = confirm("Are you sure to delete this record?");
			var data = $(this).attr('alt');
			var data = data.split(',');
			var ItemID = parseInt(data[0]);
			var act = data[1].trim();
			if(isDel){
				changeStatus(ItemID, null, act);
			}
		});

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//---------------Table Filter-----------------------------------------------------------------

		$("#btn_filter_"+ctl_page+"_table").on('click', function(){
			let author = $("#select_list_"+ctl_page+"_author").val();
			let category = $("#select_list_"+ctl_page+"_category").val()
			let featured_blog = $("#select_list_"+ctl_page+"_featured_blog").val()
			let status = $("#select_list_"+ctl_page+"_status").val()

			content = '';
			if(author && author !='all') content+='/author='+author;
			if(category && category !='all') content+='/category='+category;
			if(featured_blog && featured_blog !='all') content+='/featured_blog='+featured_blog;
			if(status && status !='all') content+='/status='+status;
			var url = rootUrl+ "admin/"+ctl_page+"/index"+content;
		    window.location.replace(url);
		});

		//--------------------------Blog, User -search----------------------------------------------------------------
		$("#form-"+ctl_page+"-search").submit(function(e) {
			e.preventDefault(); 
			var content = $("#form-"+ctl_page+"-search").find('input[name="search"]').val();
			if(content === ''){
				window.location.replace(rootUrl+"admin/"+ctl_page);
			}else{
				var url = rootUrl+ "admin/"+ctl_page+"/index/search="+content;
				window.location.replace(url);
			}
		});

		$("#form-"+ctl_page+"-categories-search").submit(function(e) {
			e.preventDefault(); 
			var content = $("#form-"+ctl_page+"-categories-search").find('input[name="search"]').val();
			if(content === ''){
				window.location.replace(rootUrl+"admin/"+ctl_page+'/categories');
			}else{
				var url = rootUrl+ "admin/"+ctl_page+"/categories/search="+content;
				window.location.replace(url);
			}
		});

		//-------------------------BLOG- slug--------------------------------------------------------------------------------------------
		$("#blog-form-name").keyup(function(){
            $("#blog-form-slug").val(string_to_slug($(this).val()));
		});

		//-------------------------BLOG- slug--------------------------------------------------------------------------------------------
		$("#"+ctl_page+"_form_name").keyup(function(){
            $("#"+ctl_page+"_form_slug").val(string_to_slug($(this).val()));
		});

		//-----------Edit ---- record ---- directly--------------

		$('.edit-record-'+ctl_page+'-category').on('click', function(){
			var tag = $('p#name'+$(this).attr('id').split('-')[1]);
			var id = $(this).attr('id').split('-')[1];
			var text = tag.html().trim();
			$(this).css('display', 'none');
			tag.html('<input class="search txt_box" autofocus id="new-name" value="'+text+'" /><button class="btn-custom-apply" onclick="submit('+id+',\''+ctl_page+'\''+')">Ok</button> <button class="cancel-edit btn-custom-apply" onclick="cancel('+id+",\'"+text+'\')">Cancel</button>');
		});
		
	})(jQuery);
});
// string_to_slug
function string_to_slug (str) {
	str = str.replace(/^\s+|\s+$/g, ''); // trim
	str = str.toLowerCase();
  
	// remove accents, swap ñ for n, etc
	var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
	var to   = "aaaaeeeeiiiioooouuuunc------";
	for (var i=0, l=from.length ; i<l ; i++) {
		str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	}

	str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
		.replace(/\s+/g, '-') // collapse whitespace and replace by -
		.replace(/-+/g, '-'); // collapse dashes

	return str;
}

function cancel(id, text){
	var tag = $('p#name'+id);
	tag.html(text+'');
	$('#edit-'+id).css('display','inline');
}

function submit(id, ctl_page){
	var name = $('#new-name').val();
	var slug = string_to_slug(name);
	// urlEdit = rootUrl+'admin/'+ctl_page+'/category_edit/id='+id+'?name='+name+'&slug='+slug;
	urlEdit = rootUrl+'admin/'+ctl_page+'/category_edit/id='+id;
	$.ajax({
		method: "POST",
		url: urlEdit,
		data: { name: name, slug: slug }
	})
	.done(function( res ) {
		var resObject = JSON.parse(res);
		if( resObject.status == true ) {
			location.reload();
		} else {
			alert(resObject.error.name || resObject.error.slug);
		}
	});
}

//------------------Delete function--------------------------------------------------------------------
function delRecord(id, act) {
	urlDele = rootUrl+"admin/"+ctl_page+"/"+act+"/"+ id;
	$.ajax({
		url: urlDele,
		success: function (data) {
			if(data != 'error'){
				$('#row'+id).remove();
			}
		}
	})
}

//------------------Function changeStatus ----------------------------------------------------------------
function changeStatus(ItemID, ItemStatus, act) {
	console.log(ItemID, ItemStatus, act);
	urlEdit = rootUrl+'admin/'+ctl_page+'/'+act+'/id='+ItemID;
	$.ajax({
		method: "POST",
		url: urlEdit,
		data: { status: ItemStatus }
	})
	.done(function( res ) {
		var resObject = JSON.parse(res);
		if( resObject.status == true ) {
			location.reload();
		} else {
			alert(resObject.error);
		}
	});
}
