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
     $sql_query = mysqli_query($conn, "DELETE FROM item WHERE id_buyer='$currentUsername'");
    
if($sql_query)
{
       
    header("location:FINAL.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);


?>