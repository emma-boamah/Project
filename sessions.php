<?php 
session_start();

$thisPage = $_SERVER["PHP_SELF"];

$thisPage_arr = explode("/", $thisPage);
$pageName = $thisPage_arr[count($thisPage_arr)-1];

echo "The name of this page is: $pageName<br/>";

$nameItems = explode('.', $pageName);
$sessionName = $nameItems[0];

echo "The session name is $sessionName<br/>";

if(!isset($_SESSION[$sessionName])){
    $_SESSION[$sessionName] = 0;
    echo "This is the first time you have visited this page.<br/>";
} else{
    $_SESSION[$sessionName]++;
}

echo "<h1>You have visited this page $_SESSION[$sessionName] time(s)<h1/>";