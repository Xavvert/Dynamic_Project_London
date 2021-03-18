<?php
session_start();
if(@$_SESSION["authorize"]!="yes"){
    header("location:logInS.php");
    exit();
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    
    </head>
    <body>
     <h1> Page user : <a href="deconnexion.php"> deco</a></h1>
    </body>
</html>
