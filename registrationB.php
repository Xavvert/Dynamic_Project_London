<?php
$server_name="localhost:3306";
$username="root";
/*$password="";*/
$password="root";
$database_name="cykel";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
    
}

if(isset($_POST['save']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $adress=$_POST['adress'];
    $city=$_POST['city'];
    $zipCode=$_POST['zipCode'];
    $country=$_POST['country'];
    $phone=$_POST['phone'];
    
    $sql_query = "INSERT INTO buyer (firstName,lastName, adress, city, zipCode, country, phone, username, password) VALUES ('$firstName','$lastName','$adress','$city','$zipCode','$country','$phone','$username','$password')";
    
    if(mysqli_query($conn, $sql_query))
    {
        echo ("OK");
    }
    else
    {
        echo ("ERROR");
    }
    mysqli_close($conn);
    
}
?>

