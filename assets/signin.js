		$(document).ready(function(){

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


			$("#form_signin").submit(function(){
				$("#checking_info").removeClass("hide");
				return true;
			});
		});