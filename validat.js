$(document).ready(function() { 

	var flag = 0;
	$("#username").focus(function(){
		$("#nj").remove();
		$("<span id ='info' class = 'info'>Contain only alphabetical or numeric characters</span>").insertAfter("#username");
	});


	$("#email").focus(function(){

		$("#ej").remove();
		$("<span id ='info' class='info'>Valid email address (local-part@domain)</span>").insertAfter("#email");

	});

	$("#password1").focus(function(){
		$("#pj1").remove();
		$("<span id ='info' class='info'>At least 8 characters long</span>").insertAfter("#password1");
	});

	$("#password2").focus(function(){
		$("#pj2").remove();
		$("<span id ='info' class='info'>Repeate the Password</span>").insertAfter("#password2");
	});

	//validate the input

	$("#username").blur(function(){
		$("#info").remove();
		var name = $("#username").val();
		var digits_alphs =/^[a-zA-Z0-9]+$/;
		
		if(!name){
			$("<span></span>").insertAfter("#username");
        }

		else if(digits_alphs.test(name)){
        	$("<span id = 'nj' class='ok'>OK</span>").insertAfter("#username");
        }
        else{
			$("<span id = 'nj' class='error'>Error</span>").insertAfter("#username");
			flag = 1;
        }

	});


	$("#email").blur(function(){
		$("#info").remove();    
	    var email = $("#email").val();
	    var is_email = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])/;

		if(!email){
			
        }

        else if(is_email.test(email)){
        	$("<span id = 'ej' class='ok'>OK</span>").insertAfter("#email");
        }
        else{
			$("<span id = 'ej' class='error'>Error</span>").insertAfter("#email");
			flag = 1;
        }
	});


	$("#password1").blur(function(){
		$("#info").remove();    
	    var password = $("#password1").val();

		if(!password){
			$("<span></span>").insertAfter("#password1");
        }
        else if(password.length>7){
        	$("<span id = 'pj1' class='ok'>OK</span>").insertAfter("#password1");
        }
        else{
			$("<span id = 'pj1' class='error'>Error</span>").insertAfter("#password1");
			flag = 1;
        }


	});

	$("#password2").blur(function(){
		$("#info").remove();
		var password1 = $("#password1").val();    
	    var password2 = $("#password2").val();

		if(!password2){
			
        }
        else if(password1==password2){
        	$("<span id = 'pj2' class='ok'>OK</span>").insertAfter("#password2");
        }
        else{
        	$("<span id = 'pj2' class='error'>Two input password must be consistent</span>").insertAfter("#password2");
			flag = 1;
		}

	});

	$("#signup").click(function(event){ 
		if(flag==1){
			event.preventDefault();
		}
	});

});