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

$retrievedName = $_GET['cat'];
$currentUsername=$_SESSION["username"];

$sql_query = mysqli_query($conn, "Select * from item WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND type='offer'");
$rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningdelete.html");
        mysqli_close($conn);
    }

$sql_query = mysqli_query($conn, "Select * from item WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND type='bid'");
$rowCoun = mysqli_num_rows($sql_query);

    if($rowCoun > 0)
    {
        header("location:Warningdelete.html");
        mysqli_close($conn);
    }



 $sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= NULL WHERE name='$retrievedName'");


    
if($sql_query)
{
    header("location:cart.php");
}
    
    else
    {
     header("location:Warningdelete.html");
    }
    
    mysqli_close($conn);
?>