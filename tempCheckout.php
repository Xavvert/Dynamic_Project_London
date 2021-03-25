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
    $packagename=$_POST['packagename'];
    $firstName=$_POST['firstname'];
    $lastName=$_POST['lastname'];
    $adress=$_POST['adress'];
    $city=$_POST['city'];
    $zipCode=$_POST['zipCode'];
    $country=$_POST['country'];
    $phone=$_POST['phone'];
    
  @$currentUsername=$_SESSION["username"];
    

    
    $sql_query = "INSERT INTO checkout (packagename, firstName,lastName, adress, city, zipCode, country, phone, sent, id_buyer) VALUES ('$packagename','$firstName','$lastName','$adress','$city','$zipCode','$country','$phone','In Progress','$currentUsername')";
    
    if(mysqli_query($conn, $sql_query))
    {
         $_SESSION["cpackagename"]=$packagename;
         $_SESSION["cusername"]=$currentUsername;
         $_SESSION["cfirstname"]=$firstName;
         $_SESSION["clastname"]=$lastName;
         $_SESSION["cadress"]=$adress;
         $_SESSION["ccity"]=$city;
         $_SESSION["czipCode"]=$zipCode;
         $_SESSION["ccountry"]=$country;
         $_SESSION["cphone"]=$phone;
        
    $sql_query = mysqli_query($conn, "SELECT id from checkout WHERE packagename='$packagename'"); 
    $row = mysqli_fetch_array($sql_query);
    $_SESSION["cid"]=$row['id'];

        
         
     header("location:payment.php");
    }
    else
    {
        echo ("ERROR");
    }
    mysqli_close($conn);
    
}
?>
