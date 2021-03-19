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
    
    $sql_query = "INSERT INTO seller (firstName,lastName, username, password) VALUES ('$firstName','$lastName','$username','$password')";
    
    if(mysqli_query($conn, $sql_query))
    {
        echo ("OK");
        header("location:HomePage.html");
    }
    else
    {
        echo ("ERROR");
    }
    mysqli_close($conn);
    
}
?>

