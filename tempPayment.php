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
             
       $packagename=  $_SESSION["cpackagename"];
       $currentUsername=  $_SESSION["cusername"];
       $firstName= $_SESSION["cfirstname"];
       $lastName =$_SESSION["clastname"];
       $adress=  $_SESSION["cadress"];
       $city= $_SESSION["ccity"];
       $zipCode= $_SESSION["czipCode"];
       $country= $_SESSION["ccountry"];
       $phone=$_SESSION["cphone"];
    
    
     $sql_query = "INSERT INTO checkout (packagename, firstName,lastName, adress, city, zipCode, country, phone, sent, id_buyer, totalPrice) VALUES ('$packagename','$firstName','$lastName','$adress','$city','$zipCode','$country','$phone',NOW(),'$currentUsername',$totalprice)";
    
     $sql_query = mysqli_query($conn, "SELECT id from checkout WHERE packagename='$packagename'"); 
     $row = mysqli_fetch_array($sql_query);
     $_SESSION["cid"]=$row['id'];
    
     header("location:Loading.php");
    
  
    mysqli_close($conn);
    
}
?>