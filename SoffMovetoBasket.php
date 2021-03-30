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
@$currentUsername=$_SESSION['username'];

//if the item has his status already finalized, then we can't process 

 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_seller='$currentUsername' AND status='Finalized'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }
//If it's not the turn of the seller
$sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_seller='$currentUsername' AND hand='b'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }

    
// if it's okay, then we're updating the DB and replace all the data. We update the good buyer and price in item table, and finalize the status of the item into the offer table
$sql_query = mysqli_query($conn, "UPDATE offer SET attempt= 5 WHERE name= '$retrievedName' AND id_seller='$currentUsername'");
$sql_query = mysqli_query($conn, "UPDATE offer SET status= 'Finalized' WHERE name= '$retrievedName' AND id_seller='$currentUsername'");
    
$sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_seller='$currentUsername'");
$row = mysqli_fetch_array($sql_query);
$goodPrice=$row['price'];
$goodBuyer=$row['id_buyer'];
$sql_query = mysqli_query($conn, "UPDATE item SET type= 'offer' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET price= '$goodPrice' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= '$goodBuyer' WHERE name='$retrievedName'");

    
if($sql_query)
{
    header("location:youraccountA.php");
}
    
    else
    {
     header("location:HomePage.html");
    }
    mysqli_close($conn);
    

     
    

?>