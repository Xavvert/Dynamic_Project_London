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
    
 $sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName'");
 $rowCount = mysqli_num_rows($sql_query);

    if($rowCount == 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }

$sql_query = mysqli_query($conn, "Select * from bid WHERE name= '$retrievedName' AND status='Finalized'");
$rowCount = mysqli_num_rows($sql_query);

    if($rowCount > 0)
    {
        header("location:Warningbid.html");
        mysqli_close($conn);
    }
 
    //si deja dans la bdd
    $sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$topPrice=$row['nextPrice'];

$sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$currentPrice=$row['price'];

$sql_query = mysqli_query($conn, "SELECT * from bid WHERE name= '$retrievedName'"); 
     $row = mysqli_fetch_array($sql_query);
$lowerPrice=$row['previousPrice'];


//if there is a better price to propose
if($price>$currentPrice){
    
    if($price>$topPrice){
         $sql_query = mysqli_query($conn, "UPDATE bid SET nextPrice= '$price' WHERE name='$retrievedName'");
         $nowPrice=$topPrice+1;
      
     $sql_query = mysqli_query($conn, "UPDATE bid SET price= '$nowPrice' WHERE name='$retrievedName'");
    $sql_query = mysqli_query($conn, "UPDATE bid SET id_buyer= '$currentUsername' WHERE name='$retrievedName'");
         header("location:youraccountA.php");
        mysqli_close($conn);
    }
    
    if($price<$topPrice)
    {
    $nowPrice=$price+1;
         $sql_query = mysqli_query($conn, "UPDATE bid SET price= '$nowPrice' WHERE name='$retrievedName'");
         header("location:youraccountA.php");
        mysqli_close($conn);
    } 
   
}
 header("location:youraccountA.php");
        mysqli_close($conn);
?>