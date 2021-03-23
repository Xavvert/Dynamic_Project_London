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

$currentUsername=$_SESSION["username"];

@$adress=$_POST['adress'];
@$city=$_POST['city'];
@$zipCode=$_POST['zipCode'];
@$country=$_POST["country"];
@$validation=$_POST["save"];

if(isset($validation)){

     $sql_query = mysqli_query($conn, "UPDATE buyer SET adress= '$adress', city= '$city', zipCode= '$zipCode', country= '$country' WHERE username='$currentUsername'");
    
if($sql_query)
{
    $_SESSION["upS"]=1;
   
    $_SESSION["city"]=$city;
    $_SESSION["zipCode"]=$zipCode;
    $_SESSION["country"]=$country;
    $_SESSION["adress"]=$adress;
    
    header("location:youraccountB.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);

}
?>