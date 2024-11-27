<?php
session_start();


require_once("dbconnection.php");

// $id=0;
$update = false;
$id = "";
$name = "";
$location = "";
$mobile = "";
$email = "";
$password = "";

// CREATE A FUNCTION FOR THE SAVE BUTTON
if (isset($_POST["save"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mysqli->query("INSERT INTO crud(id, name, location, mobile, email, password)
    VALUES('$id', '$name', '$location', '$mobile', '$email', '$password')") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Form has been Added and saves to Table";
    $_SESSION['msg_type'] = "success";

    header("location: display.php");
}

// CREATE FUNCTION FOR DELETE BUTTON
if (isset($_GET["delete"])) {
    
}