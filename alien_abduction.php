<?php

if(isset($_POST["submit"])){
    try{
        $host="localhost";
        $user="root";
        $password="";
        $dbName="test";

        $Connection = new PDO("mysql:host=$host;dbname=$dbName",$user,$password);
        $Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Connection failed". $e->getMessage();
    }
    // GET USER INPUTS
    $full_Name = htmlspecialchars($_POST["firstname"] . $_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $when_it_happened = htmlspecialchars($_POST["date"]);
    $how_long = htmlspecialchars($_POST["how_long"]);
    $how_many = htmlspecialchars($_POST["how_many"]);
    $alien_description = htmlspecialchars($_POST["alien_description"]);
    $what_they_did = htmlspecialchars($_POST["what_they_did"]);
    $cloth_found = htmlspecialchars($_POST["lost_cloth"]);
    $other = htmlspecialchars($_POST["other"]);

    $stmt = $Connection->prepare("INSERT INTO alien_abduction(Full_Name, Email, when_it_happened, how_long, how_many, alien_description, what_they_did, cloth_found, other) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $full_Name, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $when_it_happened, PDO::PARAM_STR);
    $stmt->bindParam(4, $how_long, PDO::PARAM_STR);
    $stmt->bindParam(5, $how_many, PDO::PARAM_STR);
    $stmt->bindParam(6, $alien_description, PDO::PARAM_STR);
    $stmt->bindParam(7, $what_they_did, PDO::PARAM_STR);
    $stmt->bindParam(8, $cloth_found, PDO::PARAM_STR);
    $stmt->bindParam(9, $other, PDO::PARAM_STR);

    if($stmt->execute()){
        echo "Inserted into DataBase";
    } else{
        echo "Failed to insert into DataBase";
    }
}
