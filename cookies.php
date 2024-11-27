<?php 

$strAddress = $_SERVER["REMOTE_ADDR"];
$strBrowser = $_SERVER["HTTP_USER_AGENT"];
$strOperatingSystem = $_ENV[PHP_OS];
$strInfo = "$strAddress::$strBrowser::$strOperatingSystem";

// SET THE COOKIE
setcookie("mycookie", $strInfo, time()+3600);

// READING THE COOKIE
$strReadCookie = $_COOKIE["mycookie"];
$arrListOfCookieInfo = explode("::", $strReadCookie);

// DISPLAY COOKIE INFO
echo "<p>Cookie Information<p/>";
echo"<p>Your IP address is:". $arrListOfCookieInfo[0]."<p/>";
