<?php
$server_name="localhost:3306";
$username="root";
$password="";
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
    
    $sql_query = "INSERT INTO admin (firstName,lastName, adress, city, zipCode, country, phone, username, password) VALUES ('$firstName','$lastName','$adress','$city','$zipCode','$country','$phone','$username','$password')";
    
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

