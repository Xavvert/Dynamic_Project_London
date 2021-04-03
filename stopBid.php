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

    // If the item's status is already finish then we can't again stop the bid
 $sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName' AND status='Finalized'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }

 
// only for the admin, they can stop prematurely the bid, for the purpose of the presentation mainly... because we don't have the time to wait
    $sql_query = mysqli_query($conn, "UPDATE bid SET status= 'Finalized' WHERE name='$retrievedName'");

$sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName'");
$row = mysqli_fetch_array($sql_query);
$goodPrice=$row['price'];
$goodBuyer=$row['id_buyer'];
$sql_query = mysqli_query($conn, "UPDATE item SET type= 'bid' WHERE name='$retrievedName'");
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
