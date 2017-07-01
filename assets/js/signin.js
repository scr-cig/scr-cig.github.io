$(document).ready(function(){


	$("#ads-plugin").show();

	var btn_login = $("#btnLogin");

	$(btn_login).click(function()
	{
		if ($("#email").val() == "")
		{
			$("#login_emaildiv").addClass("hasError");
			$("#login_emaildiv").css("z-index","100");
			$("#em_empty").removeClass("hide");
			$("#emailErrorMessage").addClass("show");
			return false;
		}else if ($("#password").val() == "")
		{
			$("#login_passworddiv").addClass("hasError");
			$("#login_passworddiv").css("z-index","100");
			$("#em_empty2").removeClass("hide");
			$("#passwordErrorMessage").addClass("show");
			return false;
		}
	});
	$("#email").keyup(function(){
    	$("#login_emaildiv").removeClass("hasError");
		$("#login_emaildiv").css("z-index","100");
		$("#em_empty").add("hide");
		$("#emailErrorMessage").removeClass("show");
	});
	$("#password").keyup(function(){
    	$("#login_passworddiv").removeClass("hasError");
		$("#login_passworddiv").css("z-index","100");
		$("#em_empty").add("hide");
		$("#passwordErrorMessage").removeClass("show");
	});

	$("#form_signin").submit(function()
	{
		$(".transitioning").removeClass("hide");
		$(".transitioning").addClass("spinner");
		$(".checkingInfo").removeClass("hide");
	});
});