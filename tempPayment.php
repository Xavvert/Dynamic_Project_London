<?php
session_start();
$server_name="localhost:3306";
$username="root";
$password="root";
$database_name="cykel";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

if(isset($_POST['save']))
{
    $type=$_POST['type'];
    $nameCard=$_POST['nameCard'];
    $num=$_POST['num'];
    $expiration=$_POST['expiration'];
    $crypto=$_POST['crypto'];
    $currentUsername=$_SESSION["username"];
    
  
         $_SESSION["cnum"]= $num;
         $_SESSION["ctype"]=$type;
         $_SESSION["cnameCard"]=$nameCard;
         $_SESSION["cexpiration"]= $expiration;
         $_SESSION["ccrypto"]= $crypto;
             
     header("location:Loading.php");
    
  
    mysqli_close($conn);
    
}
?>