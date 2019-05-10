$().ready(function() {
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#user_password"
			},
			username: {
				required: true,
				remote: "/check-username"
			},
			email: {
				required: true,
				email: true,
				remote: "/check-email"
			},
			agree: "required"
		},
		messages: {
			name: "Please enter your Name",
			password: {
				required: "Please provide your Password",
				minlength: "Your Password must be at least 6 characters long"
			},
			confirm_password: {
				required: "Please confirm your Password",
				minlength: "Your Password must be at least 6 characters long",
				equalTo: "Please enter the same Password as above"
			},
			username:{
				required:"Please enter your Username",
				remote:"Username already exists!"
			},
			email: {
				required: "Please enter your Email",
				email: "Please enter a valid Email",
				remote: "Email already exists!"
			},
			agree: "Please accept our Policy"
		}
	});

	// validate dating form on keyup and submit
	$("#datingForm").validate({
		rules: {
			dob: {
				required: true
			},
			gender: {
				required: true
			},
			height: {
				required: true
			},
			marital_status: {
				required: true
			},
			about_myself: {
				required: true,
				minlength: 20
			},
			about_partner: {
				required: true,
				minlength: 20
			}
		},
		messages: {
			dob: "Please enter your Date of Birth",
			gender: "Please select your Gender",
			height: "Please select your Height",
			marital_status: "Please select your Marital Status",
			about_myself: {
				required: "Please provide your details",
				minlength: "Your details must be at least 20 characters long"
			},
			about_partner: {
				required: "Please provide your Partner details",
				minlength: "Your details must be at least 20 characters long"
			}
		}
	});

	// Password Checker Script
	$('#user_password').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             /*$('#passstrength').html('More Characters');*/
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html(' Strong!');
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html(' Medium!');
     } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html(' Weak!');
     }
     return true;
	});

	// SweetAlert Delete Script
	$(".deleteAction").click(function(){ 
		var action = $(this).attr('rel');
		var deleteRoute = $(this).attr('rel1');
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
			window.location.href="/"+deleteRoute+"/"+action;
		});
	});

	// Responses Datatable
    $('#responses').DataTable();

    // Response Seen/Unseen Script
    $(".updateResponse").click(function(){
    	var response_id = $(this).attr('rel');
    	$.ajax({
    		type:'post',
    		url:'/update-response',
    		data:{response_id:response_id},
    		success:function(resp){
    			/*alert(resp);*/
    			$(".rel1-"+response_id).addClass('seenResponse');
    			$(".newResponsesCount").html(resp);
    		},error:function(){
    			//alert("Error");
    		}
    	})
    });

});
	