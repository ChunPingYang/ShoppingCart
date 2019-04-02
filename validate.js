$(document).ready(function() {

	// your js code goes here...
	$("#username").focus(function(){
		$("#nj").remove();
		$("<span id ='info' class = 'info'>Contain only alphabetical or numeric characters</span>").insertAfter("#username");
	});

	$("#password").focus(function(){
		$("#pj").remove();
		$("<span id ='info' class='info'>At least 8 characters long</span>").insertAfter("#password");
	});

	$("#email").focus(function(){
		$("#ej").remove();
		$("<span id ='info' class='info'>Valid email address (local-part@domain)</span>").insertAfter("#email");

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

        }

	});

	$("#password1").blur(function(){
		$("#info").remove();    
	    var password = $("#password1").val();

		if(!password){
			$("<span></span>").insertAfter("#password");
        }
        else if(password.length>7){
        	$("<span id = 'pj' class='ok'>OK</span>").insertAfter("#password");
        }
        else{
        	$("<span id = 'pj' class='error'>Error</span>").insertAfter("#password");
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
        }
	});


});