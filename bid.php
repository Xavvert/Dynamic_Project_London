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
@$price=$_POST["priceOffer"];
    
//if the seller hasn't yet placed his item into the bid processus
 $sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount == 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }

//if the item has already the status finalized, which means that the bid is over
$sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName' AND status='Finalized'");
$rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }
 
    //if already in the DB
//retrieving some informations from the DB to properly run our next conditions
    $sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$topPrice=$row['nextPrice'];

$sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$currentPrice=$row['price'];

$sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$date1=$row['dateOff'];

$date2=date('Y-m-d');

if ($date2 > $date1)
{

    $sql_query = mysqli_query($conn, "UPDATE bid SET status= 'Finalized' WHERE name='$retrievedName'");

$sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName'");
$row = mysqli_fetch_array($sql_query);
$goodPrice=$row['price'];
$goodBuyer=$row['id_buyer'];
$sql_query = mysqli_query($conn, "UPDATE item SET type= 'bid' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET price= '$goodPrice' WHERE name='$retrievedName'");
$sql_query = mysqli_query($conn, "UPDATE item SET id_buyer= '$goodBuyer' WHERE name='$retrievedName'");

        header("location:Warningover.html");
        mysqli_close($conn);
}

//if there is a better price to propose
if($price>$currentPrice){
    //if the proposed price is better that the previous TOP price
    if($price>$topPrice){
        //then the proposed price is the top price
         $sql_query = mysqli_query($conn, "UPDATE bid SET nextPrice= '$price' WHERE name='$retrievedName'");
        //and the current price is determined by the previous top price +1
         $nowPrice=$topPrice+1;
      
        // and we set the info correctly in the db
     $sql_query = mysqli_query($conn, "UPDATE bid SET price= '$nowPrice' WHERE name='$retrievedName'");
    $sql_query = mysqli_query($conn, "UPDATE bid SET id_buyer= '$currentUsername' WHERE name='$retrievedName'");
         header("location:youraccountA.php");
        mysqli_close($conn);
    }
    
    //if the proposed price is higher than the current price but lower than the previous top price
    if($price<$topPrice)
    {
        //just update the current price to price proposed by the buyer + £1
    $nowPrice=$price+1;
           // and we set the info correctly in the db
         $sql_query = mysqli_query($conn, "UPDATE bid SET price= '$nowPrice' WHERE name='$retrievedName'");
         header("location:youraccountA.php");
        mysqli_close($conn);
    } 
   
}
 header("location:youraccountA.php");
        mysqli_close($conn);
?>