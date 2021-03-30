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
    
    //just saving what we get from the form into session variables to send the recap mail later
    $packagename=$_POST['packagename'];
    $firstName=$_POST['firstname'];
    $lastName=$_POST['lastname'];
    $adress=$_POST['adress'];
    $city=$_POST['city'];
    $zipCode=$_POST['zipCode'];
    $country=$_POST['country'];
    $phone=$_POST['phone'];
    
  @$totalprice=$_SESSION["totalPrice"];
  @$currentUsername=$_SESSION["username"];
   
         $_SESSION["cpackagename"]=$packagename;
         $_SESSION["cusername"]=$currentUsername;
         $_SESSION["cfirstname"]=$firstName;
         $_SESSION["clastname"]=$lastName;
         $_SESSION["cadress"]=$adress;
         $_SESSION["ccity"]=$city;
         $_SESSION["czipCode"]=$zipCode;
         $_SESSION["ccountry"]=$country;
         $_SESSION["cphone"]=$phone;
        
   

        
         
     header("location:payment.php");
    
   
    mysqli_close($conn);
    
}
?>
