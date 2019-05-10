
$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	// Enable/Disable User Details (Dating Profile)
	$(".userStatus").change(function(){
		var user_id = $(this).attr('rel');
		if($(this).prop("checked") == true){
			// To make status as "Enable" (1)
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				type:'post',
				url:'/admin/update-user-status',
				data:{status:'1',user_id:user_id},
				success:function(resp){
					/*alert(resp);*/
				},error:function(){
					alert("Error");
				}
			});
		}else{
			// To make status as "Disable" (0)
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				type:'post',
				url:'/admin/update-user-status',
				data:{status:'0',user_id:user_id},
				success:function(resp){
					/*alert(resp);*/
				},error:function(){
					alert("Error");
				}
			});
		}
	});

	// Enable/Disable User Photo
	$(".userPhotoStatus").change(function(){
		var photo_id = $(this).attr('rel');
		if($(this).prop("checked") == true){
			// To make status as "Enable" (1)
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				type:'post',
				url:'/admin/update-photo-status',
				data:{status:'1',photo_id:photo_id},
				success:function(resp){
					/*alert(resp);*/
				},error:function(){
					alert("Error");
				}
			});
		}else{
			// To make status as "Disable" (0)
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				type:'post',
				url:'/admin/update-photo-status',
				data:{status:'0',photo_id:photo_id},
				success:function(resp){
					/*alert(resp);*/
				},error:function(){
					alert("Error");
				}
			});
		}
	});

	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add Category Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add Product Validation
    $("#add_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			price:{
				required:true,
				number:true
			},
			image:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit Product Validation
    $("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			price:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit Category Validation
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	/*$("#delCat").click(function(){
		if(confirm('Are you sure you want to delete this Category?')){
			return true;
		}
		return false;
	});*/

	/*$("#delProduct").click(function(){
		if(confirm('Are you sure you want to delete this Product?')){
			return true;
		}
		return false;
	});*/

	$(".deleteRecord").click(function(){ 
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!',
				  cancelButtonText: 'No, cancel!',
				  confirmButtonClass: 'btn btn-success',
				  cancelButtonClass: 'btn btn-danger',
				  buttonsStyling: false,
				  reverseButtons: true
		},
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;
		});
	});

	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="field_wrapper" style="margin-left:180px;"><div><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px; margin-right:3px; margin-top:5px;" /><input type="text" name="size[]" id="size" placeholder="Size" style="width:120px; margin-right:3px; margin-top:5px;" /><input type="text" name="price[]" id="price" placeholder="Price" style="width:120px; margin-right:3px; margin-top:5px;" /><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px; margin-right:3px; margin-top:5px;" /><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
		

});
