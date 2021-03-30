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

//retrieving the current Item's name
$retrievedName = $_GET['cat'];
@$currentUsername=$_SESSION['username'];

//if there is already the item in the basket, then you can't add it twice
 $sql_query = mysqli_query($conn, "Select * from item WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
 $rowCount = mysqli_num_rows($sql_query);

if($rowCount > 0)
    {
        header("location:Warningbasket.html");
        mysqli_close($conn);
    }
else{
    //else add it to the cart / by adding the correct buyer's username on the item table
    $sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= '$currentUsername' WHERE name='$retrievedName'");
    
if($sql_query)
{
    header("location:categories.php");
}
    else
    {
     header("location:HomePage.html");
    }
    mysqli_close($conn);
    
}
?>