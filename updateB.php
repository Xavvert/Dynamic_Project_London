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
@$username=$_POST['username'];
@$password=$_POST['password'];
@$lastname=$_POST['lastName'];
@$firstname=$_POST['firstName'];
@$adress=$_POST['adress'];
@$city=$_POST['city'];
@$zipCode=$_POST['zipCode'];
@$phone=$_POST['phone'];
@$country=$_POST["country"];
@$validation=$_POST["save"];

if(isset($validation)){

     $sql_query = mysqli_query($conn, "UPDATE buyer SET firstName= '$firstname', lastName= '$lastname', adress= '$adress', city= '$city', zipCode= '$zipCode', country= '$country', phone= '$phone', username= '$username', password= '$password' WHERE username='$currentUsername'");
    
if($sql_query)
{
    $_SESSION["upS"]=1;
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
    $_SESSION["firstname"]=$firstname;
    $_SESSION["lastname"]=$lastname;
    $_SESSION["city"]=$city;
    $_SESSION["zipCode"]=$zipCode;
    $_SESSION["country"]=$country;
    $_SESSION["phone"]=$phone;
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