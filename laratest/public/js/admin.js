$(document).ready(function(){
	var token = $("#token").val();
	$("form").submit(function(e){
		if($("#err_uname").html() !=""){
			$('#uname').focus();
			e.preventDefault(e);
		}
		else if($("#err_email").html() !=""){
			$('#email').focus();
			e.preventDefault(e);
		}
	});
	$('#uname').focus(function(){
		var erruname = $("#err_uname").val();
		if(erruname!=null){
			$('#err_uname').html("");
		}
	});
	$('#uname').focusout(function(){
		var uname = $("#uname").val();
		$.ajax({
			url: '/admin/get',
			method: 'post',
			datatype : 'json',
			headers: {
				'X-CSRF-Token': token 
		   	},
			data : {'field':'username',
					'val': uname},
			success:function(response){
				console.log(response);
				if(response){
					$('#err_uname').html("User Name is Already Taken Please select another one!!!");
				}
			},
			error:function(response){
				
			}
		});
	});

	$('#email').focus(function(){
		var erruname = $("#err_email").val();
		if(erruname!=null){
			$('#err_email').html("");
		}
	});
	$('#email').focusout(function(){
		var email = $("#email").val();
		$.ajax({
			url: '/admin/get',
			method: 'post',
			datatype : 'json',
			headers: {
				'X-CSRF-Token': token 
		   	},
			data : {'field':'email',
					'val': email},
			success:function(response){
				if(response){
					$('#err_email').html("Email is Already in Use Plz select another one!!!");
				}
			},
			error:function(response){
				
			}
		});
	});
});