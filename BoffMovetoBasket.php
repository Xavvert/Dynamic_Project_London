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


//if the offer is already finalized, then it can't be bought again
 $sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND status='Finalized'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }
    
//if it is not the turn of the buyer to interact
$sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername' AND hand='s'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningoffer.html");
        mysqli_close($conn);
    }


//if everythings ok
//then we set the attempts to 5 and finalize the transaction
$sql_query = mysqli_query($conn, "UPDATE offer SET attempt= 5 WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
$sql_query = mysqli_query($conn, "UPDATE offer SET status= 'Finalized' WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
    
//and we fill the db correctly with the good buyer and the good price
$sql_query = mysqli_query($conn, "Select * from offer WHERE name= '$retrievedName' AND id_buyer='$currentUsername'");
$row = mysqli_fetch_array($sql_query);
$goodPrice=$row['price'];
$goodBuyer=$row['id_buyer'];
$sql_query = mysqli_query($conn, "UPDATE item SET type= 'offer' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET price= '$goodPrice' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= '$goodBuyer' WHERE name='$retrievedName'");

    
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
