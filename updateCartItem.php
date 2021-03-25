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

echo ("itemName is ");
echo ($itemName);

     $itemName=$_GET['name'];
    

     $sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= 'NULL' WHERE name='$itemName'");


    
if($sql_query)
{
    header("location:cart.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    
    mysqli_close($conn);
?>