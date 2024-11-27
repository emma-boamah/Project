<?php
// try{
//     $host="localhost";
//     $user="root";
//     $pass= "";
//     $dbName="user profile";

//     $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
//     $dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e){
//     echo "Connection failed: " . $e->getMessage();
// }


// DATA BASE CONFIGURATION

if(isset($_POST["submit"])){
    try{
        $host="localhost";
        $user="root";
        $pass= "";
        $dbName="user_profile";
    
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $userName = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $email = htmlspecialchars($_POST["email"]);

        // INSERTING INFO INTO DATABASE
        $stmt = $dbConn->prepare("INSERT INTO profile(User_Name, Email, password) VALUES(?,?,?)");
        $stmt->bindParam(1, $userName, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $password, PDO::PARAM_STR);
        if( $stmt->execute() ){echo "Inserted into DataBase";}else{
            echo "Insertion into databasse failed";
        }
        $dbConn=null;
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        };
}