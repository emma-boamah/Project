<?php 
// session_start();
// if(!isset($_SESSION["pageCount"])){
//     $_SESSION["pageCount"] = 1;
// } else{
//     $_SESSION["pageCount"]++;
// }

// echo "<p>In this session you have visited this page ". $_SESSION["pageCount"]. " time(s)<p/>";


// Example 2
// session_start();
// $thisPage = $_SERVER['PHP_SELF'];
// $pageNameArr = explode('/', $thisPage);

// $pageName = $pageNameArr[count($pageNameArr)-1];
// echo "The name of this page is $pageName <br/>";

// $nameItemsArr = explode(".", $pageName);
// $sessionName = $nameItemsArr[0];

// echo "The session name is $sessionName <br/>";

// // Setting a session
// if(!isset($_SESSION[$sessionName])){
//     $_SESSION[$sessionName] = 0;
//     echo "This is the first time you have visited this page";
// } else{
//     $_SESSION[$sessionName]++;
// }
// echo "<h1>You have visited this page ". $_SESSION[$sessionName] . "times<h1/>";


// Ending sessions
// initialize the session
// session_start();

// Unset all of the session variables.
// $_SESSION = array();
// if(ini_get("sessions.use_cookie")){
//     $params = session_get_cookie_params();
//     setcookie(session_name(),"", time() - 42000, $params["path"],
//     $params["domain"], $params["secure"], $params["httponly"]);
// }

// // finally, destroy the session
// session_destroy();

// EXAMPLE 3
session_start();
if(!isset($_SESSION["strColourBg"])) {
    $_SESSION["strColourBg"] = "red";
} else{
    echo"Current Bg set to ".$_SESSION["strColourBg"]."<br/>";
}

if(!isset($_SESSION["strColourFg"])) {
    $_SESSION["strColourFg"] = "yellow";
} else{
    echo "Current Fg set to ".$_SESSION["strColourFg"];
}

if(isset($_POST["submit"])){
    $strColourBg = $_POST["strNewBg"];
    $strColourFg = $_POST["strNewFg"];
    $_SESSION["strColourBg"] = $strColourBg;
    $_SESSION["strColourFg"] = $strColourFg;
    echo "<br/>New Settings";
} else{
    $strColourBg = $_SESSION["strColourBg"];
    $strColourFg = $_SESSION["strColourFg"];
    echo "<br/>Keep old settings";
}

?>

<head><style type="text/css">
    body {background-color: <?php echo $strColourBg?>}
    p {color: <?php echo"$strColourFg"?>}
    h2 {color: <?php echo "$strColourFg"?>}
</style></head>
<body>
    <h2>h2 colour</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <label for="strNewBg">Background colour:</label>
        <select name="strNewBg" id="strNewBg">
            <option value="red">red</option>
            <option value="grey">grey</option>
        </select>
        <label for="strNewFg">Text colour</label>
        <select name="strNewFg" id="strNewFg">
            <option value="yellow">yellow</option>
            <option value="grey">grey</option>
        </select>
        <input type="submit" name="submit">
    </form>
</body>