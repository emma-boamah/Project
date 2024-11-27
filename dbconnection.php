<?php

// establishing database connection
$dbhost = "localhost";
$dbuser = 'root';
$dbpass = '';
$dbname = 'test';
try{
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection Failed" . $e->getMessage();
}