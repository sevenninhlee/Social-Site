var ctl_page = document.getElementById("records_table").src.split("ctl=")[1];
$(document).ready(function () {
	(function($) {
		var numAllBtn = 0;
		var numBtnActive;
		var listChecked = [];
		var strFil = "";
		var ctl = $("table.dataTable").attr("controller");

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


// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//-------------------------Apply in table------------------------------------------------------
		$("#btn_apply_"+ctl_page+"_table").on('click', function(){
			var sel = document.getElementById('select_list_'+ctl_page)
			var opt = sel.options[sel.selectedIndex];
			var act = opt.getAttribute('act');
			var ids = listChecked.toString();
			console.log('msg',sel.value)

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
		$('tbody.records').on('click', '.change_status_'+ctl_page, function() {
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


		$('.user-profile').on('click','button.delItem-record', function () {
			var isDel = confirm("Are you sure to delete this record?");
			var data = $(this).attr('alt');
			var data = data.split(',');
			var ItemID = parseInt(data[0]);
			var act = data[1].trim();
			if(isDel){
				changeStatusUser(ItemID, null, act);
			}
		});

		$('.bookshelf').on('click','button.delItem-record', function () {
			var isDel = confirm("Are you sure to delete this record?");
			var data = $(this).attr('alt');
			var data = data.split(',');
			var ItemID = parseInt(data[0]);
			var act = data[1].trim();
			if(isDel){
				changeStatusUser(ItemID, null, act);
			}
		});

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//---------------Add Category-------------------------------------------------------------
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
		//---------------Filter-------------------------------------------------------------
		$("#btn_filter_"+ctl_page+"_categories_table").on('click', function(){
			filter = {
				status: $("#select_list_"+ctl_page+"_categories_status").val(),
			}
			content = 	'status='+$("#select_list_"+ctl_page+"_categories_status").val();
			var url = rootUrl+ "admin/"+ctl_page+"/categories/"+content;
		    window.location.replace(url);
		});
		
		//---------------Table Filter-----------------------------------------------------------------

		$("#btn_filter_"+ctl_page+"_table").on('click', function(){
			let author = $("#select_list_"+ctl_page+"_author").val();
			let category = $("#select_list_"+ctl_page+"_category").val()
			let featured_blog = $("#select_list_"+ctl_page+"_featured_blog").val()
			let status = $("#select_list_"+ctl_page+"_status").val()
			let type = $("#select_list_"+ctl_page+"_type").val()
			let gender = $("#select_list_"+ctl_page+"_gender").val()

			content = '';
			if(author && author !='all') content+='/author='+author;
			if(category && category !='all') content+='/category='+category;
			if(featured_blog && featured_blog !='all') content+='/featured_blog='+featured_blog;
			if(status && status !='all') content+='/status='+status;
			if(type && type !='all') content+='/type='+type;
			if(gender && gender !='all') content+='/gender='+gender;
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

		$('.show_replies').on('click', function(){
			var nameUpper = $(this).attr('upper');
			if($(this).attr('alt')=='on'){
				id = $(this).attr('id').split('-')[2];
				$(this).attr('alt','off');
				$('.row-reply-'+id).remove();
				$(this).html('Show replies');
			} else {
				$(this).attr('alt','on');
				$(this).html(`<i class="fa fa-spinner" aria-hidden="true"></i>`);
				let that = $(this);
				id = $(this).attr('id').split('-')[2];
				var url = rootUrl+ "admin/"+ctl_page+"/comment_replies/"+id;
				$.ajax({
					url: url,
					success: function (data) {
						that.html(`Hide`);
						var data = JSON.parse(data);
						data.map(item=>{
							console.log('item', item);
							$('#row'+id).after(
								`<tr role="row" id="row${item.id}" class="row-reply-${id}">
								<td id="checkbox${item.id}" class="checkboxRecord btn-act">
									<div class="checkbox">
										<input type="checkbox" name="" alt="${item.id}" id="checkbox-${item.id}">
										<label for="checkbox-${item.id}">
											<a href="#" id="viewUser${item.id}">
												<i class="fa fa-reply" aria-hidden="true" style='transform:rotate(180deg)'></i>
											</a>	
										</label>
									</div>
								</td>
								<td class="tabletShow">
									<a href="${rootUrl}admin/users/view/${item.users_id}" id="viewUser${item.users_id}"><p class="andrew text-center" id="name${item.id}">
										${item.users_firstname+' '+item.users_lastname}</p></a>
								</td>
								<td class="tabletShow">
									<p class="andrew text-left">
										${(item.content.length>40)?(`<span id="comment-show-${item.id}" class="text-hidden">${item.content}</span><span class="show-more" alt="${item.id}">...More</span>`):(`${item.content}`)}</p>
								</td>
								<td class="tabletShow">
									<p class="andrew">
										${item.created}</p>
								</td>
								<td class="tabletShow" id="status${item.id}">
									<button type="button" class="btn btn-${item.admin_status==1?`primary`:`warning`} change_status_${ctl}" alt="${item.id},${item.admin_status==1?0:1},changeStatus${nameUpper}Comment">${item.admin_status==1?'Active':'Inactive'}</button>
								</td>
		
								<td class="tabletShow btn-act">
									<button id="delItem${item.id}" type="button" class="btn btn-danger delItem-record" alt="${item.id},delete${nameUpper}Comment"  data-toggle="tooltip" data-placement="bottom" title="Delete!"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</td>
							</tr>`


								// $('#row'+id).after(
								// 	'<tr role="row" id="row'+item.id+'" class="row-reply-'+id+'">'+
								// 	'<td id="checkbox'+item.id+'" class="checkboxRecord btn-act">'+
								// 		'<div class="checkbox">'+
								// 			'<input type="checkbox" name="" alt="'+item.id+'" id="checkbox-'+item.id+'">'+
								// 			'<label for="checkbox-'+item.id+'">'+
								// 				'<a href="#" id="viewUser'+item.id+'">'+
								// 					'---->'+
								// 				'</a>	'+
								// 			'</label>'+
								// 		'</div>'+
								// 	'</td>'+
								// 	'<td class="tabletShow">'+
								// 		'<a href="'+rootUrl+'admin/users/view/'+item.users_id+'" id="viewUser'+item.users_id+'"><p class="andrew'+ 'text-center" id="name'+item.id+'">'+
								// 			''+item.users_firstname+' '+item.users_lastname+'</p></a>'+
								// 	'</td>'+
								// 	'<td class="tabletShow">'+
								// 		'<p class="andrew text-left">'+
								// 			''+(item.content.length>40?'<span id="comment-show-'+item.id+'" class="text-hidden">'+item.content+'</span><span class="show-more" alt="'+item.id+'">...More</span>':item.content)+'</p>'+
								// 	'</td>'+
								// 	'<td class="tabletShow">'+
								// 		'<p class="andrew">'+
								// 			''+item.created+'</p>'+
								// 	'</td>'+
								// 	'<td class="tabletShow" id="status'+item.id+'">'+
								// 		'<button type="button" class="btn btn-'+(item.status==1?'primary':'warning')+' change_status_blogs" alt="'+item.id+','+(item.status==1?0:1)+','+'changeStatusBlogComment">'+(item.status==1?'Active':'Inactive')+'</button>'+
								// 	'</td>'+
			
								// 	'<td class="tabletShow">'+
								// 	'</td>'+
								// 	'</tr>'
						)
						})
					},
					error:function(err){
						that.html(`Show replies`);
						$('#form-blog-categories-err-name').html(JSON.parse(err.responseText).name);
					}
				})
			}
		})

		$('.table').on('click','.show-more', function(){
			var id = $(this).attr('alt');
			console.log('iddd', id);
			$('#comment-show-'+id).removeClass('text-hidden');
			$(this).remove();
		})
	
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
	console.log(ItemID, ItemStatus, act, ctl_page);
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

function changeStatusUser(ItemID, ItemStatus, act) {
	urlEdit = rootUrl+'user/'+ctl_page+'/'+act+'/id='+ItemID;
	$.ajax({
		method: "POST",
		url: urlEdit,
		data: { status: ItemStatus }
	})
	.done(function( res ) {
		var resObject = JSON.parse(res);
		if( resObject.status == true ) {
			window.location.reload();
		} else {
			alert(resObject.error);
		}
	});
}

